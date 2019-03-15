<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\StdRegistrationSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Std Registrations';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="std-registration-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Std Registration', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'std_id',
            'std_reg_no',
            'std_name',
            'std_father_name',
            'std_contact_no',
            //'std_DOB',
            //'std_gender',
            //'std_permanent_address',
            //'std_temporary_address',
            //'std_email:email',
            //'std_photo',
            //'std_b_form',
            //'std_district',
            //'std_religion',
            //'std_nationality',
            //'std_tehseel',
            //'status',
            //'academic_status',
            //'created_at',
            //'updated_at',
            //'created_by',
            //'updated_by',
            //'delete_status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
