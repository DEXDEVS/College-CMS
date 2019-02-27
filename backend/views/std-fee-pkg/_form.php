<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\StdClassName;
use common\models\StdSessions;

/* @var $this yii\web\View */
/* @var $model common\models\StdFeePkg */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="std-fee-pkg-form">

    <?php $form = ActiveForm::begin(); ?>
    <h3 style="color: #337AB7; margin-top: -10px"><small> ( Fields with <span style="color: red;">red stars </span>are required )</small> </h3>
    <div class="row">
        <div class="col-md-6">
            <i class="fa fa-star" style="font-size: 8px; color: red; position: relative; left: 54px; top: 18px"></i>
            <?= $form->field($model, 'session_id')->dropDownList(
                    ArrayHelper::map(StdSessions::find()->where(['delete_status'=>1])->all(),'session_id','session_name'),
                    ['prompt'=>'Select Session',]
                )?>
        </div>
        <div class="col-md-6">
            <i class="fa fa-star" style="font-size: 8px; color: red; position: relative; left: 84px; top: 18px"></i>
            <?= $form->field($model, 'class_id')->dropDownList(
                    ArrayHelper::map(StdClassName::find()->where(['delete_status'=>1])->all(),'class_name_id','class_name'),
                    ['prompt'=>'Select Class',]
                )?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <i class="fa fa-star" style="font-size: 8px; color: red; position: relative; left: 100px; top: 18px"></i>
            <?= $form->field($model, 'admission_fee')->textInput() ?>
            </div>
        <div class="col-md-6">
            <i class="fa fa-star" style="font-size: 8px; color: red; position: relative; left: 79px; top: 18px"></i>
            <?= $form->field($model, 'tutuion_fee')->textInput() ?>
        </div>
    </div>

	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
