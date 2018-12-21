<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

$this->title = 'Sign In';

$fieldOptions1 = [
    'options' => ['class' => 'form-group has-feedback'],
    'inputTemplate' => "{input}<span class='glyphicon glyphicon-envelope form-control-feedback'></span>"
];

$fieldOptions2 = [
    'options' => ['class' => 'form-group has-feedback'],
    'inputTemplate' => "{input}<span class='glyphicon glyphicon-lock form-control-feedback'></span>"
];
?>

<div class="login-box" style="margin-top: 20px">
    <!-- /.login-logo -->
    <div class="login-box-body">
        <p class="text-center" style="font-weight: bold; font-size: 20px; color: #2BBED0;">WelcomeTo</p>
        <img class="img-rounded img-responsive" src="images/logo.jpg" width="300px">
        <p class="login-box-msg" style="color: #2BBED0;">Sign in to start your session</p>

        <?php $form = ActiveForm::begin(['id' => 'login-form', 'enableClientValidation' => false]); ?>

        <?= $form
            ->field($model, 'username', $fieldOptions1)
            ->label(false)
            ->textInput(['placeholder' => $model->getAttributeLabel('username')]) ?>

        <?= $form
            ->field($model, 'password', $fieldOptions2)
            ->label(false)
            ->passwordInput(['placeholder' => $model->getAttributeLabel('password')]) ?>

        <div class="row">
            <div class="col-xs-8">
                <?= $form->field($model, 'rememberMe')->checkbox() ?>
            </div>
            <!-- /.col -->
        </div>

        <div class="row">
            <div class="col-md-12">
                <b><?= Html::submitButton('Sign in', ['class' => 'btn btn-success btn-block btn-flat', 'name' => 'login-button']) ?></b>
            </div>
        </div>


        <?php ActiveForm::end(); ?>

        <!-- <div class="social-auth-links text-center">
            <p>- OR -</p>
            <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in
                using Facebook</a>
            <a href="#" class="btn btn-block btn-danger btn-social btn-google-plus btn-flat"><i class="fa fa-google-plus"></i> Sign
                in using Google+</a>
        </div> -->
        <!-- /.social-auth-links -->
        <hr>
        
        <div class="row">
            <div class="col-md-6">
                <a href="index.php?r=site/request-password-reset" class="btn btn-warning btn-block btn-flat btn-sm" style="float: left;"><b>Reset Password</b></a>
            </div>
            <div class="col-md-6">
                <a href="index.php?r=site/signup" class="btn btn-primary btn-block btn-sm btn-flat" style="float: right;"><b>Register a new user</b></a>        
            </div>
        </div>

    </div>
    <!-- /.login-box-body -->
</div><!-- /.login-box -->
