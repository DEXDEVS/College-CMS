<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<?php 
  use yii\helpers\Html;
  use common\models\StdPersonalInfo;
  // Get `emp_id` from `emp_info` table
  $id = $_GET['id'];
  // Employee Personal Info..... 
  $empInfo = Yii::$app->db->createCommand("SELECT * FROM emp_info WHERE emp_id = '$id'")->queryAll();
  // Get `emp_designation_id` from `emp_info` table
  $empDesignationId = $empInfo[0]['emp_designation_id'];
  // Get `emp_dept_id` from `emp_info` table
  $empdept = Yii::$app->db->createCommand("SELECT dept_id FROM emp_departments WHERE emp_id = '$id'")->queryAll();
  $count = count($empdept);
  // Employee `desigantion_name` from `emp_designation` table against `$empDesignationId`
  $emp_designation = Yii::$app->db->createCommand("SELECT * FROM emp_designation WHERE emp_designation_id = '$empDesignationId'")->queryAll();
  $empDesignationName = $emp_designation[0]['emp_designation'];
  // Get `emp_type_id` from `emp_info` table
  $empTypeId = $empInfo[0]['emp_type_id'];
  // `emp_type` from `emp_type` table against `$empTypeId`
  $emp_type = Yii::$app->db->createCommand("SELECT * FROM emp_type WHERE emp_type_id = '$empTypeId'")->queryAll();
  $empType = $emp_type[0]['emp_type'];
  // Employee refrence info from `emp_refrence` table againts `emp_id`
  $empReference = Yii::$app->db->createCommand("SELECT * FROM emp_reference WHERE emp_id = '$id'")->queryAll();
  if (empty($empReference)) {
    $empReference[0]['ref_name'] = 'N/A';
    $empReference[0]['ref_contact_no'] = 'N/A';
    $empReference[0]['ref_cnic'] = 'N/A';
    $empReference[0]['ref_designation'] = 'N/A';
    $empRefID = 0;
  }
  else{
    $empRefID = $empReference[0]['emp_ref_id'];
    $empReference = $empReference;
  }
  // Employee Documents Info..... 
  $empDocs = Yii::$app->db->createCommand("SELECT emp_document_id, emp_document, emp_document_name FROM emp_documents WHERE emp_info_id = '$id' AND delete_status = 1")->queryAll();
  $countDocs = count($empDocs);
