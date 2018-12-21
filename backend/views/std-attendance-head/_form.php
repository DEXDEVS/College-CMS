<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\StdAttendanceHead */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="std-attendance-head-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'std_atten_head_class_id')->textInput() ?>

    <?= $form->field($model, 'std_atten_head_course_id')->textInput() ?>

    <?= $form->field($model, 'datetime')->textInput() ?>

    <?= $form->field($model, 'total_students')->textInput() ?>

    <?= $form->field($model, 'total_present_students')->textInput() ?>

    <?= $form->field($model, 'total_absent_students')->textInput() ?>

    <?= $form->field($model, 'Total_leave_students')->textInput() ?>
  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
