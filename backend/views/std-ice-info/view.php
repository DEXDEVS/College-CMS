<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\StdIceInfo */
?>
<div class="std-ice-info-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'std_ice_id',
            'std_id',
            'std_ice_name',
            'std_ice_relation',
            'std_ice_contact_no',
            'std_ice_address',
            'created_at',
            'created_by',
            'updated_at',
            'updated_by',
            'delete_status',
        ],
    ]) ?>

</div>
