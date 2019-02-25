<!DOCTYPE html>
<html>
<head>
	<title>All Branches</title>
</head>
<body>
<?php 
  $id = $_GET['id'];
  $teacherAssignDetail = Yii::$app->db->createCommand("SELECT tsah.teacher_subject_assign_head_name,tsad.class_id,tsad.subject_id,tsad.no_of_lecture
  FROM teacher_subject_assign_detail as tsad
  INNER JOIN teacher_subject_assign_head as tsah
  ON tsah.teacher_subject_assign_head_id = tsad.teacher_subject_assign_detail_head_id
  WHERE tsad.teacher_subject_assign_detail_head_id = '$id'")->queryAll();

  $count = count($teacherAssignDetail);
?>
<div class="container-fluid">
	<section class="content-header">
      	<h1 style="color: #3C8DBC;">
        	<i class="fa fa-copyright"></i>
          <?php echo $teacherAssignDetail[0]['teacher_subject_assign_head_name']." - Information" ; ?>
      	</h1>
	    <ol class="breadcrumb" style="color: #3C8DBC;">
	        <li><a href="index.php" style="color: #3C8DBC;"><i class="fa fa-dashboard"></i> Home</a></li>
	        <li><a href="index.php?r=teacher-subject-assign-head" style="color: #3C8DBC;">Back</a></li>
	    </ol>
    </section>
    <!--  -->
	<section class="content">
      <div class="row">
        <!-- /.col -->
        <div class="col-md-6">
          <table class="table table-bordered table-hover table-condensed table-striped">
            <thead>
              
              <tr class="label-primary">
                <th style="width: 60px; text-align: center;">Sr #</th>
                <th style="width: 200px">Subject</th>
                <th>Lectures</th>
              </tr>
            </thead>
            <tbody>
              <?php 
                foreach ($teacherAssignDetail as $key => $value){
                  $teacherClassId    = $value['class_id'];
                  $teacherSubjectId  = $value['subject_id'];
                  $teacherClassNames = Yii::$app->db->createCommand("SELECT DISTINCT std_enroll_head_name FROM std_enrollment_head WHERE std_enroll_head_id = '$teacherClassId'")->queryAll();
                  $teacherSubjectName = Yii::$app->db->createCommand("SELECT subject_name FROM subjects WHERE subject_id = '$teacherSubjectId'")->queryAll();    
              ?>
              <tr>
                <th colspan="4" class="bg-info"><h4>
                  <?php echo $teacherClassNames[0]['std_enroll_head_name']; ?></h4></th>
              </tr>
              <tr>
                <td align="center"><b><?php echo $key+1; ?></b></td>
                <td><b><?php echo $teacherSubjectName[0]['subject_name']; ?></b></td>
                <td><b><?php echo $value['no_of_lecture'];?></b></td>
              </tr>
             <?php } ?>
            </tbody>
          </table>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!--  -->
</div>	
</body>
</html>