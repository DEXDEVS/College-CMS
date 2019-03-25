<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\Users;

$this->title = 'Signup';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Please fill out the following fields to signup:</p>

    <div class="row">
        <div class="col-lg-10">
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
                <div class="row">
                    <div class="col-md-4">
                        <?= $form->field($model, 'first_name')->textInput(['autofocus' => true]) ?>
                    </div>
                    <div class="col-md-4">
                        <?= $form->field($model, 'last_name')->textInput() ?>
                    </div>
                    <div class="col-md-4">
                        <?= $form->field($model, 'username')->textInput() ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <?= $form->field($model, 'email') ?>
                    </div>
                    <div class="col-md-4">
                        <?= $form->field($model, 'password')->passwordInput() ?>
                    </div>
                    <div class="col-md-4">
                        <?= $form->field($model, 'user_type')->dropDownList(
                            ArrayHelper::map(Users::find()->all(),'user_name','user_name'), ['prompt'=>'Select User Type']
                        )?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <?= $form->field($model, 'user_photo')->fileInput(['maxlength' => true, 'class' => 'btn btn-default btn-block paperclip']) ?>
                    </div>   
                </div>

                <div class="form-group">
                    <?= Html::submitButton('Signup', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
