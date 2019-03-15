<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\StdRegistrationSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="std-registration-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'std_id') ?>

    <?= $form->field($model, 'std_reg_no') ?>

    <?= $form->field($model, 'std_name') ?>

    <?= $form->field($model, 'std_father_name') ?>

    <?= $form->field($model, 'std_contact_no') ?>

    <?php // echo $form->field($model, 'std_DOB') ?>

    <?php // echo $form->field($model, 'std_gender') ?>

    <?php // echo $form->field($model, 'std_permanent_address') ?>

    <?php // echo $form->field($model, 'std_temporary_address') ?>

    <?php // echo $form->field($model, 'std_email') ?>

    <?php // echo $form->field($model, 'std_photo') ?>

    <?php // echo $form->field($model, 'std_b_form') ?>

    <?php // echo $form->field($model, 'std_district') ?>

    <?php // echo $form->field($model, 'std_religion') ?>

    <?php // echo $form->field($model, 'std_nationality') ?>

    <?php // echo $form->field($model, 'std_tehseel') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'academic_status') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <?php // echo $form->field($model, 'created_by') ?>

    <?php // echo $form->field($model, 'updated_by') ?>

    <?php // echo $form->field($model, 'delete_status') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
