<!DOCTYPE html>
<html>
<head>
	<title>Attendance</title>
</head>
<body>
	<form  action = "student-attendance" method="POST" style="margin-top: -35px">
		<h1 class="well well-sm text" align="center">Attendance</h1>
    	<div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <input type="hidden" name="_csrf" class="form-control" value="<?=Yii::$app->request->getCsrfToken()?>">          
                </div>    
            </div>    
        </div>
        <div class="row">
        	<div class="col-md-3">
                <div class="form-group">
                	<label>Current Date</label>
                    <input class="form-control" data-date-format="mm/dd/yyyy" type="date" name="date" required="">
                </div>    
            </div>
            <?php
            	$techerEmail = Yii::$app->user->identity->email;
            	$teacherId = Yii::$app->db->createCommand("SELECT emp.emp_id FROM emp_info as emp WHERE emp.emp_email = '$techerEmail'")->queryAll();
            	$teacher_id = $teacherId[0]['emp_id'];
				$classId = Yii::$app->db->createCommand("SELECT DISTINCT d.class_id FROM teacher_subject_assign_detail as d INNER JOIN teacher_subject_assign_head as h ON d.teacher_subject_assign_detail_head_id = h.teacher_subject_assign_head_id WHERE h.teacher_id = '$teacher_id'")->queryAll();
            ?>
            <div class="col-md-3">
                <div class="form-group">
                    <label>Select Class</label>
                    <select class="form-control" name="classid" id="classId">
                    	<option value="">Select Class </option>
						<?php
						foreach ($classId as $key => $value) {
							$id = $classId[$key]['class_id'];
							$classNameId = Yii::$app->db->createCommand("SELECT class_name_id  FROM std_enrollment_head WHERE std_enroll_head_id = '$id'")->queryAll(); 
							$name = $classNameId[0]['class_name_id'];
							$className = Yii::$app->db->createCommand("SELECT class_name FROM std_class_name WHERE class_name_id = '$name'")->queryAll();
							?>

							<option value="<?php echo $classNameId[0]["class_name_id"]; ?>">
									<?php echo $className[0]["class_name"]; ?>	
							</option>
							
						<?php } ?>
							
					</select>      
                </div>    
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label>Select Session</label>
                    <select class="form-control" name="sessionid" id="sessionId">
							<option value="">Select Session</option>
					</select>      
                </div>    
            </div>  
            <div class="col-md-3">
                <div class="form-group">
                    <label>Select Section</label>
                    <select class="form-control" name="sectionid" id="sectionId" >
                    		<option value="">Select Section</option>
					</select>      
                </div>    
            </div> 

            <div class="col-md-3">
                <div class="form-group">
                    <label>Select Subject</label>
                    <select class="form-control" name="subjectid" id="subjectId">
							<option value="">Select Subject</option>
					</select>      
                </div>    
            </div>              
            <div class="col-md-2 col-md-offset-10">
                <div class="form-group">
                	<label></label>
                    <button type="submit" name="submit" class="btn btn-success form-control" style="margin-top: -25px;">
                    <i class="fa fa-sign-in" aria-hidden="true"></i>	
                	<b>Take Attendance</b></button>
                </div>    
            </div>    
        </div>
    </form>

