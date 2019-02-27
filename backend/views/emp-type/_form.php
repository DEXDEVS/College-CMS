<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\EmpType */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="emp-type-form">

    <?php $form = ActiveForm::begin(); ?>
	<h3 style="color: #337AB7; margin-top: -10px"><small> ( Fields with <span style="color: red;">red stars </span>are required )</small> </h3>
	<i class="fa fa-star" style="font-size: 8px; color: red; position: absolute; left: 82px; top: 45px"></i>
    <?= $form->field($model, 'emp_type')->textInput(['maxlength' => true]) ?>
  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
