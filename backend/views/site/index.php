<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<?php
use yii\bootstrap\Modal;
use yii\helpers\Html;
use yii\helpers\Url;
use common\models\Notice;
//use yii\web\CClientScript;
/* @var $this yii\web\View */
//$this->title = 'SMART EDUCATION';
?>

<div class="site-index">
    <!-- Main content -->
    <section class="content">
      <!-- Message of the day start -->
      <div class="row">
        <div class="col-md-12 col-sm-6 col-xs-12">
          <div class="info-box bg-navy callout-warning">
            <span class="info-box-icon"><i class="fa fa-comments-o"></i></span>
            <div class="info-box-content">
              <h4 style="float: left;">Message of the day!</h4>  
              <h4 style="float:right">
                <span id="hr"></span>
                <span id="min"></span>
                <span id="sec"></span> -
                <?php echo date('l d-M-Y');?> 
              </h4>
              
              <br><br>
              <div class="progress">
                <div class="progress-bar" style="width: 100%"></div>
              </div>
                <span class="progress-description">
                    <marquee onmouseover="this.stop();" onmouseout="this.start();">
                      <?php 
                        $message = Yii::$app->db->createCommand("SELECT msg_details FROM msg_of_day")->queryAll();
                        $date = 2;
                        $msg = $message[$date]['msg_details'];
                        echo $msg;
                      ?>
                    </marquee>
                </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
      </div>
      <!-- Message of the day close -->
      <!-- Small boxes (Stat box) -->
      <?php 
        $user = Yii::$app->user->identity->user_type;
        if($user == 'Registrar' OR $user == 'Admin' OR $user == 'Vice Principal' OR $user == 'Principal' OR $user == 'dexdevs') { ?>
          <div class="row">
          <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-aqua">
              <div class="inner">
                <?php 
                $query = (new \yii\db\Query())->from('std_inquiry');
                $countTotal = $query->count('std_inquiry_id'); ?>
                <h3><?php echo $countTotal; ?> </h3>
                <p>Total Students Inquiries</p>
              </div>
              <div class="icon">
                <i class="fa fa-users"></i>
              </div>
              <a href="./std-inquiry" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-yellow">
              <div class="inner">
                <?php 
                  $query = (new \yii\db\Query())->from('std_inquiry')->where(['gender'=>'Male']);
                  $countMale = $query->count('std_inquiry_id');
                ?>
                <h3><?php echo $countMale; ?> </h3>
                <p>Total Male Student Inquiries</p>
              </div>
              <div class="icon">
                <i class="fa fa-male"></i>
              </div>
              <a href="./std-inquiry" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-red">
              <div class="inner">
               <?php 
                  $query = (new \yii\db\Query())->from('std_inquiry')->where(['gender'=>'Female']);
                  $countFemale = $query->count('std_inquiry_id'); 
                ?>
                <h3><?php echo $countFemale; ?> </h3>
                <p>Total Female Student Inquiries</p>
              </div>
              <div class="icon">
                <i class="fa fa-female"></i>
              </div>
              <a href="./std-inquiry" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-green">
              <div class="inner">
               <?php 
                  $query = (new \yii\db\Query())->from('std_inquiry')->where(['inquiry_status'=>'Registered']);
                  $countRegistered = $query->count('std_inquiry_id'); 
                ?>
                <h3><?php echo $countRegistered; ?> </h3>
                <p>Total Registered Inquiries</p>
              </div>
              <div class="icon">
                <i class="fa fa-registered"></i>
              </div>
              <a href="./std-inquiry" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
      <?php } 
        else { ?>
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
              <a href="./std-personal-info" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
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
              <a href="./emp-info" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
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

  <?php } ?>
      
      <!-- /.row --> 
      
      <!-- Notice Row Start -->
      <div class="row">
        <!-- Notice Panel Start -->
        <div class="col-md-6">
          <!-- Custom Tabs (Pulled to the right) -->
          <div class="nav-tabs-custom">
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
              <li class="pull-left header"><i class="fa fa-inbox" style="color: #3C8DBC;"></i><span style="color: #3C8DBC;">Notice Board</span></li>
            </ul>
            <?php 
            $date = date('Y-m-d');
            $studentNotice = Yii::$app->db->createCommand("SELECT * FROM notice WHERE notice_user_type = 'Students' AND is_status ='Active' AND CAST(notice_start AS DATE) <= '$date' AND CAST(notice_end AS DATE) >= '$date'")->queryAll();
            ?>
            <!-- tab-content start -->
            <div class="tab-content">
              <!-- student tab start -->
              <div class="tab-pane active" id="student">
                <?php if(!empty($studentNotice)) { 
                        $stdNoticeCount = count($studentNotice);
                         for ($i=0; $i < $stdNoticeCount; $i++) { 
                  ?>
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
                              <button class="btn btn-xs btn-link" value="index.php?r=events/view-event-popup" id="modalStudents" data-toggle="tooltip" title="Click me for event details!">
                                <span>
                                  <h4 style="color: #00A65A;">
                                    <?php echo $studentNotice[$i]['notice_title']; ?>
                                  </h4>
                                </span>   
                              </button>
                            </h4>
                          </div>
                        </div>
                        <div class="row">  
                          <div class="col-md-12">
                            <span><?php echo $studentNotice[$i]['notice_description']; ?></span>
                          </div>
                        </div>
                      </div>
                    <?php
                      //end of for loop
                      } 
                    // end of if
                    }
                      else {
                        $stdNotice = Yii::$app->db->createCommand("SELECT * FROM notice WHERE notice_user_type = 'Students' AND is_status ='Active' AND CAST(notice_end AS DATE) < '$date'")->queryAll();

                        foreach ($stdNotice as $key => $value) {
                          $stdNoticeId = $value['notice_id'];
                          $stdNotice = Yii::$app->db->createCommand("UPDATE notice SET is_status = 'Inactive' WHERE notice_id = '$stdNoticeId'")->execute();
                        } 
                    ?>  
                    <div class="alert bg-success text-success">
                      <div class="row">  
                        <div class="col-md-12">
                          <i class="fa fa-warning"></i> 
                          No notice for today! 
                        </div>
                      </div>
                     </div>
                    <?php  // end of else
                      } 
                    ?>
              </div>
              <!-- students tab close -->
              <!-- ***************** -->
              <!-- employees tab start -->
              <?php 
              $date = date('Y-m-d');
              $employeeNotice = Yii::$app->db->createCommand("SELECT * FROM notice WHERE notice_user_type = 'Employees' AND is_status ='Active' AND CAST(notice_start AS DATE) <= '$date' AND CAST(notice_end AS DATE) >= '$date'")->queryAll();
              ?>
              <div class="tab-pane" id="employees">
                <?php if(!empty($employeeNotice)) { 
                        $empNoticeCount = count($employeeNotice);
                          for ($i=0; $i < $empNoticeCount; $i++) {
                  ?>
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
                        <button class="btn btn-xs btn-link" value="index.php?r=events/view-event-popup" id="modalEmployees" data-toggle="tooltip" title="Click me for event details!">
                          <span>
                            <h4 style="color: #F39C12;">
                              <?php echo $employeeNotice[$i]['notice_title']; ?>
                            </h4>
                          </span>   
                        </button>
                      </h4>
                    </div>
                  </div>
                  <div class="row">  
                    <div class="col-md-12">
                      <span><?php echo $employeeNotice[$i]['notice_description']; ?></span>
                    </div>
                  </div>
                </div>
                <?php 
              }
              //end of for loop
                  }
                  // end of if....
                  else {
                    $empNotice = Yii::$app->db->createCommand("SELECT * FROM notice WHERE notice_user_type = 'Employees' AND is_status ='Active' AND CAST(notice_end AS DATE) < '$date'")->queryAll();

                        foreach ($empNotice as $key => $value) {
                          $empNoticeId = $value['notice_id'];
                          var_dump($empNoticeId);
                          $empNotice = Yii::$app->db->createCommand("UPDATE notice SET is_status = 'Inactive' WHERE notice_id = '$empNoticeId'")->execute();
                        } 
                ?>
                <div class="alert bg-warning text-warning">
                  <div class="row">  
                    <div class="col-md-12">
                      <i class="fa fa-warning"></i> 
                      No notice for today! 
                    </div>
                  </div>
                </div>
                <?php 
                  }
                  // end of else
                ?>
              </div>
              <!-- employees tab close -->
              <!-- ***************** -->
              <!-- parents tab start -->
              <!-- /.tab-pane -->
              <?php 
                $date = date('Y-m-d');
                $parentNotice = Yii::$app->db->createCommand("SELECT * FROM notice WHERE notice_user_type = 'Parents' AND is_status ='Active' AND CAST(notice_start AS DATE) <= '$date' AND CAST(notice_end AS DATE) >= '$date'")->queryAll();
              
              ?> 
              <div class="tab-pane" id="parents">
              <?php if(!empty($parentNotice)) { 
                      $parentNoticeCount = count($parentNotice);
                        for ($i=0; $i < $parentNoticeCount; $i++) {
                ?>  
                <div class="alert bg-info text-info">
                  <div class="row">
                    <div class="col-md-2">
                      <span class="label label-info" style="padding: 3px;">
                        <i class="fa fa-calendar"></i>
                        <?php echo date('D d-M-Y'); ?>
                      </span>
                    </div>
                    <div class="col-md-10">
                        <h4 style="margin: 0px 20px">
                        <button class="btn btn-xs btn-link" value="index.php?r=events/view-event-popup" id="modalParents" data-toggle="tooltip" title="Click me for event details!">
                          <span>
                            <h4 style="color: #00C0EF;">
                              <?php echo $parentNotice[$i]['notice_title']; ?>
                            </h4>
                          </span>   
                        </button>
                        </h4>
                    </div>
                  </div>
                  <div class="row">  
                    <div class="col-md-12">
                      <span><?php echo $parentNotice[$i]['notice_description']; ?></span>
                    </div>
                  </div>
                </div>
                <?php 
              }
              //end of for loop
                    }
                  // ending of if...
                  else {
                    $prntNotice = Yii::$app->db->createCommand("SELECT * FROM notice WHERE notice_user_type = 'Parents' AND is_status ='Active' AND CAST(notice_end AS DATE) < '$date'")->queryAll();

                        foreach ($prntNotice as $key => $value) {
                          $prntNoticeId = $value['notice_id'];
                          var_dump($prntNoticeId);
                          $prntNotice = Yii::$app->db->createCommand("UPDATE notice SET is_status = 'Inactive' WHERE notice_id = '$prntNoticeId'")->execute();
                        }
                ?>
                <div class="alert bg-info text-info">
                  <div class="row">  
                    <div class="col-md-12">
                      <i class="fa fa-warning"></i> 
                      No notice for today! 
                    </div>
                  </div>
                </div>
                <?php 
                  }
                  // ending of else... 
                ?>
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
          <div class="nav-tabs-custom">
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
              <li class="pull-left header"><i class="fa fa-calendar" style="color: #3C8DBC;"></i><span style="color: #3C8DBC;">Events</span></li>
            </ul>
            <!-- tab-content start -->
            <div class="tab-content">
              <!-- general tab start -->
              <?php 
                $date = date('Y-m-d');
                $todayEvent = Yii::$app->db->createCommand("SELECT * FROM events WHERE is_status ='Active' AND CAST(event_start_datetime AS DATE) = '$date'")->queryAll();
              ?> 
              <div class="tab-pane active" id="today">
              <?php if(!empty($todayEvent)) { 
                      $todayEventCount = count($todayEvent);
                        for ($i=0; $i < $todayEventCount; $i++) {
                ?> 
                <div class="alert bg-info text-info">
                  <div class="row">
                    <div class="col-md-2">
                      <span class="label label-info" style="padding: 3px;">
                        <i class="fa fa-calendar"></i>
                        <?php echo date('D d-M-Y'); ?>
                      </span>
                    </div>
                    <div class="col-md-10">
                      <h4 style="margin: 0px 20px">
                        <button class="btn btn-xs btn-link" value="index.php?r=events/view-event-popup" id="modalTodays" data-toggle="tooltip" title="Click me for event details!">
                          <span>
                            <h4 style="color: #00C0EF;">
                              <?php echo $todayEvent[$i]['event_title']; ?>
                            </h4>
                          </span>   
                        </button>
                      </h4>
                    </div>
                  </div>
                  <div class="row">  
                    <div class="col-md-12">
                      <span><?php echo $todayEvent[$i]['event_detail']; ?></span>
                    </div>
                  </div>
                </div>
                <?php 
              }
              // end of for loop
                  }
                  // ending of if...
                  else {
                    $todayEve = Yii::$app->db->createCommand("SELECT * FROM events WHERE is_status ='Active' AND CAST(event_start_datetime AS DATE) < '$date'")->queryAll();

                        foreach ($todayEve as $key => $value) {
                          $todayEveId = $value['event_id'];
                          var_dump($todayEveId);
                           $todayEve = Yii::$app->db->createCommand("UPDATE events SET is_status = 'Inactive' WHERE event_id = '$todayEveId'")->execute();
                        }
                ?>
                <div class="alert bg-info text-info">
                  <div class="row">  
                    <div class="col-md-12">
                      <i class="fa fa-warning"></i> 
                      No event for today! 
                    </div>
                  </div>
                </div>
                <?php 
                  }
                  // ending of else...
                ?>
              </div>
              <!-- general tab close -->
              <!-- ***************** -->
              <!-- student tab start -->
              <?php 
                $date = date('Y-m-d');
                $upcomingEvent = Yii::$app->db->createCommand("SELECT * FROM events WHERE is_status ='Active' AND CAST(event_end_datetime AS DATE) > '$date'")->queryAll();
              ?> 
              <div class="tab-pane" id="upcoming">
              <?php if(!empty($upcomingEvent)) { 
                      $upcomingEventCount = count($upcomingEvent);
                        for ($i=0; $i < $upcomingEventCount; $i++) {

                ?> 
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
                        <button class="btn btn-xs btn-link" value="index.php?r=events/view-event-popup" id="modalUpcomings" data-toggle="tooltip" title="Click me for event details!">
                          <span>
                            <h4 style="color: #00A65A;">
                              <?php echo $upcomingEvent[$i]['event_title']; ?>
                            </h4>
                          </span>   
                        </button>
                      </h4>
                    </div>
                  </div>
                  <div class="row">  
                    <div class="col-md-12">
                      <span><?php echo $upcomingEvent[$i]['event_detail']; ?></span>
                    </div>
                  </div>
                </div>
                <?php 
              }
              //end of for loop 
                  }
                  // ending of if...
                  else {
                    $upcomingEve = Yii::$app->db->createCommand("SELECT * FROM events WHERE is_status ='Active' AND CAST(event_end_datetime AS DATE) < '$date'")->queryAll();

                        foreach ($upcomingEve as $key => $value) {
                          $upcomingEveId = $value['event_id'];
                          $upcomingEve = Yii::$app->db->createCommand("UPDATE events SET is_status = 'Inactive' WHERE event_id = '$upcomingEveId'")->execute();
                         }
                ?>
                <div class="alert bg-success text-success">
                  <div class="row">  
                    <div class="col-md-12">
                      <i class="fa fa-warning"></i> 
                      No event for today! 
                    </div>
                  </div>
                </div>
                <?php 
                  }
                  // ending of else...
                ?>
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
  <!-- <div class="row container-fluid">
    <div class="col-md-8 bg-success bg-info well-info" style="color: #001F3F;">
      <?= \yii2fullcalendar\yii2fullcalendar::widget(array(
           // 'events'=> $events,
        ));
      ?>
    </div>
  </div> -->
  <!-- Calendar Close -->

    </section>
    <!-- /.content -->
