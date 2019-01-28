<?php

use yii\bootstrap\Modal;
use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */

//$this->title = 'SMART EDUCATION';
?>

<div class="site-index">
    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <?php 
              $query = (new \yii\db\Query())->from('std_personal_info');
              $id = $query->count('std_id'); ?>
              <h3><?php echo $id; ?> </h3>

              <p>Student Registrations</p>
            </div>
            <div class="icon">
              <i class="fa fa-users"></i>
            </div>
            <a href="index.php?r=std-personal-info" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <?php 
              $query = (new \yii\db\Query())->from('emp_info');
              $id = $query->count('emp_id'); ?>
              <h3><?php echo $id; ?> </h3>

              <p>Employee Registrations</p>
            </div>
            <div class="icon">
              <i class="fa fa-user-plus"></i>
            </div>
            <a href="index.php?r=emp-info" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
             <?php 
              $query = (new \yii\db\Query())->from('user');
              $id = $query->count('id'); ?>
              <h3><?php echo $id; ?> </h3>

              <p>User Registrations</p>
            </div>
            <div class="icon">
              <i class="fa fa-user"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>65</h3>

              <p>Unique Visitors</p>
            </div>
            <div class="icon">
              <i class="glyphicon glyphicon-eye-open" style="font-size: 70px;"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->

      <!-- Message of the day start -->
      <div class="row">
        <div class="col-md-12 col-sm-6 col-xs-12">
          <div class="info-box bg-navy callout-warning">
            <span class="info-box-icon"><i class="fa fa-comments-o"></i></span>

            <div class="info-box-content">
              <h4 style="float: left;">Message of the day!</h4>  
              <h4 style="float:right"><?php echo date('D d-M-Y');?></h4>
              <br><br>
              <div class="progress">
                <div class="progress-bar" style="width: 100%"></div>
              </div>
                <span class="progress-description">
                  <?php 
                    $message = Yii::$app->db->createCommand("SELECT msg_details FROM msg_of_day")->queryAll();
                    $msg = $message[0]['msg_details'];
                  ?>
                    <marquee onmouseover="this.stop();" onmouseout="this.start();">
                      <?php echo $msg; ?>
                    </marquee>
                </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
      </div>
      <!-- Message of the day close -->
      
      <!-- Notice Row Start -->
      <div class="row">
        <!-- Notice Panel Start -->
        <div class="col-md-6">
          <!-- Custom Tabs (Pulled to the right) -->
          <div class="nav-tabs-custom" style="height: 250px">
            <ul class="nav nav-tabs pull-right">
              <li>
                <a href="#parents" data-toggle="tab">
                  <i class="fa fa-user-o" style="color: #30BBBB;"></i>
                   Parents
                </a>
              </li>
              <li>
                <a href="#employees" data-toggle="tab">
                  <i class="fa fa-user" style="color: #F39C12;"></i>
                  Employees
                </a>
              </li>
              <li class="active">
                <a href="#student" data-toggle="tab">
                  <i class="fa fa-users" style="color: #00A65A;"></i>
                  Students
                </a>
              </li>
              <!-- <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                  Dropdown <span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                  <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Action</a></li>
                  <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Another action</a></li>
                  <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Something else here</a></li>
                  <li role="presentation" class="divider"></li>
                  <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Separated link</a></li>
                </ul>
              </li> -->
              <li class="pull-left header"><i class="fa fa-inbox" style="color: #3C8DBC;"></i><span style="color: #3C8DBC;">Notice Board</span></li>
            </ul>
            <?php 

            ?>
            <!-- tab-content start -->
            <div class="tab-content">
              <!-- student tab start -->
              <div class="tab-pane active" id="student">
                <div class="alert bg-success text-success">
                  <div class="row">
                    <div class="col-md-2">
                      <span class="label label-success" style="padding: 3px;">
                        <i class="fa fa-calendar"></i>
                        <?php echo date('D d-M-Y'); ?>
                      </span>
                    </div>
                    <div class="col-md-10">
                      <h4 style="margin: 0px 20px">
                        <button class="btn btn-xs btn-link" value="index.php?r=events/view-event-popup" id="modalButton" data-toggle="tooltip" title="Click me for event details!">
                          <span>
                            <h4 style="color: #00A65A;">Final Term Exams</h4>
                          </span>   
                        </button>
                      </h4>
                    </div>
                  </div>
                  <div class="row">  
                    <div class="col-md-12">
                      <span>Exams Description Exams Description Exams Description</span>
                    </div>
                  </div>
                </div>

                <div class="alert bg-success text-success">
                  <div class="row">  
                    <div class="col-md-12">
                      <i class="fa fa-warning"></i> 
                      No record found. 
                    </div>
                  </div>
                </div>
              </div>
              <!-- students tab close -->
              <!-- ***************** -->
              <!-- employees tab start -->
              <div class="tab-pane" id="employees">
                <div class="alert bg-warning text-warning">
                  <div class="row">
                    <div class="col-md-2">
                      <span class="label label-warning" style="padding: 3px;">
                        <i class="fa fa-calendar"></i>
                        <?php echo date('D d-M-Y'); ?>
                      </span>
                    </div>
                    <div class="col-md-10">
                      <h4 style="margin: 0px 20px">
                        <button class="btn btn-xs btn-link" value="index.php?r=events/view-event-popup" id="modalButton1" data-toggle="tooltip" title="Click me for event details!">
                          <span>
                            <h4 style="color: #F39C12;">Final Term Exams</h4>
                          </span>   
                        </button>
                      </h4>
                    </div>
                  </div>
                  <div class="row">  
                    <div class="col-md-12">
                      <span>Exams Description Exams Description Exams Description</span>
                    </div>
                  </div>
                </div>

                <div class="alert bg-warning text-warning">
                  <div class="row">  
                    <div class="col-md-12">
                      <i class="fa fa-warning"></i> 
                      No record found. 
                    </div>
                  </div>
                </div>
              </div>
              <!-- employees tab close -->
              <!-- ***************** -->
              <!-- parents tab start -->
              <!-- /.tab-pane -->
              <div class="tab-pane" id="parents">
                <div class="alert bg-info text-info">
                  <div class="row">
                    <div class="col-md-2">
                      <span class="label label-info" style="padding: 3px;">
                        <i class="fa fa-calendar"></i>
                        <?php echo date('D d-M-Y'); ?>
                      </span>
                    </div>
                    <div class="col-md-10">
                      <h4 style="margin: 3px 25px"> Final Term Exams</h4>
                    </div>
                  </div>
                  <div class="row">  
                    <div class="col-md-12">
                      <span>Exams Description Exams Description Exams Description</span>
                    </div>
                  </div>
                </div>

                <div class="alert bg-info text-info">
                  <div class="row">  
                    <div class="col-md-12">
                      <i class="fa fa-warning"></i> 
                      No record found. 
                    </div>
                  </div>
                </div>
              </div> 
              <!-- parents tab close -->
            </div>
            <!-- tab-content close -->
          </div>
          <!-- nav-tabs-custom -->
        </div>
        <!-- Notice Panel CLose -->

        <!-- Notice Panel Start -->
        <div class="col-md-6">
          <!-- Custom Tabs (Pulled to the right) -->
          <div class="nav-tabs-custom" style="height: 250px">
            <ul class="nav nav-tabs pull-right">
              <li>
                <a href="#upcoming" data-toggle="tab">
                  <i class="fa fa-recycle" style="color: #5AC594;"></i> 
                  Upcoming
                </a>
              </li>
              <li class="active">
                <a href="#today" data-toggle="tab">
                  <i class="fa fa-clock-o" style="color: #00C0EF;"></i> 
                  Today
                </a>
              </li>
              <!-- <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                  Dropdown <span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                  <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Action</a></li>
                  <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Another action</a></li>
                  <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Something else here</a></li>
                  <li role="presentation" class="divider"></li>
                  <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Separated link</a></li>
                </ul>
              </li> -->
              <li class="pull-left header"><i class="fa fa-calendar" style="color: #3C8DBC;"></i><span style="color: #3C8DBC;">Events</span></li>
            </ul>
            <!-- tab-content start -->
            <div class="tab-content">
              <!-- general tab start -->
              <div class="tab-pane active" id="today">
                <div class="alert bg-info text-info">
                  <div class="row">
                    <div class="col-md-2">
                      <span class="label label-info" style="padding: 3px;">
                        <i class="fa fa-calendar"></i>
                        <?php echo date('D d-M-Y'); ?>
                      </span>
                    </div>
                    <div class="col-md-10">
                      <h4 style="margin: 3px 25px"> Gala Night!</h4>
                    </div>
                  </div>
                  <div class="row">  
                    <div class="col-md-12">
                      <span>Gala Night Description Gala Night Description</span>
                    </div>
                  </div>
                </div>

                <div class="alert bg-info text-info">
                  <div class="row">  
                    <div class="col-md-12">
                      <i class="fa fa-warning"></i> 
                      No record found. 
                    </div>
                  </div>
                </div>
              </div>
              <!-- general tab close -->
              <!-- ***************** -->
              <!-- student tab start -->
              <div class="tab-pane" id="upcoming">
                <div class="alert bg-info text-info">
                  <div class="row">
                    <div class="col-md-2">
                      <span class="label label-info" style="padding: 3px;">
                        <i class="fa fa-calendar"></i>
                        <?php echo date('D d-M-Y'); ?>
                      </span>
                    </div>
                    <div class="col-md-10">
                      <h4 style="margin: 3px 25px"> Gala Night!</h4>
                    </div>
                  </div>
                  <div class="row">  
                    <div class="col-md-12">
                      <span>Gala Night Description Gala Night Description Gala Night Description</span>
                    </div>
                  </div>
                </div>

                <div class="alert bg-info text-info">
                  <div class="row">  
                    <div class="col-md-12">
                      <i class="fa fa-warning"></i> 
                      No record found. 
                    </div>
                  </div>
                </div>
              </div>
              <!-- students tab close -->
            </div>
            <!-- tab-content close -->
          </div>
          <!-- nav-tabs-custom -->
        </div>
        <!-- Notice Panel CLose -->
      </div>
      <!-- Notice Row CLose -->

  <!-- Calendar Start -->
  
  <!-- Calendar Close -->

    </section>
    <!-- /.content -->
