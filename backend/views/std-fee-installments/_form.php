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
            <?= $form->field($model, 'no_of_installment')->textInput() ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'installment_amount')->textInput() ?>
        </div>
    </div>
  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
