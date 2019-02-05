<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datetimepicker\DateTimePicker;
/* @var $this yii\web\View */
/* @var $model common\models\Notice */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="notice-form">
    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-md-12">
            <?= $form->field($model, 'notice_title')->textInput(['maxlength' => true]) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <label>Start Date</label>
            <?= DateTimePicker::widget([
                'model' => $model,
                'attribute' => 'notice_start',
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
            <label>End Date</label>
            <?= DateTimePicker::widget([
                'model' => $model,
                'attribute' => 'notice_end',
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
            <?= $form->field($model, 'notice_user_type')->dropDownList([ 'Students' => 'Students', 'Parents' => 'Parents', 'Employees' => 'Employees', 'Others' => 'Others', ], ['prompt' => '']) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'is_status')->dropDownList([ 'Active' => 'Active', 'Inactive' => 'Inactive', ], ['prompt' => '']) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <?= $form->field($model, 'notice_description')->textarea(['rows' => 6]) ?>
        </div>
    </div>
    
    
  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
