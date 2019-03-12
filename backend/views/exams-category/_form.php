<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\ExamsCategory */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="exams-category-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
    	<div class="col-md-6">
    		<?= $form->field($model, 'category_name')->textInput(['maxlength' => true]) ?>
    	</div>
    	<div class="col-md-6">
    		<?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>
    	</div>
    </div>
    
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
