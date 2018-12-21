<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\StdDisease */
?>
<div class="std-disease-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'std_disease_id',
            'std_disease_std_id',
            'std_disease_level',
            'std_blood_group',
            'std_dr_name',
            'std_dr_contact_no',
            'created_at',
            'updated_at',
            'created_by',
            'updated_by',
        ],
    ]) ?>

</div>
