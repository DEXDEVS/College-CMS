<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\StdFeeInstallments */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="std-fee-installments-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <div class="row">
        <div class="col-md-12">
            <?= $form->field($model, 'std_fee_id')->textInput() ?>
        </div>
        
    </div>
    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'installment_no')->textInput() ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'installment_amount')->textInput() ?>
        </div>
    </div>
    <div class="row" >
        <div class="col-md-2">
            <?= $form->field($model, 'amount1')->textInput() ?>               
        </div>   
        <div class="col-md-2">
            <?= $form->field($model, 'amount2')->textInput() ?>
        </div>
        <div class="col-md-2">
            <?= $form->field($model, 'amount3')->textInput() ?>
        </div>
        <div class="col-md-2">
            <?= $form->field($model, 'amount4')->textInput() ?>
        </div>
        <div class="col-md-2">
            <?= $form->field($model, 'amount5')->textInput() ?>
        </div>
        <div class="col-md-2">
            <?= $form->field($model, 'amount6')->textInput() ?>
        </div>     
    </div>
    
  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
