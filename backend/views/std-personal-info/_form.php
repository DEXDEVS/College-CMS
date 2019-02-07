<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\web\UploadedFile;
use dosamigos\datetimepicker\DateTimePicker;
use kartik\select2\Select2;
use common\models\StdPersonalInfo;
use common\models\StdClassName;
use common\models\StdSessions;
use common\models\Concession;
use common\models\StdSubjects;

/* @var $this yii\web\View */
/* @var $model common\models\StdPersonalInfo */
/* @var $form yii\widgets\ActiveForm */
?>

<?php 
    $stdPersonalInfo = StdPersonalInfo::find()->orderBy(['std_id'=> SORT_DESC])->one();
    $id = $stdPersonalInfo['std_id']+1;
    $year = date('y');
?>

<div class="std-personal-info-form">
    <?php $form = ActiveForm::begin(); ?>
    <div style="border: 2px solid #337AB7; padding: 15px;">       
        <h3 style="color: #337AB7; margin-top: -10px"> Personal Info <small> ( Fields with <span style="color: red;">red stars </span>are required )</small> </h3>
        <div class="row">
            <div class="col-md-4">
                <!-- <i class="fa fa-star" style="font-size: 8px; color: red; position: absolute; left: 120px; top: 6px"></i> -->
                <?= $form->field($model, 'std_reg_no')->textInput(['maxlength' => true,'value'=> 'REG-Y'.$year.'-'.$id, 'readonly'=> true]) ?>
            </div>
        </div> 
        <div class="row">
            <div class="col-md-4">
                <i class="fa fa-star" style="font-size: 8px; color: red; position: absolute; left: 120px; top: 6px"></i>
                <?= $form->field($model, 'std_name')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-md-4">
                 <i class="fa fa-star" style="font-size: 8px; color: red; position: absolute; left: 167px; top: 6px"></i>
                <?= $form->field($model, 'std_father_name')->textInput(['maxlength' => true]) ?>
            </div>  
            <div class="col-md-4">
               <!-- <i class="fa fa-star" style="font-size: 8px; color: red; position: absolute; left: 156px; top: 6px"></i> -->
                <?= $form->field($model, 'std_contact_no')->widget(yii\widgets\MaskedInput::class, [ 'mask' => '+99-999-9999999', ]) ?>
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
                ([ 'Male' => 'Male', 'Female' => 'Female', ], ['prompt' => '']) ?>
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
            <div class="col-md-6">
                <i class="fa fa-star" style="font-size: 8px; color: red; position: absolute; left: 214px; top: 6px"></i>
                <?= $form->field($model, 'std_permanent_address')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-md-6">
                <!-- <i class="fa fa-star" style="font-size: 8px; color: red; position: absolute; left: 213px; top: 6px"></i> -->
                <?= $form->field($model, 'std_temporary_address')->textInput(['maxlength' => true]) ?>
            </div>
        </div>
    </div>
    <hr>

    <!-- Guardian Info-->
    <div style="border: 2px solid #5FDAF4; padding: 15px;">
        <h3 style="color: #5FDAF4; margin-top: -10px"> Guardian Info <small> ( Fields with <span style="color: red;">red stars </span>are required )</small> </h3>
        <div class="row">
            <div class="col-md-4">
                <i class="fa fa-star" style="font-size: 8px; color: red; position: absolute; left: 120px; top: 6px"></i>
                <?= $form->field($stdGuardianInfo, 'guardian_name')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-md-4">
                <i class="fa fa-star" style="font-size: 8px; color: red; position: absolute; left: 137px; top: 6px"></i>
                <?= $form->field($stdGuardianInfo, 'guardian_relation')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-md-4">
                <i class="fa fa-star" style="font-size: 8px; color: red; position: absolute; left: 113px; top: 6px"></i>
                <?= $form->field($stdGuardianInfo, 'guardian_cnic')->widget(yii\widgets\MaskedInput::class, [ 'mask' => '99999-9999999-9', ]) ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <i class="fa fa-star" style="font-size: 8px; color: red; position: absolute; left: 119px; top: 6px"></i>
                <?= $form->field($stdGuardianInfo, 'guardian_email')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-md-4">
                <i class="fa fa-star" style="font-size: 8px; color: red; position: absolute; left: 166px; top: 6px"></i>
                <?= $form->field($stdGuardianInfo, 'guardian_contact_no_1')->widget(yii\widgets\MaskedInput::class, [ 'mask' => '+99-999-9999999', ]) ?>
            </div>
            <div class="col-md-4">
                <i class="fa fa-star" style="font-size: 8px; color: red; position: absolute; left: 168px; top: 6px"></i>
                <?= $form->field($stdGuardianInfo, 'guardian_contact_no_2')->widget(yii\widgets\MaskedInput::class, [ 'mask' => '+99-999-9999999', ]) ?>  
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <i class="fa fa-star" style="font-size: 8px; color: red; position: absolute; left: 189px; top: 6px"></i>
                <?= $form->field($stdGuardianInfo, 'guardian_monthly_income')->textInput() ?>
            </div>
            <div class="col-md-4">
                <i class="fa fa-star" style="font-size: 8px; color: red; position: absolute; left: 159px; top: 6px"></i>
                <?= $form->field($stdGuardianInfo, 'guardian_occupation')->textInput(['maxlength' => true]) ?>
            </div>        
            <div class="col-md-4">
                <?= $form->field($stdGuardianInfo, 'guardian_designation')->textInput(['maxlength' => true]) ?>
            </div>
        </div><hr>
        
    <!-- ICE Info Start -->
    <h3 style="color: #5FDAF4; margin-top: -10px"> ICE Info </h3>
    <div class="row">
        <div class="col-md-4">
            <?= $form->field($stdIceInfo, 'std_ice_name')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($stdIceInfo, 'std_ice_relation')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($stdIceInfo, 'std_ice_contact_no')->widget(yii\widgets\MaskedInput::class, [ 'mask' => '+99-999-9999999', ]) ?>  
        </div>
    </div>
    <!-- ICE Info end -->
    </div>
    <!-- Guardian Info end -->
    <hr>
    
    <!-- Academic Info -->
    <div style="border: 2px solid #EC971F; padding: 15px;">
        <h3 style="color: #EC971F; margin-top: -10px"> Academic Info <small> ( Fields with <span style="color: red;">red stars </span>are required )</small> </h3>
        <div class="row">
            <div class="col-md-4">
                <!-- <i class="fa fa-star" style="font-size: 8px; color: red; position: absolute; left: 172px; top: 6px"></i> -->
                    <?= $form->field($stdAcademicInfo, 'class_name_id')->dropDownList(
                    ArrayHelper::map(StdClassName::find()->where(['delete_status'=>1])->all(),'class_name_id','class_name'),
                    ['prompt'=>'', 'id'=>'classId']

                )?>
            </div>
            <div class="col-md-8">
                <!-- <i class="fa fa-star" style="font-size: 8px; color: red; position: absolute; left: 158px; top: 6px"></i> -->
                    <?= $form->field($stdAcademicInfo, 'subject_combination')->dropDownList(
                        ArrayHelper::map(StdSubjects::find()->all(),'std_subject_id','std_subject_name'),
                        ['prompt'=>'Select Subject combination']
                    )?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <!-- <i class="fa fa-star" style="font-size: 8px; color: red; position: absolute; left: 118px; top: 6px"></i> -->
                    <?= $form->field($stdAcademicInfo, 'previous_class')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-md-4">
                <!-- <i class="fa fa-star" style="font-size: 8px; color: red; position: absolute; left: 166px; top: 6px"></i> -->
                    <?= $form->field($stdAcademicInfo, 'previous_class_rollno')->textInput() ?>
            </div>
            <div class="col-md-4">
                <!-- <i class="fa fa-star" style="font-size: 8px; color: red; position: absolute; left: 106px; top: 6px"></i> -->
                    <?= $form->field($stdAcademicInfo, 'passing_year')->textInput(['maxlength' => true]) ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <!-- <i class="fa fa-star" style="font-size: 8px; color: red; position: absolute; left: 122px; top: 6px"></i> -->
                    <?= $form->field($stdAcademicInfo, 'obtained_marks')->textInput(['id'=>'obtainedMarks']) ?>
            </div>
            <div class="col-md-4">
                <!-- <i class="fa fa-star" style="font-size: 8px; color: red; position: absolute; left: 95px; top: 6px"></i> -->
                    <?= $form->field($stdAcademicInfo, 'total_marks')->textInput(['id'=>'totalMarks']) ?>
                \</div>
            <div class="col-md-4">
                <!-- <i class="fa fa-star" style="font-size: 8px; color: red; position: absolute; left: 94px; top: 6px"></i> -->
                    <?= $form->field($stdAcademicInfo, 'percentage')->textInput(['maxlength' => true, 'id'=>'percentage', 'readonly' => true]) ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <!-- <i class="fa fa-star" style="font-size: 8px; color: red; position: absolute; left: 66px; top: 6px"></i> -->
                    <?= $form->field($stdAcademicInfo, 'grades')->textInput(['maxlength' => true, 'id'=>'grade', 'readonly' => true]) ?>
            </div>
            <div class="col-md-4">
                <!-- <i class="fa fa-star" style="font-size: 8px; color: red; position: absolute; left: 71px; top: 6px"></i> -->
                    <?= $form->field($stdAcademicInfo, 'Institute')->textInput(['maxlength' => true]) ?>
            </div>
        </div>
    </div>
    <hr>
    <!-- Academic Info end -->

    <!-- Fee detail start -->
    <div style="border: 2px solid red; padding: 15px;">
    
        <h3 style="color: red; margin-top: -10px"> Fee Detail <small> ( Fields with <span style="color: red;">red stars </span>are required )</small> </h3>
        <div class="row">
            <div class="col-md-3">
                <?= $form->field($stdFeeDetails, 'feeSession')->dropDownList(
                    ArrayHelper::map(StdSessions::find()->all(),'session_id','session_name'),
                        ['prompt'=>'Select Session','id'=>'sessionId']
                )?>
            </div>
            <div class="col-md-3">
                <i class="fa fa-star" style="font-size: 8px; color: red; position: absolute; left: 116px; top: 6px"></i>
                <?= $form->field($stdFeeDetails, 'admission_fee')->textInput(['type' => 'number','id' => 'admissionFee']) ?>
            </div>
            <div class="col-md-3">
                <i class="fa fa-star" style="font-size: 8px; color: red; position: absolute; left: 190px; top: 6px"></i>
                <?= $form->field($stdFeeDetails, 'addmission_fee_discount')->textInput(['type' => 'number','id' => 'admissionFeeDiscount']) ?>
            </div>
            <div class="col-md-3">
                <i class="fa fa-star" style="font-size: 8px; color: red; position: absolute; left: 151px; top: 6px"></i>
                <?= $form->field($stdFeeDetails, 'net_addmission_fee')->textInput(['type' => 'number', 'id' => 'netAdmissionFee', 'readonly'=> true, 'onfocus' => 'showNetAdmissionFee();' ]) ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <i class="fa fa-star" style="font-size: 8px; color: red; position: absolute; left: 105px; top: 6px"></i>
               <?= $form->field($stdFeeDetails, 'fee_category')->dropDownList([ 'Annual' => 'Annual', 'Semester' => 'Semester', ], ['prompt' => 'Select Category']) ?> 
            </div>
            <div class="col-md-3">
                <i class="fa fa-star" style="font-size: 8px; color: red; position: absolute; left: 92px; top: 6px"></i>
                <?= $form->field($stdFeeDetails, 'totalTuitionFee')->textInput(['type' => 'number','id' => 'totalTuitionFee']) ?>
            </div>
            <div class="col-md-3">
                <i class="fa fa-star" style="font-size: 8px; color: red; position: absolute; left: 114px; top: 6px"></i>
                <?= $form->field($stdFeeDetails, 'concession_id')->dropDownList(
                        ArrayHelper::map(Concession::find()->where(['delete_status'=>1])->all(),'concession_id','concession_name'),
                        ['prompt'=>'Select Concession Type','id'=>'concession']
                    )?>
            </div>
            <div class="col-md-3">
                <i class="fa fa-star" style="font-size: 8px; color: red; position: absolute; left: 92px; top: 6px"></i>
                <?= $form->field($stdFeeDetails, 'tuition_fee')->textInput(['type' => 'number','id' => 'tuitionFee']) ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <i class="fa fa-star" style="font-size: 8px; color: red; position: absolute; left: 133px; top: 6px"></i>
                <?= $form->field($stdFeeDetails, 'no_of_installment')->textInput(['type' => 'number','id' => 'noOfInstallment']) ?>
            </div>
            <div class="col-md-4">
                <i class="fa fa-star" style="font-size: 8px; color: red; position: absolute; left: 195px; top: 6px"></i>
                <?= $form->field($stdFeeDetails, 'net_tuition_fee')->textInput(['type' => 'number','id' => 'netTuitionFee','readonly'=> true, 'onfocus' => 'showNetTuitionFee();' ]) ?>
            </div>
        </div>
    </div>
    <!-- Fee detail end -->

  
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

	// calculate concession start....
	$('#concession').on('change',function(){
		var concession = $('#concession :selected').text();
		var totalTuitionFee = $('#totalTuitionFee').val();
		var fee;
	   	var con = parseInt(concession);
	   	if (con == '100') {
	   		$('#tuitionFee').val(10);
	   	}
	   	else if(con == '90'){
	   		fee = (totalTuitionFee*90)/100;
	   		$('#tuitionFee').val(fee);
	   	}
	   	else if(con == '80'){
	   		fee = (totalTuitionFee*80)/100;
	   		$('#tuitionFee').val(fee);
	   	}
	   	else if(con == '70'){
	   		fee = (totalTuitionFee*70)/100;
	   		$('#tuitionFee').val(fee);
	   	}
	   	else if(con == '60'){
	   		fee = (totalTuitionFee*60)/100;
	   		$('#tuitionFee').val(fee);
	   	}
	   	else if(con == '50'){
	   		fee = (totalTuitionFee*50)/100;
	   		$('#tuitionFee').val(fee);
	   	}
	   	else if(con == '40'){
	   		fee = (totalTuitionFee*40)/100;
	   		$('#tuitionFee').val(fee);
	   	}
	   	else if(con == '30'){
	   		fee = (totalTuitionFee*30)/100;
	   		$('#tuitionFee').val(fee);
	   	}
	   	else if(con == '25'){
	   		fee = (totalTuitionFee*25)/100;
	   		$('#tuitionFee').val(fee);
	   	}
	   	else{
	   		fee = (totalTuitionFee*50)/100;
	   		$('#tuitionFee').val(fee);
	   	}
	});
	// calculate concession end....
