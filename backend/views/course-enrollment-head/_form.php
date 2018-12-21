<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\CourseEnrollmentHead */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="course-enrollment-head-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'course_enroll_head_class_id')->textInput() ?>
  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
