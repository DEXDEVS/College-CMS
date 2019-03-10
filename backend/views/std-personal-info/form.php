<?php use yii\helpers\Html;

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
                <?= Html::a('<i class="glyphicon glyphicon-plus"></i>', ['create'],
                    ['role'=>'modal-remote','title'=> 'Create new Std Personal Infos','class'=>'btn btn-success'])?>
                <li class="active"><a href="create" data-toggle="tab" style="color: #3C8DBC;"><i class="fa fa-user-circle" ></i> Personal Info</a></li>
                <li><a href="/College-CMS/admin/std-guardian-info/create" data-toggle="tab" style="color: #3C8DBC;"><i class="fa fa-user"></i> Guardian Info</a></li>
                <li><a href="#ice" data-toggle="tab" style="color: #3C8DBC;"><i class="fa fa-user-o"></i> ICE Info</a></li>
                <li><a href="#academic" data-toggle="tab" style="color: #3C8DBC;"><i class="fa fa-book"></i> Academic Info</a></li>
                <li><a href="#fee" data-toggle="tab" style="color: #3C8DBC;"><i class="fa fa-money"></i> Fee Details</a></li>
              </ul>
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
