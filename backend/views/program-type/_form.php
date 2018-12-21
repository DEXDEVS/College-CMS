<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\ProgramType */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="program-type-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-md-4">
             <?= $form->field($model, 'program_type_name')->dropDownList([ 'Annual' => 'Annual', 'Semester' => 'Semester'], ['prompt' => '']) ?>
        </div>
        <div class="col-md-4">
            
        </div>
        <div class="col-md-4">
            
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
