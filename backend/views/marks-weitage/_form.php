<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\MarksWeitage */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="marks-weitage-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-md-4">
            <?= $form->field($model, 'std_enroll_head_id')->textInput() ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'subject_id')->textInput() ?>
        </div>
        <div class="col-md-4">
             <?= $form->field($model, 'presentation')->textInput() ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <?= $form->field($model, 'assignment')->textInput() ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'attendance')->textInput() ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'dressing')->textInput() ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <?= $form->field($model, 'theory')->textInput() ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'practical')->textInput() ?>
        </div>
        <div class="col-md-4">
            
        </div>
    </div>
    
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
