<?php 
  use yii\helpers\Html;
  use common\models\StdPersonalInfo;

  $id = $_GET['id'];
  // Employee Personal Info..... 
  $empInfo = Yii::$app->db->createCommand("SELECT * FROM emp_info WHERE emp_id = '$id'")->queryAll();
  // Employee Designation....
  if ($empInfo[0]['emp_designation_id']==1) {
    $empDesignation = "Principal";
  }else if ($empInfo[0]['emp_designation_id']==2) {
    $empDesignation = "Vise Principal";
  }else if ($empInfo[0]['emp_designation_id']==3) {
    $empDesignation = "Coordinator";
  }else if ($empInfo[0]['emp_designation_id']==4) {
    $empDesignation = "Teacher";
  }else if ($empInfo[0]['emp_designation_id']==5) {
    $empDesignation = "Security Gaurd";
  }else if ($empInfo[0]['emp_designation_id']==6) {
    $empDesignation = "Accountant";
  }else if ($empInfo[0]['emp_designation_id']==7) {
    $empDesignation = "Librarian";
  }
  // Employee Type...
  if ($empInfo[0]['emp_type_id']==1) {
    $empType = "Daily Wadges";
  }else if ($empInfo[0]['emp_type_id']==2) {
    $empType = "Weekly Wedges";
  }else if ($empInfo[0]['emp_type_id']==3) {
    $empType = "Contract Basis";
  }else if ($empInfo[0]['emp_type_id']==4) {
    $empType = "Permanent ";
  }
  // Employee Group Type...
  if ($empInfo[0]['group_by']=="Faculty") {
    $empGroup = "Faculty";
  }else if ($empInfo[0]['group_by']=='Non-Faculty') {
    $empGroup = "Non-Faculty";
  }
  // Employee Photo...
  $photo = $empInfo[0]['emp_photo'];
  //echo $photo;
  // Employee Reference info....
  $empReference = Yii::$app->db->createCommand("SELECT * FROM emp_reference WHERE emp_id = '$id'")->queryAll();
  //var_dump($empReference);

