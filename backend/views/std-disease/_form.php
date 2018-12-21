<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\StdDisease */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="std-disease-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'std_disease_std_id')->textInput() ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'std_disease_level')->textInput(['maxlength' => true]) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'std_blood_group')->dropDownList([ 'A+ve' => 'A+ve', 'A-ve' => 'A-ve', 'B+ve' => 'B+ve', 'B-ve' => 'B-ve', 'AB+ve' => 'AB+ve', 'AB-ve' => 'AB-ve', 'O+ve' => 'O+ve', 'O-ve' => 'O-ve', ], ['prompt' => '']) ?>
        </div>
        <div class="col-md-6">
           <?= $form->field($model, 'std_dr_name')->textInput(['maxlength' => true]) ?> 
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'std_dr_contact_no')->widget(yii\widgets\MaskedInput::class, [ 'mask' => '+99-999-9999999', ]) ?>
        </div>
        <div class="col-md-6">
            
        </div>
    </div>

        <?php if (!Yii::$app->request->isAjax){ ?>
            <div class="form-group">
                    <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </div>
        <?php } ?>
        

    <?php ActiveForm::end(); ?>
    
</div>
