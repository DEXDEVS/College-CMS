<?php
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use common\models\StdSessions;
use common\models\StdSubjects;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model common\models\StdSections */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="std-sections-form">

    <?php $form = ActiveForm::begin(); ?>
        <div class="row">
            <div class="col-md-6">
                <?= $form->field($model, 'session_id')->dropDownList(
                    ArrayHelper::map(StdSessions::find()->where(['delete_status'=>1])->all(),'session_id','session_name')
                )?>
            </div>
            <div class="col-md-6">
                <?= $form->field($model, 'section_name')->textInput(['maxlength' => true]) ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <?= $form->field($model, 'section_description')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-md-6">
                <?= $form->field($model, 'section_intake')->input('number') ?>
            </div>
        </div>
        <div class="row"> 
            <div class="col-md-12">
                <?= $form->field($model, 'section_subjects')->dropDownList(
                    ArrayHelper::map(StdSubjects::find()->all(),'std_subject_id','std_subject_name'),
                    ['prompt' => 'Select Subject Combination ']
                )?>
            </div>
        </div>
  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
