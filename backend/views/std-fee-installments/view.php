<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\StdFeeInstallments */
?>
<div class="std-fee-installments-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'fee_installment_id',
            'std_fee_id',
            'installment_no',
            'installment_amount',
            'created_at',
            'updated_at',
            'created_by',
            'updated_by',
        ],
    ]) ?>

</div>
