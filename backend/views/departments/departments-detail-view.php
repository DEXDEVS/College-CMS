<?php 
  use yii\helpers\Html;
  use common\models\StdPersonalInfo;

  // Get `dept_id` from `departments` table
  $id = $_GET['id'];


  $deptName = Yii::$app->db->createCommand("SELECT department_name FROM departments WHERE department_id = '$id'")->queryAll();

  // Getting `dept_id and emp_id` from `emp_departments` table
  $empDept = Yii::$app->db->createCommand("SELECT emp_id FROM emp_departments WHERE dept_id = '$id'")->queryAll();
  $empCount = count($empDept);


  $empDeptName = Yii::$app->db->createCommand("SELECT emp_designation_id FROM emp_designation WHERE emp_designation = 'HOD'")->queryAll();
  $empHODId = $empDeptName[0]['emp_designation_id'];

  $empHODName = Yii::$app->db->createCommand("SELECT ei.emp_name,ei.emp_reg_no,ei.emp_designation_id FROM emp_info as ei INNER Join emp_departments as ed ON ei.emp_id = ed.emp_id WHERE ed.dept_id = '$id' AND ei.emp_designation_id = '$empHODId'")->queryAll();
 
?>
<div class="container-fluid">
	<section class="content-header">
    <h1 style="color: #3C8DBC;">

        <i class="fa fa-university"></i>  <?php echo $deptName[0]['department_name']." "." - Information"; ?>
      </h1>
    <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="index.php?r=departments">Back</a></li>
    </ol>
  </section>
    <!-- main content start  -->
	<section class="content">
    <div class="row">
      <div class="col-md-3">
        <!-- Profile Image Start -->
        <div class="box box-primary">
          <div class="box-body box-profile">
            <p class="text-muted text-center"><!-- Software Engineer --></p>
            <ul class="list-group list-group-unbordered">
              <p style="font-size: 20px; color: #3C8DBC;">
                <i class="fa fa-user" style="font-size: 20px;"></i> Department HOD
              </p>
              <h4> 
                <?php
                if (empty($empHODName[0]['emp_name'])) {
                  echo "N/A";
                } 
                else {
                 echo $empHODName[0]['emp_name'];
                } 
                ?> 
              </h4>
              <p style="font-size: 15px; color: #3C8DBC;">
               HOD  Registration
              </p>
              <h5>
                <?php 
                if (empty($empHODName[0]['emp_reg_no'])) {
                  echo "N/A";
                } 
                else {
                 echo $empHODName[0]['emp_reg_no'];
                }   ?>
              </h5>
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
            <!-- <li class="active">
              <a href="#personal" data-toggle="tab" style="color: #3C8DBC;"><i class="fa fa-user-circle"></i> Faculty Details </a>
            </li> -->
            <!-- <li>
              <a href="#refrence" data-toggle="tab" style="color: #3C8DBC;"><i class="fa fa-user"></i> Employee Refrence</a>
            </li>
            <li>
              <a href="#doc" data-toggle="tab" style="color: #3C8DBC;"><i class="fa fa-book"></i> Employee Doc</a>
            </li> -->
          </ul>
          <!-- Employee personal info Tab start -->
          <div class="tab-content" >
            <div class="active tab-pane" id="personal">
              <div class="row" style="margin-top:10px;">
                <div class="col-md-5">
                  <p style="font-size: 20px; color: #3C8DBC;"><i class="fa fa-users" style="font-size: 20px;"></i> Faculty Information</p>
                </div>
              </div>
              <!-- Employee info start -->
                <div class="row">
        <!-- /.col -->
        <div class="col-md-12">
          <table class="table table-bordered table-hover table-condensed table-striped">
            <thead>
              <tr class="label-primary">
                <th style="width: 60px; text-align: center;">Sr #</th>
                <th style="width: 200px">Registration #</th>
                <th>Employee Name</th>
                <th>Employee Designation</th>
              </tr>
            </thead>
            <tbody>
              <?php 
              $sr = 0;
             for ($i=0; $i <$empCount ; $i++) { 
               $empId = $empDept[$i]['emp_id'];
                $empInfo = Yii::$app->db->createCommand("SELECT emp_name,emp_reg_no,emp_designation_id FROM emp_info WHERE emp_id = '$empId'")->queryAll();
                $empDesignationId = $empInfo[0]['emp_designation_id'];
                $empDesignationName = Yii::$app->db->createCommand("SELECT emp_designation FROM emp_designation WHERE emp_designation_id = '$empDesignationId'")->queryAll();
                
               ?>
              <tr>
                <?php 
                  // if ($empDesignationName[0]['emp_designation'] == "HOD") {
                  //    continue;
                  //  }else {

                ?>
                <td align="center"><b><?php echo $sr+1; ?></b></td>
                <td><?php echo $empInfo[0]['emp_reg_no']; ?></td>
                <td><?php echo $empInfo[0]['emp_name']; ?></td>
                <td><?php echo $empDesignationName[0]['emp_designation']; ?></td>
                <td>
                  <a href="index.php?r=std-personal-info/view&id=<?php //echo $value['std_enroll_detail_std_id'];?>">
                    <?php //echo $value['std_enroll_detail_std_name'];?>
                  </a>
                  </td>
              </tr>
<<<<<<< HEAD
              <?php } ?>
=======
              <?php } } ?>
>>>>>>> c444b04dc178920167d1771bbf97838c34a64169
            </tbody>
          </table>
        </div>
        <!-- /.col -->
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
                  <a href="index.php?r=emp-reference/update&id=<?php //echo $id;?>" class="btn btn-primary btn-sm fa fa-edit" style='color: white;'> Edit </a>
                </div>
              </div><hr>
              <!-- Employee refrence info start -->
                <div class="row">
                  <div class="col-md-6">
                    <table class="table table-striped table-hover">
                      <thead>
                        <tr>
                          <th>Refrence Name:</th>
                          <td><?php //echo $empReference[0]['ref_name']; ?></td>
                        </tr>
                        <tr>
                          <th>Refrence Contact No:</th>
                          <td><?php //echo $empReference[0]['ref_contact_no']; ?></td>
                        </tr>
                        <tr>
                          <th>Refrence CNIC:</th>
                          <td><?php //echo $empReference[0]['ref_cnic']; ?></td>
                        </tr>
                        <tr>
                          <th>Refrence Designation:</th>
                          <td><?php //echo $empReference[0]['ref_designation']; ?></td>
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
                  <!-- <button class="btn btn-primary"><i class="fa fa-edit"></i><a href="index.php?r=emp-info/upload&id=<?php //echo $id; ?>">Add Document</a></button> -->

                  <a href="index.php?r=emp-documents/create&id=<?php// echo $id;?>" class="btn btn-success btn-sm fa fa-plus" style='color: white;'> Add Document </a>

                </div>
              </div><hr>

              <!-- Employee Document info start -->

                <div class="row">
                
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