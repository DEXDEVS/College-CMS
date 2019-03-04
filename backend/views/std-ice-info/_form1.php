<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\StdIceInfo */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="std-ice-info-form">

    <?php $form = ActiveForm::begin(); ?>
    <!-- <?= $form->field($model, 'std_id')->textInput() ?> -->
    
    <h3 class="well well-sm label-primary" style="margin-top: -10px;">Update Stduent ICE Info</h3>
    <div class="row">
        <div class="col-md-4">
            <?= $form->field($model, 'std_ice_name')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'std_ice_relation')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'std_ice_contact_no')->widget(yii\widgets\MaskedInput::class, [ 'mask' => '+99-999-9999999', ]) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <?= $form->field($model, 'std_ice_address')->textInput(['maxlength' => true]) ?>
            </div>
    </div>
  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="row">
            <div class="col-md-1">
                <?= Html::submitButton($model->isNewRecord ? 'Create' : ' Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary btn-sm fa fa-edit']) ?>
            </div>
            <div class="col-md-1">
                <a href="std-personal-info-view?id=<?php echo $model->std_id; ?>" class="btn btn-warning btn-sm fa fa-step-backward"> Back</a>
            </div>
        </div> 
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
