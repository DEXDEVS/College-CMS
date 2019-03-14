<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
     
<?php 
    if(isset($_GET['sub_id'])){
        $sub_id = $_GET['sub_id'];  
        $class_id = $_GET['class_id'];
        $emp_id = $_GET['emp_id'];     
?>

    <div class="conatiner-fluid">
        <div class="box box-success">
            <div class="box-header" style="padding:0px;">
                <h2 class="text-center text-success">Date Wise Class Attendance</h2>
            </div><hr>
            <div class="box-body">
                <form  action = "datewise-class-attendance" method="POST">
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Date</label>
                        <input class="form-control" data-date-format="dd/mm/yyyy" type="date" name="date" required="">
                    </div>    
                </div><br><br>
                <div class="col-md-3">
                    <div class="form-group">
                        <button type="submit" name="submit" class="btn btn-success btn-flat form-control" style="margin-top: -25px;">
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
    // closing of $_GET.... 
    }

    if(isset($_POST["submit"])){ 
        $sub_id = $_POST["sub_id"];
        $class_id = $_POST["class_id"];
        $emp_id = $_POST["emp_id"];
        $date = $_POST["date"];

        $students = Yii::$app->db->createCommand("SELECT seh.std_enroll_head_name,sed.std_enroll_detail_std_id,sed.std_enroll_detail_std_name, sed.std_roll_no
        FROM std_enrollment_detail as sed
        INNER JOIN std_enrollment_head as seh
        ON seh.std_enroll_head_id = sed.std_enroll_detail_head_id
        WHERE sed.std_enroll_detail_head_id = '$class_id'")->queryAll();
    
    $countstd = count($students);
    $subName = Yii::$app->db->createCommand("SELECT subject_name FROM subjects WHERE subject_id = '$sub_id'")->queryAll();

    $classDetail = Yii::$app->db->createCommand("SELECT DISTINCT seh.class_name_id, seh.session_id, seh.section_id FROM std_enrollment_head as seh INNER JOIN teacher_subject_assign_detail as d ON d.class_id = seh.std_enroll_head_id WHERE d.class_id = '$class_id'")->queryAll();
    $classnameid = $classDetail[0]['class_name_id'];
    $sessionid = $classDetail[0]['session_id'];
    $sectionid = $classDetail[0]['section_id'];
    
?> 
    
    <div class="box box-default">
        <div class="box-header" style="padding:0px;">
            <h2 class="text-success text-center">View Date Wise Class Attendance</h2>
        </div><hr>
        <div class="box-body">
            <div class="row">
                <div class="col-md-12">
                    <form method="POST" action="view-attendance">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Class:</th>
                                <td><?php echo $students[0]['std_enroll_head_name']; ?></td>
                            </tr>
                            <tr>
                                <th>Subject:</th>
                                <td><?php echo $subName[0]['subject_name']; ?></td>
                            </tr>
                            <tr>
                                <th>Date:</th>
                                <td><?php echo $date; ?></td>
                            </tr>
                            <tr style="background-color:#add8e6; ">
                                <th >Sr #.</th>
                                <th >Roll #.</th>
                                <th >Name</th>
                                <th>Attendance</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            for ($i=0; $i <$countstd ; $i++) { 
                             ?>
                            <tr>
                                <td><?php echo $i+1 ?></td>
                                <td><?php echo $students[$i]['std_roll_no']; ?></td>
                                <td><?php echo $students[$i]['std_enroll_detail_std_name'];?></td>
                                <?php 
                                    $stdId = $students[$i]['std_enroll_detail_std_id'];
                                    $atten = Yii::$app->db->createCommand("SELECT att.status FROM std_attendance as att WHERE att.teacher_id = '$emp_id' AND att.class_name_id = '$classnameid' AND att.session_id = '$sessionid' AND att.section_id = '$sectionid' AND att.subject_id = '$sub_id' AND CAST(date AS DATE) = '$date' AND att.student_id = '$stdId'")->queryAll();
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
<?php
//closing of $_POST
}
?> 

</body>
</html>