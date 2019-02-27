<?php  
  use yii\helpers\Html;
  use common\models\StdPersonalInfo;

    $id = $_GET['id'];
    // Stduent Personal Info..... 
    $stdPersonalInfo = Yii::$app->db->createCommand("SELECT * FROM std_personal_info WHERE std_id = '$id'")->queryAll();
    // Student Photo...
    $photo = $stdPersonalInfo[0]['std_photo'];
    //echo $photo;
    // Stduent Guardian Info.....  
    $stdGuardianInfo = Yii::$app->db->createCommand("SELECT * FROM std_guardian_info WHERE std_id = '$id'")->queryAll();
    // Stduent ICE Info.....  
    $stdICEInfo = Yii::$app->db->createCommand("SELECT * FROM std_ice_info WHERE std_id = '$id'")->queryAll();
    // student ICE Name.... 
    if($stdICEInfo==null){
      $stdICEName = 'Not updated...';
    }
    else{
      $stdICEName = $stdICEInfo[0]['std_ice_name'];  
    }
    // Student ICE Relation...
    if($stdICEInfo==null){
      $stdICERelation = 'Not updated...';
    }
    else{
      $stdICERelation = $stdICEInfo[0]['std_ice_relation'];  
    }
    // Student ICE Contact...
    if($stdICEInfo==null){
      $stdICEContact = 'Not updated...';
    }
    else{
      $stdICEContact = $stdICEInfo[0]['std_ice_contact_no'];  
    }
    // Stduent Academic Info..... 
    $stdAcademicInfo = Yii::$app->db->createCommand("SELECT * FROM std_academic_info WHERE std_id = '$id'")->queryAll();
    $stdAcademicClass = $stdAcademicInfo[0]['class_name_id'];  
    $stdSubjectID = $stdAcademicInfo[0]['subject_combination']; 
    $stdSubject = Yii::$app->db->createCommand("SELECT std_subject_name FROM std_subjects WHERE std_subject_id = '$stdSubjectID'")->queryAll();
    $stdSubjects = $stdSubject[0]['std_subject_name'];
    //var_dump($stdSubjects); 
    $className = Yii::$app->db->createCommand("SELECT class_name FROM std_class_name WHERE class_name_id = '$stdAcademicClass'")->queryAll();

    // Stduent Fee Info..... 
    $stdFeeInfo = Yii::$app->db->createCommand("SELECT * FROM std_fee_details WHERE std_id = '$id'")->queryAll();
