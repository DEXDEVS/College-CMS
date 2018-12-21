<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\StdTransportInfo */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="std-transport-info-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-md-4">
            <?= $form->field($model, 'std_transport_std_id')->textInput() ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'std_transport_type')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'std_transport_driver_contact_no')->widget(yii\widgets\MaskedInput::class, [ 'mask' => '+99-999-9999999', ]) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'std_transport_vehicel_no')->textInput(['maxlength' => true]) ?>
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
