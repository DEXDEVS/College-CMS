<?php 
use yii\helpers\Html; 
$this->title = Yii::t('app', 'System Settings');
$this->params['breadcrumbs'][] = $this->title;

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
              		$query = (new \yii\db\Query())->from('std_class_name');
	      			$id = $query->count('class_name_id'); 
	      		?>
	      		<h3><?php echo $id; ?> </h3>
              	<p><b>Class Name</b></p>
              	<span style="float: right; margin-top: -30PX; color: white;">
            		<a href="index.php?r=std-class-name" style="color: white;">
            			<i class="fa fa-plus-square"></i> Create New
            		</a>
            	</span>
            </div>
            <!-- <div class="icon" style="font-size: 50px; margin: 10px;">
              <i class="fa fa-users"></i>
            </div> -->
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->
      <!-- Main row -->
    </section>
    <!-- /.content -->
</div>