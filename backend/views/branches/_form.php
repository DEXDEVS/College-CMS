<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\Institute;

/* @var $this yii\web\View */
/* @var $model common\models\Branches */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="branches-form">

    <?php $form = ActiveForm::begin(); ?>
     <h3 style="color: #337AB7; margin-top: -10px"><small> ( Fields with <span style="color: red;">red stars </span>are required )</small> </h3>
    <div class="row">
        <!-- <div class="col-md-6"> -->

        <div class="col-md-4">
            <i class="fa fa-star" style="font-size: 8px; color: red; position: relative; left: 97px; top: 18px"></i>
            <?= $form->field($model, 'institute_id')->dropDownList(
                ArrayHelper::map(Institute::find()->where(['delete_status'=>1])->all(),'institute_id','institute_name'),
                ['prompt'=>'Select Institute',]
            )?>
        </div>
        <div class="col-md-4">
            <i class="fa fa-star" style="font-size: 8px; color: red; position: relative; left: 88px; top: 18px"></i>
            <?= $form->field($model, 'branch_code')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-4">
            <i class="fa fa-star" style="font-size: 8px; color: red; position: relative; left: 91px; top: 18px"></i>
            <?= $form->field($model, 'branch_name')->textInput(['maxlength' => true]) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <i class="fa fa-star" style="font-size: 8px; color: red; position: relative; left: 84px; top: 18px"></i>
            <?= $form->field($model, 'branch_type')->dropDownList([ 'Franchise' => 'Franchise', 'Group' => 'Group', ], ['prompt' => '']) ?>
        </div>
        <div class="col-md-4">
            <i class="fa fa-star" style="font-size: 8px; color: red; position: relative; left: 111px; top: 18px"></i>
            <?= $form->field($model, 'branch_location')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-4">
            <i class="fa fa-star" style="font-size: 8px; color: red; position: relative; left: 128px; top: 18px"></i>
            <?= $form->field($model, 'branch_contact_no')->widget(yii\widgets\MaskedInput::class, [ 'mask' => '999-99-99999', ]) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <i class="fa fa-star" style="font-size: 8px; color: red; position: relative; left: 90px; top: 17px"></i>
            <?= $form->field($model, 'branch_email')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-4">
            <i class="fa fa-star" style="font-size: 8px; color: red; position: relative; left: 129px; top: 18px"></i>
            <?= $form->field($model, 'branch_head_name')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-4">
            <i class="fa fa-star" style="font-size: 8px; color: red; position: relative; left: 166px; top: 17px"></i>
            <?= $form->field($model, 'branch_head_contact_no')->widget(yii\widgets\MaskedInput::class, [ 'mask' => '+99-999-9999999', ]) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <i class="fa fa-star" style="font-size: 8px; color: red; position: relative; left: 129px; top: 16px"></i>
            <?= $form->field($model, 'branch_head_email')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-4">
            <i class="fa fa-star" style="font-size: 8px; color: red; position: relative; left: 44px; top: 18px"></i>
            <?= $form->field($model, 'status')->dropDownList([ 'Active' => 'Active', 'Inactive' => 'Inactive', ], ['prompt' => '']) ?>
        </div>
    </div>    
    
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
