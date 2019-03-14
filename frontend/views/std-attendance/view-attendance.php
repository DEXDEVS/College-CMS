    <!DOCTYPE html>
    <html>
    <head>
      <title>View Attendance</title>
    <?php 
    if(isset($_GET['sub_id'])){
        $sub_id = $_GET['sub_id'];  
        $class_id = $_GET['class_id'];
        $emp_id = $_GET['emp_id'];

        $teacherName = Yii::$app->db->createCommand("SELECT emp_name,emp_photo FROM emp_info WHERE emp_id ='$emp_id'")->queryAll();

        $ClassName = Yii::$app->db->createCommand("SELECT std_enroll_head_name FROM std_enrollment_head WHERE std_enroll_head_id = '$class_id'")->queryAll();

         $SubjectName = Yii::$app->db->createCommand("SELECT subject_name FROM subjects WHERE subject_id = '$sub_id'")->queryAll();     
            
    ?>
    <div class="container-fluid">
        <section class="content-header">
                <h1 style="color: #3C8DBC;">
                <i class="fa fa-university"></i> Attendance Report
                </h1>
            <ol class="breadcrumb" style="color: #3C8DBC;">
                <li><a href="#" style="color: #3C8DBC;"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#" style="color: #3C8DBC;">Back</a></li>
            </ol>
        </section>
        <!--  -->
        <section class="content">
            <div class="row">
                <div class="col-md-3">
                            <!-- Profile Image -->
                            <div class="box box-primary">
                              <div class="box-body box-profile">
                                <img class="profile-user-img img-responsive img-circle" src="backend/web/<?php echo $teacherName[0]['emp_photo']; ?>" alt="User profile picture">
                                <h3 class="profile-username text-center"></h3>
                                <p class="text-muted text-center">
                                  <h4 align="center" style="color: #3C8DBC;"></h4>
                                </p>
                                <ul class="list-group list-group-unbordered">
                                  <li class="list-group-item">
                                    <b>Teacher:</b><br>
                                      <a class="">
                                        <?php echo $teacherName[0]['emp_name']; ?>
                                      </a>
                                  </li>
                                  <li class="list-group-item" style="height:80px;">
                                    <b>Class:</b>
                                      <a class="pull-right">
                                        <?php echo $ClassName[0]['std_enroll_head_name']; ?>
                                      </a>
                                  </li>
                                  <li class="list-group-item">
                                    <b>Subject:</b><br>
                                    <a class="">
                                      <?php echo $SubjectName[0]['subject_name']; ?>
                                    </a>
                                  </li>
                                </ul>
                                <!-- <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a> -->
                              </div>
                              <!-- /.box-body -->
                            </div>
                            <!-- /.box -->
                            <!-- About Me Box -->
                            <!-- /.box -->
                </div>
                <!-- /.col -->
                <div class="col-md-9">
                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs" style="color: #3C8DBC;">
                            <!-- Branches -->
                            <li class="">
                              <a href="#branch" data-toggle="tab" style="color: #3C8DBC;">
                                <i class="fa fa-bold"></i> Date Wise<br> Class Attendance
                              </a>
                            </li>
                            <!-- Sessions -->
                            <li>
                                <a href="#sessions" data-toggle="tab" style="color: #3C8DBC;">
                                <i class="fa fa-scribd"></i> Date Range Wise<br> Class Attendance
                              </a>
                            </li>
                            <!-- Classes -->
                            <li>
                              <a href="#classes" data-toggle="tab" style="color: #3C8DBC;">
                                <i class="fa fa-copyright"></i> Date Wise<br> Student Attendance
                              </a>
                            </li>
                            <!-- Sections -->
                            <li>
                                <a href="#sections" data-toggle="tab" style="color: #3C8DBC;">
                                <i class="glyphicon glyphicon-link"></i> Date Range Wise<br> Student Attendance
                              </a>
                            </li>
                        </ul>
<!-- ************************************************************************************** -->
                            <!-- Date wise class Tab start -->
<div class="tab-content">
    <div class="active tab-pane" id="branch">
    <div class="conatiner-fluid">
        <div class="box box-success">
            <div class="box-body">
                <form  method="POST">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Date</label>
                                <input class="form-control" data-date-format="dd/mm/yyyy" type="date" name="singleDateClass" required="" id="singleDateClass">
                            </div>    
                        </div><br><br>
                        <div class="col-md-3">
                            <div class="form-group">
                                <button type="submit" name="dwc" id="dwc" class="btn btn-success btn-flat form-control" style="margin-top: -25px;">
                                <i class="fa fa-sign-in" aria-hidden="true"></i>    
                                <b>View Attendance</b></button>
                            </div>    
                        </div> 
                        <input type="hidden" id="subject" name="sub_id" value="<?php echo $sub_id; ?>">
                        <input type="hidden" id="class" name="class_id" value="<?php echo $class_id; ?>">
                        <input type="hidden" id="emp" name="emp_id" value="<?php echo $emp_id; ?>">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php
if(isset($_POST["dwc"])){ 
        $sub_id = $_POST["sub_id"];
        $class_id = $_POST["class_id"];
        $emp_id = $_POST["emp_id"];
        $singleDateClass = $_POST["singleDateClass"];

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
        <div class="box-body">
            <div class="row">
                <div class="col-md-12">
                    <form method="POST">
                        <table class="table table-hover">
                            <thead>
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
                                        $atten = Yii::$app->db->createCommand("SELECT att.status FROM std_attendance as att WHERE att.teacher_id = '$emp_id' AND att.class_name_id = '$classnameid' AND att.session_id = '$sessionid' AND att.section_id = '$sectionid' AND att.subject_id = '$sub_id' AND CAST(date AS DATE) = '$singleDateClass' AND att.student_id = '$stdId'")->queryAll();
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

    </div>

                                <!-- Date wise class Tab close -->
<!-- ******************************************************************************************* -->
                                <!-- Date Range wise class Tab start -->
<div class="tab-pane" id="sessions">
    <!-- Sessions info start -->
    <form method="POST" style="margin-top: -35px">
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
           
            <div class="col-md-2 col-md-offset-10">
                <div class="form-group">
                    <label></label>
                    <button type="submit" name="drwc" class="btn btn-success form-control" style="margin-top: -25px;">
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
    if(isset($_POST["drwc"])){ 
        $sub_id = $_POST["sub_id"];
        $class_id = $_POST["class_id"];
        $emp_id = $_POST["emp_id"];
        $startDate = $_POST["start_date"];
        $endDate = $_POST["end_date"];

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
            <form method="POST">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <td align="center" colspan="4">
                                <b style="font-size: 30px;">Class Attendance - From: <?php echo $startDate." to ".$endDate; ?></b>
                            </td>
                        </tr>
                        <?php 
                        $stdId = $students[0]['std_enroll_detail_std_id'];
                        $atten = Yii::$app->db->createCommand("SELECT CAST(date AS DATE),att.status FROM std_attendance as att WHERE att.teacher_id = '$emp_id' AND att.class_name_id = '$classnameid' AND att.session_id = '$sessionid' AND att.section_id = '$sectionid' AND att.subject_id = '$sub_id' AND att.student_id = '$stdId' AND CAST(date AS DATE) >= '$startDate' AND CAST(date AS DATE) <= '$endDate'")->queryAll(); 
                        $count = count($atten);
                         ?>
                        <tr style="background-color:#add8e6; ">
                            <th >Sr #.</th>
                            <th >Roll #.</th>
                            <th >Name</th>
                            <?php for ($i=0; $i <$count ; $i++) { ?>
                            <th><?php echo $atten[$i]["CAST(date AS DATE)"]; ?></th>
                            <?php } ?>
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
<?php
//closing of ifisset
    }
?>
    <!-- Sessions info close -->
</div>
                                <!-- Date Range wise class Tab close -->
<!-- ******************************************************************************************* -->
                                <!-- Date wise student Tab start -->
<div class="tab-pane" id="classes">                
    <!-- Classes info start -->
    <form method="POST" style="margin-top: -35px">
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
                <div class="form-group">
                    <label>Date</label>
                    <input class="form-control" data-date-format="dd/mm/yyyy" type="date" name="singleDateStudent" required="">
                </div>    
            </div>
            <?php 
                $classDetail = Yii::$app->db->createCommand("SELECT DISTINCT seh.class_name_id, seh.session_id, seh.section_id FROM std_enrollment_head as seh INNER JOIN teacher_subject_assign_detail as d ON d.class_id = seh.std_enroll_head_id WHERE d.class_id = '$class_id'")->queryAll();
                $classnameid = $classDetail[0]['class_name_id'];
                $sessionid = $classDetail[0]['session_id'];
                $sectionid = $classDetail[0]['section_id'];

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
                    <button type="submit" name="dws" class="btn btn-success form-control" style="margin-top: -25px;">
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
    if(isset($_POST["dws"])){ 
        $sub_id = $_POST["sub_id"];
        $class_id = $_POST["class_id"];
        $emp_id = $_POST["emp_id"];
        $singleDateStudent = $_POST["singleDateStudent"];
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
            <form method="POST">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <td align="center" colspan="4">
                            <b style="font-size: 30px;">View Class Attendance</b>
                        </td>
                    </tr>
                    <tr>
                        <th>Class:</th>
                        <td><?php echo $student[0]['std_enroll_head_name']; ?></td>
                        <th>Subject:</th>
                        <td><?php echo $subName[0]['subject_name']; ?></td>
                        <th>Date:</th>
                        <td><?php echo $singleDateStudent; ?></td>
                    </tr>
                    <tr style="background-color:#add8e6; ">
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
                            $atten = Yii::$app->db->createCommand("SELECT att.status FROM std_attendance as att WHERE att.teacher_id = '$emp_id' AND att.class_name_id = '$classnameid' AND att.session_id = '$sessionid' AND att.section_id = '$sectionid' AND att.subject_id = '$sub_id' AND CAST(date AS DATE) = '$singleDateStudent' AND att.student_id = '$studentId'")->queryAll();
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
     <!-- Classes info close -->
    </div>
                                <!-- Date wise student Tab close -->
<!-- ******************************************************************************************* -->
                                <!-- Date Range wise student Tab start -->
<div class="tab-pane" id="sections">
    <!-- Sections info start -->
      <form method="POST" style="margin-top: -35px">
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
                  <input type="date" class="form-control" name="student_start_date">
                </div>
            </div>
            <div class="col-md-3">
                <label>End Date:</label>
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-calendar" style="color: #3C8DBC"></i>
                    </div>
                    <input type="date" class="form-control" name="student_end_date">
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
                    <button type="submit" name="drws" class="btn btn-success form-control" style="margin-top: -25px;">
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
    if(isset($_POST["drws"])){ 
        $sub_id = $_POST["sub_id"];
        $class_id = $_POST["class_id"];
        $emp_id = $_POST["emp_id"];
        $startDate = $_POST["student_start_date"];
        $endDate = $_POST["student_end_date"];
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
            <form method="POST">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <td align="center" colspan="4">
                           <b style="font-size: 30px;">Class Attendance - From: <?php echo $startDate." to ".$endDate; ?></b>
                        </td>
                    </tr>
                    <tr style="background-color:#add8e6; ">
                        <th >Sr #.</th>
                        <th >Roll #.</th>
                        <th >Name</th>
                        <?php 
                        $atten = Yii::$app->db->createCommand("SELECT CAST(date AS DATE), att.status FROM std_attendance as att WHERE att.teacher_id = '$emp_id' AND att.class_name_id = '$classnameid' AND att.session_id = '$sessionid' AND att.section_id = '$sectionid' AND att.subject_id = '$sub_id' AND att.student_id = '$studentId' AND CAST(date AS DATE) >= '$startDate' AND CAST(date AS DATE) <= '$endDate'")->queryAll();
                            $count = count($atten);
                           for ($i=0; $i <$count ; $i++) { ?>
                            <th><?php echo $atten[$i]["CAST(date AS DATE)"]; ?></th>
                            <?php } ?>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?php echo 1; ?></td>
                        <td><?php echo $student[0]['std_roll_no']; ?></td>
                        <td><?php echo $student[0]['std_enroll_detail_std_name'];?></td>
                        <?php 
                             $atten = Yii::$app->db->createCommand("SELECT att.date, att.status FROM std_attendance as att WHERE att.teacher_id = '$emp_id' AND att.class_name_id = '$classnameid' AND att.session_id = '$sessionid' AND att.section_id = '$sectionid' AND att.subject_id = '$sub_id' AND att.student_id = '$studentId' AND CAST(date AS DATE) >= '$startDate' AND CAST(date AS DATE) <= '$endDate'")->queryAll();
                            
                        
                        for ($j=0; $j <$count ; $j++) { ?>
                            <td><?php echo $atten[$j]["status"]; ?></td>
                            <?php } ?>
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

     
    <!-- Sections info close -->
    </div>
                                <!-- Date Range wise student Tab close -->
<!-- ******************************************************************************************* -->
                                            
                        </div>
                    <!-- /.nav-tabs-custom -->
                    </div>
                <!-- /.col -->
                </div>
            <!-- /.row -->
            </div>
        </section>
    </div>
<?php } ?>
</body>
</html>

<?php
$url = \yii\helpers\Url::to("std-attendance/fetch-attendance-report");

$script = <<< JS
$('#dwc').on('click',function(){

   var singledateclass    = $('#singleDateClass').val();
   var subjectID          = $('#subject').val();
   var classID            = $('#class').val();
   var empID               = $('#emp').val();
   alert(singledateclass);
   $.ajax({
        type:'post',
        data:{singledateclass:singledateclass,subjectID:subjectID,classID:classID,empID:empID},
        url: "$url",

        success: function(result){
            console.log(result);
            // var jsonResult = JSON.parse(result.substring(result.indexOf('['), result.indexOf(']')+1));
            // var options = '';
            // $('#sessionId').empty();
            // $('#sessionId').append("<option>"+"Select Session"+"</option>");
            // for(var i=0; i<jsonResult.length; i++) { 
            //     options += '<option value="'+jsonResult[i].session_id+'">'+jsonResult[i].session_name+'</option>';
            }
            // Append to the html
            //$('#sessionId').append(options);
        }         
    });       
});


JS;
$this->registerJs($script);
?>
</script>
