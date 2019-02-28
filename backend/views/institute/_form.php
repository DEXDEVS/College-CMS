<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\web\UploadedFile;

/* @var $this yii\web\View */
/* @var $model common\models\Institute */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="institute-form">

    <?php $form = ActiveForm::begin(); ?>
     <h3 style="color: #337AB7; margin-top: -10px"><small> ( Fields with <span style="color: red;">red stars </span>are required )</small> </h3>
    <div class="row">
        <div class="col-md-6">
             <i class="fa fa-star" style="font-size: 8px; color: red; position: relative; left: 97px; top: 18px"></i>
            <?= $form->field($model, 'institute_name')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-6">
            <i class="fa fa-star" style="font-size: 8px; color: red; position: relative; left: 137px; top: 17px"></i>
            <?= $form->field($model, 'institute_account_no')->textInput(['maxlength' => true]) ?>
        </div>        
    </div>

    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'institute_logo')->fileInput(['maxlength' => true]) ?>
        </div>
    </div>
  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
