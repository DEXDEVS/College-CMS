<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\ExamsCategory;
use common\models\StdEnrollmentHead;
use dosamigos\datetimepicker\DateTimePicker;

/* @var $this yii\web\View */
/* @var $model common\models\ExamsCriteria */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="exams-criteria-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'exam_category_id')->dropDownList(
                ArrayHelper::map(ExamsCategory::find()->all(),'exam_category_id','category_name'),
                ['prompt'=>'Select Exams Category',]
            )?>
        </div>
         <div class="col-md-6">
            <?= $form->field($model, 'std_enroll_head_id')->dropDownList(
                ArrayHelper::map(StdEnrollmentHead::find()->all(),'std_enroll_head_id','std_enroll_head_name'),
                ['prompt'=>'Select Class',]
            )?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <label>Exam Start Date</label>
                <?= DateTimePicker::widget([
                    'model' => $model,
                    'attribute' => 'exam_start_date',
                    'language' => 'en',
                    'size' => 'ms',
                    'clientOptions' => [
                        'autoclose' => true,
                        'format' => 'yyyy-mm-dd HH:ii:ss',
                        'todayBtn' => true
                    ]
                ]);?>
        </div>
         <div class="col-md-6">
            <label>Exam End Date</label>
                <?= DateTimePicker::widget([
                    'model' => $model,
                    'attribute' => 'exam_end_date',
                    'language' => 'en',
                    'size' => 'ms',
                    'clientOptions' => [
                        'autoclose' => true,
                        'format' => 'yyyy-mm-dd HH:ii:ss',
                        'todayBtn' => true
                    ]
                ]);?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <label>Exam Start Time</label>
            <?= DateTimePicker::widget([
                'model' => $model,
                'attribute' => 'exam_start_time',
                'language' => 'en',
                'size' => 'ms',
                'clientOptions' => [
                    'autoclose' => true,
                    'format' => 'HH:ii:ss',
                    'todayBtn' => true
                ]
            ]);?>
        </div>
         <div class="col-md-6">
            <label>Exam End Time</label>
            <?= DateTimePicker::widget([
                'model' => $model,
                'attribute' => 'exam_end_time',
                'language' => 'en',
                'size' => 'ms',
                'clientOptions' => [
                    'autoclose' => true,
                    'format' => 'HH:ii:ss',
                    'todayBtn' => true
                ]
            ]);?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
             <?= $form->field($model, 'exam_room')->textInput(['maxlength' => true]) ?>
        </div>
         <div class="col-md-6">
            
        </div>
         <div class="col-md-4">
            
        </div>
    </div>
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
