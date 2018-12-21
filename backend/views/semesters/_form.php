<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Semesters */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="semesters-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-md-4">
            <?= $form->field($model, 'semester_name')->dropDownList([ '1st Semester' => '1st Semester', '2nd Semester' => '2nd Semester', '3rd Semester' => '3rd Semester', '4th Semester' => '4th Semester', '5th Semester' => '5th Semester', '6th Semester' => '6th Semester', '7th Semester' => '7th Semester', '8th Semester' => '8th Semester', ], ['prompt' => '']) ?>
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
