<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\web\UploadedFile;
use dosamigos\datetimepicker\DateTimePicker;

/* @var $this yii\web\View */
/* @var $model common\models\StdPersonalInfo */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="std-personal-info-form">
    <h3 class="well well-sm label-primary" style="margin-top: -10px;">Update Student Personal Info</h3>
    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-md-4">
            <?= $form->field($model, 'std_name')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'std_contact_no')->widget(yii\widgets\MaskedInput::class, [ 'mask' => '+99-999-9999999', ]) ?>
        </div>  
        <div class="col-md-4">
            <?= $form->field($model, 'std_father_name')->textInput(['maxlength' => true]) ?>
        </div>     
    </div>
    <div class="row">
        <div class="col-md-4">
            <label>Std_dob</label>
            <?= DateTimePicker::widget([
                'model' => $model,
                'attribute' => 'std_DOB',
                'language' => 'en',
                'size' => 'ms',
                'clientOptions' => [
                    'autoclose' => true,
                    'format' => 'yyyy-mm-dd HH:ii:ss',
                    'todayBtn' => true
                ]
            ]);?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'std_gender')->dropDownList
            ([ 'Male' => 'Male', 'Female' => 'Female', ], ['prompt' => '']) ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'std_email')->textInput(['maxlength' => true]) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <?= $form->field($model, 'std_photo')->fileInput() ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'std_b_form')->widget(yii\widgets\MaskedInput::class, [ 'mask' => '99999-9999999-9', ]) ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'std_district')->textInput(['maxlength' => true]) ?>
        </div>
    </div> 

    <div class="row">    
        <div class="col-md-4">
            <?= $form->field($model, 'std_tehseel')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'std_nationality')->textInput(['maxlength' => true]) ?>
        </div>  
        <div class="col-md-4">
            <?= $form->field($model, 'std_religion')->textInput(['maxlength' => true]) ?>
        </div>  
    </div>
    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'std_permanent_address')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'std_temporary_address')->textInput(['maxlength' => true]) ?>
        </div>
    </div>
  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="row">
            <div class="col-md-1">
                <?= Html::submitButton($model->isNewRecord ? 'Create' : ' Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary btn-sm fa fa-edit']) ?>
            </div>
            <div class="col-md-1">
                <a href="index.php?r=std-personal-info/view&id=<?php echo $model->std_id; ?>" class="btn btn-warning btn-sm fa fa-step-backward"> Back</a>
            </div>
        </div> 
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
