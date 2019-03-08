<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\AccountNature;

/* @var $this yii\web\View */
/* @var $model common\models\AccountRegister */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="account-register-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'account_nature_id')->dropDownList(
                ArrayHelper::map(AccountNature::find()->all(),'account_nature_id','account_nature_name'),
                ['prompt'=>'Select Account Nature',]
            )?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'account_name')->textInput(['maxlength' => true]) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-10">
            <?= $form->field($model, 'account_description')->textarea(['rows' => 4]) ?>
        </div>
    </div>

	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
