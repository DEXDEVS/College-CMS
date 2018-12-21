<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\Branches;

/* @var $this yii\web\View */
/* @var $model common\models\Departments */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="departments-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-md-6">
           <?= $form->field($model, 'dept_branch_id')->dropDownList(
              ArrayHelper::map(Branches::find()->all(),'branch_id','branch_name')
            ); ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'dept_name')->textInput(['maxlength' => true]) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
             <?= $form->field($model, 'dept_description')->textInput(['maxlength' => true]) ?>
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