</div>
<!-- Students Notice Modal Start -->
<?php Modal::begin([
  'header'=> '<i class="fa fa-eye text-success" style="float:left;margin:12px 1px;"></i><h4 style="float:left;" class="text-success"> <b>View Notice Details</b></h4>',
  "id"=>"modal",
  "footer"=>"",// always need it for jquery plugin
]);
// modal content start.....
echo "<div id='modalContent'>
  <div class='row'>
    <div class='col-md-12'>
      <table class='table table-responsive table-hover'>
        <thead>
          <tr>
            <td><b>Title</b></td>
            <td>Final Term Exams</td>
          </tr>
          <tr>
            <td><b>Description</b></td>
            <td></td>
          </tr>
          <tr>
            <td><b>Notice For</b></td>
            <td></td>
          </tr>
        </thead>
      </table>
    </div>
  </div>
</div>";
Modal::end();
// modal content close.....
?>
<!-- Students Notice Modal Close -->
<!-- *************************** -->
<!-- Employee Notice Modal Start -->
<?php Modal::begin([
  'header'=> '<i class="fa fa-eye text-primary" style="float:left;margin:12px 1px;"></i><h4 style="float:left;" class="text-primary"> View Notice Details</h4>',
  "id"=>"modal1",
  "footer"=>"",// always need it for jquery plugin
]);

