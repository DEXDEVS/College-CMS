<?php

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
          <div class="info-box bg-yellow callout-warning">
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

      <!-- Main row -->
    </section>
    <!-- /.content -->
</div>