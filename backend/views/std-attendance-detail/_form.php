<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\StdAttendanceDetail */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="std-attendance-detail-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'std_atten_detail_head_id')->textInput() ?>

    <?= $form->field($model, 'std_atten_detail_std_id')->textInput() ?>

    <?= $form->field($model, 'std_roll_no')->textInput() ?>

    <?= $form->field($model, 'std_present')->textInput() ?>

    <?= $form->field($model, 'std_absent')->textInput() ?>

    <?= $form->field($model, 'std_leave')->textInput() ?>
  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