<<<<<<< HEAD
    //var_dump($stdFeeInfo); 

    // fetching student roll number from `std_enrollment_detail` against selected student `$id`
    $stdRollNo = Yii::$app->db->createCommand("SELECT sed.std_roll_no
    FROM std_enrollment_detail as sed
    INNER JOIN std_enrollment_head as seh
    ON seh.std_enroll_head_id = sed.std_enroll_detail_head_id
    WHERE sed.std_enroll_detail_std_id = '$id'")->queryAll(); 


=======
>>>>>>> 77a2837adf673d8c1f48020d48f4da5bcf366a54


    // $sessionName = Yii::$app->db->createCommand("SELECT session_name FROM std_sessions WHERE session_id = '$sessionid'")->queryAll();

    // $sectionName = Yii::$app->db->createCommand("SELECT section_name FROM std_sections WHERE section_id = '$sectionid'")->queryAll();

?>
<div class="container-fluid">
  <div class="row">
  	<section class="content-header">
    	<h1 style="color: #3C8DBC;">
      	<i class="fa fa-user"></i> Student Profile
    	</h1>
	    <ol class="breadcrumb">
	        <li><a href="./home"><i class="fa fa-dashboard"></i> Home</a></li>
	        <li><a href="./std-personal-info">Back</a></li>
	    </ol>
  </section>
    <!-- Content Start -->
  	<section class="content">
        <div class="row">
          <div class="col-md-3">
            <!-- Profile Image -->
            <div class="box box-primary">
              <div class="box-body box-profile">
                <img class="profile-user-img img-responsive img-circle" src="<?php echo $photo; ?>" alt="User profile picture">
                <div class="photo-edit text-center">
                  <a href="./std-personal-info-std-photo?id=<?php echo $id; ?>"><i class="fa fa-pencil"></i></a>
                </div>
                <h3 class="profile-username text-center" style="color: #3C8DBC;"><?php echo $stdPersonalInfo[0]['std_name'] ?></h3>
                <p class="text-muted text-center"><!-- Software Engineer --></p>
                <ul class="list-group list-group-unbordered">
                  <li class="list-group-item">
                    <b>Roll #:</b> <a class="pull-right"><?php 
                    if (empty($stdRollNo[0]['std_roll_no'])) {
                      echo "N/A";
                    }
                    else
                    {
                      echo $stdRollNo[0]['std_roll_no'];
                    }
                     ?></a>
                  </li>
                  <li class="list-group-item" style="height: 75px;">
                    <b>Class:</b><br>
                    <a><?php echo $className[0]['class_name'] ?></a>
                  </li>
                  <li class="list-group-item">
                    <b>Email</b> <a class="pull-right"><?php echo $stdPersonalInfo[0]['std_email'] ?></a>
                  </li>
                  <li class="list-group-item">
                    <b>Contact #:</b> <a class="pull-right"><?php echo $stdPersonalInfo[0]['std_contact_no'] ?></a>
                  </li>
                  <li class="list-group-item">
                    <b>Status:</b> <a class="pull-right"><span class="label label-success">Active</span></a>
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
              <ul class="nav nav-tabs">
                <li class="active"><a href="#personal" data-toggle="tab" style="color: #3C8DBC;"><i class="fa fa-user-circle" ></i> Personal Info</a></li>
                <li><a href="#guardian" data-toggle="tab" style="color: #3C8DBC;"><i class="fa fa-user"></i> Guardian Info</a></li>
                <li><a href="#ice" data-toggle="tab" style="color: #3C8DBC;"><i class="fa fa-user-o"></i> ICE Info</a></li>
                <li><a href="#academic" data-toggle="tab" style="color: #3C8DBC;"><i class="fa fa-book"></i> Academic Info</a></li>
                <li><a href="#fee" data-toggle="tab" style="color: #3C8DBC;"><i class="fa fa-money"></i> Fee Details</a></li>
              </ul>
              <!-- student personal info Tab start -->
              <div class="tab-content">
                <div class="active tab-pane" id="personal">
                  <div class="row">
                    <div class="col-md-5">
                      <p style="font-size: 20px; color: #3C8DBC;"><i class="fa fa-info-circle" style="font-size: 20px;"></i> Personal Information</p>
                    </div>
                    <div class="col-md-2 col-md-offset-5">
                        <?=Html::a(' Edit',['update','id'=>$id],['class'=>'btn btn-primary btn-sm fa fa-edit','role'=>'modal-remote']) ?>
                    </div>
                  </div><hr>
                  <!-- student info start -->
                    <div class="row">
                      <div class="col-md-6" style="border-right: 1px dashed;">
                        <table class="table table-striped table-hover">
                          <thead>
                            <tr>
                              <th>Student ID:</th>
                              <td><?php echo $stdPersonalInfo[0]['std_id'] ?></td>
                            </tr>
                            <tr>
                              <th>Student Name:</th>
                              <td><?php echo $stdPersonalInfo[0]['std_name'] ?></td>
                            </tr>
                            <tr>
                              <th>Student Father Name:</th>
                              <td><?php echo $stdPersonalInfo[0]['std_father_name'] ?></td>
                            </tr>
                            <tr>
                              <th>Student Gender:</th>
                              <td><?php echo $stdPersonalInfo[0]['std_gender'] ?></td>
                            </tr>
                            <tr>
                              <th>Student Date of Birth:</th>
                              <td><?php echo $stdPersonalInfo[0]['std_DOB'] ?></td>
                            </tr>
                            <tr>
                              <th>Student Temporary Address:</th>
                            </tr>
                            <tr>
                              <td><?php echo $stdPersonalInfo[0]['std_temporary_address'] ?></td>
                            </tr>
                          </thead>
                        </table>
                      </div>
                      <div class="col-md-6">
                          <table class="table table-stripped">
                          <thead>
                            <tr>
                              <th>Student CNIC:</th>
                              <td><?php echo $stdPersonalInfo[0]['std_b_form'] ?></td>
                            </tr>
                            <tr>
                              <th>Student District:</th>
                              <td><?php echo $stdPersonalInfo[0]['std_district'] ?></td>
                            </tr>
                            <tr>
                              <th>Student Tehseel:</th>
                              <td><?php echo $stdPersonalInfo[0]['std_tehseel'] ?></td>
                            </tr>
                            <tr>
                              <th>Student Religion:</th>
                              <td><?php echo $stdPersonalInfo[0]['std_religion'] ?></td>
                            </tr>
                            <tr>
                              <th>Student Nationality:</th>
                              <td><?php echo $stdPersonalInfo[0]['std_nationality'] ?></td>
                            </tr>
                            <tr>
                              <th>Student Permanent Address:</th>
                            </tr>
                            <tr>
                              <td><?php echo $stdPersonalInfo[0]['std_permanent_address'] ?></td>
                            </tr>
                          </thead>
                        </table>
                      </div>
                    </div>
                  <!-- student info close -->
                </div>
                <!-- student personal info Tab close -->
                <!-- ******************************* -->
                <!-- Guardian tab start here -->
                <div class="tab-pane" id="guardian">
                 <div class="row">
                    <div class="col-md-5">
                      <p style="font-size: 20px; color: #3C8DBC;"><i class="fa fa-info-circle" style="font-size: 20px;"></i> Guardian Information</p>
                    </div>
                    <div class="col-md-2 col-md-offset-5">
                      <a href="./std-guardian-info-update?id=<?php echo $id;?>" class="btn btn-primary btn-sm fa fa-edit" style='color: white;'> Edit </a>
                    </div>
                  </div><hr>
                  <!-- guardian info start -->
                    <div class="row">
                      <div class="col-md-6">
                        <table class="table table-striped table-hover">
                          <thead>
                            <tr>
                              <th>Guardian Name:</th>
                              <td><?php echo $stdGuardianInfo[0]['guardian_name'] ?></td>
                            </tr>
                            <tr>
                              <th>Guardian Relation:</th>
                              <td><?php echo $stdGuardianInfo[0]['guardian_relation'] ?></td>
                            </tr>
                            <tr>
                              <th>Guardian CNIC:</th>
                              <td><?php echo $stdGuardianInfo[0]['guardian_cnic'] ?></td>
                            </tr>
                            <tr>
                              <th>Gurdian Email:</th>
                              <td><?php echo $stdGuardianInfo[0]['guardian_email'] ?></td>
                            </tr>
                            <tr>
                              <th>Guardian Monthly Income:</th>
                              <td><?php echo $stdGuardianInfo[0]['guardian_monthly_income'] ?></td>
                            </tr>
                          </thead>
                        </table>
                      </div>
                      <div class="col-md-6">
                          <table class="table table-stripped">
                          <thead>
                            <tr>
                              <th>Guardian Contact No. 1:</th>
                              <td><?php echo $stdGuardianInfo[0]['guardian_contact_no_1'] ?></td>
                            </tr>
                            <tr>
                              <th>Guardian Contact No. 2:</th>
                              <td><?php echo $stdGuardianInfo[0]['guardian_contact_no_2'] ?></td>
                            </tr>
                            <tr>
                              <th>Guardian Occupation:</th>
                              <td><?php echo $stdGuardianInfo[0]['guardian_occupation'] ?></td>
                            </tr>
                             <tr>
                              <th>Guardian Designation:</th>
                              <td><?php echo $stdGuardianInfo[0]['guardian_designation'] ?></td>
                            </tr>
                          </thead>
                        </table>
                      </div>
                    </div>
                  <!-- guardian info close -->
                </div>
                <!-- Guardian tab close here -->
                <!-- *********************** -->
                <!-- ICE tab start here -->
                <div class="tab-pane" id="ice">
                 <div class="row">
                    <div class="col-md-5">
                      <p style="font-size: 20px; color: #3C8DBC;"><i class="fa fa-info-circle" style="font-size: 20px;"></i> ICE Information</p>
                    </div>
                    <div class="col-md-2 col-md-offset-5">
                      <a href="./std-ice-info-update?id=<?php echo $id;?>" class="btn btn-primary btn-sm fa fa-edit" style='color: white;'> Edit </a>
                    </div>
                  </div><hr>
                  <!-- ICE info start -->
                    <div class="row">
                      <div class="col-md-6">
                        <table class="table table-striped table-hover">
                          <thead>
                            <tr>
                              <th>ICE Name:</th>
                              <td><?php echo $stdICEName; ?></td>
                            </tr>
                            <tr>
                              <th>ICE Relation:</th>
                              <td><?php echo $stdICERelation; ?></td>
                            </tr>
                            <tr>
                              <th>ICE Contact No:</th>
                              <td><?php echo $stdICEContact; ?></td>
                            </tr>
                          </thead>
                        </table>
                      </div>
                    </div>
                  <!-- ICE info close -->
                </div>
                <!-- ICE tab close here -->
                <!-- ****************** -->
                <!-- Academic tab start here -->
                <div class="tab-pane" id="academic">
                 <div class="row">
                    <div class="col-md-5">
                      <p style="font-size: 20px; color: #3C8DBC;"><i class="fa fa-info-circle" style="font-size: 20px;"></i> Academic Information</p>
                    </div>
                    <div class="col-md-2 col-md-offset-5">
                      <a href="./std-academic-info-update?id=<?php echo $id;?>" class="btn btn-primary btn-sm fa fa-edit" style='color: white;'> Edit </a>
                    </div>
                  </div><hr>
                  <!-- Academic info start -->
                    <div class="row">
                      <div class="col-md-6" style="border-right:1px dashed; ">
                        <table class="table table-striped table-hover">
                          <thead>
                            <tr>
                              <th>Session:</th>
                              <td></td>
                            </tr>
                            <tr>
                              <th>Section:</th>
                              <td></td>
                            </tr>
                            <tr  colspan="2">
                              <th>Class:</th>
                              <td><?php echo $className[0]['class_name']; ?></td>
                            </tr>
                            <tr>
                              <th>Subject Combination:</th>
                            </tr>
                            <tr>
                              <td colspan="2"><?php echo $stdSubjects ?></td>
                            </tr>
                          </thead>
                        </table>
                      </div>
                      <div class="col-md-6">
                         <table class="table table-striped table-hover">
                          <thead>
                            <tr>
                              <th>Previous Class:</th>
                              <td><?php echo $stdAcademicInfo[0]['previous_class']?></td>
                            </tr>
                            <tr>
                              <th>Previous Class Roll No:</th>
                              <td><?php echo $stdAcademicInfo[0]['previous_class_rollno']?></td>
                            </tr>
                            <tr>
                              <th>Passing Year:</th>
                              <td><?php echo $stdAcademicInfo[0]['passing_year']?></td>
                            </tr>
                            <tr>
                              <th>Obtained Marks:</th>
                              <td><?php echo $stdAcademicInfo[0]['obtained_marks']?></td>
                            </tr>
                            <tr>
                              <th>Total Marks:</th>
                              <td><?php echo $stdAcademicInfo[0]['total_marks']?></td>
                            </tr>
                            <tr>
                              <th>Grades:</th>
                              <td><?php echo $stdAcademicInfo[0]['grades']?></td>
                            </tr>
                            <tr>
                              <th>Percentage:</th>
                              <td><?php echo round($stdAcademicInfo[0]['percentage'],2)."%"?></td>
                            </tr>
                          </thead>
                        </table> 
                      </div>
                    </div>
                  <!-- Academic info close -->
                </div>
                <!-- Academic tab close here -->
                <!-- *********************** -->
                <!-- Fee tab start here -->
                <div class="tab-pane" id="fee">
                 <div class="row">
                    <div class="col-md-5">
                      <p style="font-size: 20px; color: #3C8DBC;"><i class="fa fa-info-circle" style="font-size: 20px;"></i> Fee Information</p>
                    </div>
                    <div class="col-md-2 col-md-offset-5">
                      <a href="./std-fee-details-update?id=<?php echo $id;?>" class="btn btn-primary btn-sm fa fa-edit" style='color: white;'> Edit </a>
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
                              <td><?php echo  $stdFeeInfo[0]['admission_fee'] ?></td>
                            </tr>
                            <tr>
                              <th>Admission Fee Discount:</th>
                              <td><?php echo  $stdFeeInfo[0]['addmission_fee_discount'] ?></td>
                            </tr>
                            <tr>
                              <th>Net Admission Fee:</th>
                              <td><?php echo  $stdFeeInfo[0]['net_addmission_fee'] ?></td>
                            </tr>
                          </thead>
                        </table>
                      </div>
                      <div class="col-md-6">
                         <table class="table table-striped table-hover">
                          <thead>
                            <tr>
                              <th>Tuition Fee:</th>
                              <td><?php echo  $stdFeeInfo[0]['tuition_fee'] ?></td>
                            </tr>
                            <!-- <tr>
                              <th>Net Tuition Fee:</th>
                              <td><?php //echo  $stdFeeInfo[0]['net_tuition_fee'] ?></td>
                            </tr> -->
                            <tr>
                              <th>Number Of Installments:</th>
                              <td><?php echo  $stdFeeInfo[0]['no_of_installment'] ?></td>
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
</div>
</section>
</div>
</div>
