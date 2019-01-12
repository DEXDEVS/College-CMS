  <!DOCTYPE html>
  <html lang="en">
  <head>
  	<meta charset="UTF-8">
  	<title>Student Details</title>
  </head>
  <body>

  <div class="container-fluid">
  	<section class="content-header">
        	<h1>
          	<i class="fa fa-user"></i> Student Profile
        	</h1>
  	    <ol class="breadcrumb">
  	        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
  	        <li><a href="index.php?r=std-personal-info">Back</a></li>
  	    </ol>
      </section>

      <!--  -->
  	<section class="content">

        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="box box-primary">
              <div class="box-body box-profile">
                <img class="profile-user-img img-responsive img-circle" src="images/anas.jpg" alt="User profile picture">

                <h3 class="profile-username text-center">Anas Shafqat</h3>

                <p class="text-muted text-center"><!-- Software Engineer --></p>

                <ul class="list-group list-group-unbordered">
                  <li class="list-group-item">
                    <b>Roll #</b> <a class="pull-right">025</a>
                  </li>
                  <li class="list-group-item">
                    <b>Class</b> <a class="pull-right">BSCS</a>
                  </li>
                  <li class="list-group-item">
                    <b>Section</b> <a class="pull-right">One</a>
                  </li>
                  <li class="list-group-item">
                    <b>Email</b> <a class="pull-right">nauman@gmail.com</a>
                  </li>
                  <li class="list-group-item">
                    <b>Contact</b> <a class="pull-right">0333-7486807</a>
                  </li>
                  <li class="list-group-item">
                    <b>Status</b> <a class="pull-right"><span class="label label-success">Active</span></a>
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
                <li class="active"><a href="#personal" data-toggle="tab"><i class="fa fa-user-circle"></i> Personal Info</a></li>
                <li><a href="#guardian" data-toggle="tab"><i class="fa fa-user"></i> Guardian Info</a></li>
                <li><a href="#ice" data-toggle="tab"><i class="fa fa-user-o"></i> ICE Info</a></li>
                <li><a href="#academic" data-toggle="tab"><i class="fa fa-book"></i> Academic Info</a></li>
                <li><a href="#fee" data-toggle="tab"><i class="fa fa-money"></i> Fee Details</a></li>
              </ul>
              <!-- student personal info Tab start -->
              <div class="tab-content">
                <div class="active tab-pane" id="personal">
                  <div class="row">
                    <div class="col-md-5">
                      <p style="font-size: 20px;"><i class="fa fa-info-circle" style="font-size: 20px;"></i> Personal Information</p>
                    </div>
                    <div class="col-md-2 col-md-offset-5">
                      <button class="btn btn-primary"><i class="fa fa-edit"></i> Edit</button>
                    </div>
                  </div><hr>

                  <!-- student info start -->

                    <div class="row">
                      <div class="col-md-6">
                        <table class="table table-striped table-hover">
                          <thead>
                            <tr>
                              <th>Student ID:</th>
                              <td>1</td>
                            </tr>
                            <tr>
                              <th>Student Name:</th>
                              <td>1</td>
                            </tr>
                            <tr>
                              <th>Student Father Name:</th>
                              <td>1</td>
                            </tr>
                            <tr>
                              <th>Student Gender:</th>
                              <td>1</td>
                            </tr>
                            <tr>
                              <th>Student Date of Birth:</th>
                              <td>1</td>
                            </tr>
                            <tr>
                              <th>Student Temporary Address:</th>
                            </tr>
                            <tr>
                              <td>RYK</td>
                            </tr>
                          </thead>
                        </table>
                      </div>
                      <div class="col-md-6">
                          <table class="table table-stripped">
                          <thead>
                            <tr>
                              <th>Student CNIC:</th>
                              <td>31306789214557</td>
                            </tr>
                            <tr>
                              <th>Student District:</th>
                              <td>1</td>
                            </tr>
                            <tr>
                              <th>Student Tehseel:</th>
                              <td>1</td>
                            </tr>
                            <tr>
                              <th>Student Religion:</th>
                              <td>1</td>
                            </tr>
                            <tr>
                              <th>Student Nationality:</th>
                              <td>1</td>
                            </tr>
                            <tr>
                              <th>Student Temporary Address:</th>
                            </tr>
                            <tr>
                              <td>RYK</td>
                            </tr>
                          </thead>
                        </table>
                      </div>
                    </div>

                  <!-- student info close -->

                </div>
                <!-- student personal info Tab close -->


                <!-- Guardian tab start here -->

                <div class="tab-pane" id="guardian">
                 <div class="row">
                    <div class="col-md-5">
                      <p style="font-size: 20px;"><i class="fa fa-info-circle" style="font-size: 20px;"></i> Guardian Information</p>
                    </div>
                    <div class="col-md-2 col-md-offset-5">
                      <button class="btn btn-primary"><i class="fa fa-edit"></i> Edit</button>
                    </div>
                  </div><hr>

                  <!-- guardian info start -->

                    <div class="row">
                      <div class="col-md-6">
                        <table class="table table-striped table-hover">
                          <thead>
                            <tr>
                              <th>Guardian Name:</th>
                              <td>Nauman</td>
                            </tr>
                            <tr>
                              <th>Guardian Relation:</th>
                              <td>1</td>
                            </tr>
                            <tr>
                              <th>Guardian CNIC:</th>
                              <td>1</td>
                            </tr>
                            <tr>
                              <th>Gurdian Email:</th>
                              <td>1</td>
                            </tr>
                            <tr>
                              <th>Guardian Monthly Income:</th>
                              <td>1</td>
                            </tr>
                          </thead>
                        </table>
                      </div>
                      <div class="col-md-6">
                          <table class="table table-stripped">
                          <thead>
                            <tr>
                              <th>Guardian Contact No. 1:</th>
                              <td>1</td>
                            </tr>
                            <tr>
                              <th>Guardian Contact No. 2:</th>
                              <td>1</td>
                            </tr>
                            <tr>
                              <th>Guardian Occupation:</th>
                              <td>1</td>
                            </tr>
                             <tr>
                              <th>Guardian Designation:</th>
                              <td>1</td>
                            </tr>
                          </thead>
                        </table>
                      </div>
                    </div>
                  <!-- guardian info close -->
                </div>
                
                <!-- Guardian tab close here -->


                <!-- ICE tab start here -->

                <div class="tab-pane" id="ice">
                 <div class="row">
                    <div class="col-md-5">
                      <p style="font-size: 20px;"><i class="fa fa-info-circle" style="font-size: 20px;"></i> ICE Information</p>
                    </div>
                    <div class="col-md-2 col-md-offset-5">
                      <button class="btn btn-primary"><i class="fa fa-edit"></i> Edit</button>
                    </div>
                  </div><hr>

                  <!-- ICE info start -->

                    <div class="row">
                      <div class="col-md-6">
                        <table class="table table-striped table-hover">
                          <thead>
                            <tr>
                              <th>ICE Name:</th>
                              <td>Nauman</td>
                            </tr>
                            <tr>
                              <th>ICE Relation:</th>
                              <td>1</td>
                            </tr>
                            <tr>
                              <th>ICE Contact No:</th>
                              <td>1</td>
                            </tr>
                          </thead>
                        </table>
                      </div>
                      <div class="col-md-6">
                          
                      </div>
                    </div>
                  <!-- ICE info close -->
                </div>
                
                <!-- ICE tab close here -->


                 <!-- Academic tab start here -->

                <div class="tab-pane" id="academic">
                 <div class="row">
                    <div class="col-md-5">
                      <p style="font-size: 20px;"><i class="fa fa-info-circle" style="font-size: 20px;"></i> Academic Information</p>
                    </div>
                    <div class="col-md-2 col-md-offset-5">
                      <button class="btn btn-primary"><i class="fa fa-edit"></i> Edit</button>
                    </div>
                  </div><hr>

                  <!-- Academic info start -->

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
                  <!-- Academic info close -->
                </div>
                
                <!-- Academic tab close here -->

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
  	
  </div>	

  </body>
  </html>