?>
<div class="container-fluid">
	<section class="content-header">
    <h1 style="color: #3C8DBC;">
        <i class="fa fa-user"></i> Employee Profile
      </h1>
    <ol class="breadcrumb">
        <li><a href="./home"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="./emp-info">Back</a></li>
    </ol>
  </section>
  <!-- main content start  -->
	<section class="content">
    <div class="row">
      <div class="col-md-3">
        <!-- Profile Image Start -->
        <div class="box box-primary">
          <div class="box-body box-profile">
            <img class="profile-user-img img-responsive img-circle" src="<?php echo $empInfo[0]['emp_photo']; ?>" alt="User profile picture" width="10%">
            <h3 class="profile-username text-center" style="color: #3C8DBC;">
              <?php echo $empInfo[0]['emp_name']; ?>
            </h3>
            <p class="text-muted text-center"><!-- Software Engineer --></p>
            <ul class="list-group list-group-unbordered">
              <b>Departments</b>
               <?php 
                for ($i=0; $i <$count ; $i++) {
                   $deptId = $empdept[$i]['dept_id'];
                   // Get `deprtment_name` from `departments` againts `emp_department_id`
                    $empDeptName = Yii::$app->db->createCommand("SELECT department_name,department_id FROM departments WHERE department_id = '$deptId'")->queryAll();
                  ?>
                <li class="list-group-item" style="height:40px">
                   <a href="./departments-view?id=<?php echo $empDeptName[0]['department_id']; ?>" class="">
                    <?php echo $empDeptName[0]['department_name']; ?>
                  </a>
                </li>
              <?php } ?> 
              <li class="list-group-item">
                <b>Designation</b> <a class="pull-right">
                  <?php echo $empDesignationName; ?>
                </a>
              </li>
              <li class="list-group-item">
                <b>Type</b> <a class="pull-right">
                  <?php echo $empType; ?>
                </a>
              </li>
              <li class="list-group-item">
                <b>Member</b> <a class="pull-right">
                  <?php echo $empInfo[0]['group_by']; ?>
                </a>
              </li>
              <li class="list-group-item">
                <b>Contact #</b> 
                <a class="pull-right">
                  <?php echo $empInfo[0]['emp_contact_no'] ?>
                </a>
              </li>
              <li class="list-group-item">
                <b>Email</b><br>
                <a class="">
                  <?php echo $empInfo[0]['emp_email'] ?>
                </a> 
              </li>
              <li class="list-group-item">
                <b>Facebook ID</b><br>
                <a class="">
                  <?php echo $empInfo[0]['emp_fb_ID'] ?>
                </a> 
              </li>
              <!-- <li class="list-group-item">
                <b>Status</b>
                <a class="pull-right"><span class="label label-success">Active</span></a>
              </li> -->
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
                <div class="col-md-7">
                  <div style="float: right;">
                    <?=Html::a(' Edit',['update','id'=>$id],['class'=>'btn btn-primary btn-sm fa fa-edit','role'=>'modal-remote']) ?>
                     <a href="./emails-create?id=<?php echo $id;?>" class="btn btn-warning btn-sm fa fa-envelope-o" style='color: white;'> Send Email </a>
                    <button type="button" class="btn btn-info btn-sm fa fa-comments" data-toggle="modal" data-target="#modal-default">Send SMS</button>
                    <div class="modal fade" id="modal-default">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title">SMS</h4>
                              </div>
                              <form method="get" action="">
                                <div class="modal-body">  
                                  <label>Reciever Name</label>
                                  <input type="hidden" name="to" value="<?php echo $empInfo[0]['emp_contact_no']; ?>" class="form-control">
                                  <input type="text" name="emp_name" value="<?php echo $empInfo[0]['emp_name']; ?>" class="form-control" readonly=""><br>
                                  <label>SMS Content</label>
                                    <textarea name="message" rows="5" class="form-control" id="message"></textarea>
                                    <p>
                                    <span><b>NOTE:</b> 160 characters = 1 SMS</span>
                                      <span id="remaining" class="pull-right">160 characters remaining </span>
                                    <span id="messages" style="text-align: center;">/ Count SMS(0)</span>
                                    <input type="hidden" value="" id="count"><br>
                                    <input type="text" value="" id="sms" style="border: none; color: green; font-weight: bold;">
                                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                                  </p>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                                  <button type="submit" name="sms" class="btn btn-primary btn-sm">Send SMS</button>
                                </div>
                              </form>
                            </div>
                            <!-- /.modal-content -->
                          </div>
                          <!-- /.modal-dialog -->
                        </div>
                  </div>
                </div>
              </div><hr>
              <!-- Employee info start -->
                <div class="row">
                  <div class="col-md-6">
                    <table class="table table-striped table-hover">
                      <thead>
                        <tr>
                          <th>Father Name:</th>
                          <td><?php echo $empInfo[0]['emp_father_name'] ?></td>
                        </tr>
                        <tr>
                          <th>Martial Status:</th>
                          <td><?php echo $empInfo[0]['emp_marital_status'] ?></td>
                        </tr>
                        <tr>
                          <th>Gender:</th>
                          <td><?php echo $empInfo[0]['emp_gender'] ?></td>
                        </tr>
                        <tr>
                          <th>
                            <?php if($empInfo[0]['emp_salary_type'] == 'Salaried') {
                                echo "Salaried: ";
                              }
                              else {
                                echo $empInfo[0]['emp_salary_type'].": ";
                              } 
                            ?>
                          </th>
                          <td><?php echo $empInfo[0]['emp_salary'] ?></td>
                        </tr>
                        <tr>
                          <th>Permanent Address:</th>
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
                          <th>CNIC:</th>
                          <td><?php echo $empInfo[0]['emp_cnic'] ?></td>
                        </tr>
                        <tr>
                          <th>Qualification:</th>
                          <td><?php echo $empInfo[0]['emp_qualification'] ?></td>
                        </tr>
                        <tr>
                          <th>Passing Year:</th>
                          <td><?php echo $empInfo[0]['emp_passing_year'] ?></td>
                        </tr>
                        <tr>
                          <th>Institute Name:</th>
                          <td><?php echo $empInfo[0]['emp_institute_name'] ?></td>
                        </tr>
                        <tr>
                          <th>Temporary Address:</th>
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
                  <a href="emp-reference-update?id=<?php echo $empRefID;?>" class="btn btn-primary btn-sm fa fa-edit" style='color: white;'> Edit </a>
                </div>
              </div><hr>
              <!-- Employee refrence info start -->
                <div class="row">
                  <div class="col-md-6">
                    <table class="table table-striped table-hover">
                      <thead>
                        <tr>
                          <th>Refrence Name:</th>
                          <td><?php echo $empReference[0]['ref_name']; ?></td>
                        </tr>
                        <tr>
                          <th>Refrence Contact No:</th>
                          <td><?php echo $empReference[0]['ref_contact_no']; ?></td>
                        </tr>
                        <tr>
                          <th>Refrence CNIC:</th>
                          <td><?php echo $empReference[0]['ref_cnic']; ?></td>
                        </tr>
                        <tr>
                          <th>Refrence Designation:</th>
                          <td><?php echo $empReference[0]['ref_designation']; ?></td>
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
                <div class="col-md-2 col-md-offset-4">
                  <a href="./emp-documents-create?id=<?php echo $id;?>" class="btn btn-success btn-sm fa fa-plus" style='color: white;'> Add Document </a>
                </div>
              </div><hr>
              <!-- Employee Document info start -->
                <div class="row">
                  
                   <!--  <div class="col-md-6">
                      <h3 style="color: #3C8DBC; text-align: center;"><?php echo $empDocs[$i]['emp_document_name'] ?></h3>
                      <img src="<?php echo $empDocs[$i]['emp_document'] ?>" class="img-responsive img-thumbnail" width="350px"="350px">
                    </div> -->
                    <div class="col-md-12">
                      <table class="table table-bordered table-responsive">
                      <tr class="label-primary">
                        <th class="text-center" style="width: 50px">Sr #</th>
                        <th>Document Name</th>
                        <th class="text-center">Document</th>
                        <th class="text-center">Action</th>
                      </tr>
                      <?php for ($i=0; $i < $countDocs ; $i++) { ?>
                      <tr>
                        <td class="text-center"><b><?php echo $i+1; ?></b></td>
                        <td><?php echo $empDocs[$i]['emp_document_name'] ?></td>
                        <td align="center"><img src="<?php echo $empDocs[$i]['emp_document'] ?>" class="img-responsive img-thumbnail" alt="Document in (.pdf/docs)" width="50px"></td>
                        <td>
                          <div class="col-lg-6 col-xs-12 col-sm-6 col-md-6 no-padding">
                            <?= Html::a('<span class = "glyphicon glyphicon-download"></span>', ['/emp-download-doc', 'emp_doc_id' => $empDocs[$i]['emp_document_id']], ['class' => 'btn-sm btn btn-block btn-flat btn-primary', 'title' => 'Download Document', 'data' => ['method' => 'post']]) ?>
                          </div>
                          <div class="col-lg-6 col-xs-12 col-sm-6 col-md-6 no-padding">
                            <?=  Html::a('<i class="fa fa-trash-o"></i>',['/emp-delete-doc', 'emp_doc_id' => $empDocs[$i]['emp_document_id']], [
                                'class' => 'btn-sm btn btn-danger btn-block btn-flat',
                                'title' => 'Delete Document',
                                'data' => [
                                  'confirm' => ('Are you sure you want to delete this item?'),
                                  'method' => 'post',
                                ],
                            ])  ?>
                          </div>
                        </td>
                      </tr>
                      <?php } ?>
                    </table>
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

