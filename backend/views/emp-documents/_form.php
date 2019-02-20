<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\EmpDocuments */
/* @var $form yii\widgets\ActiveForm */

$id = $_GET['id'];

?>

<div class="emp-documents-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'emp_info_id')->textInput(['value' => $id]) ?>

    <?= $form->field($model, 'emp_document')->fileInput(['maxlength' => true]) ?>
  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
