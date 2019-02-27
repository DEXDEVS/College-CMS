<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Subjects */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="subjects-form">

    <?php $form = ActiveForm::begin(); ?>
    <h3 style="color: #337AB7; margin-top: -10px"><small> ( Fields with <span style="color: red;">red stars </span>are required )</small> </h3>
	 <i class="fa fa-star" style="font-size: 8px; color: red; position: absolute; left: 109px; top: 47px"></i>
    <?= $form->field($model, 'subject_name')->textInput(['maxlength' => true]) ?>
	<i class="fa fa-star" style="font-size: 8px; color: red; position: relative; left: 132px; top: 18px"></i>
    <?= $form->field($model, 'subject_description')->textInput(['maxlength' => true]) ?>


  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
