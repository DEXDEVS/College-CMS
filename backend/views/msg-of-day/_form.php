<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\MsgOfDay */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="msg-of-day-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-md-12">
            <?= $form->field($model, 'msg_details')->textInput(['maxlength' => true]) ?>            
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'msg_user_type')->dropDownList([ 'Students' => 'Students', 'Parents' => 'Parents', 'Employees' => 'Employees', 'Others' => 'Others', ], ['prompt' => '']) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'is_status')->dropDownList([ 'Active' => 'Active', 'Inactive' => 'Inactive', ], ['prompt' => '']) ?>
        </div>
    </div>
  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
