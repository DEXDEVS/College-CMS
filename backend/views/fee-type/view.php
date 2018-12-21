<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\FeeType */
?>
<div class="fee-type-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'fee_type_id',
            'fee_type_name',
            'fee_type_description',
            'fee_amount',
            'starting_date',
            'ending_date',
            'created_at',
            'updated_at',
            'created_by',
            'updated_by',
        ],
    ]) ?>

</div>
