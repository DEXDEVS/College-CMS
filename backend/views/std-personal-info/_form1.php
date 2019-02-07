<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\StdPersonalInfo */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="std-personal-info-form">

    <h3 class="well well-sm label-primary" style="margin-top: -10px;">Update Student Personal Info</h3>

    <?php $form = ActiveForm::begin(); ?>

    <!-- personal info -->
    <?= $form->field($model, 'std_reg_no')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'std_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'std_father_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'std_contact_no')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'std_DOB')->textInput() ?>

    <?= $form->field($model, 'std_gender')->dropDownList([ 'Male' => 'Male', 'Female' => 'Female', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'std_permanent_address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'std_temporary_address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'std_email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'std_photo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'std_b_form')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'std_district')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'std_religion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'std_nationality')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'std_tehseel')->textInput(['maxlength' => true]) ?>
    <!-- personal info -->

    <!-- Guardian info -->
    <?= $form->field($stdGuardianInfo, 'guardian_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($stdGuardianInfo, 'guardian_relation')->textInput(['maxlength' => true]) ?>

    <?= $form->field($stdGuardianInfo, 'guardian_cnic')->textInput(['maxlength' => true]) ?>

    <?= $form->field($stdGuardianInfo, 'guardian_email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($stdGuardianInfo, 'guardian_contact_no_1')->textInput(['maxlength' => true]) ?>

    <?= $form->field($stdGuardianInfo, 'guardian_contact_no_2')->textInput(['maxlength' => true]) ?>

    <?= $form->field($stdGuardianInfo, 'guardian_monthly_income')->textInput() ?>

    <?= $form->field($stdGuardianInfo, 'guardian_occupation')->textInput(['maxlength' => true]) ?>

    <?= $form->field($stdGuardianInfo, 'guardian_designation')->textInput(['maxlength' => true]) ?>
    <!-- Guardian indo end -->

    <!-- ICE info -->
    <?= $form->field($stdIceInfo, 'std_ice_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($stdIceInfo, 'std_ice_relation')->textInput(['maxlength' => true]) ?>

    <?= $form->field($stdIceInfo, 'std_ice_contact_no')->textInput(['maxlength' => true]) ?>
    <!-- ICE info -->

    <!-- Acadmic info -->
    <?= $form->field($stdAcademicInfo, 'class_name_id')->textInput() ?>

    <?= $form->field($stdAcademicInfo, 'subject_combination')->textInput() ?>

    <?= $form->field($stdAcademicInfo, 'previous_class')->textInput(['maxlength' => true]) ?>

    <?= $form->field($stdAcademicInfo, 'passing_year')->textInput(['maxlength' => true]) ?>

    <?= $form->field($stdAcademicInfo, 'previous_class_rollno')->textInput() ?>

    <?= $form->field($stdAcademicInfo, 'obtained_marks')->textInput(['id'=>'obtainedMarks']) ?>

    <?= $form->field($stdAcademicInfo, 'total_marks')->textInput(['id'=>'totalMarks']) ?>

    <?= $form->field($stdAcademicInfo, 'percentage')->textInput(['id'=>'percentage', 'readonly' => true]) ?>

    <?= $form->field($stdAcademicInfo, 'grades')->textInput(['maxlength' => true, 'id'=>'grade', 'readonly' => true]) ?>

    <?= $form->field($stdAcademicInfo, 'Institute')->textInput(['maxlength' => true]) ?>
    <!-- Acadmic info -->

    <!-- fee detail -->
    <?= $form->field($stdFeeDetails, 'admission_fee')->textInput() ?>

    <?= $form->field($stdFeeDetails, 'addmission_fee_discount')->textInput() ?>

    <?= $form->field($stdFeeDetails, 'net_addmission_fee')->textInput() ?>

    <?= $form->field($stdFeeDetails, 'fee_category')->dropDownList([ 'Annual' => 'Annual', 'Semester' => 'Semester', ], ['prompt' => '']) ?>

    <?= $form->field($stdFeeDetails, 'concession_id')->textInput() ?>

    <?= $form->field($stdFeeDetails, 'no_of_installment')->textInput() ?>

    <?= $form->field($stdFeeDetails, 'tuition_fee')->textInput() ?>

    <?= $form->field($stdFeeDetails, 'net_tuition_fee')->textInput() ?>
    <!-- fee detail -->
    <?php if (!Yii::$app->request->isAjax){ ?>
        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>
    <?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>

 





    