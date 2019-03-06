<?php 

	if(isset($_GET['sub_id']) AND ($_GET['class_id'])){
		$sub_id = $_GET['sub_id'];	
		$class_id = $_GET['class_id'];
	}
	$students = Yii::$app->db->createCommand("SELECT seh.std_enroll_head_name,sed.std_enroll_detail_std_name, sed.std_roll_no
		FROM std_enrollment_detail as sed
		INNER JOIN std_enrollment_head as seh
		ON seh.std_enroll_head_id = sed.std_enroll_detail_head_id
		WHERE sed.std_enroll_detail_head_id = '$class_id'")->queryAll();

	$countstd = count($students);
	$subName = Yii::$app->db->createCommand("SELECT subject_name FROM subjects WHERE subject_id = '$sub_id'")->queryAll();

?>

<!DOCTYPE html>
<html>
<head>
    <title>Attendance</title>
</head>
<body>
<div class="row">
	<div class="col-md-9">
		<form method="POST">
		<table class="table table-hover">
			<thead>
				<tr>
					<td align="center" colspan="4">
						<b style="font-size: 30px;">Class Attendance</b>
					</td>
				</tr>
				<tr>
					<th>Class:</th>
					<td><?php echo $students[0]['std_enroll_head_name']; ?></td>
					<th>Subject:</th>
					<td><?php echo $subName[0]['subject_name']; ?></td>
				</tr>
				<tr style="background-color:#add8e6; ">
					<th >Sr #.</th>
					<th >Roll #.</th>
					<th >Name</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php 
				for ($i=0; $i <$countstd ; $i++) { 
					

				 ?>
				<tr>
					<td>1</td>
					<td><?php echo $students[0]['std_roll_no']; ?></td>
					<td><?php echo $students[0]['std_enroll_detail_std_name'];?></td>
					<td align="center">
						<input type="radio" name="std<?php echo $i+1?>" value="P" checked="checked"/> <b  style="color: green">Present </b> &nbsp; &nbsp;| &nbsp; 
						<input type="radio" name="std<?php echo $i+1?>" value="A" /> <b style="color: red">Absent </b> &nbsp; &nbsp;| &nbsp; 
						<input type="radio" name="std<?php echo $i+1?>" value="L" /><b style="color: #F7C564;"> Leave</b>
					</td>
				</tr>
				
				<?php } ?>
				<tr>
					<td>
						<button type="submit" name="submit" class="btn btn-success btn-flat">
							<i class="fa fa-sign-in"></i> <b>Take Attendance</b>
						</button>
					</td>
				</tr>
			</tbody>
			</form>
		</table>
	</div>
</div>
</body>
</html>
