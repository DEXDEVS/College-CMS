<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\ProgramType;
use common\models\Departments;

/* @var $this yii\web\View */
/* @var $model common\models\Programs */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="programs-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'program_type_id')->dropDownList(
              ArrayHelper::map(ProgramType::find()->all(),'program_type_id','program_type_name')
            ); ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'program_dept_id')->dropDownList(
              ArrayHelper::map(Departments::find()->all(),'dept_id','dept_name')
            ); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'program_name')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'program_description')->textInput() ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
             <?= $form->field($model, 'program_no_semester')->dropDownList([ '4 Semesters' => '4 Semesters', '8 Semesters' => '8 Semesters', ], ['prompt' => '']) ?>
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