echo "<div id='modalContent1'>
  <div class='row'>
    <div class='col-md-12'>
      <table class='table table-responsive table-hover'>
        <thead>
          <tr>
            <td><b>Title</b></td>
            <td>Final Term Exams</td>
          </tr>
          <tr>
            <td><b>Description</b></td>
            <td></td>
          </tr>
          <tr>
            <td><b>Notice For</b></td>
            <td></td>
          </tr>
        </thead>
      </table>
    </div>
  </div>
</div>";
Modal::end();
// modal content close.....
?>
<!-- Employees Notice Modal Close -->
<!-- **************************** -->
<!-- Parents Notice Modal Start ---->
<?php Modal::begin([
  'header'=> '<i class="fa fa-eye text-info" style="float:left;margin:12px 1px;"></i><h4 style="float:left;" class="text-info"> View Notice Details</h4>',
  "id"=>"modal1",
  "footer"=>"",// always need it for jquery plugin
]);

echo "<div id='modalContent1'>
  <div class='row'>
    <div class='col-md-12'>
      <table class='table table-responsive table-hover'>
        <thead>
          <tr>
            <td><b>Title</b></td>
            <td>Final Term Exams</td>
          </tr>
          <tr>
            <td><b>Description</b></td>
            <td></td>
          </tr>
          <tr>
            <td><b>Notice For</b></td>
            <td></td>
          </tr>
        </thead>
      </table>
    </div>
  </div>
</div>";
Modal::end();
// modal content close.....
?>
<!-- Parents Notice Modal Close -->
<!-- **************************** -->
<!-- Script for tooltip -->
<script>
  $(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
  });
</script>

<style type="text/css">
  #modalButton{
    text-decoration: none;
  }
  #modalButton1{
    text-decoration: none;
  }
</style>