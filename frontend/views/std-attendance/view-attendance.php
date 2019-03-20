<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->
    <!-- modal link files -->
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <!-- modal link files -->
    <style type="text/css">
    /*
Code snippet by maridlcrmn for Bootsnipp.com
Follow me on Twitter @maridlcrmn
Image credits: unsplash.com, uifaces.com/authorized
Image placeholders: placemi.com
*/


#t-cards {
    padding-top: 80px;
    padding-bottom: 80px;
    background-color: #345;    
}

/********************************/
/*          Panel cards         */
/********************************/
.panel.panel-card {
    position: relative;
    height: 241px;
    border: none;
    overflow: hidden;
}
.panel.panel-card .panel-heading {
    position: relative;
    z-index: 2;
    height: 120px;
    border-bottom-color: #fff;
    overflow: hidden;
    
    -webkit-transition: height 600ms ease-in-out;
            transition: height 600ms ease-in-out;
}
.panel.panel-card .panel-heading img {
    position: absolute;
    top: 50%;
    left: 50%;
    z-index: 1;
    width: 120%;
    
    -webkit-transform: translate3d(-50%,-50%,0);
            transform: translate3d(-50%,-50%,0);
}
.panel.panel-card .panel-heading button {
    position: absolute;
    top: 10px;
    right: 15px;
    z-index: 3;
}
.panel.panel-card .panel-figure {
    position: absolute;
    top: auto;
    left: 50%;
    z-index: 3;
    width: 70px;
    height: 70px;
    background-color: #fff;
    border-radius: 50%;
    opacity: 1;
    -webkit-box-shadow: 0 0 0 3px #fff;
            box-shadow: 0 0 0 3px #fff;
    
    -webkit-transform: translate3d(-50%,-50%,0);
            transform: translate3d(-50%,-50%,0);
    
    -webkit-transition: opacity 400ms ease-in-out;
            transition: opacity 400ms ease-in-out;
}

.panel.panel-card .panel-body {
    padding-top: 40px;
    padding-bottom: 20px;

    -webkit-transition: padding 400ms ease-in-out;
            transition: padding 400ms ease-in-out;
} 

.panel.panel-card .panel-thumbnails {
    padding: 0 15px 20px;
}
.panel-thumbnails .thumbnail {
    width: 60px;
    max-width: 100%;
    margin: 0 auto;
    background-color: #fff;
} 


.panel.panel-card:hover .panel-heading {
    height: 55px;
    
    -webkit-transition: height 400ms ease-in-out;
            transition: height 400ms ease-in-out;
}
.panel.panel-card:hover .panel-figure {
    opacity: 0;
    
    -webkit-transition: opacity 400ms ease-in-out;
            transition: opacity 400ms ease-in-out;
}
.panel.panel-card:hover .panel-body {
    padding-top: 20px;
    
    -webkit-transition: padding 400ms ease-in-out;
            transition: padding 400ms ease-in-out;
}
body{
        font-family: verdana;
      }
