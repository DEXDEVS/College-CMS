<?php 

    if(isset($_GET['sub_id'])){
        $sub_id = $_GET['sub_id'];  
        $class_id = $_GET['class_id'];
        $emp_id = $_GET['emp_id'];   

        $classDetail = Yii::$app->db->createCommand("SELECT DISTINCT seh.class_name_id, seh.session_id, seh.section_id FROM std_enrollment_head as seh INNER JOIN teacher_subject_assign_detail as d ON d.class_id = seh.std_enroll_head_id WHERE d.class_id = '$class_id'")->queryAll();
		$classnameid = $classDetail[0]['class_name_id'];
		$sessionid = $classDetail[0]['session_id'];
		$sectionid = $classDetail[0]['section_id'];
?>

<!DOCTYPE html>
<html>
<head>
  <title>View Attendance</title>

</head>
<body>
  <form  action = "daterangewise-student-attendance" method="POST" style="margin-top: -35px">
        <h1 class="well well-sm text" align="center">View Attendance</h1>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <input type="hidden" name="_csrf" class="form-control" value="<?=Yii::$app->request->getCsrfToken()?>">          
                </div>    
            </div>    
        </div>
        <div class="row">
            <div class="col-md-3">
               <label>Start Date:</label>
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-calendar" style="color: #3C8DBC"></i>
                    </div>
                  <input type="date" class="form-control" name="start_date">
                </div>
            </div>
            <div class="col-md-3">
                <label>End Date:</label>
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-calendar" style="color: #3C8DBC"></i>
                    </div>
                    <input type="date" class="form-control" name="end_date">
                </div>
            </div>
            <?php 
            	$students = Yii::$app->db->createCommand("SELECT sed.std_enroll_detail_std_id, sed.std_enroll_detail_std_name FROM std_enrollment_detail as sed INNER JOIN std_enrollment_head as seh ON sed.std_enroll_detail_head_id = seh.std_enroll_head_id WHERE seh.class_name_id = '$classnameid' AND seh.session_id = '$sessionid' AND seh.section_id = '$sectionid' ")->queryAll();
            	$stdCount = count($students);

            ?>
            <div class="col-md-3">
                <div class="form-group">
                    <label>Select Student</label>
                    <select class="form-control" name="studentId">
                    	<option value="">Select Student </option>
						<?php
						for ($i=0; $i <$stdCount ; $i++){
						?>
							<option value="<?php echo $students[$i]["std_enroll_detail_std_id"]; ?>">
									<?php echo $students[$i]["std_enroll_detail_std_name"]; ?>	
							</option>
							
						<?php } ?>
							
					</select>      
                </div>    
            </div>
           
            <div class="col-md-2 col-md-offset-10">
                <div class="form-group">
                    <label></label>
                    <button type="submit" name="submit" class="btn btn-success form-control" style="margin-top: -25px;">
                    <i class="fa fa-sign-in" aria-hidden="true"></i>    
                    <b>View Attendance</b></button>
                </div>    
            </div> 
            <input type="hidden" name="sub_id" value="<?php echo $sub_id; ?>">
            <input type="hidden" name="class_id" value="<?php echo $class_id; ?>">
            <input type="hidden" name="emp_id" value="<?php echo $emp_id; ?>">
        </div>
    </form>
    <?php 
        }

    if(isset($_POST["submit"])){ 
        $sub_id = $_POST["sub_id"];
        $class_id = $_POST["class_id"];
        $emp_id = $_POST["emp_id"];
        $startDate = $_POST["start_date"];
        $endDate = $_POST["end_date"];
        $studentId = $_POST["studentId"];

        $student = Yii::$app->db->createCommand("SELECT seh.std_enroll_head_name,sed.std_enroll_detail_std_name, sed.std_roll_no
        FROM std_enrollment_detail as sed
        INNER JOIN std_enrollment_head as seh
        ON seh.std_enroll_head_id = sed.std_enroll_detail_head_id
        WHERE sed.std_enroll_detail_head_id = '$class_id' AND sed.std_enroll_detail_std_id = '$studentId' ")->queryAll();
    
    $subName = Yii::$app->db->createCommand("SELECT subject_name FROM subjects WHERE subject_id = '$sub_id'")->queryAll();

    $classDetail = Yii::$app->db->createCommand("SELECT DISTINCT seh.class_name_id, seh.session_id, seh.section_id FROM std_enrollment_head as seh INNER JOIN teacher_subject_assign_detail as d ON d.class_id = seh.std_enroll_head_id WHERE d.class_id = '$class_id'")->queryAll();
    $classnameid = $classDetail[0]['class_name_id'];
    $sessionid = $classDetail[0]['session_id'];
    $sectionid = $classDetail[0]['section_id'];
    
?> 
    <div class="row">
        <div class="col-md-12">
            <form method="POST" action="view-attendance">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <td align="center" colspan="4">
                           <b style="font-size: 30px;">Class Attendance - From: <?php echo $startDate." to ".$endDate; ?></b>
                        </td>
                    </tr>
                    <tr>
                        <th>Class:</th>
                        <td><?php echo $student[0]['std_enroll_head_name']; ?></td>
                        <th>Subject:</th>
                        <td><?php echo $subName[0]['subject_name']; ?></td>
                    </tr>
                    <tr style="background-color:#add8e6; ">
                        <th >Sr #.</th>
                        <th >Roll #.</th>
                        <th >Name</th>
                        <?php 
                            for($i=$stDate[2]; $i<=$enDate[2]; $i++){
                        ?>
                                <th><?php echo $i; ?></th>
                        <?php
                            }
                        ?>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?php echo 1; ?></td>
                        <td><?php echo $student[0]['std_roll_no']; ?></td>
                        <td><?php echo $student[0]['std_enroll_detail_std_name'];?></td>
                        <?php 
                             $atten = Yii::$app->db->createCommand("SELECT att.date, att.status FROM std_attendance as att WHERE att.teacher_id = '$emp_id' AND att.class_name_id = '$classnameid' AND att.session_id = '$sessionid' AND att.section_id = '$sectionid' AND att.subject_id = '$sub_id' AND att.student_id = '$studentId' AND CAST(date AS DATE) >= '$startDate' AND CAST(date AS DATE) <= '$endDate'")->queryAll();
                             var_dump($atten);
                            ?>
                        <td align="center">
                            <?php 
                            if(empty($atten)){
                                echo 'N/A';
                            } else {
                                echo $atten[0]['status']; 
                            }?>
                        </td>
                    </tr>
                    
                </tbody>
                
                </form>
            </table>
        </div>
    </div>
<?php
//closing of ifisset
    }
?>


</body>
</html>
