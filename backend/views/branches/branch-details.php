<!DOCTYPE html>
<html>
<head>
	<title>All Branches</title>
</head>
<body>
	
	<?php
	$id = $_GET['id'];
  // branches query....
	$branches = Yii::$app->db->createCommand("SELECT * FROM branches WHERE branch_id = $id")->queryAll();
  // institute query....
	$institute = $branches[0]['institute_id'];
	$instituteInfo = Yii::$app->db->createCommand("SELECT * FROM institute WHERE institute_id = $institute")->queryAll();
  // sessions query....
	$sessions = Yii::$app->db->createCommand("SELECT * FROM std_sessions WHERE session_branch_id = $id AND delete_status = 1")->queryAll();
	$sessionid = $sessions[0]['session_id'];
	$countSessions = count($sessions);
  // sections query....
	$sections = Yii::$app->db->createCommand("SELECT * FROM std_sections WHERE session_id = $sessionid AND delete_status = 1")->queryAll();
	$sectionId = $sections[0]['section_id'];
	$countSections = count($sections);
  // classes query...
	$classes = Yii::$app->db->createCommand("SELECT * FROM std_class_name WHERE delete_status = 1")->queryAll();
	$countclasses = count($classes);
	
	
		// $students = Yii::$app->db->createCommand("SELECT sed.std_enroll_detail_std_id  
		// 	FROM std_enrollment_detail as sed 
		// 	INNER JOIN std_enrollment_head as seh 
		// 	ON seh.std_enroll_head_id = sed.std_enroll_detail_head_id 
		// 	WHERE seh.section_id = '$sectionId'")->queryAll();
			
		// 	$studentCount = count($students);
		// 	echo $studentCount;

  // employee query...
	$employees = Yii::$app->db->createCommand("SELECT * FROM emp_info WHERE delete_status = 1")->queryAll();
  $teacher = Yii::$app->db->createCommand("SELECT * FROM emp_info WHERE emp_designation_id = 4 AND delete_status = 1")->queryAll();
  // $count = count($teacher);  
  // var_dump($count);
	$employeeCount = count($employees);

	?>
 <div class="container-fluid">
  	<section class="content-header">
        	<h1 style="color: #3C8DBC;">
          	<i class="fa fa-university"></i> Branch Profile
        	</h1>
  	    <ol class="breadcrumb" style="color: #3C8DBC;">
  	        <li><a href="index.php" style="color: #3C8DBC;"><i class="fa fa-dashboard"></i> Home</a></li>
  	        <li><a href="index.php?r=branches" style="color: #3C8DBC;">Back</a></li>
  	    </ol>
      </section>
      <!--  -->
  	<section class="content">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="box box-primary">
              <div class="box-body box-profile">
                <img class="profile-user-img img-responsive img-circle" src="images/brookfiled_logo.jpg" alt="User profile picture">
                <h3 class="profile-username text-center"></h3>
                <p class="text-muted text-center">
                  <h4 align="center" style="color: #3C8DBC;"><?php echo $instituteInfo[0]['institute_name'];?></h4>
                </p>

                <ul class="list-group list-group-unbordered">
                  <li class="list-group-item">
                    <b>Principal:</b>
                      <a class="pull-right">
                        <?php echo $branches[0]['branch_head_name'];?>
                      </a>
                  </li>
                  <li class="list-group-item">
                    <b>Contact #:</b>
                      <a class="pull-right">
                        <?php echo $branches[0]['branch_head_contact_no'];?>
                      </a>
                  </li>
                  <li class="list-group-item">
                    <b>Email:</b>
                    <a>
                      <?php echo $branches[0]['branch_head_email'];?>
                    </a>
                  </li>
                </ul>

                <!-- <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a> -->
              </div>
              <!-- /.box-body -->
            </div>
            <!-- /.box -->

            <!-- About Me Box -->
            
            <!-- /.box -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="nav-tabs-custom">
              <ul class="nav nav-tabs" style="color: #3C8DBC;">
                <li class="active"><a href="#branch" data-toggle="tab" style="color: #3C8DBC;"><i class="fa fa-bold"></i> Branch</a></li>
                <li>
                	<a href="#sessions" data-toggle="tab" style="color: #3C8DBC;"><i class="fa fa-scribd"></i> Sessions <span class="label label-success" style="border-radius: 50%;"><?php echo $countSessions;?></span></a>
                </li>
                <li>
                	<a href="#sections" data-toggle="tab" style="color: #3C8DBC;"><i class="glyphicon glyphicon-link"></i> Sections <span class="label label-primary" style="border-radius: 50%;"><?php echo $countSections;?></span></a>
                </li>
                <li><a href="#classes" data-toggle="tab" style="color: #3C8DBC;"><i class="fa fa-copyright"></i> Classes <span class="label label-info" style="border-radius: 50%;"><?php echo $countclasses;?></span></a></li>
                <li><a href="#teachers" data-toggle="tab" style="color: #3C8DBC;"><i class="fa fa-users"></i> Employees <span class="label label-warning" style="border-radius: 50%;"><?php echo $employeeCount;?></span></a></li>
              </ul>

              <!-- Branch Tab start -->
              <div class="tab-content">
                <div class="active tab-pane" id="branch">
                  <div class="row">
                    <div class="col-md-5">
                      <p style="font-size: 20px;"><i class="fa fa-info-circle" style="font-size: 20px;"></i> Branch Information</p>
                    </div>
                    <div class="col-md-2 col-md-offset-5">
                      <button class="btn btn-primary"><i class="fa fa-edit"></i> Edit</button>
                    </div>
                  </div><hr>

                  <!-- Branch info start -->

                    <div class="row">
                      <div class="col-md-6" style="border-right: 1px dashed;">
                        <table class="table table-striped table-hover">
                          <thead>
                            <tr>
                              <th>Branch Code:</th>
                              <td><?php echo $branches[0]['branch_code'];?></td>
                            </tr>
                            <tr>
                              <th>Branch Name:</th>
                              <td><?php echo $branches[0]['branch_name'];?></td>
                            </tr>
                            <tr>
                              <th>Branch Email:</th>
                              <td><?php echo $branches[0]['branch_email'];?></td>
                            </tr>
                            <tr>
                              <th>Branch number:</th>
                              <td><?php echo $branches[0]['branch_contact_no'];?></td>
                            </tr>
                            <tr>
                              <td></td>
                            </tr>
                          </thead>
                        </table>
                      </div>
                      <div class="col-md-6">
                          <table class="table table-stripped">
                          <thead>
                            <tr>
                              <th>Branch Status:</th>
                              <td>
                                <span class="label label-success">
                                  <?php echo $branches[0]['status'];?>
                                </span>
                              </td>
                            </tr>
                            <tr>
                              <th>Branch Type:</th>
                              <td><?php echo $branches[0]['branch_type'];?></td>
                            </tr>
                            <tr>
                              <th>Branch Location:</th>
                              <td><?php echo $branches[0]['branch_location'];?></td>
                            </tr>
                          </thead>
                        </table>
                      </div>
                    </div>

                  <!-- Branch info close -->

                </div>
                <!-- Branch Tab close -->


                <!-- Session tab start here -->

                <div class="tab-pane" id="sessions">
                 <div class="row">
                    <div class="col-md-5">
                      <p style="font-size: 20px;"><i class="fa fa-info-circle" style="font-size: 20px;"></i> Sessions Information</p>
                    </div>
                    <div class="col-md-2 col-md-offset-5">
                      <button class="btn btn-primary"><i class="fa fa-edit"></i> Edit</button>
                    </div>
                  </div><hr>

                  <!-- Sessions info start -->

                    <div class="row">
                      <div class="col-md-12">
                        <table class="table table-striped table-hover" style="width: 100%;">
                          <thead>
                           <tr>
                          		<th>Sr #:</th>
                          		<th>Session Name:</th>
                          		<th>Session Start Date</th>
                          		<th>Session End Date</th>
                          		<th>Status</th>
                          	</tr>
                          	<?php foreach ($sessions as $key => $val){  ?>
                            <tr>
                              <td><?php echo $key+1; ?></td>
                              <td><?php echo $val['session_name'];?></td>
                              <td><?php echo $val['session_start_date'];?></td>
                              <td><?php echo $val['session_end_date'];?></td>
                              <td><?php echo $val['status'];?></td>
                            </tr>
                        	<?php } ?>
                          </thead>
                        </table>
                      </div>
                    </div>
                  <!-- Sessions info close -->
                </div>
                
                <!-- Sessions tab close here -->


                <!-- Section tab start here -->

                <div class="tab-pane" id="sections">
                 <div class="row">
                    <div class="col-md-5">
                      <p style="font-size: 20px;"><i class="fa fa-info-circle" style="font-size: 20px;"></i> Sections Information</p>
                    </div>
                    <div class="col-md-2 col-md-offset-5">
                      <button class="btn btn-primary"><i class="fa fa-edit"></i> Edit</button>
                    </div>
                  </div><hr>

                  <!-- Sections info start -->

                    <div class="row">
                      <div class="col-md-12">
                        <table class="table table-striped table-hover">
                          <thead>
                          	<tr>
                          		<th>Sr #:</th>
                          		<th>Section Name:</th>
                          		<th>Section Description</th>
                          		<th>Section Intake</th>
                          		<th>Total Students</th>
                          	</tr>
                          	<?php foreach ($sections as $key => $val){  ?>
                            <tr>
                              <td><?php echo $key+1; ?></td>
                              <td><?php echo $val['section_name'];?></td>
                              <td><?php echo $val['section_description'];?></td>
                              <td><?php echo $val['section_intake'];?></td>

                            </tr>
                        	<?php } ?>
                          </thead>
                        </table>
                      </div>
                      <div class="col-md-6">
                          
                      </div>
                    </div>
                  <!-- Sections info close -->
                </div>
                
                <!-- Sections tab close here -->


                 <!-- Teachers tab start here -->

                <div class="tab-pane" id="teachers">
                 <div class="row">
                    <div class="col-md-5">
                      <p style="font-size: 20px;"><i class="fa fa-info-circle" style="font-size: 20px;"></i> Teachers Information</p>
                    </div>
                    <div class="col-md-2 col-md-offset-5">
                      <button class="btn btn-primary"><i class="fa fa-edit"></i> Edit</button>
                    </div>
                  </div><hr>

                  <!-- Teachers info start -->

                    <div class="row">
                      <div class="col-md-6" style="border-right:1px dashed; ">
                        <table class="table table-striped table-hover">
                          <thead>
                            <tr>
                              <th>Current Class:</th>
                              <td>BSCS</td>
                            </tr>
                            <tr>
                              <th>Subject Combination:</th>
                              <td>1</td>
                            </tr>
                            <tr>
                              <th>Session:</th>
                              <td>1</td>
                            </tr>
                            <tr>
                              <th>Section:</th>
                              <td>1</td>
                            </tr>
                          </thead>
                        </table>
                      </div>
                      <div class="col-md-6">
                         <table class="table table-striped table-hover">
                          <thead>
                            <tr>
                              <th>Previous Class:</th>
                              <td>BSCS</td>
                            </tr>
                            <tr>
                              <th>Previous Class Roll No:</th>
                              <td>1</td>
                            </tr>
                            <tr>
                              <th>Passing Year:</th>
                              <td>1</td>
                            </tr>
                            <tr>
                              <th>Obtained Marks:</th>
                              <td>1</td>
                            </tr>
                            <tr>
                              <th>Total Marks:</th>
                              <td>1</td>
                            </tr>
                            <tr>
                              <th>Grades:</th>
                              <td>1</td>
                            </tr>
                            <tr>
                              <th>Percentage:</th>
                              <td>1</td>
                            </tr>
                          </thead>
                        </table> 
                      </div>
                    </div>
                  <!-- Teachers info close -->
                </div>
                
                <!-- Teachers tab close here -->

                <!-- Fee tab start here -->

                <div class="tab-pane" id="fee">
                 <div class="row">
                    <div class="col-md-5">
                      <p style="font-size: 20px;"><i class="fa fa-info-circle" style="font-size: 20px;"></i> Fee Information</p>
                    </div>
                    <div class="col-md-2 col-md-offset-5">
                      <button class="btn btn-primary"><i class="fa fa-edit"></i> Edit</button>
                    </div>
                  </div><hr>

                  <!-- Fee info start -->

                    <div class="row">
                      <div class="col-md-6" style="border-right:1px dashed; ">
                        <table class="table table-striped table-hover">
                          <thead>
                            <tr>
                              <th>Fee Category:</th>
                              <td>Annual</td>
                            </tr>
                            <tr>
                              <th>Admission Fee:</th>
                              <td>1</td>
                            </tr>
                            <tr>
                              <th>Admission Fee Discount:</th>
                              <td>1</td>
                            </tr>
                            <tr>
                              <th>Net Admission Fee:</th>
                              <td>1</td>
                            </tr>
                          </thead>
                        </table>
                      </div>
                      <div class="col-md-6">
                         <table class="table table-striped table-hover">
                          <thead>
                            <tr>
                              <th>Tuition Fee:</th>
                              <td>Annual</td>
                            </tr>
                            <tr>
                              <th>Fee Concession:</th>
                              <td>1</td>
                            </tr>
                            <tr>
                              <th>Net Tuition Fee:</th>
                              <td>1</td>
                            </tr>
                            <tr>
                              <th>Number Of Installments:</th>
                              <td>1</td>
                            </tr>
                          </thead>
                        </table> 
                      </div>
                    </div>
                  <!-- Fee info close -->
                </div>
                
                <!-- Fee tab close here -->


               
            
            </div>
            <!-- /.nav-tabs-custom -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </section>
      <!--  -->
  </div>	
</body>
</html>