<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\StdClassName;
use common\models\StdSessions;
use common\models\StdSections;
use common\models\StdPersonalInfo;
use kartik\select2\Select2;


/* @var $this yii\web\View */
/* @var $model common\models\StdEnrollmentDetail */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="std-enrollment-detail-form">

    <?php $form = ActiveForm::begin(); ?>
        <div class="row">
            <div class="col-md-6">
                <?= $form->field($stdEnrollmentHead, 'class_name_id')->dropDownList(
                    ArrayHelper::map(StdClassName::find()->all(),'class_name_id','class_name'),
                    ['prompt'=>'']
                )?>
            </div>
            <div class="col-md-6">
                <?= $form->field($stdEnrollmentHead, 'session_id')->dropDownList(
                    ArrayHelper::map(StdSessions::find()->all(),'session_id','session_name'),
                    ['prompt'=>'']
                )?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <?= $form->field($stdEnrollmentHead, 'section_id')->dropDownList(
                    ArrayHelper::map(StdSections::find()->all(),'section_id','section_name'),
                    ['prompt'=>'']
                )?>
            </div>
            <div class="col-md-6">
                <?= $form->field($model, 'std_enroll_detail_std_id')->widget(Select2::classname(), [
                    'data' => ArrayHelper::map(StdPersonalInfo::find()->all(),'std_id','std_name'),
                    'language' => 'en',
                    'options' => ['placeholder' => 'Select'],
                    'pluginOptions' => [
                        'allowClear' => true,
                        'multiple' => true
                    ],
                ]);
                ?>
            </div>
        </div>
  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
