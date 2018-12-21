<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datetimepicker\DateTimePicker;

/* @var $this yii\web\View */
/* @var $model common\models\StdInfo */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="std-info-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-md-4">
            <?= $form->field($model, 'std_reg_no')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'std_first_name')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'std_last_name')->textInput(['maxlength' => true]) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
                <?= $form->field($model, 'std_father_name')->textInput(['maxlength' => true]) ?>
        </div>  
        <div class="col-md-4">
            <?= $form->field($model, 'std_photo')->fileInput() ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'std_cnic')->widget(yii\widgets\MaskedInput::class, [
            'mask' => '99999-9999999-9',
            ]) ?>
        </div>
    </div>
    <div class="row">
            <div class="col-md-4">
                <?= $form->field($model, 'std_contact_no')->widget(yii\widgets\MaskedInput::class, [ 'mask' => '+99-999-9999999', ]) ?>
            </div>
            <div class="col-md-4">
                <?= $form->field($model, 'std_email')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-md-4">
                <?= $form->field($model, 'std_p_address')->textInput(['maxlength' => true]) ?>
            </div>
    </div>
    <div class="row">
            <div class="col-md-4">
                <?= $form->field($model, 'std_t_address')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-md-4">
                <?= $form->field($model, 'std_emergency_person_name')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-md-4">
               <!--  <?= $form->field($model, 'std_emergency_contact_person_no')->textInput(['maxlength' => true]) ?> -->
                <?= $form->field($model, 'std_emergency_contact_person_no')->widget(yii\widgets\MaskedInput::class, [ 'mask' => '+99-999-9999999', ]) ?>

            </div>
    </div>
    <div class="row">
            <div class="col-md-4">
                <label>Std_dob</label>
                <?= DateTimePicker::widget([
                    'model' => $model,
                    'attribute' => 'std_dob',
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
                <?= $form->field($model, 'std_nationality')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-md-4">
                <?= $form->field($model, 'std_country')->textInput(['maxlength' => true]) ?>
            </div>
    </div>
    <div class="row">
            <div class="col-md-4">
                <?= $form->field($model, 'std_district')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-md-4">
                <?= $form->field($model, 'std_province')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-md-4">
                <?= $form->field($model, 'std_religion')->textInput(['maxlength' => true]) ?>
            </div>
    </div>
    <div class="row">
            <div class="col-md-4">
                <?= $form->field($model, 'std_gender')->dropDownList([ 'Male' => 'Male', 'Female' => 'Female', ], ['prompt' => 'Select Gender']) ?>
            </div>
            <div class="col-md-4">
                <?= $form->field($model, 'std_serious_disease')->dropDownList([ 'Yes' => 'Yes', 'No' => 'No'], ['prompt' => ''],['id' => 'stdDiseaseID']) ?>
             
            </div>
            <div class="col-md-4">
                <?= $form->field($model, 'std_transport_required')->dropDownList([ 'Yes' => 'Yes', 'No' => 'No', ], ['prompt' => '']) ?>
            </div>
    </div>
    
    <div  id="stdDiseaseForm" style="display:none;">
        <h3>Std Disease</h3>

    <div class="row">
        <div class="col-md-6">
            <?= $form->field($disease, 'std_disease_level')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($disease, 'std_blood_group')->dropDownList([ 'A+ve' => 'A+ve', 'A-ve' => 'A-ve', 'B+ve' => 'B+ve', 'B-ve' => 'B-ve', 'AB+ve' => 'AB+ve', 'AB-ve' => 'AB-ve', 'O+ve' => 'O+ve', 'O-ve' => 'O-ve', ], ['prompt' => '']) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
           <?= $form->field($disease, 'std_dr_name')->textInput(['maxlength' => true]) ?> 
        </div>
        <div class="col-md-6">
            
            <?= $form->field($disease, 'std_dr_contact_no')->widget(yii\widgets\MaskedInput::class, [ 'mask' => '+99-999-9999999', ]) ?>
        </div>
    </div>
    </div>

    <h3>Std Transport Info</h3>

    <div class="row">
        <div class="col-md-6">
            <?= $form->field($transport, 'std_transport_type')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($transport, 'std_transport_driver_contact_no')->widget(yii\widgets\MaskedInput::class, [ 'mask' => '+99-999-9999999', ]) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <?= $form->field($transport, 'std_transport_vehicel_no')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-6">
            
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <?php if (!Yii::$app->request->isAjax){ ?>
                <div class="form-group">
                    <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                </div>
            <?php } ?>
        </div>
    </div>    

    <?php ActiveForm::end(); ?>
    
</div>

<script>
    $('#stdDiseaseID').on('change',function(){
        $("#stdDiseaseForm").show();
    });
</script>