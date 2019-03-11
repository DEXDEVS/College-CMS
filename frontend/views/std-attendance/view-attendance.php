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
                        <a href="./daterangewise-class-attendance?sub_id=<?php echo $sub_id ?>&class_id=<?php echo $class_id ?>&emp_id=<?php echo $emp_id ?>" class="small-box-footer">View <i class="fa fa-arrow-circle-right"></i></a>
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
                        <a href="./datewise-student-attendance?sub_id=<?php echo $sub_id ?>&class_id=<?php echo $class_id ?>&emp_id=<?php echo $emp_id ?>" class="small-box-footer">View <i class="fa fa-arrow-circle-right"></i></a>
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
                        <a href="./daterangewise-student-attendance?sub_id=<?php echo $sub_id ?>&class_id=<?php echo $class_id ?>&emp_id=<?php echo $emp_id ?>" class="small-box-footer">View <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
            </div>
        </div>
    </div>
</div>
<?php
//closing of if isset
} ?>
</body>
</html>
