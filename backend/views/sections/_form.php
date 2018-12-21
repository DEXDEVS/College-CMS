<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\Programs;
use common\models\Batches;

/* @var $this yii\web\View */
/* @var $model common\models\Sections */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sections-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'section_program_id')->dropDownList(
                ArrayHelper::map(Programs::find()->all(),'program_id','program_name')
            ) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'section_batch_id')->dropDownList(
                ArrayHelper::map(Batches::find()->all(),'batch_id','batch_name')
            ) ?>
        </div>   
    </div>
    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'section_name')->textInput(['maxlength' => true]) ?>
        </div>
    </div>
    <?php if (!Yii::$app->request->isAjax){ ?>
                <div class="form-group">
                    <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                </div>
            <?php } ?>
    <?php ActiveForm::end(); ?>
    
</div>
