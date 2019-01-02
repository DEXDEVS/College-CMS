<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\web\UploadedFile;
use dosamigos\datetimepicker\DateTimePicker;
use kartik\select2\Select2;
use common\models\StdClassName;
use common\models\Concession;

/* @var $this yii\web\View */
/* @var $model common\models\StdPersonalInfo */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="std-personal-info-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <div style="border: 2px solid #337AB7; padding: 15px;">    
        <h3 style="color: #337AB7; margin-top: -10px"> Personal Info </h3>
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
                <label>Stdudent DOB</label>
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
    </div>
    <hr>

    <!-- Guardian Info-->
    <div style="border: 2px solid #5FDAF4; padding: 15px;">
        <h3 style="color: #5FDAF4; margin-top: -10px"> Guardian Info </h3>
        <div class="row">
            <div class="col-md-4">
                <?= $form->field($stdGuardianInfo, 'guardian_name')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-md-4">
                <?= $form->field($stdGuardianInfo, 'guardian_relation')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-md-4">
                <?= $form->field($stdGuardianInfo, 'guardian_cnic')->textInput(['maxlength' => true]) ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <?= $form->field($stdGuardianInfo, 'guardian_email')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-md-4">
                <?= $form->field($stdGuardianInfo, 'guardian_contact_no_1')->widget(yii\widgets\MaskedInput::class, [ 'mask' => '+99-999-9999999', ]) ?>
            </div>
            <div class="col-md-4">
                <?= $form->field($stdGuardianInfo, 'guardian_contact_no_2')->widget(yii\widgets\MaskedInput::class, [ 'mask' => '+99-999-9999999', ]) ?>  
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <?= $form->field($stdGuardianInfo, 'guardian_monthly_income')->textInput() ?>
            </div>
            <div class="col-md-4">
                <?= $form->field($stdGuardianInfo, 'guardian_occupation')->textInput(['maxlength' => true]) ?>
            </div>
        </div>  
    </div>
    <hr>
    <!-- Guardian Info end -->

    
    <div style="border: 2px solid #EC971F; padding: 15px;">
        <!-- Aca demic Info -->
        <h3 style="color: #EC971F; margin-top: -10px"> Academic Info </h3>
        <div class="row">
            <div class="col-md-4">
                <?= $form->field($stdAcademicInfo, 'class_name_id')->dropDownList(
                        ArrayHelper::map(StdClassName::find()->all(),'class_name_id','class_name'),
                        ['prompt'=>'']
                    )?>
            </div>
            <div class="col-md-4">
                <?= $form->field($stdAcademicInfo, 'subject_combination')->textInput(['maxlength' => true]) ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <?= $form->field($stdAcademicInfo, 'previous_class')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-md-4">
               <?= $form->field($stdAcademicInfo, 'passing_year')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-md-4">
                <?= $form->field($stdAcademicInfo, 'previous_class_rollno')->textInput() ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <?= $form->field($stdAcademicInfo, 'obtained_marks')->textInput(['id'=>'obtainedMarks']) ?>
            </div>
            <div class="col-md-4">
                <?= $form->field($stdAcademicInfo, 'total_marks')->textInput(['id'=>'totalMarks']) ?> 
            </div>
            <div class="col-md-4">
                <?= $form->field($stdAcademicInfo, 'percentage')->textInput(['id'=>'percentage', 'readonly' => true]) ?>    
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <?= $form->field($stdAcademicInfo, 'grades')->textInput(['id'=>'grade', 'readonly' => true]) ?>  
            </div>
            <div class="col-md-4">
                <?= $form->field($stdAcademicInfo, 'Institute')->textInput(['maxlength' => true]) ?>
            </div>
        </div>
    </div>
    <hr>
        <!-- Academic Info end -->

        <div style="border: 2px solid red; padding: 15px;">
            <!-- Fee detail start -->
        <h3 style="color: red; margin-top: -10px"> Fee Detail </h3>
        <div class="row">
            <div class="col-md-4">
                <?= $form->field($stdFeeDetails, 'admission_fee')->textInput(['type' => 'number','id' => 'admissionFee']) ?>
            </div>
            <div class="col-md-4">
                <?= $form->field($stdFeeDetails, 'addmission_fee_discount')->textInput(['type' => 'number','id' => 'admissionFeeDiscount']) ?>
            </div>
            <div class="col-md-4">
                <?= $form->field($stdFeeDetails, 'net_addmission_fee')->textInput(['type' => 'number', 'id' => 'netAdmissionFee', 'readonly'=> true, 'onfocus' => 'showNetAdmissionFee();' ]) ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
               <?= $form->field($stdFeeDetails, 'fee_category')->dropDownList([ 'Annual' => 'Annual', 'Semester' => 'Semester', ], ['prompt' => 'Select Category']) ?> 
            </div>
            <div class="col-md-4">
                <?= $form->field($stdFeeDetails, 'concession_id')->dropDownList(
                        ArrayHelper::map(Concession::find()->all(),'concession_id','concession_name'),
                        ['prompt'=>'Select Concession Type']
                    )?>
            </div>
            <div class="col-md-4">
                <?= $form->field($stdFeeDetails, 'tuition_fee')->textInput(['type' => 'number','id' => 'tuitionFee']) ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <?= $form->field($stdFeeDetails, 'no_of_installment')->textInput(['type' => 'number','id' => 'noOfInstallment']) ?>
            </div>
            <div class="col-md-4">
                <?= $form->field($stdFeeDetails, 'net_tuition_fee')->textInput(['type' => 'number','id' => 'netTuitionFee','readonly'=> true, 'onfocus' => 'showNetTuitionFee();' ]) ?>
            </div>
        </div>
        <!-- Fee detail end -->
    </div>

  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
<script type="text/javascript">
            // showNetMonthlyFee function...!
            function showNetAdmissionFee() {
                var value1 = document.getElementById('admissionFee').value;
                var value2 = document.getElementById('admissionFeeDiscount').value;
                document.getElementById('netAdmissionFee').value = value1 - value2 ;
            }
            // showNetTuitionFee function...!
            function showNetTuitionFee() {
                var value1 = document.getElementById('tuitionFee').value;
                var value2 = document.getElementById('noOfInstallment').value;
                document.getElementById('netTuitionFee').value = parseInt(value1 / value2);
            }
$('#totalMarks').on('change',function(){
   var totalMarks = $('#totalMarks').val();
   var obtainedMarks = $('#obtainedMarks').val();
   var percentage = ((parseInt(obtainedMarks) / parseInt(totalMarks))*100);
   $('#percentage').val(percentage);
   //$('#grade').val(percentage);
});

$('#percentage').on('focus',function(){
   var percent = $('#percentage').val();
   // console.log(percent);
   // alert(percent);

   var percentage = parseInt(percent);
   if (percentage>=90) {
        $('#grade').val('A+');
   }
   else if (percentage>=80) {
        $('#grade').val('A'); 
   }
   else if (percentage>=70){
        $('#grade').val('B+');
   }
   else if (percentage>=60){
        $('#grade').val('B');
   }
   else if (percentage>=50){
        $('#grade').val('C');
   }
   else if (percentage>=40){
        $('#grade').val('D');
   }else{
        $('#grade').val('F');
   }

});
</script>
        