<?php 
  if (isset($_GET['sms'])) {
    $to = $_GET['to'];
    $message = $_GET['message'];
    // sms ....
    $type = "xml";
    $id = "Brookfieldclg";
    $pass = "college42";
    $lang = "English";
    $mask = "Brookfield";
    // Data for text message
    $message = urlencode($message);
    // Prepare data for POST request
    $data = "id=".$id."&pass=".$pass."&msg=".$message."&to=".$to."&lang=".$lang."&mask=".$mask."&type=".$type;
    // Send the POST request with cURL
    $ch = curl_init('http://www.sms4connect.com/api/sendsms.php/sendsms/url');
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $result = curl_exec($ch); //This is the result from SMS4CONNECT
    curl_close($ch);
    
    if ($result) {
        Yii::$app->session->setFlash('success', "SMS sent successfully...");
    }
  }
?>
<script>
// textarea sms counter....
$(document).ready(function(){
    var $remaining = $('#remaining'),
    $messages = $remaining.next();
    var numbers = '<?php //echo $countNumbers; ?>';
    $('#message').keyup(function(){
        var chars = this.value.length,
        messages = Math.ceil(chars / 160),
        remaining = messages * 160 - (chars % (messages * 160) || messages * 160);
        $messages.text('/ Count SMS (' + messages + ')');
        $messages.css('color', 'red');
        $remaining.text(remaining + ' characters remaining');
      
        $('#count').val(messages);
      var countSMS = $('#count').val();
        //var sms = parseInt(countSMS * numbers);
        $('#sms').val("Your Consumed SMS: (" + countSMS+ ")");
    });
});
</script>