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
    <div class="conatiner-fluid">
        <div class="row">
            <div class="col-md-3 col-md-offset-9">
                    <a href="./view-attendance?sub_id=<?php echo $sub_id;?>&class_id=<?php echo $class_id;?>&emp_id=<?php echo $emp_id;?>"  style="float: right;" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-backward"></i> Back</a>
            </div>
    </div>
    <br>
    <div class="box box-danger">
        <div class="box-header" style="padding:0px;background-color:#d6484838;">
            <h2 class="text-center text-danger">Date Range Wise Class Attendance</h2>
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
                    <br>
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
                            <input type="hidden" name="classnameid" value="<?php echo $classnameid; ?>">
                            <input type="hidden" name="sessionid" value="<?php echo $sessionid; ?>">
                            <input type="hidden" name="sectionid" value="<?php echo $sectionid; ?>">
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
        $startDate = $_POST["start_date"];
        $endDate = $_POST["end_date"];
        $studentId = $_POST["studentId"];
        $classnameid = $_POST["classnameid"];
        $sessionid = $_POST["sessionid"];
        $sectionid = $_POST["sectionid"];

        $student = Yii::$app->db->createCommand("SELECT seh.std_enroll_head_name,sed.std_enroll_detail_std_name, sed.std_roll_no
        FROM std_enrollment_detail as sed
        INNER JOIN std_enrollment_head as seh
        ON seh.std_enroll_head_id = sed.std_enroll_detail_head_id
        WHERE sed.std_enroll_detail_head_id = '$class_id' AND sed.std_enroll_detail_std_id = '$studentId' ")->queryAll();
    
        $subName = Yii::$app->db->createCommand("SELECT subject_name FROM subjects WHERE subject_id = '$sub_id'")->queryAll();
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
                        <p class="bg-red text-center" style="padding:4px;">
                            Date Range
                        </p>
                        <p>
                            <table style="background-color:#d6484838;color: red; width: 100%;">
                                <tr>
                                    <td>
                                        <b style="margin-left: 10px;">From:</b>
                                    </td>
                                    <td style="float: right;margin-right: 10px;">
                                        <u><?php echo $startDate;?></u>
                                    </td>
                                </tr><br>
                                <tr>
                                    <td>
                                        <b style="margin-left: 10px;">To:</b>
                                    </td>
                                    <td style="float: right;margin-right: 10px;">
                                        <u><?php echo $endDate;?></u>
                                    </td>
                                </tr>
                            </table>
                        </p>
                    </li><hr style="border-color:#d6484838;"><br>
                    <li style="list-style-type: none;margin-top: -20px;">
                        <b>Class:</b>
                        <p>
                            <?php echo $students[0]['std_enroll_head_name']; ?>
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
                    <h2 class="text-center text-danger" style="font-family: georgia;">Date Range Wise View</h2><hr style="border-color:#d6484838;">
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-12">
                             <form method="POST" action="daterangewise-student-attendance">
                                <table class="table table-hover">
                                    <thead>
                                        <?php 
                                        $stdId = $students[0]['std_enroll_detail_std_id'];
                                        $atten = Yii::$app->db->createCommand("SELECT CAST(date AS DATE),att.status FROM std_attendance as att WHERE att.teacher_id = '$emp_id' AND att.class_name_id = '$classnameid' AND att.session_id = '$sessionid' AND att.section_id = '$sectionid' AND att.subject_id = '$sub_id' AND att.student_id = '$stdId' AND CAST(date AS DATE) >= '$startDate' AND CAST(date AS DATE) <= '$endDate'")->queryAll(); 
                                        $count = count($atten);
                                         ?>
                                        <tr style="background-color:#d6484838; ">
                                            <th >Sr #.</th>
                                            <th>Roll #.</th>
                                            <th >Name</th>
                                            <?php for ($i=0; $i <$count ; $i++) { ?>
                                            <th>
                                                <?php 
                                                $datee = $atten[$i]["CAST(date AS DATE)"];
                                                $date = explode('-', $datee);
                                                $date1 = $date[2];
                                                    echo  $date1; 
                                                ?>   
                                            </th>
                                            <?php } ?>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><?php echo 1 ?></td>
                                            <td><?php echo $students[0]['std_roll_no']; ?></td>
                                            <td><?php echo $students[0]['std_enroll_detail_std_name'];?></td>
                                                <?php 
                                                $stdId = $students[0]['std_enroll_detail_std_id'];
                                                $atten = Yii::$app->db->createCommand("SELECT CAST(date AS DATE),att.status FROM std_attendance as att WHERE att.teacher_id = '$emp_id' AND att.class_name_id = '$classnameid' AND att.session_id = '$sessionid' AND att.section_id = '$sectionid' AND att.subject_id = '$sub_id' AND att.student_id = '$stdId' AND CAST(date AS DATE) >= '$startDate' AND CAST(date AS DATE) <= '$endDate'")->queryAll();

                                                for ($j=0; $j <$count ; $j++) { ?>
                                            <td><?php echo $atten[$j]["status"]; ?></td>
                                            <?php } ?>

                                        </tr>
                                        
                                        <?php
                                        //closing for loop
                                        } ?>
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
