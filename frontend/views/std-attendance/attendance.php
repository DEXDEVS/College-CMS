<!DOCTYPE html>
<html>
<head>
	<title>Attendance</title>
</head>
<body>
<div class="container-fluid" style="margin-top: -10px">
	<h1 class="well well-sm" align="center">Attendance</h1>	
	<form  action = "index.php?r=std-attendance/attendance" method="POST">
    	<div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <input type="hidden" name="_csrf" class="form-control" value="<?=Yii::$app->request->getCsrfToken()?>">          
                </div>    
            </div>    
        </div>
        <div class="row">
            <div class="col-md-6 col-md-offset-2">
                <div class="form-group">
                    <label>Select Class</label>
                    <select class="form-control" name="classid" id="classId" required="">
							<?php 
								$className = Yii::$app->db->createCommand("SELECT * FROM std_class")->queryAll();
								
								  	foreach ($className as  $value) { ?>	
									<option value="<?php echo $value["class_id"]; ?>">
										<?php echo $value["class_name"]; ?>	
									</option>
							<?php } ?>
					</select>      
                </div>    
            </div> 
            <div class="col-md-2">
                <div class="form-group">
                    <button type="submit" name="submit" class="btn btn-info form-control" style="margin-top: 25px;">
                    <i class="glyphicon glyphicon-share"></i>	
                	<b>Get Class</b></button>
                </div>    
            </div>    
        </div>
    </form>
    

<?php
	if(isset($_POST["submit"])){
		 
		$classid= $_POST["classid"];
		$date = date('Y-m-d');

		$student = Yii::$app->db->createCommand("SELECT sed.std_enroll_detail_id ,sed.std_enroll_detail_std_id FROM std_enrollment_detail as sed INNER JOIN std_enrollment_head as seh ON seh.std_enroll_head_id = sed.std_enroll_detail_head_id WHERE seh.class_id = '$classid'")->queryAll();
		?>
		<hr>
		<form method="POST" action="index.php?r=std-attendance/attendance">
			<div class="row">
				<div class="col-md-8 col-md-offset-2">
					<table width="100%" class="table table-condensed table-hover">
						<tr>
							<th>Class</th>
							<th>Date</th>
						</tr>
						<tr>
							<td><?php echo $className[0]['class_name']; ?></td>
							<td><?php echo $date; ?></td>
						</tr>
					</table>
				</div>
			</div>
			<div class="row">
				<div class="col-md-8 col-md-offset-2">
					<table width="100%" class="table table-striped table-condensed">
						<tr></tr>
						<tr class="label-primary" style="color: white;">
							<th>Sr No</th>
							<th>RollNo</th>
							<th>Student Name</th>
							<th style="text-align: center;">Attendance</th>
						</tr>
						
						<?php $length = count($student);
						//$stdId = array(); 
						for( $i=0; $i<$length; $i++) { ?>
							<tr>
								<td><?php echo $i+1 ?></td>
								<td><?php echo $student[$i]['std_enroll_detail_std_id'] ?></td>
								<?php $stdId = $student[$i]['std_enroll_detail_std_id'];
									  $stdName = Yii::$app->db->createCommand("SELECT std_name FROM std_personal_info  WHERE std_id = '$stdId'")->queryAll();?>
								<td><?php echo $stdName[0]['std_name'] ?></td>
								<td align="center">
									<input type="radio" name="std<?php echo $i+1?>" value="P" checked="checked"/> <b  style="color: green">Present </b> &nbsp; &nbsp;| &nbsp; 
									<input type="radio" name="std<?php echo $i+1?>" value="A" /> <b style="color: red">Absent </b> &nbsp; &nbsp;| &nbsp; 
									<input type="radio" name="std<?php echo $i+1?>" value="L" /><b style="color: #F7C564;">Leave</b>
								</td>
							</tr>
					<?php
						$stdAttendId[$i] = $stdId;
						//closing for loop
						}
					?>
					</table>
				</div>
			</div>	
				

			</div><hr>
			<div class="row">
				<div class="col-md-2">
	                <div class="form-group">
	                	<?php foreach ($stdAttendId as $value) {
	                		echo '<input type="hidden" name="stdAttendance[]" value="'.$value.'">';
	                	}
	                	?>
	                	<input type="hidden" name="length" value="<?php echo $length; ?>">
	                	<input type="hidden" name="classid" value="<?php echo $classid; ?>">
	                	<input type="hidden" name="date" value="<?php echo $date; ?>">
	                </div>    
	        	</div>
			</div>
			<div class="row">
				<div class="col-md-2 col-md-offset-5">
					<button type="submit" name="save" class="btn btn-success form-control"><i class="glyphicon glyphicon-saved"></i>
						<b>Save Attendance</b></button>
				</div>
			</div>
			
	    </form> 
		<?php 
		// closing of if isset
			} ?>
	</div>
	<!-- container-fluid close -->	

	<?php 	
		if (isset($_POST["save"])) {
				$classid = $_POST["classid"];
				$date = $_POST["date"];
				$length = $_POST["length"];
				$stdAttendId = $_POST["stdAttendance"];
				for($i=0; $i<$length;$i++){
					$q=$i+1;
					$std = "std".$q;
					$status[$i] = $_POST["$std"];
				}
				$techerEmail = Yii::$app->user->identity->email;
				$teacherId = Yii::$app->db->createCommand("SELECT emp.emp_id FROM emp_info as emp WHERE emp.emp_email = '$techerEmail'")->queryAll();

				//var_dump($status);
				for($i=0; $i<$length; $i++){
					$attendance = Yii::$app->db->createCommand()->insert('std_attendance',[
						'teacher_id' => $teacherId[0]['emp_id'],
						'class_id' => $classid,
						'date' => $date,
						'student_id' => $stdAttendId[$i],
						'status' => $status[$i],
					])->execute();
				}
		}
	?>

</body>
</html>