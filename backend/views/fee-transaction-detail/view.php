<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\FeeTransactionDetail */
?>
<div class="fee-transaction-detail-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'fee_trans_detail_id',
            'fee_trans_detail_head_id',
            'fee_type_id',
            'fee_amount',
            'collected_fee_amount',
            'remaining',
            'status',
            'created_at',
            'updated_at',
            'created_by',
            'updated_by',
        ],
    ]) ?>

</div>
