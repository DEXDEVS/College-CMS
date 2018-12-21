<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\StdAcademicInfoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="std-academic-info-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'academic_id') ?>

    <?= $form->field($model, 'std_id') ?>

    <?= $form->field($model, 'class_name_id') ?>

    <?= $form->field($model, 'previous_class') ?>

    <?= $form->field($model, 'passing_year') ?>

    <?php // echo $form->field($model, 'total_marks') ?>

    <?php // echo $form->field($model, 'obtained_marks') ?>

    <?php // echo $form->field($model, 'grades') ?>

    <?php // echo $form->field($model, 'percentage') ?>

    <?php // echo $form->field($model, 'Institute') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <?php // echo $form->field($model, 'created_by') ?>

    <?php // echo $form->field($model, 'updated_by') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
