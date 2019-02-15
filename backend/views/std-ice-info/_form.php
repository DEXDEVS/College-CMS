<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\StdIceInfo */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="std-ice-info-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'std_id')->textInput() ?>

    <?= $form->field($model, 'std_ice_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'std_ice_relation')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'std_ice_contact_no')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'std_ice_address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'created_by')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <?= $form->field($model, 'updated_by')->textInput() ?>

    <?= $form->field($model, 'delete_status')->textInput() ?>

  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
