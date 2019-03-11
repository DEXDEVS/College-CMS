<!DOCTYPE html>
<html>
<head>
  <title>View Attendance</title>
  <style type="text/css">
      body{
        font-family: verdana;
      }
  </style>
</head>
<body>
<?php 
    if(isset($_GET['sub_id'])){
        $sub_id = $_GET['sub_id'];  
        $class_id = $_GET['class_id'];
        $emp_id = $_GET['emp_id'];     
    }    
?>
<div class="container-fluid" style="margin-top: -35px">
    <h1 class="well well-sm text text-success" align="center" style="background-color: #DFF0D8;">View Attendance</h1>
    <div class="row">
        <div class="col-md-12">
            <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h4 class="text-primary">Date Wise</h4>
              <p>Class Attendance</p>
            </div>
            <div class="icon">
              <i class="fa fa-calendar-plus-o fa-1"></i>
            </div>
            <a href="./datewise-class-attendance?sub_id=<?php echo $sub_id ?>&class_id=<?php echo $class_id ?>&emp_id=<?php echo $emp_id ?>" class="small-box-footer">View <i class="fa fa-arrow-circle-right"></i></a>

          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h4 class="text-success">Date Range Wise</h4>
              <p>Class Attendance</p>
            </div>
            <div class="icon">
              <i class="fa fa-calendar"></i>
            </div>
            <a href="./emp-info" class="small-box-footer">View <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
       <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
                <h4 class="text-warning">Date Wise</h4>
                <p>Student Attendance</p>
            </div>
            <div class="icon">
              <i class="fa fa-calendar-plus-o"></i>
            </div>
            <a href="#" class="small-box-footer">View <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <div class="inner">
              <h4 class="text-success" style="color: #835143;">Date Range Wise</h4>
              <p>Student Attendance</p>
            </div>
            </div>
            <div class="icon">
              <i class="fa fa-calendar"></i>
            </div>
            <a href="#" class="small-box-footer">View <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
    </form>
    <?php 
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
    <div class="row">
        <div class="col-md-12">
            <form method="POST" action="view-attendance">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <td align="center" colspan="4">
                            <b style="font-size: 30px;">Class Attendance for <?php echo $date; ?></b>
                        </td>
                    </tr>
                    <tr>
                        <th>Class:</th>
                        <td><?php echo $students[0]['std_enroll_head_name']; ?></td>
                        <th>Subject:</th>
                        <td><?php echo $subName[0]['subject_name']; ?></td>
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
                
                </form>
            </table>
        </div>
    </div>
</div>
</body>
</html>
