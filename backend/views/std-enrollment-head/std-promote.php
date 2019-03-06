<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>Fee Vocher</title>
</head>
<body>
<div class="container-fluid" style="margin-top: -30px;">
	<h1 class="well well-sm bg-navy" align="center" style="color: #3C8DBC;">Promote Students</h1>
    <!-- action="index.php?r=fee-transaction-detail/class-account-info" -->
    <form method="POST" action="./std-promote">
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <input type="hidden" name="_csrf" class="form-control" value="<?=Yii::$app->request->getCsrfToken()?>">          
                </div>    
            </div>    
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label>Select Class</label>
                    <select class="form-control" name="classid" id="classId" required="required">
                        <option>Select Class</option>
                            <?php 
                                $className = Yii::$app->db->createCommand("SELECT * FROM std_class_name where delete_status=1")->queryAll();
                                    foreach ($className as  $value) { ?>    
                                    <option value="<?php echo $value["class_name_id"]; ?>">
                                        <?php echo $value["class_name"]; ?> 
                                    </option>
                            <?php } ?>
                    </select>      
                </div>    
            </div>  
            <div class="col-md-4">
                <div class="form-group">
                    <label>Select Session</label>
                    <select class="form-control" name="sessionid" id="sessionId" required="">
                            <option value="">Select Session</option>
                            <?php 
                                $sessionName = Yii::$app->db->createCommand("SELECT * FROM std_sessions where delete_status=1")->queryAll();
                                    foreach ($sessionName as  $value) { ?>  
                                    <option value="<?php echo $value["session_id"]; ?>">
                                        <?php echo $value["session_name"]; ?>   
                                    </option>
                            <?php } ?>
                    </select>      
                </div>    
            </div>  
            <div class="col-md-4">
                <div class="form-group">
                    <label>Select Section</label>
                    <select class="form-control" name="sectionid" id="section" required="">
                            <option value="">Select Section</option>
                    </select>      
                </div>    
            </div>    
        </div>
        <div class="row">
            <div class="col-md-3">
                <div class="form-group" style="margin-top: 24px;">
                    <button type="submit" name="submit" class="btn btn-success btn-flat btn-block"><i class="fa fa-check-square-o" aria-hidden="true"></i><b> Get Class</b></button>
                </div>    
            </div>
        </div>
    </form>
    <!-- Header Form Close--> 
</body> 
</html>

<?php
    if(isset($_POST["submit"])){ 
        $classid= $_POST["classid"];
        $sessionid = $_POST["sessionid"];
        $sectionid = $_POST["sectionid"];

        $student = Yii::$app->db->createCommand("SELECT sed.std_enroll_detail_id ,sed.std_enroll_detail_std_id, sed.std_roll_no FROM std_enrollment_detail as sed INNER JOIN std_enrollment_head as seh ON seh.std_enroll_head_id = sed.std_enroll_detail_head_id WHERE seh.class_name_id = '$classid' AND seh.session_id = '$sessionid' AND seh.section_id = '$sectionid'")->queryAll();
?>

<div class="container-fluid" style="margin-top: -30px">
        <hr>
        <form method="POST" action="student-attendance">
            <div class="row">
                <div class="col-md-8">
                    <table width="100%" class="table table-responsive table-bordered table-condensed table-hover">
                        <tr class="label-success" style="color: white;"> 
                            <th>Sr No</th>
                            <th>RollNo</th>
                            <th>Student Name</th>
                            <th class="text-center">Status</th>
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
                                    <input type="checkbox" name="promote" checked="">
                                    <span class="label label-primary">Promote</span>
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
                        ?>

                        <table width="100%" class="table table-responsive table-bordered table-responsive table-condensed table-hover">
                            <tr class="label-success" style="color: white;"> 
                                <td align="center" colspan="2"><b>Class Information</b></td>
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
                        </table>
                    </div>
                </div>
            </div>
            <hr>

            <div class="row">
                <div class="col-md-2 col-md-offset-5">
                    <button type="submit" name="save" class="btn btn-success btn-flat"><i class="glyphicon glyphicon-saved"></i>
                        <b>Promote Students</b></button>
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
                    </div>    
            </div>
        </form> 
        
    
<?php 
// closing of if isset
} 
?>

<?php
$url = \yii\helpers\Url::to("fee-transaction-detail/fetch-students");

$script = <<< JS
$('#sessionId').on('change',function(){
   var session_Id = $('#sessionId').val();
  
   $.ajax({
        type:'post',
        data:{session_Id:session_Id},
        url: "$url",

        success: function(result){
            var jsonResult = JSON.parse(result.substring(result.indexOf('['), result.indexOf(']')+1));
            var options = '';
            for(var i=0; i<jsonResult.length; i++) { 
                options += '<option value="'+jsonResult[i].section_id+'">'+jsonResult[i].section_name+'</option>';
            }
            // Append to the html
            $('#section').append(options);
        }         
    });       
});
JS;
$this->registerJs($script);
?>
</script>
