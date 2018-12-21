<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\StdTransportInfo */
?>
<div class="std-transport-info-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'std_transport_id',
            'std_transport_std_id',
            'std_transport_type',
            'std_transport_driver_contact_no',
            'std_transport_vehicel_no',
            'created_at',
            'updated_at',
            'created_by',
            'updated_by',
        ],
    ]) ?>

</div>
