<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\StdRegistration */

$this->title = 'Update Std Registration: ' . $model->std_id;
$this->params['breadcrumbs'][] = ['label' => 'Std Registrations', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->std_id, 'url' => ['view', 'id' => $model->std_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="std-registration-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