<?php
	if(isset($_POST["submit"])){ 
		$classid= $_POST["classid"];
		$sessionid = $_POST["sessionid"];
		$sectionid = $_POST["sectionid"];
		$subjectid = $_POST["subjectid"];
		$date = $_POST["date"];

		$student = Yii::$app->db->createCommand("SELECT sed.std_enroll_detail_id ,sed.std_enroll_detail_std_id, sed.std_roll_no FROM std_enrollment_detail as sed INNER JOIN std_enrollment_head as seh ON seh.std_enroll_head_id = sed.std_enroll_detail_head_id WHERE seh.class_name_id = '$classid' AND seh.session_id = '$sessionid' AND seh.section_id = '$sectionid'")->queryAll();
		?>
		
	<div class="container-fluid" style="margin-top: -30px">
		<hr>
		<form method="POST" action="student-attendance">
			<div class="row">
				<div class="col-md-8">
					<table width="100%" class="table table-responsive table-condensed table-hover">
						<tr class="label-success" style="color: white;"> 
							<th>Sr No</th>
							<th>RollNo</th>
							<th>Student Name</th>
							<th class="text-center">Attendance</th>
						</tr>
						
						<?php $length = count($student);
						//$stdId = array(); 
						for( $i=0; $i<$length; $i++) { ?>
							<tr>
								<td><?php echo $i+1 ?></td>
								<td><?php echo $student[$i]['std_roll_no'] ?></td>
								<?php $stdId = $student[$i]['std_enroll_detail_std_id'];
									  $stdName = Yii::$app->db->createCommand("SELECT std_name FROM std_personal_info  WHERE std_id = '$stdId'")->queryAll();?>
								<td><?php echo $stdName[0]['std_name'] ?></td>
								<td align="center">
									<input type="radio" name="std<?php echo $i+1?>" value="P" checked="checked"/> <b  style="color: green">Present </b> &nbsp; &nbsp;| &nbsp; 
									<input type="radio" name="std<?php echo $i+1?>" value="A" /> <b style="color: red">Absent </b> &nbsp; &nbsp;| &nbsp; 
									<input type="radio" name="std<?php echo $i+1?>" value="L" /><b style="color: #F7C564;"> Leave</b>
								</td>
							</tr>
					<?php
						$stdAttendId[$i] = $stdId;
						//closing for loop
						}
					?>
					</table>
				</div>
				<div class="row">
					<div class="col-md-4">
						
						<?php 
							// Select Class Name
							$className = Yii::$app->db->createCommand("SELECT class_name FROM std_class_name WHERE class_name_id = '$classid'")->queryAll();
							// Select Session 
							$sessionName = Yii::$app->db->createCommand("SELECT session_name FROM std_sessions WHERE session_id = '$sessionid'")->queryAll();
							// Select Section
							$sectionName = Yii::$app->db->createCommand("SELECT section_name FROM std_sections WHERE section_id = '$sectionid'")->queryAll();
							// Select Subject
							$subjectName = Yii::$app->db->createCommand("SELECT subject_name FROM subjects WHERE subject_id = '$subjectid'")->queryAll();

						?>

						<table width="100%" class="table table-responsive table-bordered table-responsive table-condensed table-hover">
							<tr class="label-success" style="color: white;"> 
								<td align="center" colspan="2"><b>Class Info</b></td>
							</tr>
							<tr>
								<th>Date</th>
								<td><?php echo $date; ?></td>
							</tr>
							<tr>
								<th>Class</th>
								<td><?php echo $className[0]['class_name']; ?></td>
							</tr>
							<tr>
								<th>Session</th>
								<td><?php echo $sessionName[0]['session_name']; ?></td>
							</tr>
							<tr>
								<th>Section </th>
								<td><?php echo $sectionName[0]['section_name']; ?></td>
							</tr>
							<tr>
								<th>Subject </th>
								<td><?php echo $subjectName[0]['subject_name']; ?></td>
							</tr>
						</table>
					</div>
				</div>
			</div>
			<hr>

			<div class="row">
				<div class="col-md-2 col-md-offset-5">
					<button type="submit" name="save" class="btn btn-success form-control"><i class="glyphicon glyphicon-saved"></i>
						<b>Save Attendance</b></button>
				</div>
			</div>

			<div class="col-md-2">
	                <div class="form-group">
	                	<?php foreach ($stdAttendId as $value) {
	                		echo '<input type="hidden" name="stdAttendance[]" value="'.$value.'">';
	                	}
	                	?>
	                	<input type="hidden" name="length" value="<?php echo $length; ?>">
	                	<input type="hidden" name="classid" value="<?php echo $classid; ?>">
	                	<input type="hidden" name="sessionid" value="<?php echo $sessionid; ?>">
	                	<input type="hidden" name="sectionid" value="<?php echo $sectionid; ?>">
	                	<input type="hidden" name="subjectid" value="<?php echo $subjectid; ?>">
	                	<input type="hidden" name="date" value="<?php echo $date; ?>">
	                </div>    
	        </div>
	    </form> 
		<?php 
		// closing of if isset
			} ?>	
	</div>
	<!-- container-fluid close -->	

	<?php 	
		if (isset($_POST["save"])) {
				$classid = $_POST["classid"];
				$sessionid = $_POST["sessionid"];
				$sectionid = $_POST["sectionid"];
				$subjectid = $_POST["subjectid"];
				$date = $_POST["date"];
				$length = $_POST["length"];
				$stdAttendId = $_POST["stdAttendance"];
				for($i=0; $i<$length;$i++){
					$q=$i+1;
					$std = "std".$q;
					$status[$i] = $_POST["$std"];
				}
				
				//var_dump($status);
				for($i=0; $i<$length; $i++){
					$attendance = Yii::$app->db->createCommand()->insert('std_attendance',[
						'teacher_id' => $teacherId[0]['emp_id'],
						'class_name_id' => $classid,
						'session_id'=> $sessionid,
						'section_id'=> $sectionid,
						'subject_id'=> $subjectid,
						'date' => $date,
						'student_id' => $stdAttendId[$i],
						'status' => $status[$i],
					])->execute();
				}
		}
	 ?>
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
		        options += '<option value="'+ jsonResult[i].section_id +'">'+ jsonResult[i].section_name +'</option>';
		    }
		    // Append to the html
		    $('#sectionId').append(options);
        }           
    });       
});

$('#sectionId').on('change',function(){
	var clsId = $('#classId').val();
	var sessId = $('#sessionId').val();
	var sectId = $('#sectionId').val();
	
	$.ajax({
        type:'post',
        data:{class:clsId,session:sessId,section:sectId},
        url: "$url",

        success: function(result){
        console.log(result);
        var jsonResult = JSON.parse(result.substring(result.indexOf('{'), result.indexOf('}')+1));
            
            var len =jsonResult[0].length;
            var option = "";
            $('#subjectId').empty();
            $('#subjectId').append("<option>"+"Select Subject"+"</option>");
            for(var i=0; i<len; i++)
            {
            var subId = jsonResult[0][i];
            var subName = jsonResult[1][i];
            alert(subName);
            option += '<option value="'+ subId +'">'+ subName +'</option>';
            }
            $('#subjectId').append(option);      
         }           
    });       
});

JS;
$this->registerJs($script);
?>
</script>