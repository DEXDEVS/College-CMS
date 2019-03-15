<?php 
    use yii\db\Connection;
    $conn = \Yii::$app->db; 
?>
<!DOCTYPE html>
<html>
<head>
	<title>Attendance</title> 
    <style type="text/css">
        * {
  box-sizing: border-box;
}

body {
  font-family: Arial, Helvetica, sans-serif;
}

/* Float four columns side by side */
.column {
  float: left;
  width: 25%;
  padding: 0 10px;
}

/* Remove extra left and right margins, due to padding in columns */
.row {margin: 0 -5px;}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Style the counter cards */
.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2); /* this adds the "card" effect */
  padding: 16px;
  text-align: center;
  background-color: #f1f1f1;
}
.card:hover {
    -webkit-transform: scale(1.1); 
    -moz-transform: scale(1.1); 
    -ms-transform: scale(1.1); 
    -o-transform: scale(1.1); 
    transform:rotate scale(1.1); 
    -webkit-transition: all 0.4s ease-in-out; 
-moz-transition: all 0.4s ease-in-out; 
-o-transition: all 0.4s ease-in-out;
transition: all 0.4s ease-in-out;
    
}

/* Responsive columns - one column layout (vertical) on small screens */
@media screen and (max-width: 600px) {
  .column {
    width: 100%;
    display: block;
    margin-bottom: 20px;
  }
}

/*teacher activity panel styling*/
.shape{    
    border-style: solid; border-width: 0 70px 40px 0; float:right; height: 0px; width: 0px;
    -ms-transform:rotate(360deg); /* IE 9 */
    -o-transform: rotate(360deg);  /* Opera 10.5 */
    -webkit-transform:rotate(360deg); /* Safari and Chrome */
    transform:rotate(360deg);
}
.offer{
    background:#fff; border:1px solid #ddd; box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2); margin: 15px 0; overflow:hidden;
}
.offer:hover {
    -webkit-transform: scale(1.1); 
    -moz-transform: scale(1.1); 
    -ms-transform: scale(1.1); 
    -o-transform: scale(1.1); 
    transform:rotate scale(1.1); 
    -webkit-transition: all 0.4s ease-in-out; 
-moz-transition: all 0.4s ease-in-out; 
-o-transition: all 0.4s ease-in-out;
transition: all 0.4s ease-in-out;
    }
