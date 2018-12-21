<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\StdFeeDetails */
?>
<div class="std-fee-details-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'fee_id',
            'std_id',
            'admission_fee',
            'addmission_fee_discount',
            'net_addmission_fee',
            'monthly_fee',
            'monthly_fee_discount',
            'net_monthly_fee',
            'created_at',
            'updated_at',
            'created_by',
            'updated_by',
        ],
    ]) ?>

</div>
