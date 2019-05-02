<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\ExamsCriteria;

/* @var $this yii\web\View */
/* @var $model common\models\ExamsSchedule */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="exams-schedule-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-md-4">
            
             <?= $form->field($model, 'exam_criteria_id')->dropDownList(
                ArrayHelper::map(ExamsCriteria::find()->all(),'exam_criteria_id','category_name'),
                ['prompt'=>'Select Exams Category',]
            )?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'subject_id')->textInput() ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'emp_id')->textInput() ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <?= $form->field($model, 'date')->textInput() ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'full_marks')->textInput() ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'passing_marks')->textInput() ?>
        </div>
    </div>
      
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
