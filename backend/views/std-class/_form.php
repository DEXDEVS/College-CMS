<?php
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use common\models\StdClassName;
use common\models\StdSessions;
use common\models\StdSections;

/* @var $this yii\web\View */
/* @var $model common\models\StdClass */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="std-class-form">

    <?php $form = ActiveForm::begin(); ?>
        <div class="row">
            <div class="col-md-6">
                <?= $form->field($model, 'class_name_id')->dropDownList(
                    ArrayHelper::map(StdClassName::find()->all(),'class_name_id','class_name')
                )?>
            </div>
            <div class="col-md-6">
                <?= $form->field($model, 'session_id')->dropDownList(
                    ArrayHelper::map(StdSessions::find()->where(['status'=>'Active'])->all(),'session_id','session_name'),
                     ['prompt'=>'Select Session',]
                )?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <?= $form->field($model, 'section_id')->dropDownList(
                    ArrayHelper::map(StdSections::find()->all(),'section_id','section_name')
                )?>
            </div>
            <!-- <div class="col-md-6">
                 <?= $form->field($model, 'class_name')->textInput(['maxlength' => true]) ?>
            </div> -->
        </div>
    <!-- 
    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <?= $form->field($model, 'created_by')->textInput() ?>

    <?= $form->field($model, 'updated_by')->textInput() ?> -->

  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