?>
<div class="container-fluid">
	<section class="content-header">
    <h1 style="color: #3C8DBC;">
        <i class="fa fa-user"></i> Employee Profile
      </h1>
    <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="index.php?r=emp-info">Back</a></li>
    </ol>
  </section>
    <!-- main content start  -->
	<section class="content">
    <div class="row">
      <div class="col-md-3">
        <!-- Profile Image Start -->
        <div class="box box-primary">
          <div class="box-body box-profile">
            <img class="profile-user-img img-responsive img-circle" src="<?php echo $photo; ?>" alt="User profile picture" width="10%">

            <h3 class="profile-username text-center" style="color: #3C8DBC;">
              <?php echo $empInfo[0]['emp_name'] ?>
            </h3>

            <p class="text-muted text-center"><!-- Software Engineer --></p>

            <ul class="list-group list-group-unbordered">
              <li class="list-group-item">
                <b>Designation</b> <a class="pull-right">
                  <?php echo $empDesignation; ?>
                </a>
              </li>
              <li class="list-group-item">
                <b>Type</b> <a class="pull-right">
                  <?php echo $empType; ?>
                </a>
              </li>
              <li class="list-group-item">
                <b>Member</b> <a class="pull-right">
                  <?php echo $empGroup; ?>
                </a>
              </li>
              <li class="list-group-item">
                <b>Email</b> 
                <a class="pull-right">
                  <?php echo $empInfo[0]['emp_email'] ?>
                </a>
              </li>
              <li class="list-group-item">
                <b>Contact #</b> 
                <a class="pull-right">
                  <?php echo $empInfo[0]['emp_contact_no'] ?>
                </a>
              </li>
              <li class="list-group-item">
                <b>Status</b>
                <a class="pull-right"><span class="label label-success">Active</span></a>
              </li>
            </ul>
            <!-- <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a> -->
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
      <!-- Profile Image Close -->
      <div class="col-md-9">
        <div class="nav-tabs-custom">
          <ul class="nav nav-tabs">
            <li class="active">
              <a href="#personal" data-toggle="tab" style="color: #3C8DBC;"><i class="fa fa-user-circle"></i> Employee Info</a>
            </li>
            <li>
              <a href="#refrence" data-toggle="tab" style="color: #3C8DBC;"><i class="fa fa-user"></i> Employee Refrence</a>
            </li>
            <li>
              <a href="#doc" data-toggle="tab" style="color: #3C8DBC;"><i class="fa fa-book"></i> Employee Doc</a>
            </li>
          </ul>
          <!-- Employee personal info Tab start -->
          <div class="tab-content" >
            <div class="active tab-pane" id="personal">
              <div class="row">
                <div class="col-md-5">
                  <p style="font-size: 20px; color: #3C8DBC;"><i class="fa fa-info-circle" style="font-size: 20px;"></i> Personal Information</p>
                </div>
                <div class="col-md-2 col-md-offset-5">
                  <button class="btn btn-primary"><i class="fa fa-edit"></i> Edit</button>
                </div>
              </div><hr>
              <!-- Employee info start -->
                <div class="row">
                  <div class="col-md-6">
                    <table class="table table-striped table-hover">
                      <thead>
                        <tr>
                          <th>Employee Father Name:</th>
                          <td><?php echo $empInfo[0]['emp_father_name'] ?></td>
                        </tr>
                        <tr>
                          <th>Employee Martial Status:</th>
                          <td><?php echo $empInfo[0]['emp_marital_status'] ?></td>
                        </tr>
                        <tr>
                          <th>Employee Gender:</th>
                          <td><?php echo $empInfo[0]['emp_gender'] ?></td>
                        </tr>
                        <tr>
                          <th>Employee Salary:</th>
                          <td><?php echo $empInfo[0]['emp_salary'] ?></td>
                        </tr>
                        <tr>
                          <th>Employee Permanent Address:</th>
                        </tr>
                        <tr>
                          <td><?php echo $empInfo[0]['emp_perm_address'] ?></td>
                        </tr>
                      </thead>
                    </table>
                  </div>
                  <div class="col-md-6">
                      <table class="table table-stripped">
                      <thead>
                        <!-- <tr>
                          <th>Employee Branch:</th>
                          <td></td>
                        </tr> -->
                        <tr>
                          <th>Employee CNIC:</th>
                          <td><?php echo $empInfo[0]['emp_cnic'] ?></td>
                        </tr>
                        <tr>
                          <th>Employee Qualification:</th>
                          <td><?php echo $empInfo[0]['emp_qualification'] ?></td>
                        </tr>
                        <tr>
                          <th>Employee Passing Year:</th>
                          <td><?php echo $empInfo[0]['emp_passing_year'] ?></td>
                        </tr>
                        <tr>
                          <th>Employee Institute Name:</th>
                          <td><?php echo $empInfo[0]['emp_institute_name'] ?></td>
                        </tr>
                        <tr>
                          <th>Employee Temporary Address:</th>
                        </tr>
                        <tr>
                          <td><?php echo $empInfo[0]['emp_temp_address'] ?></td>
                        </tr>
                      </thead>
                    </table>
                  </div>
                </div>
              <!-- Employee info close -->
            </div>
            <!-- Employee personal info Tab close -->
            <!-- ******************************** -->
            <!-- Employee Refrence tab start here -->
            <div class="tab-pane" id="refrence">
             <div class="row">
                <div class="col-md-5">
                  <p style="font-size: 20px; color: #3C8DBC;"><i class="fa fa-info-circle" style="font-size: 20px;"></i> Refrence Information</p>
                </div>
                <div class="col-md-2 col-md-offset-5">
                  <button class="btn btn-primary"><i class="fa fa-edit"></i> Edit</button>
                </div>
              </div><hr>
              <!-- Employee refrence info start -->
                <div class="row">
                  <div class="col-md-6">
                    <table class="table table-striped table-hover">
                      <thead>
                        <tr>
                          <th>Refrence Name:</th>
                          <td><?php echo $empReference[0]['ref_name'] ?></td>
                        </tr>
                        <tr>
                          <th>Refrence Contact No:</th>
                          <td><?php echo $empReference[0]['ref_contact_no'] ?></td>
                        </tr>
                        <tr>
                          <th>Refrence CNIC:</th>
                          <td><?php echo $empReference[0]['ref_cnic'] ?></td>
                        </tr>
                        <tr>
                          <th>Refrence Designation:</th>
                          <td><?php echo $empReference[0]['ref_designation'] ?></td>
                        </tr>
                      </thead>
                    </table>
                  </div>
                  <div class="col-md-6">
                     
                  </div>
                </div>
              <!-- Employee refrence info close -->
            </div>
            <!-- Employee refrence tab close here -->
            <!-- ******************************** -->
            <!-- Employee Document tab start here -->
            <div class="tab-pane" id="doc">
             <div class="row">
                <div class="col-md-5">
                  <p style="font-size: 20px; color: #3C8DBC;"><i class="fa fa-info-circle" style="font-size: 20px;"></i> Document Information</p>
                </div>
                <div class="col-md-2 col-md-offset-5">
                  <button class="btn btn-primary"><i class="fa fa-edit"></i> Edit</button>
                </div>
              </div><hr>

              <!-- Employee Document info start -->

                <div class="row">
                  <div class="col-md-6">
                    <table class="table table-striped table-hover">
                      <thead>
                        <tr>
                          <th>Degree Copy</th>
                        </tr>
                        <tr>
                          <td><img src="<?php echo $empInfo[0]['degree_scan_copy'] ?>"></td>
                        </tr>
                      </thead>
                    </table>
                  </div>
                  <div class="col-md-6">
                      
                  </div>
                </div>
              <!-- Employee Document info close -->
            </div>
            
            <!-- Employee Document tab close here -->
        
        </div>
        <!-- /.nav-tabs-custom -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
  <!-- main content close -->
</div>	
</body>
</html>