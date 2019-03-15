<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\StdRegistration */

$this->title = $model->std_id;
$this->params['breadcrumbs'][] = ['label' => 'Std Registrations', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="std-registration-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->std_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->std_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'std_id',
            'std_reg_no',
            'std_name',
            'std_father_name',
            'std_contact_no',
            'std_DOB',
            'std_gender',
            'std_permanent_address',
            'std_temporary_address',
            'std_email:email',
            'std_photo',
            'std_b_form',
            'std_district',
            'std_religion',
            'std_nationality',
            'std_tehseel',
            'status',
            'academic_status',
            'created_at',
            'updated_at',
            'created_by',
            'updated_by',
            'delete_status',
        ],
    ]) ?>

</div>
