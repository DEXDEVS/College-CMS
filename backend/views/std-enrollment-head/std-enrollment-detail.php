<!DOCTYPE html>
<html>
<head>
	<title>All Branches</title>
</head>
<body>
<?php 
  $id = $_GET['id'];
  $stdEnrollmentDetail = Yii::$app->db->createCommand("SELECT seh.std_enroll_head_name, sed.std_enroll_detail_std_name, sed.std_roll_no, sed.std_reg_no FROM std_enrollment_head as seh
    INNER JOIN std_enrollment_detail as sed
    ON seh. std_enroll_head_id = sed.std_enroll_detail_head_id 
    WHERE sed.std_enroll_detail_head_id = '$id'")->queryAll();
  $count = count($stdEnrollmentDetail);
  $stdEnrollmentClassName = $stdEnrollmentDetail[0]['std_enroll_head_name'];
?>
<div class="container-fluid">
	<section class="content-header">
      	<h1 style="color: #3C8DBC;">
        	<i class="fa fa-copyright"></i>
          <?php echo $stdEnrollmentClassName." - Information "."<span class='label-success' style='border-radius: 50%; padding: 2px 8px;'>". $count."</span>"; ?>
      	</h1>
	    <ol class="breadcrumb" style="color: #3C8DBC;">
	        <li><a href="index.php" style="color: #3C8DBC;"><i class="fa fa-dashboard"></i> Home</a></li>
	        <li><a href="index.php?r=std-enrollment-head" style="color: #3C8DBC;">Back</a></li>
	    </ol>
    </section>
    <!--  -->
	<section class="content">
      <div class="row">
        <!-- /.col -->
        <div class="col-md-12">
          <table class="table table-bordered table-hover table-condensed table-striped">
            <thead>
              <tr class="label-primary">
                <th style="width: 60px; text-align: center;">Sr #</th>
                <th style="width: 200px">Registration #</th>
                <th style="width: 200px">Roll #</th>
                <th>Student Name</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($stdEnrollmentDetail as $key => $value){  ?>
              <tr>
                <td align="center"><b><?php echo $key+1; ?></b></td>
<<<<<<< HEAD
=======
                <td><?php echo $value['std_reg_no']; ?></td>
>>>>>>> df114bf8d42beefc65b30a9620316e0387770686
                <td><?php echo $value['std_roll_no']; ?></td>
                <td><?php echo $value['std_enroll_detail_std_name'];?></td>
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