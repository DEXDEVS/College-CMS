<?php
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use common\models\StdPersonalInfo;

/* @var $this yii\web\View */
/* @var $model common\models\StdGuardianInfo */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="std-guardian-info-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-md-4">
            <?= $form->field($model, 'std_id')->dropDownList(
                    ArrayHelper::map(StdPersonalInfo::find()->where(['delete_status'=>1])->all(),'std_id','std_name'),
                    ['prompt'=>'Select Students']
                )?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'guardian_name')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'guardian_relation')->textInput(['maxlength' => true]) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
                <?= $form->field($model, 'guardian_cnic')->widget(yii\widgets\MaskedInput::class, [ 'mask' => '99999-9999999-9', ]) ?>
            </div> 
        <div class="col-md-4">
            <?= $form->field($model, 'guardian_email')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'guardian_contact_no_1')->widget(yii\widgets\MaskedInput::class, [ 'mask' => '+99-999-9999999', ]) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <?= $form->field($model, 'guardian_contact_no_2')->widget(yii\widgets\MaskedInput::class, [ 'mask' => '+99-999-9999999', ]) ?>  
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'guardian_monthly_income')->textInput(['type'=>'number']) ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'guardian_occupation')->textInput(['maxlength' => true]) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <?= $form->field($model, 'guardian_designation')->textInput(['maxlength' => true]) ?>
        </div>
    </div>  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
