<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\EmpInfo;
use common\models\EmpDesignation;
use common\models\EmpType;
use common\models\Branches;

/* @var $this yii\web\View */
/* @var $model common\models\EmpInfo */
/* @var $form yii\widgets\ActiveForm */
?>

<?php 
    $empInfo = EmpInfo::find()->orderBy(['emp_id'=> SORT_DESC])->one();
    $id = $empInfo['emp_id']+1;
    $year = date('y');
?>
<div class="emp-info-form">

    <?php $form = ActiveForm::begin(); ?>
    <h3 style="color: #337AB7; margin-top: -10px"> Employee Info <small> ( Fields with <span style="color: red;">red stars </span>are required )</small> </h3>
    <div class="row">
        <div class="col-md-4">
            <!-- <i class="fa fa-star" style="font-size: 8px; color: red; position: absolute; left: 120px; top: 6px"></i> -->
            <?= $form->field($model, 'emp_reg_no')->textInput(['maxlength' => true,'value'=> 'EMP-Y'.$year.'-'.$id, 'readonly'=> true]) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <i class="fa fa-star" style="font-size: 8px; color: red; position: absolute; left: 125px; top: 6px"></i>
            <?= $form->field($model, 'emp_name')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-4">
            <i class="fa fa-star" style="font-size: 8px; color: red; position: absolute; left: 101px; top: 6px"></i>
            <?= $form->field($model, 'emp_father_name')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-4">
            <i class="fa fa-star" style="font-size: 8px; color: red; position: absolute; left: 129px; top: 6px"></i>
            <?= $form->field($model, 'emp_cnic')->widget(yii\widgets\MaskedInput::class, [ 'mask' => '99999-9999999-9', ]) ?>
        </div>
    </div>    
    <div class="row">
        <div class="col-md-4">
            <i class="fa fa-star" style="font-size: 8px; color: red; position: absolute; left: 162px; top: 6px"></i>
            <?= $form->field($model, 'emp_contact_no')->widget(yii\widgets\MaskedInput::class, [ 'mask' => '+99-999-9999999', ]) ?>
        </div>
        <div class="col-md-4">
            <!-- <i class="fa fa-star" style="font-size: 8px; color: red; position: absolute; left: 55px; top: 6px"></i> -->
            <?= $form->field($model, 'emp_email')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-4">
            <i class="fa fa-star" style="font-size: 8px; color: red; position: absolute; left: 66px; top: 6px"></i>
            <?= $form->field($model, 'emp_gender')->dropDownList([ 'Male' => 'Male', 'Female' => 'Female', ], ['prompt' => 'Select Gender']) ?>
        </div>
    </div>
    <div class="row">        
        <div class="col-md-4">
            <!-- <i class="fa fa-star" style="font-size: 8px; color: red; position: absolute; left: 56px; top: 6px"></i> -->
            <?= $form->field($model, 'emp_photo')->fileInput() ?>
        </div>
        <div class="col-md-4">
            <i class="fa fa-star" style="font-size: 8px; color: red; position: absolute; left: 148px; top: 6px"></i>
            <?= $form->field($model, 'emp_perm_address')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-4">
            <!-- <i class="fa fa-star" style="font-size: 8px; color: red; position: absolute; left: 148px; top: 6px"></i> -->
            <?= $form->field($model, 'emp_temp_address')->textInput(['maxlength' => true]) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <i class="fa fa-star" style="font-size: 8px; color: red; position: absolute; left: 108px; top: 6px"></i>
            <?= $form->field($model, 'emp_marital_status')->dropDownList([ 'Single' => 'Single', 'Married' => 'Married', ], ['prompt' => 'Select Merital Status']) ?>
        </div>
        <div class="col-md-4">
            <!-- <i class="fa fa-star" style="font-size: 8px; color: red; position: absolute; left: 102px; top: 6px"></i> -->
            <?= $form->field($model, 'emp_qualification')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-4">
            <!-- <i class="fa fa-star" style="font-size: 8px; color: red; position: absolute; left: 104px; top: 6px"></i> -->
            <?= $form->field($model, 'emp_passing_year')->textInput() ?>
        </div>
    </div>
    <div class="row">
        
        <div class="col-md-4">
            <!-- <i class="fa fa-star" style="font-size: 8px; color: red; position: absolute; left: 113px; top: 6px"></i> -->
            <?= $form->field($model, 'emp_institute_name')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-4">
            <!-- <i class="fa fa-star" style="font-size: 8px; color: red; position: absolute; left: 173px; top: 6px"></i> -->
            <?= $form->field($model, 'degree_scan_copy')->fileInput() ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <i class="fa fa-star" style="font-size: 8px; color: red; position: absolute; left: 97px; top: 6px"></i>
            <?= $form->field($model, 'emp_designation_id')->dropDownList(
                    ArrayHelper::map(EmpDesignation::find()->where(['delete_status'=>1])->all(),'emp_designation_id','emp_designation'), ['prompt'=>'Select Designation']
                )?>
        </div>
        <div class="col-md-4">
            <i class="fa fa-star" style="font-size: 8px; color: red; position: absolute; left: 50px; top: 6px"></i>
            <?= $form->field($model, 'emp_type_id')->dropDownList(
                    ArrayHelper::map(EmpType::find()->where(['delete_status'=>1])->all(),'emp_type_id','emp_type'), ['prompt'=>'Select Type']
                )?>
        </div>
        <div class="col-md-4">
            <i class="fa fa-star" style="font-size: 8px; color: red; position: absolute; left: 80px; top: 6px"></i>
            <?= $form->field($model, 'group_by')->dropDownList([ 'Faculty' => 'Faculty', 'Management' => 'Management', 'Clerical Staff' => 'Clerical Staff', 'Office Boys' => 'Office Boys', 'Security Guard' => 'Security Guard'], ['prompt' => 'Select Group']) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <i class="fa fa-star" style="font-size: 8px; color: red; position: absolute; left: 107px; top: 6px"></i>
            <?= $form->field($model, 'emp_branch_id')->dropDownList(
                    ArrayHelper::map(Branches::find()->where(['delete_status'=>1])->all(),'branch_id','branch_name'), ['prompt'=>'Select Branch']
                )?>
        </div>
        <div class="col-md-4">
            <i class="fa fa-star" style="font-size: 8px; color: red; position: absolute; left: 58px; top: 6px"></i>
            <?= $form->field($model, 'emp_salary')->textInput() ?>
        </div>
        <div class="col-md-4">
           <?= $form->field($model,'reference')->dropDownList([ 'Yes' => 'Yes', 'No' => 'No', ], 
           ['prompt' => 'Select Group', 'id' => 'reference']) ?> 
        </div>
    </div>

    <!-- Form of Employee Reference -->
    <div id="referenceshow" style="display: none;">
        <h3 style="color: #337AB7; margin-top: -10px"> Employee Refrence <small> ( Fields with <span style="color: red;">red stars </span>are required )</small> </h3>
        <div class="row">
            <div class="col-md-4">
                <i class="fa fa-star" style="font-size: 8px; color: red; position: absolute; left: 81px; top: 6px"></i>
                <?= $form->field($empRefModel, 'ref_name')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-md-4">
                <i class="fa fa-star" style="font-size: 8px; color: red; position: absolute; left: 118px; top: 6px"></i>
                <?= $form->field($empRefModel, 'ref_contact_no')->widget(yii\widgets\MaskedInput::class, [ 'mask' => '+99-999-9999999', ]) ?>
            </div>
            <div class="col-md-4">
                <i class="fa fa-star" style="font-size: 8px; color: red; position: absolute; left: 75px; top: 6px"></i>
                <?= $form->field($empRefModel, 'ref_cnic')->widget(yii\widgets\MaskedInput::class, [ 'mask' => '99999-9999999-9', ]) ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <i class="fa fa-star" style="font-size: 8px; color: red; position: absolute; left: 123px; top: 6px"></i>
                <?= $form->field($empRefModel, 'ref_designation')->textInput(['maxlength' => true]) ?>
            </div>
        </div>
    </div>  
    
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
<?php
$script = <<< JS
$('#reference').on('change',function(){ 
    if($("#reference").val() == 'Yes'){
        $("#referenceshow").show()
    } else {
        $("#referenceshow").hide()
    }
    });
JS;
$this->registerJs($script);
?> 