<!DOCTYPE html>
<html>
<head>
  <title>View Attendance</title>

</head>
<body>

    <?php 

    if(isset($_POST["submit"])){

        $sub_id         = $_GET["sub_id"];
        $class_id       = $_GET["class_id"];
        $emp_id         = $_GET["emp_id"];
        $date           = $_POST["date"];
        $studentId      = $_POST["studentId"];
        $classnameid    = $_POST["classnameid"];
        $sessionid      = $_POST["sessionid"];
        $sectionid      = $_POST["sectionid"];

        $student = Yii::$app->db->createCommand("SELECT seh.std_enroll_head_name,sed.std_enroll_detail_std_name, sed.std_roll_no
        FROM std_enrollment_detail as sed
        INNER JOIN std_enrollment_head as seh
        ON seh.std_enroll_head_id = sed.std_enroll_detail_head_id
        WHERE sed.std_enroll_detail_head_id = '$class_id' AND sed.std_enroll_detail_std_id = '$studentId' ")->queryAll();
    
    $subName = Yii::$app->db->createCommand("SELECT subject_name FROM subjects WHERE subject_id = '$sub_id'")->queryAll();
    
?>
<div class="container-fluid">
<div class="row">
            <div class="col-md-3 col-md-offset-9">
                    <a href="./view-attendance?sub_id=<?php echo $sub_id;?>&class_id=<?php echo $class_id;?>&emp_id=<?php echo $emp_id;?>"  style="float: right;" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-backward"></i> Back</a>
            </div>
</div> <br>
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
