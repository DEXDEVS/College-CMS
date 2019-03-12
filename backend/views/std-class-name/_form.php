<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datetimepicker\DateTimePicker;

/* @var $this yii\web\View */
/* @var $model common\models\StdClassName */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="std-class-name-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'class_name')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'class_name_description')->textInput(['maxlength' => true]) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'class_nature')->dropDownList([ 'Monthly' => 'Monthly', 'Annual' => 'Annual', 'Semester' => 'Semester', ], ['prompt' => '']) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'status')->dropDownList([ 'Active' => 'Active', 'Inactive' => 'Inactive', ], ['prompt' => '']) ?>
        </div>  
    </div>
    <div class="row">
        <div class="col-md-6">
            <label>Start Date</label>
                <?= DateTimePicker::widget([
                    'model' => $model,
                    'attribute' => 'class_start_date',
                    'language' => 'en',
                    'size' => 'ms',
                    'clientOptions' => [
                        'autoclose' => true,
                        'todayBtn' => true
                    ]
                ]);?>
        </div>
        <div class="col-md-6">
            <label>End Date</label>
                <?= DateTimePicker::widget([
                    'model' => $model,
                    'attribute' => 'class_end_date',
                    'language' => 'en',
                    'size' => 'ms',
                    'clientOptions' => [
                        'autoclose' => true,
                        'todayBtn' => true
                    ]
                ]);?>
        </div>
        
    </div>
 
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
