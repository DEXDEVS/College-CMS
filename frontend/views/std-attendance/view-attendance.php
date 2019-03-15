<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->
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
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="container-fluid" style="margin-top:5px">
    <div class="box box-danger">
        <div class="box-header"style="background-color:#d6484838;">      
            <h2 class="text-danger" align="center">Attendance Report</h2>
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
                                    <a href="./datewise-class-attendance?sub_id=<?php echo $sub_id ?>&class_id=<?php echo $class_id ?>&emp_id=<?php echo $emp_id ?>">Date Wise</a><br>
                                    <a href="./daterangewise-class-attendance?sub_id=<?php echo $sub_id ?>&class_id=<?php echo $class_id ?>&emp_id=<?php echo $emp_id ?>">Date Range Wise</a>
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
                                    <a href="./datewise-student-attendance?sub_id=<?php echo $sub_id ?>&class_id=<?php echo $class_id ?>&emp_id=<?php echo $emp_id ?>">Date Wise</a><br>
                                    <a href="./daterangewise-student-attendance?sub_id=<?php echo $sub_id ?>&class_id=<?php echo $class_id ?>&emp_id=<?php echo $emp_id ?>">Date Range Wise</a>
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

<?php
//closing of if isset
} ?>
</body>
</html>