<?php 
use yii\db\Connection;
use backend\controllers\CustomSmsController;
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
<div class="container-fluid">
	<div class="row">
		<div class="col-md-3 col-md-offset-9">
			<a href="./activity-view?sub_id=<?php echo $sub_id;?>&class_id=<?php echo $class_id;?>&emp_id=<?php echo $emp_id;?>"  style="float: right;" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-backward"></i> Back</a>
		</div>
	</div><br>
	<div class="row">
		<div class="col-md-12">
			<div class="box box-danger">
				<div class="box-header" style="padding:0px;background-color:#d6484838;">
					 <h2 class="text-center text-danger">Class Attendance</h2>
				</div>
				<div class="box-body">
					<form  action = "take-attendance" method="POST">
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
            </div>  <br>         
            <div class="col-md-2">
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
				</div>
			</div>
		</div>
	</div>
</div>

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

	<div class="row container-fluid">
		<div class="row">
			<div class="col-md-3 col-md-offset-9">
				<a href="./activity-view?sub_id=<?php echo $sub_id;?>&class_id=<?php echo $class_id;?>&emp_id=<?php echo $emp_id;?>"  style="float: right;" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-backward"></i> Back</a>
			</div>
		</div>
		<br>
		<div class="row">
		<div class="col-md-3">
			<div class="box box-danger">
				<div class="box-header">
					<h3 class="text-center" style="font-family: georgia;">Class Info</h3><hr style="border-color:#d6484838;">
				</div>
				<div class="box-body">
					<li style="list-style-type: none;">
                            <p class="bg-red text-center" style="padding:4px;">Date</p>
                            <p style="background-color:#d6484838;color: red;text-align: center;">
                                <u><?php echo $date; ?></u>
                            </p>
                    </li><hr style="border-color:#d6484838;"><br>
                    <li style="list-style-type: none;margin-top: -20px;">
                        <b>Class:</b>
                        <p>
                            <?php echo $students[0]['std_enroll_head_name']; ?>
                        </p>
                    </li><br>
                    <li style="list-style-type: none;">
                        <b>Subject:</b>
                        <p>
                            <?php echo $subName[0]['subject_name']; ?>
                        </p>
                    </li><hr style="border-color:#d6484838;"><br>
				</div>
			</div>
		</div>
		<div class="col-md-9">
			<div class="box box-danger">
				<div class="box-header" style="padding:3px;">
					<h2 class="text-center text-danger" style="font-family: georgia;">Take Attendan</h2><hr style="border-color:#d6484838;">
				</div>
				<div class="box-body">
					<div class="row">
						<div class="col-md-12">
							<form method="POST">
								<table class="table">
									<thead >
										<tr style="background-color:#d6484838;">
											<th style="">Sr #.</th>
											<th style="">Roll #.</th>
											<th style="">Name</th>
											<th style="">Action</th>
										</tr>
									</thead>
									<tbody>
										<?php 
										for ($i=0; $i <$countstd ; $i++) { 
										 ?>
										<tr style="border-bottom:1px solid #d6484838 ;">
											<td><?php echo $i+1;?></td>
											<td><?php echo $students[$i]['std_roll_no']; ?></td>
											<td><?php echo $students[$i]['std_enroll_detail_std_name'];?></td>
											<td align="left">
												<input type="radio" name="std<?php echo $i+1?>" value="P" checked="checked"/> <b  style="color: green">P </b><br>
												<input type="radio" name="std<?php echo $i+1?>" value="A" /> <b style="color: red">A </b><br>
												<input type="radio" name="std<?php echo $i+1?>" value="L" /><b style="color: #F7C564;"> L</b>
											</td>
										</tr>
										<?php 
										$stdId = $students[$i]['std_enroll_detail_std_id'];
										$stdAttendId[$i] = $stdId;
										//closing for loop
										} 
										?>
									</tbody>
								</table>
								
										<?php foreach ($stdAttendId as $value) {
				                		echo '<input type="hidden" name="stdAttendance[]" value="'.$value.'" style="width: 30px">';
				                	}
				                	?>
									
					                	<input class="form-control" type="hidden" name="countstd" value="<?php echo $countstd; ?>">	
									
					                	<input type="hidden" name="classnameid" value="<?php echo $classnameid; ?>" style="width: 30px">
									
										<input type="hidden" name="sessionid" value="<?php echo $sessionid; ?>" style="width: 30px">
									</td>
								
					                	<input type="hidden" name="sectionid" value="<?php echo $sectionid; ?>" style="width: 30px">
								
					                	<input type="hidden" name="emp_id" value="<?php echo $emp_id; ?>" style="width: 30px">
									
					                	<input type="hidden" name="sub_id" value="<?php echo $sub_id; ?>" style="width: 30px">
									
					                	<input type="hidden" name="date" value="<?php echo $date; ?>" style="width: 30px">
								<br>
								<button style="float: right;s" type="submit" name="save" class="btn btn-success btn-flat btn-xs">
									<i class="fa fa-sign-in"></i> <b>Take Attendance</b>
								</button>		
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	</div>
	<?php 
	//closing of if
		} else {
		Yii::$app->session->setFlash('warning', "You've already taken attendance for this class");
		}
	// closing of if isset (submit)
	}
		

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
				 if($attendance == 1){
			            $query = Yii::$app->db->createCommand("SELECT att.student_id, att.status 
						FROM std_attendance as att
						WHERE att.teacher_id = '$emp_id' 
						AND att.class_name_id = '$classnameid'
						AND att.session_id = '$sessionid'
						AND att.section_id = '$sectionid'
						AND att.subject_id = '$sub_id' 
						AND CAST(date AS DATE) = '$date'
						AND att.status != 'P'")->queryAll();

			            $c = count($query);
			            for ($i=0; $i < $c ; $i++) { 
			            	$stdID = $query[$i]['student_id'];
			            	$stdStatus = $query[$i]['status'];
			            	$stdInfo = Yii::$app->db->createCommand("SELECT std.std_reg_no,std.std_name, std.std_father_name, sg.guardian_contact_no_1
			            		FROM std_personal_info as std 
			            		INNER JOIN std_guardian_info as sg
			            		ON std.std_id = sg.std_id
			            		WHERE std.std_id = '$stdID'")->queryAll();
			            	$regNo[$i] = $stdInfo[0]['std_reg_no'];
			            	$contact[$i] = $stdInfo[0]['guardian_contact_no_1'];
			            	if ($stdStatus == 'L') {
			            		$num = str_replace('-', '', $contact[$i]);
				             	$to = str_replace('+', '', $num);
				             	$leaveSMS = Yii::$app->db->createCommand("SELECT sms_template FROM sms WHERE sms_name = 'Leave SMS'")->queryAll();
				             	$leaveMsg = $leaveSMS[0]['sms_template'];
				             	$msg = substr($leaveMsg,0,16);
				             	$msg2 = substr($leaveMsg,17);
				             	$message = $msg." ".$regNo[$i]." ".$msg2;
				             	
							$sms = CustomSmsController::sendSMS($to, $message);
			            	} else {
			            	$num = str_replace('-', '', $contact[$i]);
			             	$to = str_replace('+', '', $num);
			             	$absentSMS = Yii::$app->db->createCommand("SELECT sms_template FROM sms WHERE sms_name = 'Absent SMS'")->queryAll();
			             	$absentMsg = $absentSMS[0]['sms_template'];
				             	$msg = substr($absentMsg,0,16);
				             	$msg2 = substr($absentMsg,17);
				             	$message = $msg." ".$regNo[$i]." ".$msg2;
				             	
			             	$sms = CustomSmsController::sendSMS($to, $message);
			             	}
			            }
			        }
					$transection->commit();
					Yii::$app->session->setFlash('success', "Attendance marked successfully...!");
					//return $this->redirect(['view-class-attendance']);
				} catch(Exception $e){
					$transection->rollback();
					Yii::$app->session->setFlash('warning', "Attendance not marked. Try again!");
				}
				
		// closing of if isset
		}
	 ?>
</body>
</html>
