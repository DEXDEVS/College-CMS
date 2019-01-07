<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\Concession;

/* @var $this yii\web\View */
/* @var $model common\models\StdFeeDetails */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="std-fee-details-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-md-4">
            <?= $form->field($model, 'std_id')->textInput() ?>
        </div>  
    </div>
    <div class="row">
        <div class="col-md-4">
            <?= $form->field($model, 'admission_fee')->textInput(['type' => 'number','id' => 'admissionFee']) ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'addmission_fee_discount')->textInput(['type' => 'number','id' => 'admissionFeeDiscount']) ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'net_addmission_fee')->textInput(['type' => 'number', 'id' => 'netAdmissionFee', 'readonly'=> true, 'onfocus' => 'showNetAdmissionFee();' ]) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
           <?= $form->field($model, 'fee_category')->dropDownList([ 'Annual' => 'Annual', 'Semester' => 'Semester', ], ['prompt' => 'Select Category']) ?> 
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'concession_id')->dropDownList(
                    ArrayHelper::map(Concession::find()->where(['delete_status'=>1])->all(),'concession_id','concession_name'),
                    ['prompt'=>'Select Concession Type']
                )?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'tuition_fee')->textInput(['type' => 'number','id' => 'tuitionFee']) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <?= $form->field($model, 'no_of_installment')->textInput(['type' => 'number','id' => 'noOfInstallment']) ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'net_tuition_fee')->textInput(['type' => 'number','id' => 'netTuitionFee','readonly'=> true, 'onfocus' => 'showNetTuitionFee();' ]) ?>
        </div>
    </div>
  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
<script type="text/javascript">
            // showNetAdmissionFee function...!
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
</script>
