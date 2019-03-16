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
<div class="container-fluid">
        <div class="row">
            <div class="col-md-3 col-md-offset-9">
                    <a href="./view-attendance?sub_id=<?php echo $sub_id;?>&class_id=<?php echo $class_id;?>&emp_id=<?php echo $emp_id;?>"  style="float: right;" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-backward"></i> Back</a>
            </div>
        </div>
    <br>
    <div class="box box-danger">
        <div class="box-header"style="padding:0px;background-color: #d6484838;">
            <h2 class="text-center text-danger">Date Wise Student Attendance</h2>
        </div>
        <div class="box-body">
            <form method="POST">
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
                            <label>Date</label>
                            <input class="form-control" data-date-format="dd/mm/yyyy" type="date" name="date" required="">
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
                    </div><br>
                    <div class="col-md-2">
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
        </div>
    </div>
</div>
    <?php 
        }

    if(isset($_POST["submit"])){ 
        $sub_id = $_POST["sub_id"];
        $class_id = $_POST["class_id"];
        $emp_id = $_POST["emp_id"];
        $date = $_POST["date"];
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
<div class="container-fluid"> 
    <div class="row">
        <div class="col-md-3">
           <div class="box box-danger">
               <div class="box-header">
                    <h3 class="text-center" style="font-family: georgia;">Student Attendance</h3><hr style="border-color:#d6484838;">
               </div>
               <div class="box-body">
                   <li style="list-style-type: none;">
                            <p class="bg-red text-center" style="padding:4px;">Date</p>
                            <p style="background-color:#d6484838;color: red;text-align: center;">
                                <u><?php echo $date; ?></u>
                            </p>
                    </li><hr style="border-color:#d6484838;"><br>
                    <li style="list-style-type: none;margin-top: -20px;">
                        <b>Class:</b>
                        <p>
                            <?php echo $student[0]['std_enroll_head_name']; ?>
                        </p>
                    </li><br>
                    <li style="list-style-type: none;">
                        <b>Subject:</b>
                        <p>
                            <?php echo $subName[0]['subject_name']; ?>
                        </p>
                    </li><hr style="border-color:#d6484838;"><br>
               </div>
           </div> 
        </div>
        <div class="col-md-9">
           <div class="box box-danger">
               <div class="box-header" style="padding:3px;">
                    <h2 class="text-center text-danger" style="font-family: georgia;">Date Wise View</h2><hr style="border-color:#d6484838;">
               </div>
               <div class="box-body">
                   <div class="row">
                        <div class="col-md-12">
                            <form method="POST" action="view-attendance">
                                <table class="table table-hover">
                                    <thead>
                                        <tr style="background-color:#d6484838; ">
                                            <th >Sr #.</th>
                                            <th >Roll #.</th>
                                            <th >Name</th>
                                            <th>Attendance</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><?php echo 1; ?></td>
                                            <td><?php echo $student[0]['std_roll_no']; ?></td>
                                            <td><?php echo $student[0]['std_enroll_detail_std_name'];?></td>
                                            <?php 
                                                $atten = Yii::$app->db->createCommand("SELECT att.status FROM std_attendance as att WHERE att.teacher_id = '$emp_id' AND att.class_name_id = '$classnameid' AND att.session_id = '$sessionid' AND att.section_id = '$sectionid' AND att.subject_id = '$sub_id' AND CAST(date AS DATE) = '$date' AND att.student_id = '$studentId'")->queryAll();
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
                                </table>
                            </form>
                        </div>
                    </div>
               </div>
           </div> 
        </div>
    </div>
</div>
<?php
//closing of ifisset
    }
?>


</body>
</html>
