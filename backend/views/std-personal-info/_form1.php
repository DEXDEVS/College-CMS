<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datetimepicker\DateTimePicker;
use yii\helpers\Url;
use yii\web\UploadedFile;

/* @var $this yii\web\View */
/* @var $model common\models\StdPersonalInfo */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="std-personal-info-form">

    <h3 class="well well-sm label-primary" style="margin-top: -10px;">Update Student Personal Info</h3>

    <?php $form = ActiveForm::begin(); ?>

    <!-- personal info -->
    <div class="row">
            <div class="col-md-4">
                <i class="fa fa-star" style="font-size: 8px; color: red; position: absolute; left: 120px; top: 6px"></i>
                <?= $form->field($model, 'std_name')->textInput(['maxlength' => true,'id' => 'std_name', 'required'=> true]) ?>
            </div>
            <div class="col-md-4">
                 <i class="fa fa-star" style="font-size: 8px; color: red; position: absolute; left: 167px; top: 6px"></i>
                <?= $form->field($model, 'std_father_name')->textInput(['maxlength' => true,'id' => 'std_father_name']) ?>
            </div>  
            <div class="col-md-4">
               <!-- <i class="fa fa-star" style="font-size: 8px; color: red; position: absolute; left: 156px; top: 6px"></i> -->
                <?= $form->field($model, 'std_contact_no')->widget(yii\widgets\MaskedInput::class, [ 'mask' => '+99-999-9999999', 'id' => 'std_contact_no']) ?>
            </div>     
        </div>
        <div class="row"> 
            <div class="col-md-4">
                <i class="fa fa-star" style="font-size: 8px; color: red; position: absolute; left: 113px; top: 6px"></i>
                <label>Stdudent DOB</label>
                <?= DateTimePicker::widget([
                    'model' => $model,
                    'attribute' => 'std_DOB',
                    'language' => 'en',
                    'size' => 'ms',
                    'clientOptions' => [
                        'autoclose' => true,
                        'format' => 'yyyy-mm-dd HH:ii:ss',
                        'startDate' => date('1960-01-01'),
                        'endDate' => date(''),
                        'todayBtn' => true
                    ]
                ]);?>
            </div>
            <div class="col-md-4">
                <i class="fa fa-star" style="font-size: 8px; color: red; position: absolute; left: 131px; top: 6px"></i>
                <?= $form->field($model, 'std_gender')->dropDownList
                ([ 'Male' => 'Male', 'Female' => 'Female', ], ['prompt' => '','id' => 'std_gender']) ?>
            </div>
            <div class="col-md-4">
                <!-- <i class="fa fa-star" style="font-size: 8px; color: red; position: absolute; left: 120px; top: 6px"></i> -->
                <?= $form->field($model, 'std_email')->textInput(['maxlength' => true]) ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <!-- <i class="fa fa-star" style="font-size: 8px; color: red; position: absolute; left: 121px; top: 6px"></i> -->
                <?= $form->field($model, 'std_photo')->fileInput() ?>
            </div>
            <div class="col-md-4">
                <!-- <i class="fa fa-star" style="font-size: 8px; color: red; position: absolute; left: 131px; top: 6px"></i> -->
                <?= $form->field($model, 'std_b_form')->widget(yii\widgets\MaskedInput::class, [ 'mask' => '99999-9999999-9', ]) ?>
            </div>
            <div class="col-md-4">
                <i class="fa fa-star" style="font-size: 8px; color: red; position: absolute; left: 131px; top: 6px"></i>
                <?= $form->field($model, 'std_district')->textInput(['maxlength' => true]) ?>
            </div>
        </div> 

        <div class="row">  
            <div class="col-md-4">
                <i class="fa fa-star" style="font-size: 8px; color: red; position: absolute; left: 133px; top: 6px"></i>
                <?= $form->field($model, 'std_tehseel')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-md-4">
                <i class="fa fa-star" style="font-size: 8px; color: red; position: absolute; left: 153px; top: 6px"></i>
                <?= $form->field($model, 'std_nationality')->textInput(['maxlength' => true]) ?>
            </div>  
            <div class="col-md-4">
                <i class="fa fa-star" style="font-size: 8px; color: red; position: absolute; left: 137px; top: 6px"></i>
                <?= $form->field($model, 'std_religion')->textInput(['maxlength' => true]) ?>
            </div>   
        </div>
        <div class="row">
            <div class="col-md-4">
                <?= $form->field($model, 'status')->dropDownList([ 'Active' => 'Active', 'Inactive' => 'Inactive', ], ['prompt' => 'Select Status']) ?>
            </div>
            <div class="col-md-4">
            <?= $form->field($model, 'academic_status')->dropDownList([ 'Active' => 'Active', 'Promote' => 'Promote', 'Left' => 'Left', 'Struck off' => 'Struck off'], ['prompt' => 'Select Academic Status']) ?>
            </div>
            <div class="col-md-4">
                <i class="fa fa-star" style="font-size: 8px; color: red; position: absolute; left: 214px; top: 6px"></i>
                <?= $form->field($model, 'std_permanent_address')->textInput(['maxlength' => true, 'id' => 'std_permanent_address']) ?>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <!-- <i class="fa fa-star" style="font-size: 8px; color: red; position: absolute; left: 213px; top: 6px"></i> -->
            <?= $form->field($model, 'std_temporary_address')->textInput(['maxlength' => true, 'id' => 'std_temporary_address']) ?>
        </div>
    </div>
    

    
    <!-- personal info -->

    
    <?php if (!Yii::$app->request->isAjax){ ?>
        <div class="row">
            <div class="col-md-1">
                <?= Html::submitButton($model->isNewRecord ? 'Create' : ' Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary btn-sm fa fa-edit']) ?>
            </div>
            <div class="col-md-1">
                <a href="./std-personal-info-view?id=<?php echo $model->std_id; ?>" class="btn btn-warning btn-sm fa fa-step-backward"> Back</a>
            </div>
        </div>
    <?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>

 





    