</div>
<!-- Students Notice Modal Start -->
<?php Modal::begin([
  'header'=> '<i class="fa fa-eye text-success" style="float:left;margin:12px 1px;"></i><h4 style="float:left;" class="text-success"> <b>View Notice Details</b></h4>',
  "id"=>"modalStudent",
  "footer"=>"",// always need it for jquery plugin
]);

// modal content start.....
?>
<?php if(!empty($studentNotice)) { ?>
<div id='studentContent'>
  <div class='row'>
    <div class='col-md-12'>
      <table class='table table-responsive table-hover'>
        <thead>
          <tr>
            <td><b>Title</b></td>
            <td><?php echo $studentNotice[0]['notice_title']; ?></td>
          </tr>
          <tr>
            <td><b>Description</b></td>
            <td><?php echo $studentNotice[0]['notice_description']; ?></td>
          </tr>
          <tr>
            <td><b>Notice For</b></td>
            <td><?php echo $studentNotice[0]['notice_user_type']; ?></td>
          </tr>
        </thead>
      </table>
    </div>
  </div>
</div>
<?php
}
Modal::end();
// modal content close.....
?>
<!-- Students Notice Modal Close -->
<!-- *************************** -->
<!-- Employee Notice Modal Start -->
<?php Modal::begin([
  'header'=> '<i class="fa fa-eye text-warning" style="float:left;margin:12px 1px;"></i><h4 style="float:left;" class="text-warning"> <b>View Notice Details</b></h4>',
  "id"=>"modalEmployee",
  "footer"=>"",// always need it for jquery plugin
]);
?>
<?php if(!empty($employeeNotice)) { ?>
<div id='employeeContent'>
  <div class='row'>
    <div class='col-md-12'>
      <table class='table table-responsive table-hover'>
        <thead>
          <tr>
            <td><b>Title</b></td>
            <td><?php echo $employeeNotice[0]['notice_title']; ?></td>
          </tr>
          <tr>
            <td><b>Description</b></td>
            <td><?php echo $employeeNotice[0]['notice_description']; ?></td>
          </tr>
          <tr>
            <td><b>Notice For</b></td>
            <td><?php echo $employeeNotice[0]['notice_user_type']; ?></td>
          </tr>
        </thead>
      </table>
    </div>
  </div>
</div>
<?php 
}
Modal::end();
// modal content close.....
?>
<!-- Employees Notice Modal Close -->
<!-- **************************** -->
<!-- Parents Notice Modal Start ---->
<?php Modal::begin([
  'header'=> '<i class="fa fa-eye text-info" style="float:left;margin:12px 1px; color: #00C0EF;"></i><h4 style="float:left; color: #00C0EF;" class="text-info"> <b>View Notice Details</b></h4>',
  "id"=>"modalParent",
  "footer"=>"",// always need it for jquery plugin
]);
?>
<?php if(!empty($parentNotice)) { ?>
<div id='parentContent'>
  <div class='row'>
    <div class='col-md-12'>
      <table class='table table-responsive table-hover'>
        <tbody>
          <tr>
            <td><b>Title</b></td>
            <td><?php echo $parentNotice[0]['notice_title']; ?></td>
          </tr>
          <tr>
            <td><b>Description</b></td>
            <td><?php echo $parentNotice[0]['notice_description']; ?></td>
          </tr>
          <tr>
            <td><b>Notice For</b></td>
            <td><?php echo $parentNotice[0]['notice_user_type']; ?></td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>
<?php
}
Modal::end();
?>
<!-- Parents Notice Modal Close -->
<!-- **************************** -->
<!-- Todays Notice Modal Start ---->
<?php Modal::begin([
  'header'=> '<i class="fa fa-eye text-info" style="float:left;margin:12px 1px; color: #00C0EF;"></i><h4 style="float:left; color: #00C0EF;" class="text-info"> <b>View Notice Details</b></h4>',
  "id"=>"modalToday",
  "footer"=>"",// always need it for jquery plugin
]);
?>
<?php if(!empty($todayEvent)) { ?>
<div id='todayContent'>
  <div class='row'>
    <div class='col-md-12'>
      <table class='table table-responsive table-hover'>
        <tbody>
          <tr>
            <td><b>Title</b></td>
            <td><?php echo $todayEvent[0]['event_title']; ?></td>
          </tr>
          <tr>
            <td><b>Description</b></td>
            <td><?php echo $todayEvent[0]['event_detail']; ?></td>
          </tr>
          <tr>
            <td><b>Start Date Time</b></td>
            <td><?php echo $todayEvent[0]['event_start_datetime']; ?></td>
          </tr>
          <tr>
            <td><b>End Date Time</b></td>
            <td><?php echo $todayEvent[0]['event_end_datetime']; ?></td>
          </tr>
          <tr>
            <td><b>Event Venue</b></td>
            <td><?php echo $upcomingEvent[0]['event_venue']; ?></td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>
<?php
}
Modal::end();
?>
<!-- Todays Notice Modal Close -->
<!-- ************************* -->
<!-- Upcomings Notice Modal Start ---->
<?php Modal::begin([
  'header'=> '<i class="fa fa-eye text-success" style="float:left;margin:12px 1px;"></i><h4 style="float:left;" class="text-success"> <b>View Notice Details</b></h4>',
  "id"=>"modalUpcoming",
  "footer"=>"",// always need it for jquery plugin
]);
?>
<?php if(!empty($upcomingEvent)) { ?>
<div id='todayContent'>
  <div class='row'>
    <div class='col-md-12'>
      <table class='table table-responsive table-hover'>
        <tbody>
          <tr>
            <td><b>Title</b></td>
            <td><?php echo $upcomingEvent[0]['event_title']; ?></td>
          </tr>
          <tr>
            <td><b>Description</b></td>
            <td><?php echo $upcomingEvent[0]['event_detail']; ?></td>
          </tr>
          <tr>
            <td><b>Event Start Datetime</b></td>
            <td><?php echo $upcomingEvent[0]['event_start_datetime']; ?></td>
          </tr>
          <tr>
            <td><b>Event End Datetime</b></td>
            <td><?php echo $upcomingEvent[0]['event_end_datetime']; ?></td>
          </tr>
          <tr>
            <td><b>Event Venue</b></td>
            <td><?php echo $upcomingEvent[0]['event_venue']; ?></td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>
<?php
}
Modal::end();
?>
<!-- Upcomings Notice Modal Close -->
<!-- Script for tooltip -->
<script>
  $(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
  });
</script>

<style type="text/css">
  #modalStudents{
    text-decoration: none;
  }
  #modalEmployees{
    text-decoration: none;
  }
  #modalParents{
    text-decoration: none;
  }
  #modalTodays{
    text-decoration: none;
  }
  #modalUpcomings{
    text-decoration: none;
  }
</style>

<script type="text/javascript">
  function clock() {
      const fullDate = new Date();
      let hours = fullDate.getHours();
      let mins = fullDate.getMinutes();
      let secs = fullDate.getSeconds();
      if (hours>12) {
        var am = "PM"
        hours=hours-12;
      }
      else{
        var am = "AM";
      }
      if (hours < 10) {
          hours = "0" + hours;
      }
      if (mins < 10) {
          mins = "0" + mins;
      }
      if (secs < 10) {
          secs = "0" + secs;
      }
      document.getElementById('hr').innerHTML = hours+':';
      document.getElementById('min').innerHTML = mins+':';
      document.getElementById('sec').innerHTML = secs+' '+am;
  }
  setInterval(clock, 1000)

</script>