.shape {
    border-color: rgba(255,255,255,0) #d9534f rgba(255,255,255,0) rgba(255,255,255,0);
}
.offer-radius{
    border-radius:7px;
}
.offer-danger { border-color: #d9534f; }
.offer-danger .shape{
    border-color: transparent #d9534f transparent transparent;
}
.offer-success {    border-color: #5cb85c; }
.offer-success .shape{
    border-color: transparent #5cb85c transparent transparent;
}
.offer-pink {   border-color: #8fb800; }
.offer-pink .shape{
    border-color: transparent   #8fb800 transparent transparent;
}
.offer-seagreen {   border-color: #2fcea5; }
.offer-seagreen .shape{
    border-color: transparent   #2fcea5 transparent transparent;
}
.offer-brown {  border-color: #c47c48; }
.offer-brown .shape{
    border-color: transparent   #c47c48 transparent transparent;
}
.offer-default {    border-color: #999999; }
.offer-default .shape{
    border-color: transparent #999999 transparent transparent;
}
.offer-primary {    border-color: #428bca; }
.offer-primary .shape{
    border-color: transparent #428bca transparent transparent;
}
.offer-info {   border-color: #999999; }
.offer-info .shape{
    border-color: transparent #999999 transparent transparent;
}
.offer-warning {    border-color: #f0ad4e; }
.offer-warning .shape{
    border-color: transparent #f0ad4e transparent transparent;
}

.shape-text{
    color:#fff; font-size:12px; font-weight:bold; position:relative; right:-40px; top:2px; white-space: nowrap;
    -ms-transform:rotate(30deg); /* IE 9 */
    -o-transform: rotate(360deg);  /* Opera 10.5 */
    -webkit-transform:rotate(30deg); /* Safari and Chrome */
    transform:rotate(30deg);
}   
.offer-content{
    padding:10px;
}
@media (min-width: 487px) {
  .container {
    max-width: 750px;
  }
  .col-sm-6 {
    width: 50%;
  }
}
@media (min-width: 900px) {
  .container {
    max-width: 970px;
  }
  .col-md-4 {
    width: 33.33333333333333%;
  }
}

@media (min-width: 1200px) {
  .container {
    max-width: 1170px;
  }
  .col-lg-3 {
    width: 25%;
  }
  }
    </style>
</head>
<body>
<div class="container-fluid">
    <div class="box box-danger">
        <div class="box-header">
           <h2 class="text-center text-danger">List of Classes</h2><hr> 
        </div>
        <div class="box-body">
            <?php

        $subjID = array();
        $subjectsIDs = 0;

        $empEmail = Yii::$app->user->identity->email;
        $empId = Yii::$app->db->createCommand("SELECT emp.emp_id FROM emp_info as emp WHERE emp.emp_email = '$empEmail'")->queryAll();
        $empId = $empId[0]['emp_id'];
        $teacherId = Yii::$app->db->createCommand("SELECT teacher_subject_assign_head_id FROM teacher_subject_assign_head WHERE teacher_id = '$empId'")->queryAll();
        $headId = $teacherId[0]['teacher_subject_assign_head_id'];

		$classId = Yii::$app->db->createCommand("SELECT DISTINCT d.class_id FROM teacher_subject_assign_detail as d INNER JOIN teacher_subject_assign_head as h ON d.teacher_subject_assign_detail_head_id = h.teacher_subject_assign_head_id WHERE h.teacher_id = '$empId'")->queryAll();
		$countClassIds = count($classId);
   
    	for ($i=0; $i <$countClassIds ; $i++) {
    	 $id = $classId[$i]['class_id'];
    	 $CLASSName = Yii::$app->db->createCommand("SELECT seh.std_enroll_head_name,seh.std_enroll_head_id
    		FROM std_enrollment_head as seh
    		INNER JOIN teacher_subject_assign_detail as tsad
    		ON seh.std_enroll_head_id = tsad.class_id WHERE seh.std_enroll_head_id = '$id'")->queryAll();
        $subjectsIDs = Yii::$app->db->createCommand("SELECT tsad.subject_id
        FROM teacher_subject_assign_detail as tsad
        WHERE tsad.class_id = '$id' AND tsad.teacher_subject_assign_detail_head_id = '$headId'")->queryAll();
        
            ?>

           <div class="col-md-6">
                <div class="box box-danger collapsed-box" >
                    <div class="box-header with-border" style="background-color:#d6484838;padding: 15px;">
                        <h3 class="box-title">
                            <b>
                            <?php echo $CLASSName[0]['std_enroll_head_name']; ?>
                            </b>
                        </h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse">  <br><i class="fa fa-plus" style="font-size:15px;"></i>
                            </button>
                        </div>
                        <!-- /.box-tools -->
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">

                    	<?php 
                    		foreach ($subjectsIDs as $key => $value) {
                                    
                    			$SubID = $value['subject_id'];
                                //$count = count($SubID);
                    			$subjectsNames = Yii::$app->db->createCommand("SELECT subject_name
        						FROM subjects WHERE subject_id = '$SubID'")->queryAll();
                    	?>

                        <tr>
                        <td>
                            <button type="button" class="btn" style="background-color:;" title="Click here for activity" data-toggle="modal" data-target="#<?php echo $value['subject_id']; ?>">
                               <i class="fa fa-book" style="background-color:#d9534f; border:1px solid; padding:5px ;border-radius:20px;font-size:25px; color:white;">
                                   
                               </i>
                               <br> <?php echo $subjectsNames[0]['subject_name']; ?> 
                            </button>
                        </td>
                        </tr>
                    <?php   
                        //end of foreach
                        } 

                                
                        ?>
                    	
                    </div>
                    <!-- /.box-body -->
                </div>
              <!-- /.box -->
            </div>
  <?php 

    //end of for loop
    } 
    ?>
    <div class="modal fade col-md-12" id="<?php echo $value['subject_id']; ?>">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">
            <b>
                <?php echo $CLASSName[0]['std_enroll_head_name']; ?>
            </b><br>
          <?php echo $subjectsNames[0]['subject_name']; ?>  
        </h4>
      </div>
      <form method="" action="">
        <div class="modal-body">
         
          <div class="row container-fluid">
    <div class="box box-danger">
        <div class="box-header" style="background-color:#d6484838;">
            <h2 style="text-align: center;">Teacher Activity Panel</h2>
        </div>
        
        <div class="box-body">
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3" >
                    <div class="offer offer-radius offer-danger">
                        <div class="shape">
                            <div class="shape-text">
                                <span class="glyphicon glyphicon glyphicon-th"></span>                          
                            </div>
                        </div>
                        <div class="offer-content">
                            <h4 class="">
                            Attendance
                            </h4>
                            <a href="./take-attendance?sub_id=<?php echo $SubID;?>&class_id=<?php echo $id; ?>&emp_id=<?php echo $empId; ?>">Take attendance</a>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                    <div class="offer offer-radius offer-success">
                        <div class="shape">
                            <div class="shape-text">
                                <span class="glyphicon glyphicon glyphicon-eye-open"></span>                            
                            </div>
                        </div>
                        <div class="offer-content">
                            <h4 class="">
                                Reports
                            </h4>
                            <a href="./view-attendance?sub_id=<?php echo $SubID;?>&class_id=<?php echo $id; ?>&emp_id=<?php echo $empId; ?>">View attendance reports</a>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                    <div class="offer offer-radius offer-primary">
                        <div class="shape">
                            <div class="shape-text">
                                <span class="glyphicon  glyphicon-user"></span>                         
                            </div>
                        </div>
                        <div class="offer-content">
                            <h4 class="">
                                Assignment
                            </h4>
                            <a href="">View assignment</a>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                    <div class="offer offer-radius offer-info">
                        <div class="shape">
                            <div class="shape-text">
                                <span class="glyphicon  glyphicon-bell"></span>                         
                            </div>
                        </div>
                        <div class="offer-content">
                            <h4 class="">
                                Quiz
                            </h4>
                            <a href="">View Quiz</a>
                        </div>
                    </div>
                </div>
            </div>
            <form method="" action="">
                <div class="modal-body">
                    <div class="row container-fluid">
                        <div class="box box-success">
                            <div class="box-header" style="background-color:#dff0d8;">
                            <h2 style="text-align: center;">Teacher Activity Panel</h2>
                             </div>
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3" >
                                        <div class="offer offer-radius offer-danger">
                                            <div class="shape">
                                                <div class="shape-text">
                                                    <span class="glyphicon glyphicon glyphicon-th"></span>                          
                                                </div>
                                            </div>
                                            <div class="offer-content">
                                                <h4 class="">
                                                Attendance
                                                </h4>
                                                <a href="./take-attendance?sub_id=<?php echo $SubID;?>&class_id=<?php echo $id; ?>&emp_id=<?php echo $empId; ?>">Take attendance</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                                        <div class="offer offer-radius offer-success">
                                            <div class="shape">
                                                <div class="shape-text">
                                                    <span class="glyphicon glyphicon glyphicon-eye-open"></span>                            
                                                </div>
                                            </div>
                                            <div class="offer-content">
                                                <h4 class="">
                                                    Reports
                                                </h4>
                                                <a href="./view-attendance?sub_id=<?php echo $SubID;?>&class_id=<?php echo $id; ?>&emp_id=<?php echo $empId; ?>">View attendance reports</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                                        <div class="offer offer-radius offer-primary">
                                            <div class="shape">
                                                <div class="shape-text">
                                                    <span class="glyphicon  glyphicon-user"></span>                         
                                                </div>
                                            </div>
                                            <div class="offer-content">
                                                <h4 class="">
                                                    Assignment
                                                </h4>
                                                <a href="">View assignment</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                                        <div class="offer offer-radius offer-info">
                                            <div class="shape">
                                                <div class="shape-text">
                                                    <span class="glyphicon  glyphicon-bell"></span>                         
                                                </div>
                                            </div>
                                            <div class="offer-content">
                                                <h4 class="">
                                                    Quiz
                                                </h4>
                                                <a href="">View Quiz</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- row 2 start -->
                                <div class="row">
                                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3" >
                                        <div class="offer offer-radius offer-warning">
                                            <div class="shape">
                                                <div class="shape-text">
                                                    <span class="glyphicon glyphicon glyphicon-edit"></span>                            
                                                </div>
                                            </div>
                                            <div class="offer-content">
                                                <!-- class="lead" -->
                                                <h4 class="">
                                                Marks Sheet
                                                </h4>
                                                <a href="">Add marks</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                                        <div class="offer offer-radius offer-pink">
                                            <div class="shape">
                                                <div class="shape-text">
                                                    <span class="glyphicon glyphicon glyphicon-eye-open"></span>                            
                                                </div>
                                            </div>
                                            <div class="offer-content">
                                                <h4 class="">
                                                    Presen<br>tations
                                                </h4>
                                                <a href="">Manage presentation</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                                        <div class="offer offer-radius offer-seagreen">
                                            <div class="shape">
                                                <div class="shape-text">
                                                    <span class="glyphicon  glyphicon-user"></span>                         
                                                </div>
                                            </div>
                                            <div class="offer-content">
                                                <h4 class="">
                                                    Assignment
                                                </h4>
                                                <a href="">View assignment</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                                        <div class="offer offer-radius offer-brown">
                                            <div class="shape">
                                                <div class="shape-text">
                                                    <span class="glyphicon  glyphicon-home"></span>                         
                                                </div>
                                            </div>
                                            <div class="offer-content">
                                                <h4 class="">
                                                    Quiz
                                                </h4>
                                                <a href="">View Quiz</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- row 2 close -->
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary pull-left" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </form>
        </div>
    <!-- /.modal-content -->
    </div>
  <!-- /.modal-dialog -->
</div>  
        </div>
    </div>
</div> 
</body>
</html>
<<<<<<< HEAD

<?php 
if (isset($_POST["save"])) {
    $classnameid = $_POST["classnameid"];
    $sessionid = $_POST["sessionid"];
    $sectionid = $_POST["sectionid"];
    $emp_id = $_POST["emp_id"];
    $sub_id = $_POST["sub_id"];
    $date = $_POST["date"];
    $countstd = $_POST["countstd"];
    $stdAttendId = $_POST["stdAttendance"];
    
    for($i=0; $i<$countstd;$i++){
        $q=$i+1;
        $std = "std".$q;
        $status[$i] = $_POST["$std"];

    }
    
    $transection = $conn->beginTransaction();
    try{
        for($i=0; $i<$countstd; $i++){
        $attendance = $conn->createCommand()->insert('std_attendance',[
            'teacher_id' => $emp_id,
            'class_name_id' => $classnameid,
            'session_id'=> $sessionid,
            'section_id'=> $sectionid,
            'subject_id'=> $sub_id,
            'date' => $date,
            'student_id' => $stdAttendId[$i],
            'status' => $status[$i],
        ])->execute();
        }
        $transection->commit();
    } catch(Exception $e){
        $transection->rollback();
    }
    Yii::$app->session->setFlash('success', "Attendance marked successfully...!");
// closing of if isset
}
?>
=======
>>>>>>> 7efd999e1a1e06a2b3ac257a2e7aefaefd32d41a
