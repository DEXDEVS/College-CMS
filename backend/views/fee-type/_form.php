<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datetimepicker\DateTimePicker;

/* @var $this yii\web\View */
/* @var $model common\models\FeeType */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="fee-type-form">

    <?php $form = ActiveForm::begin(); ?>
    <h3 style="color: #337AB7; margin-top: -10px"><small> ( Fields with <span style="color: red;">red stars </span>are required )</small> </h3>
        <div class="row">
            <div class="col-md-6">
                <i class="fa fa-star" style="font-size: 8px; color: red; position: absolute; left: 119px; top: 6px"></i>
                <?= $form->field($model, 'fee_type_name')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-md-6">
                <i class="fa fa-star" style="font-size: 8px; color: red; position: absolute; left: 157px; top: 6px"></i>
                <?= $form->field($model, 'fee_type_description')->textInput(['maxlength' => true]) ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <!-- <i class="fa fa-star" style="font-size: 8px; color: red; position: absolute; left: 98px; top: 6px"></i> -->
                <?= $form->field($model, 'fee_amount')->textInput() ?>
            </div>
            <div class="col-md-6">
                <!-- <i class="fa fa-star" style="font-size: 8px; color: red; position: absolute; left: 104px; top: 6px"></i> -->
                <label>Starting Date</label>
                <?= DateTimePicker::widget([
                    'model' => $model,
                    'attribute' => 'starting_date',
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
                 
                <!-- <i class="fa fa-star" style="font-size: 8px; color: red; position: absolute; left: 78px; top:169px"></i> -->
                <label>End Date</label>
                <?= DateTimePicker::widget([
                    'model' => $model,
                    'attribute' => 'ending_date',
                    'language' => 'en',
                    'size' => 'ms',
                    'clientOptions' => [
                        'autoclose' => true,
                        'format' => 'yyyy-mm-dd HH:ii:ss',
                        'todayBtn' => true
                    ]
                ]);?>
  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
