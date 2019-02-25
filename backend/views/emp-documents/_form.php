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
	
	<div class="row container-fluid">
	    <h3 class="well well-sm label-primary" style="margin-top: -10px;">
	    	<i class="fa fa-upload"></i>
	    	Add Employee Documents
	    </h3>
	</div>	

    <div class="row">
    	<div class="col-md-4">
    		<?= $form->field($model, 'emp_document_name')->textInput() ?>
		</div>
    	<div class="col-md-4 invisible">
		   	<?= $form->field($model, 'emp_info_id')->textInput(['value' => $id]) ?>
    	</div>
	</div>
	<div class="row">
    	<div class="col-md-4">
    		<?= $form->field($model, 'emp_document')->fileInput(['maxlength' => true]) ?>	
    	</div>
	</div>
  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