</script>
<?php
$url = \yii\helpers\Url::to("index.php?r=std-personal-info/fetch-fee");

$script = <<< JS

// calculate totalMarks....
    $('#totalMarks').on('change',function(){
        var tMarks = $('#totalMarks').val();
        var obtMarks = $('#obtainedMarks').val();
        var percentage = ((parseInt(obtMarks) / parseInt(tMarks))*100);
        var per = Math.round(percentage)+'%';
        $('#percentage').val(per);
        
    });

    // calculate percentage....
    $('#percentage').on('focus',function(){
       var percent = $('#percentage').val();
       

       var percentage = parseInt(percent);
       if (percentage>=90){
            $('#grade').val('A+');
       }
       else if (percentage>=80){
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

$('#sessionId').on('change',function(){
   var classId = $('#classId').val();
   var sessionId = $('#sessionId').val();
   
   $.ajax({
        type:'post',
        data:{class_Id:classId,session_Id:sessionId},
        url: "$url",

        success: function(result){
            
            var jsonResult = JSON.parse(result.substring(result.indexOf('{'), result.indexOf('}')+1));
            var addmissionFee = jsonResult['admission_fee'];
            var monthlyFee = jsonResult['tutuion_fee'];
            $('#admissionFee').val(addmissionFee);
            $('#totalTuitionFee').val(monthlyFee);
        }         
    }); 

});
// $('#sessionId').on('click',function(){
// var totalMarks = $('#totalMarks').val();
// var obtainedMarks = $('#obtainedMarks').val(); 
// var percentage = $('#percentage').val();
// var grade = $('#grade').val(); 

  
// alert(totalMarks);
//    alert(obtainedMarks);
//    alert(percentage);
//    alert(grade);
// });
JS;
$this->registerJs($script);
?>
</script>  