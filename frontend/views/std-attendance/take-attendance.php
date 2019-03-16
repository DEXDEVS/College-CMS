<?php 
use yii\db\Connection;
$conn = \Yii::$app->db;

	if(isset($_GET['sub_id'])){
		$sub_id = $_GET['sub_id'];	
		$class_id = $_GET['class_id'];
		$emp_id = $_GET['emp_id'];
	

		$classDetail = Yii::$app->db->createCommand("SELECT DISTINCT seh.class_name_id, seh.session_id, seh.section_id FROM std_enrollment_head as seh INNER JOIN teacher_subject_assign_detail as d ON d.class_id = seh.std_enroll_head_id WHERE d.class_id = '$class_id'")->queryAll();
				$classnameid = $classDetail[0]['class_name_id'];
				$sessionid = $classDetail[0]['session_id'];
				$sectionid = $classDetail[0]['section_id'];

				//$date1	= date('Y-m-d');
		
?>

<!DOCTYPE html>
<html>
<head>
	<title>Attendance</title>
</head>
<body>
	<form  action = "take-attendance" method="POST" style="margin-top: -35px">
		<h1 class="well well-sm text" align="center">Attendance</h1>
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
                	<label>Current Date</label>
                    <input class="form-control" data-date-format="mm/dd/yyyy" type="date" name="date" required="">
                </div>    
            </div>           
            <div class="col-md-2 col-md-offset-10">
                <div class="form-group">
                	<label></label>
                    <button type="submit" name="submit" class="btn btn-success form-control" style="margin-top: -25px;">
                    <i class="fa fa-sign-in" aria-hidden="true"></i>	
                	<b>Take Attendance</b></button>
                </div>    
            </div>
            <div class="col-md-2">
                <div class="form-group">
                	<input type="hidden" name="classnameid" value="<?php echo $classnameid; ?>">
                	<input type="hidden" name="class_id" value="<?php echo $class_id; ?>">
                	<input type="hidden" name="sessionid" value="<?php echo $sessionid; ?>">
                	<input type="hidden" name="sectionid" value="<?php echo $sectionid; ?>">
                	<input type="hidden" name="emp_id" value="<?php echo $emp_id; ?>">
                	<input type="hidden" name="sub_id" value="<?php echo $sub_id; ?>">
                </div>    
        	</div>    
        </div>
    </form>

<?php  }

	if(isset($_POST["submit"])){
	 	$class_id= $_POST["class_id"];
		$classnameid= $_POST["classnameid"];
		$sessionid = $_POST["sessionid"];
		$sectionid = $_POST["sectionid"];
		$emp_id = $_POST["emp_id"];
		$sub_id = $_POST["sub_id"];
		$date = $_POST["date"];

		$checkAttendance = Yii::$app->db->createCommand("SELECT * FROM std_attendance as att WHERE att.teacher_id = '$emp_id' AND att.class_name_id = '$classnameid' AND att.session_id = '$sessionid' AND att.section_id = '$sectionid' AND att.subject_id = '$sub_id' AND CAST(date AS DATE) = '$date'")->queryAll();
	if(empty($checkAttendance)){
		
		$students = Yii::$app->db->createCommand("SELECT seh.std_enroll_head_name,sed.std_enroll_detail_std_id,sed.std_enroll_detail_std_name, sed.std_roll_no
			FROM std_enrollment_detail as sed
			INNER JOIN std_enrollment_head as seh
			ON seh.std_enroll_head_id = sed.std_enroll_detail_head_id
			WHERE sed.std_enroll_detail_head_id = '$class_id'")->queryAll();
		
		$countstd = count($students);

		$subName = Yii::$app->db->createCommand("SELECT subject_name FROM subjects WHERE subject_id = '$sub_id'")->queryAll();
		?>

<div class="row">
	<div class="col-md-9">
		<form method="POST" action="test-attendance">
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
					} 
					?>
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
			                	<input type="hidden" name="classnameid" value="<?php echo $classnameid; ?>">
			                	<input type="hidden" name="sessionid" value="<?php echo $sessionid; ?>">
			                	<input type="hidden" name="sectionid" value="<?php echo $sectionid; ?>">
			                	<input type="hidden" name="emp_id" value="<?php echo $emp_id; ?>">
			                	<input type="hidden" name="sub_id" value="<?php echo $sub_id; ?>">
			                	<input type="hidden" name="date" value="<?php echo $date; ?>">
			                </div>    
			        	</div>
					</tr>
				</tbody>
			</table>
		</form>
	</div>
</div>
	<?php 
	//closing of if
		} else {
		Yii::$app->session->setFlash('warning', "You have already taken attendance for this class");
		}
	// closing of if isset (submit)
	}
		

		// if (isset($_POST["save"])) {
		// 		$classnameid = $_POST["classnameid"];
		// 		$sessionid = $_POST["sessionid"];
		// 		$sectionid = $_POST["sectionid"];
		// 		$emp_id = $_POST["emp_id"];
		// 		$sub_id = $_POST["sub_id"];
		// 		$date = $_POST["date"];
		// 		$countstd = $_POST["countstd"];
		// 		$stdAttendId = $_POST["stdAttendance"];
				
		// 		for($i=0; $i<$countstd;$i++){
		// 			$q=$i+1;
		// 			$std = "std".$q;
		// 			$status[$i] = $_POST["$std"];

		// 		}
				
		// 		$transection = $conn->beginTransaction();
		// 		try{
		// 			for($i=0; $i<$countstd; $i++){
		// 			$attendance = $conn->createCommand()->insert('std_attendance',[
		// 				'teacher_id' => $emp_id,
		// 				'class_name_id' => $classnameid,
		// 				'session_id'=> $sessionid,
		// 				'section_id'=> $sectionid,
		// 				'subject_id'=> $sub_id,
		// 				'date' => $date,
		// 				'student_id' => $stdAttendId[$i],
		// 				'status' => $status[$i],
		// 			])->execute();
		// 			}
		// 			$transection->commit();
		// 		} catch(Exception $e){
		// 			$transection->rollback();
		// 		}
		// 		Yii::$app->session->setFlash('success', "Attendance marked successfully...!");
		// // closing of if isset
		// }
	 ?>
</body>
</html>
