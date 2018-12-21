<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Migration */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="migration-form">

    <?php $form = ActiveForm::begin(); ?>
    	<div class="row">
    		<div class="col-md-6">
    			<?= $form->field($model, 'version')->textInput(['maxlength' => true]) ?>
    		</div>
    		<div class="col-md-6">
    			<?= $form->field($model, 'apply_time')->textInput() ?>
    		</div>
    	</div>

	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
