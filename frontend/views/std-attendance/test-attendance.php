<!DOCTYPE html>
<html>
<head>
	<title>Attendance</title>
</head>
<body>
	<h1 class="well well-sm text" align="center">Attendance</h1>
	<div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <input type="hidden" name="_csrf" class="form-control" value="<?=Yii::$app->request->getCsrfToken()?>">          
            </div>   
        </div>
        
    <?php

    	$subjID = array();
        $subjectsIDs = 0;

    	$empEmail = Yii::$app->user->identity->email;
    	$empId = Yii::$app->db->createCommand("SELECT emp.emp_id FROM emp_info as emp WHERE emp.emp_email = '$empEmail'")->queryAll();
    	$empId = $empId[0]['emp_id'];
        $teacherId = Yii::$app->db->createCommand("SELECT teacher_subject_assign_head_id FROM teacher_subject_assign_head WHERE teacher_id = '$empId'")->queryAll();
        $headId = $teacherId[0]['teacher_subject_assign_head_id'];

		$classId = Yii::$app->db->createCommand("SELECT DISTINCT d.class_id FROM teacher_subject_assign_detail as d INNER JOIN teacher_subject_assign_head as h ON d.teacher_subject_assign_detail_head_id = h.teacher_subject_assign_head_id WHERE h.teacher_id = '$empId'")->queryAll();
		$countClassIds = count($classId);

    	for ($i=0; $i <$countClassIds ; $i++) {
    	 $id = $classId[$i]['class_id'];
    	 $CLASSName = Yii::$app->db->createCommand("SELECT seh.std_enroll_head_name,seh.std_enroll_head_id
    		FROM std_enrollment_head as seh
    		INNER JOIN teacher_subject_assign_detail as tsad
    		ON seh.std_enroll_head_id = tsad.class_id WHERE seh.std_enroll_head_id = '$id'")->queryAll();
        $subjectsIDs = Yii::$app->db->createCommand("SELECT tsad.subject_id
        FROM teacher_subject_assign_detail as tsad
        WHERE tsad.class_id = '$id' AND tsad.teacher_subject_assign_detail_head_id = '$headId'")->queryAll();
        
        	?>

    	   <div class="col-md-6">
                <div class="box box-success collapsed-box" >
                    <div class="box-header with-border" style="background-color: #dff0d8;">
                        <h3 class="box-title">
                          	<b>
            				<?php echo $CLASSName[0]['std_enroll_head_name']; ?>
            				</b>
                        </h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse">  <br><i class="fa fa-plus" style="font-size:15px;"></i>
                            </button>
                        </div>
                        <!-- /.box-tools -->
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                    	<table class="table table-hover">
                    		<thead style="background-color:#add8e6; ">
                    			<tr>
                    				<th>Sr #.</th>
                    				<th>Subjects</th>
                    				<th>Action</th>
                    			</tr>
                    		</thead>
                    	<tbody>
                    	<?php 
                    		foreach ($subjectsIDs as $key => $value) {

                    			$SubID = $value['subject_id'];
                    			//$count = count($SubID);
                    			$subjectsNames = Yii::$app->db->createCommand("SELECT subject_id,subject_name
        						FROM subjects WHERE subject_id = '$SubID'")->queryAll();
                    	?>
                    	<tr>
                    		<td width="50px"><?php echo $key+1; ?></td>
                    		<td>
            					<?php echo $subjectsNames[0]['subject_name']; ?>			
                    		</td>
                    		<td>
                    			<a href="./take-attendance?sub_id=<?php echo $SubID ?>&class_id=<?php echo $id; ?>&emp_id=<?php echo $empId; ?>" class="btn btn-info btn-xs">Get Class</a>
                                
                            <a href="./view-attendance?sub_id=<?php echo $SubID ?>&class_id=<?php echo $id; ?>&emp_id=<?php echo $empId; ?>" class="btn btn-info btn-xs">View</a>
                    		</td>
                    	</tr>		
                    <?php   
                        //end of foreach
                        } ?>
                    	</tbody>
                    	</table>
                    </div>
                    <!-- /.box-body -->
                </div>
              <!-- /.box -->
            </div>
  <?php 
    //end of for loop
    } ?>
</body>
</html>
<?php
$url = \yii\helpers\Url::to("std-attendance/fetch-section");

$script = <<< JS
$('#classId').on('change',function(){
   var classId = $('#classId').val();
   $.ajax({
        type:'post',
        data:{class_Id:classId},
        url: "$url",

        success: function(result){
            var jsonResult = JSON.parse(result.substring(result.indexOf('['), result.indexOf(']')+1));
            var options = '';
            $('#sessionId').empty();
            $('#sessionId').append("<option>"+"Select Session"+"</option>");
            for(var i=0; i<jsonResult.length; i++) { 
		        options += '<option value="'+jsonResult[i].session_id+'">'+jsonResult[i].session_name+'</option>';
		    }
		    // Append to the html
		    $('#sessionId').append(options);
        }         
    });       
});

$('#sessionId').on('change',function(){
	var sessionId = $('#sessionId').val();
	var classId = $('#classId').val();

	$.ajax({
        type:'post',
        data:{class_Id:classId,session_Id:sessionId},
        url: "$url",

        success: function(result){
        var jsonResult = JSON.parse(result.substring(result.indexOf('['), result.indexOf(']')+1));
            var options = '';
            $('#sectionId').empty();
            $('#sectionId').append("<option>"+"Select Section"+"</option>");
            for(var i=0; i<jsonResult.length; i++) { 
		        options += '<option value="'+jsonResult[i].section_id+'">'+jsonResult[i].section_name+'</option>';
		    }
		    // Append to the html
		    $('#sectionId').append(options);
        }           
    });       
});

$('#sectionId').on('change',function(){
	var classId = $('#classId').val();
	var sessionId = $('#sessionId').val();
	var sectionId = $('#sectionId').val();

	$.ajax({
        type:'post',
        data:{class_Id:classId,session_Id:sessionId,section_Id:sectionId},
        url: "$url",

        success: function(result){
        console.log(result);
      
         }           
    });       
});

var abc='';
var sn='';
$('#btn_plus0').click(function(){
	abc = $('#className').val();
	sn = $('#SessionName').val();
	
});
$('#plus0').click(function(){
	sn = $('#SessionName').val();
	
});
$('#attendance').change(function(){
  	$('#mymodal').modal('show');
	$('#xyz').val(abc);
	$('#lmn').val(sn);
});


JS;
$this->registerJs($script);
?>
</script>