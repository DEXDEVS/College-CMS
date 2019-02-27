<?php
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use common\models\Branches;

use dosamigos\datetimepicker\DateTimePicker;
/* @var $this yii\web\View */
/* @var $model common\models\StdSessions */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="std-sessions-form">

    <?php $form = ActiveForm::begin(); ?>
    <h3 style="color: #337AB7; margin-top: -10px"><small> ( Fields with <span style="color: red;">red stars </span>are required )</small> </h3>
        <div class="row">
            <div class="col-md-6">
                 <i class="fa fa-star" style="font-size: 8px; color: red; position: relative; left: 148px; top: 18px"></i>
                <?= $form->field($model, 'session_branch_id')->dropDownList(
                    ArrayHelper::map(Branches::find()->where(['delete_status'=>1])->all(),'branch_id','branch_name'),['prompt'=>'Select Branch Name']
                )?>
            </div>
            <div class="col-md-6">
                 <i class="fa fa-star" style="font-size: 8px; color: red; position: relative; left: 97px; top: 18px"></i>
                <?= $form->field($model, 'session_name')->textInput(['maxlength' => true]) ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <label>Session Start Date</label>
                    <?= DateTimePicker::widget([
                        'model' => $model,
                        'attribute' => 'session_start_date',
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
                <label>Session End Date</label>
                    <?= DateTimePicker::widget([
                        'model' => $model,
                        'attribute' => 'session_end_date',
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
            <div class="col-md-12">
                 <i class="fa fa-star" style="font-size: 8px; color: red; position: relative; left: 44px; top: 18px"></i>
                <?= $form->field($model, 'status')->dropDownList([ 'Active' => 'Active', 'Inactive' => 'Inactive', ], ['prompt' => '']) ?>
            </div>
            
        </div>
  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
