<?php
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use common\models\StdClassName;

/* @var $this yii\web\View */
/* @var $model common\models\StdSubjects */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="std-subjects-form">

    <?php $form = ActiveForm::begin(); ?>
	<h3 style="color: #337AB7; margin-top: -10px"><small> ( Fields with <span style="color: red;">red stars </span>are required )</small> </h3>
	 <i class="fa fa-star" style="font-size: 8px; color: red; position: absolute; left: 72px; top: 45px"></i>
    <?= $form->field($model, 'class_id')->dropDownList(ArrayHelper::map(StdClassName::find()->all(),'class_name_id','class_name'),
    	['prompt'=>'Select Class']
	)?>
	<i class="fa fa-star" style="font-size: 8px; color: red; position: relative; left: 120px; top: 18px"></i>
    <?= $form->field($model, 'std_subject_name')->textInput(['maxlength' => true]) ?>

  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
