  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="../../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Emails */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="emails-form">

    <?php $form = ActiveForm::begin(); ?>

    <!-- /.col -->
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Compose New Message</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <?= $form->field($model, 'receiver_name')->textInput(['maxlength' => true, 'placeholder'=>"Name:"]) ?>
                        </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <?= $form->field($model, 'receiver_email')->textInput(['maxlength' => true, 'Placeholder' => 'To:']) ?>
                      </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <?= $form->field($model, 'email_subject')->textInput(['maxlength' => true, 'Placeholder' => 'Subject:']) ?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <?= $form->field($model, 'email_attachment')->fileInput(['maxlength' => true, 'class' => 'btn btn-primary btn-block paperclip']) ?>
                        </div>
                    </div>
                </div>
              
              <div class="form-group">
                    <?= $form->field($model, 'email_content')->textarea(['rows' => 20, 'id' => 'compose-textarea']) ?>
              </div>
            </div>
          </div>
          <!-- /. box -->
        </div>
        <!-- /.col -->

	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
<script>
  $(function () {
    //Add text editor
    $("#compose-textarea").wysihtml5();
  });
</script>