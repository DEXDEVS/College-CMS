<?php 
// use yii\db\Connection;
// $conn = \Yii::$app->db;

	if(isset($_GET['sub_id'])){
		$sub_id = $_GET['sub_id'];	
		$class_id = $_GET['class_id'];
		$emp_id = $_GET['emp_id'];

		$students = Yii::$app->db->createCommand("SELECT seh.std_enroll_head_name,sed.std_enroll_detail_std_id,sed.std_enroll_detail_std_name, sed.std_roll_no
		FROM std_enrollment_detail as sed
		INNER JOIN std_enrollment_head as seh
		ON seh.std_enroll_head_id = sed.std_enroll_detail_head_id
		WHERE sed.std_enroll_detail_head_id = '$class_id'")->queryAll();
	
	$countstd = count($students);
	$subName = Yii::$app->db->createCommand("SELECT subject_name FROM subjects WHERE subject_id = '$sub_id'")->queryAll();
	$date = date('Y-m-d H:m:s');
	var_dump($date);
	
?>

<!DOCTYPE html>
<html>
<head>
    <title>Attendance</title>
</head>
<body>
<div class="row">
	<div class="col-md-9">
		<form method="POST" action="class-attendance">
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
					<td><?php echo $i+1 ?></td>
					<td><?php echo $students[$i]['std_roll_no']; ?></td>
					<td><?php echo $students[$i]['std_enroll_detail_std_name'];?></td>
					<td align="center">
						<input type="radio" name="std<?php echo $i+1?>" value="P" checked="checked"/> <b  style="color: green">Present </b> &nbsp; &nbsp;| &nbsp; 
						<input type="radio" name="std<?php echo $i+1?>" value="A" /> <b style="color: red">Absent </b> &nbsp; &nbsp;| &nbsp; 
						<input type="radio" name="std<?php echo $i+1?>" value="L" /><b style="color: #F7C564;"> Leave</b>
					</td>
				</tr>
				
				<?php 
				$stdId = $students[$i]['std_enroll_detail_std_id'];
				$stdAttendId[$i] = $stdId;
				//closing for loop
				} ?>
				<tr>
					<td>
						<button type="submit" name="save" class="btn btn-success btn-flat">
							<i class="fa fa-sign-in"></i> <b>Take Attendance</b>
						</button>
					</td>
					<div class="col-md-2">
		                <div class="form-group">
		                	<?php foreach ($stdAttendId as $value) {
		                		echo '<input type="hidden" name="stdAttendance[]" value="'.$value.'">';
		                	}
		                	?>
		                	<input type="hidden" name="countstd" value="<?php echo $countstd; ?>">
		                	<input type="hidden" name="class_id" value="<?php echo $class_id; ?>">
		                	<input type="hidden" name="emp_id" value="<?php echo $emp_id; ?>">
		                	<input type="hidden" name="sub_id" value="<?php echo $sub_id; ?>">
		                	<input type="hidden" name="date" value="<?php echo $date; ?>">
		                </div>    
		        	</div>
				</tr>
			</tbody>
			<?php 
			// closing of if isset
			} ?>
			</form>
		</table>
	</div>
</div>
	<?php 	
		if (isset($_POST["save"])) {
				$class_id = $_POST["class_id"];
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
				$classDetail = Yii::$app->db->createCommand("SELECT DISTINCT seh.class_name_id, seh.session_id, seh.section_id FROM std_enrollment_head as seh INNER JOIN teacher_subject_assign_detail as d ON d.class_id = seh.std_enroll_head_id WHERE d.class_id = '$class_id'")->queryAll();
				$classnameid = $classDetail[0]['class_name_id'];
				$sessionid = $classDetail[0]['session_id'];
				$sectionid = $classDetail[0]['section_id'];
				//var_dump($status);
				// $transection = $conn->beginTransaction();
				// try{
					for($i=0; $i<$countstd; $i++){
					$attendance = Yii::$app->db->createCommand()->insert('std_attendance',[
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
				// 	$transection->commit();
				// } catch(Exception $e){
				// 	$transection->rollback();
				// }
				
		// closing of if isset
		}
	 ?>
</body>
</html>
