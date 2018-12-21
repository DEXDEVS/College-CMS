<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\Programs;
use dosamigos\datetimepicker\DateTimePicker;

/* @var $this yii\web\View */
/* @var $model common\models\Batches */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="batches-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-md-6">
             <?= $form->field($model, 'batch_program_id')->dropDownList(
                ArrayHelper::map(Programs::find()->all(),'program_id','program_name')
              ) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'batch_name')->textInput(['maxlength' => true]) ?>
        </div>
    </div>
    <div class="row"> 
        <div class="col-md-6">
           <label>batch_start_date</label>
            <?= DateTimePicker::widget([
                    'model' => $model,
                    'attribute' => 'batch_start_date',
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
           <label> batch_end_date</label>
             <?= DateTimePicker::widget([
                    'model' => $model,
                    'attribute' => 'batch_end_date',
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
            <?= $form->field($model, 'batch_status')->dropDownList([ 'Active' => 'Active', 'Inactive' => 'Inactive', ], ['prompt' => '']) ?>
        </div>
        <div class="col-md-6">
            
        </div>
    </div>
    <div class="row">
        <div class="col-md-4"> 
            <?php if (!Yii::$app->request->isAjax){ ?>
                <div class="form-group">
                    <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                </div>
            <?php } ?>
            
        </div>
    </div>

    <?php ActiveForm::end(); ?>
    
</div>
