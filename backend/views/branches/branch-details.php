		<!DOCTYPE html>
		<html>
		<head>
			<title>All Branches</title>
		</head>
		<body>
			
			<?php
			$id = $_GET['id'];
			$branches = Yii::$app->db->createCommand("SELECT * FROM branches WHERE branch_id = $id")->queryAll();
			$institute = $branches[0]['institute_id'];
			$instituteName = Yii::$app->db->createCommand("SELECT * FROM institute WHERE institute_id = $institute")->queryAll();
			$sessions = Yii::$app->db->createCommand("SELECT * FROM std_sessions WHERE session_branch_id = $id AND delete_status = 1")->queryAll();
			// $countSessionspercentage = $countSessions / 1 * 100;
			$sessionid = $sessions[0]['session_id'];
			//echo $sessionid;
			$countSessions = count($sessions);

			$sections = Yii::$app->db->createCommand("SELECT * FROM std_sections WHERE session_id = $sessionid AND delete_status = 1")->queryAll();
			$countSections = count($sections);

			$classes = Yii::$app->db->createCommand("SELECT * FROM std_class WHERE session_id = $sessionid AND delete_status = 1")->queryAll();
			$countclasses = count($classes);
			
			$students = Yii::$app->db->createCommand("SELECT * FROM std_enrollment_head WHERE session_id = $sessionid AND delete_status = 1")->queryAll();
			$countStudents = count($students);

			$teachers = Yii::$app->db->createCommand("SELECT * FROM emp_info WHERE emp_designation_id = 4 AND delete_status = 1")->queryAll();
			$teacherCount = count($teachers);


			
			?>
		<h1 style="text-align:center; color: #57A0D3;"><?php echo $branches[0]['branch_name'];?></h1>
		<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<div class="box">
	            <div class="box-header with-border">
	              <h3 class="box-title">Branch Details</h3>
	            </div>
	            <!-- /.box-header -->
	            <div class="box-body">
	              <table class="table table-bordered">
	                <tr>
	                  <th style="width: 10px">Sr.#</th>
	                  <th>Description</th>
	                  <!-- <th>Status</th> -->
	                  <th style="width: 40px">Count</th>
	                   <th style="width: 11%;">Details</th>
	                </tr>
	                <tr>
	                  <td><b>1.</b></td>
	                  <td>Total number of sessions</td>
	                   <td align="center"><span class="badge bg-red"><?php echo $countSessions  ;?></span></td>
	                  <td><a href="" class="label label-info">view more details</a></td>
	                <!--   <td>
	                    <div class="progress progress-xs">
	                      <div class="progress-bar progress-bar-danger" style="width: 10%;"></div>
	                    </div>
	                  </td> -->
	                 
	                </tr>
	                <tr>
	                  <td><b>2.</b></td>
	                  <td>Total number of sections</td>
	                  <td align="center"><span class="badge bg-yellow"><?php echo $countSections; ?></span></td>
	                  <td><a href="" class="label label-info">view more details</a></td>
	                 <!--  <td>
	                    <div class="progress progress-xs">
	                      <div class="progress-bar progress-bar-yellow" style="width: 70%"></div>
	                    </div>
	                  </td> -->
	                  
	                </tr>
	                <tr>
	                  <td><b>3.</b></td>
	                  <td>Total number of classes</td>
	                  <td align="center"><span class="badge bg-light-blue"><?php echo $countclasses; ?></span></td>
	                  <td><a href="" class="label label-info">view more details</a></td>
	                  <!-- <td>
	                    <div class="progress progress-xs progress-striped active">
	                      <div class="progress-bar progress-bar-primary" style="width: 30%"></div>
	                    </div>
	                  </td> -->
	                  
	                </tr>
	                <tr>
	                  <td><b>4.</b></td>
	                  <td>Total number of students</td>
	                  <td align="center"><span class="badge bg-green"><?php echo $countStudents;?></span></td>
	                  <td><a href="" class="label label-info">view more details</a></td>
	                 <!--  <td>
	                    <div class="progress progress-xs progress-striped active">
	                      <div class="progress-bar progress-bar-success" style="width: 90%"></div>
	                    </div>
	                  </td> -->
	                  
	                </tr>
	                <tr>
	                  <td><b>5.</b></td>
	                  <td>Total number of teachers</td>
	                  <td align="center"><span class="badge bg-green"><?php echo $teacherCount;?></span></td>
	                  <td><a href="" class="label label-info">view more details</a></td>
	                  <!-- <td>
	                    <div class="progress progress-xs progress-striped active">
	                      <div class="progress-bar progress-bar-success" style="width: 90%"></div>
	                    </div>
	                  </td> -->
	                </tr>
	              </table>
	            </div>
	            <!-- /.box-body -->
	            <!-- <div class="box-footer clearfix">
	              <ul class="pagination pagination-sm no-margin pull-right">
	                <li><a href="#">&laquo;</a></li>
	                <li><a href="#">1</a></li>
	                <li><a href="#">2</a></li>
	                <li><a href="#">3</a></li>
	                <li><a href="#">&raquo;</a></li>
	              </ul>
	            </div> -->
	          </div>
	          <!-- /.box -->
			</div>
		</div>
		


		<!-- branches information start here -->

		<h3 class="btn btn-primary">Branch Information</h3>	
		<div class="container-fluid" style="margin-top: 5px;">
			<div class="row well">
				<div class="col-md-4" style="border-right: 1px solid;">
					<table class="table table-bordered">
						<thead>
							<tr>
								<th>Branch Code:</th>
								<td><?php echo $branches[0]['branch_code'];?></td>
							</tr>
							<tr>
								<th>Branch Status:</th>
								<td><?php echo $branches[0]['status'];?></td>
							</tr>
							<tr>
								<th>Branch Head Name:</th>
								<td><?php echo $branches[0]['branch_head_name'];?></td>
							</tr>
						</thead>
					</table>
				</div>
				<div class="col-md-4" style="border-right: 1px solid;">
					<table class="table table-bordered">
						<thead>
							<tr>
								<th>Branch Type:</th>
								<td><?php echo $branches[0]['branch_type'];?></td>
							</tr>
							<tr>
								<th>Branch Contact No:</th>
								<td><?php echo $branches[0]['branch_contact_no'];?></td>
							</tr>
							<tr>
								<th>Branch Head Contact No:</th>
								<td><?php echo $branches[0]['branch_head_contact_no'];?></td>
							</tr>
						</thead>
					</table>
				</div>
				<div class="col-md-4">
					<table class="table table-bordered">
						<thead>
							<tr>
								<th>Branch Location:</th>
								<td><?php echo $branches[0]['branch_location'];?></td>
							</tr>
							<tr>
								<th>Branch Email:</th>
								<td><?php echo $branches[0]['branch_email'];?></td>
							</tr>
							<tr>
								<th>Branch Head Email:</th>
								<td><?php echo $branches[0]['branch_head_email'];?></td>
							</tr>
						</thead>
					</table>
				</div>
			</div>
		</div>

		<!-- branches information close here -->

		<!-- sessions information start here -->	

		<h3 class="btn btn-success">Sessions Information</h3>	
		<div class="container-fluid" style="margin-top: 5px;">
			<div class="row well">
				<div class="col-md-4" style="border-right: 1px solid;">
					<table class="table table-bordered">
						<thead>
							<tr>
								<th>Session Name:</th>
								<td><?php echo $sessions[0]['session_name'];?></td>
							</tr>
							<tr>
								<th>Session Start Date:</th>
								<td><?php echo $sessions[0]['session_start_date'];?></td>
							</tr>
							<tr>
								<th>Session End Date:</th>
								<td><?php echo $sessions[0]['session_end_date'];?></td>
							</tr>
							<tr>
								<th>Session Status:</th>
								<td><?php echo $sessions[0]['status'];?></td>
							</tr>
						</thead>
					</table>
				</div>
				<div class="col-md-4" style="border-right: 1px solid;">
					<!-- <table class="table table-bordered">
						<thead>
							<tr>
								<th>Branch Type:</th>
								<td><?php echo $branches[0]['branch_type'];?></td>
							</tr>
							<tr>
								<th>Branch Contact No:</th>
								<td><?php echo $branches[0]['branch_contact_no'];?></td>
							</tr>
							<tr>
								<th>Branch Head Contact No:</th>
								<td><?php echo $branches[0]['branch_head_contact_no'];?></td>
							</tr>
						</thead>
					</table> -->
				</div>
				<div class="col-md-4">
					<!-- <table class="table table-bordered">
						<thead>
							<tr>
								<th>Branch Location:</th>
								<td><?php echo $branches[0]['branch_location'];?></td>
							</tr>
							<tr>
								<th>Branch Email:</th>
								<td><?php echo $branches[0]['branch_email'];?></td>
							</tr>
							<tr>
								<th>Branch Head Email:</th>
								<td><?php echo $branches[0]['branch_head_email'];?></td>
							</tr>
						</thead>
					</table> -->
				</div>
			</div>

			<!-- branches information close here -->
		</div>	
		</body>
		</html>