</style>
</head>
</head>
<body>
<?php 
                                 
    if(isset($_GET['sub_id'])){
        $sub_id = $_GET['sub_id'];  
        $class_id = $_GET['class_id'];
        $emp_id = $_GET['emp_id'];     
        
?>
 <div class="row" style="margin-bottom:13px; ">
        
        <div class="col-md-8 col-md-offset-2">
            <a href="./activity-view?sub_id=<?php echo $sub_id;?>&class_id=<?php echo $class_id;?>&emp_id=<?php echo $emp_id;?>"  style="float: right; margin-right: 16px;background-color:#5CB85C;color: white;padding:3px;border-radius:5px; text-decoration: none;"><i class="glyphicon glyphicon-backward"></i> Back</a>
        </div>
</div>
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="container-fluid" style="margin-top:5px">
        <div class="box box-danger" style="border-color:#5CB85C;">
            <div class="box-header"style="background-color:#d0f2d0;">      
                <h2 style="color:#5CB85C;" align="center">Attendance Report</h2>
            </div>
            <div class="box-body">
                <section id="">
                    <div class="row">
                         <div class="col-sm-6 col-md-6">
                            <div class="panel panel-default panel-card">
                                <div class="panel-heading">
                                    <img src="backend/web/uploads/gray.jpg" />
                                    <!-- <button class="btn btn-primary btn-sm" role="button">Follow</button> -->
                                </div>
                                <div class="panel-figure">
                                    <img style="border:none;" class="img-responsive img-circle" src="backend/web/uploads/class.jpg" />
                                </div>
                                <div class="panel-body text-center">
                                    <h4 class="panel-header text-center">Class Attendance</h4>
                                    <small>View Class Wise Attendance</small>
                                </div>
                                <div class="panel-thumbnails">
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <div style="text-align: center;">
                                                <!-- Trigger the modal with a button -->
                                                <br>
                                                <!-- <div class="row">
                                                    <div class="col-md-6"> -->
                                                       <button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#modal1<?php echo $sub_id;?>">Date Wise</button> 
                                                    <!-- </div> -->
                                                    <!-- <div class="col-md-6"> -->
                                                    <button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#modal2<?php echo $sub_id;?>">Date Range Wise</button>
                                                    <!-- </div> -->
                                                <!-- </div> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>   
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="panel panel-default panel-card">
                                <div class="panel-heading">
                                    <img src="backend/web/uploads/gray.jpg" />
                                    <!-- <button class="btn btn-primary btn-sm" role="button">Follow</button> -->
                                </div>
                                <div class="panel-figure">
                                    <img class="img-responsive img-circle" src="backend/web/uploads/std.png" />
                                </div>
                                <div class="panel-body text-center">
                                    <h4 class="panel-header">Student Attendance</h4>
                                    <small>View Student Wise Attendance</small>
                                </div>
                                <div class="panel-thumbnails">
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <div style="text-align: center;">
                                                <br>
                                                <!-- <div class="row">
                                                    <div class="col-md-6"> -->
                                                       <button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#modal3<?php echo $sub_id;?>">Date Wise</button> 
                                                   <!--  </div>
                                                    <div class="col-md-6"> -->
                                                    <button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#modal4<?php echo $sub_id;?>">Date Range Wise</button>
                                                <!--     </div>
                                                </div> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>   
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
    </div>
</div>



 <!--Date wise class Modal start -->
<div class="modal fade" id="modal1<?php echo $sub_id;?>" role="dialog">
    <div class="modal-dialog modal-lg">

      <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">
                  <p>Attendance Report</p>
              </h4>
            </div>
            <div class="modal-body">
                <div class="conatiner-fluid">
                <br>
                    <div class="box box-danger"  style="border-color:#5CB85C;">
                        <div class="box-header" style="padding:0px;background-color:#d0f2d0;">
                            <h3 class="text-center" style="color:#5CB85C;">Date Wise Class Attendance</h3>
                        </div>
                        <div class="box-body">
                            <form method="POST" action="./datewise-class-attendance?sub_id=<?php echo $sub_id ?>&class_id=<?php echo $class_id ?>&emp_id=<?php echo $emp_id ?>">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Date</label>
                                    <input class="form-control" data-date-format="dd/mm/yyyy" type="date" name="date" required="">
                                </div>    
                            </div><br><br>
                            <div class="col-md-3">
                                <div class="form-group"  style="margin-top:3px;">
                                    
                                        <button type="submit" name="submit" class="btn btn-success btn-flat form-control" style="margin-top: -25px;">
                                        <i class="fa fa-sign-in" aria-hidden="true"></i>    
                                        <b>View Attendance</b>
                                        </button>
                                       
                                </div>    
                            </div>
                        </div>
                    </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Date wise class Modal close -->



  <!--Date Range wise class Modal start -->

  <div class="modal fade" id="modal2<?php echo $sub_id;?>" role="dialog">
    <div class="modal-dialog modal-lg">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">
              <p>Attendance Report</p>
          </h4>
        </div>
        <div class="modal-body">
          <div class="container-fluid">
    <div class="box" style="border-color:#5CB85C;">
        <div class="box-header" style="padding:0px;background-color:#d0f2d0;">
            <h3 class="text-center" style="color:#5CB85C;">Date Range Wise Class Attendance</h3>
        </div>
        <div class="box-body">
           <form method="POST" action="./daterangewise-class-attendance?sub_id=<?php echo $sub_id ?>&class_id=<?php echo $class_id ?>&emp_id=<?php echo $emp_id ?>">
                <div class="row">
                    <div class="col-md-2">
                        <div class="form-group">
                            <input type="hidden" name="_csrf" class="form-control" value="<?=Yii::$app->request->getCsrfToken()?>">          
                        </div>    
                    </div>    
                </div>
                <div class="row">
                    <div class="col-md-4">
                       <label>Start Date:</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar" style="color: #3C8DBC"></i>
                            </div>
                          <input type="date" class="form-control" name="start_date">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label>End Date:</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar" style="color: #3C8DBC"></i>
                            </div>
                            <input type="date" class="form-control" name="end_date">
                        </div>
                    </div><br>
                    <div class="col-md-4">
                        <div class="form-group" style="margin-top:4px;">
                            <label></label>
                            <button type="submit" name="submit" class="btn btn-success bt-xs">
                            <i class="fa fa-sign-in" aria-hidden="true"></i>    
                            <b>View Attendance</b></button>
                        </div>    
                    </div> 
                </div>
            </form> 
        </div>
    </div>
</div>
        </div>
      </div>
      
    </div>
  </div>
  <!--Date Range wise class Modal close -->

<!--Date wise student Modal start -->
  <!-- Modal -->
  <div class="modal fade" id="modal3<?php echo $sub_id;?>" role="dialog">
    <div class="modal-dialog modal-lg">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">
               <p>Attendance Report</p>
          </h4>
        </div>
        <div class="modal-body">
            <div class="container-fluid">
    <br>
    <div class="box" style="border-color:#5CB85C;">
        <div class="box-header" style="padding:0px;background-color:#d0f2d0;">
            <h3 class="text-center" style="color:#5CB85C;">Date Wise Student Attendance</h3>
        </div>
        <div class="box-body">
            <form method="POST" action="./datewise-student-attendance?sub_id=<?php echo $sub_id ?>&class_id=<?php echo $class_id ?>&emp_id=<?php echo $emp_id ?>">
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
                            <label>Date</label>
                            <input class="form-control" data-date-format="dd/mm/yyyy" type="date" name="date" required="">
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
                    <div class="col-md-4">
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
                    <div class="col-md-4">
                        <div class="form-group" style="margin-top:2px;">
                            <label></label>
                            <button type="submit" name="submit" class="btn btn-success form-control" style="margin-top: -25px;">
                            <i class="fa fa-sign-in" aria-hidden="true"></i>    
                            <b>View Attendance</b></button>
                        </div>    
                    </div> 
                    <input type="hidden" name="classnameid" value="<?php echo $classnameid; ?>">
                    <input type="hidden" name="sessionid" value="<?php echo $sessionid; ?>">
                    <input type="hidden" name="sectionid" value="<?php echo $sectionid; ?>">
                </div>
            </form>
        </div>
    </div>
</div>
        </div>
      </div>
      
    </div>
  </div>
<!--Date wise student Modal close -->



<!--Date Range wise student Modal start -->
  <!-- Modal -->
  <div class="modal fade" id="modal4<?php echo $sub_id;?>" role="dialog">
    <div class="modal-dialog  modal-lg">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">
               <p>Attendance Report</p>
          </h4>
        </div>
        <div class="modal-body">
          <div class="container-fluid">
    <br>
    <div class="box box-danger"style="border-color:#5CB85C;">
        <div class="box-header" style="padding:0px;background-color:#d0f2d0;">
            <h3 class="text-center" style="color:#5CB85C;">Date Range Wise Class Attendance</h3>
        </div>
        <div class="box-body">
           <form method="POST" action="./daterangewise-student-attendance?sub_id=<?php echo $sub_id ?>&class_id=<?php echo $class_id ?>&emp_id=<?php echo $emp_id ?>">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <input type="hidden" name="_csrf" class="form-control" value="<?=Yii::$app->request->getCsrfToken()?>">          
                        </div>    
                    </div>    
                </div>
                <div class="row">
                    <div class="col-md-4">
                       <label>Start Date:</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar" style="color: #3C8DBC"></i>
                            </div>
                          <input type="date" class="form-control" name="start_date">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label>End Date:</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar" style="color: #3C8DBC"></i>
                            </div>
                            <input type="date" class="form-control" name="end_date">
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
                    <div class="col-md-4">
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
                </div>
                    
                    <div class="row">
                            <input type="hidden" name="classnameid" value="<?php echo $classnameid; ?>">
                            <input type="hidden" name="sessionid" value="<?php echo $sessionid; ?>">
                            <input type="hidden" name="sectionid" value="<?php echo $sectionid; ?>">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label></label>
                                <button type="submit" name="submit" class="btn btn-success form-control" style="margin-top: -25px;">
                                <i class="fa fa-sign-in" aria-hidden="true"></i>    
                                <b>View Attendance</b></button>
                            </div>    
                        </div>
                    </div> 
            </form> 
        </div>
    </div>
</div>
        </div>
      </div>
      
    </div>
  </div>
<!--Date Range wise student Modal close -->

    <?php

} ?>
</body>
</html>