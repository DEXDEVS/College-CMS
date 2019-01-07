<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\StdFeePkg */
?>
<div class="std-fee-pkg-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'std_fee_id',
            'session_id',
            'class_id',
            'admission_fee',
            'tutuion_fee',
            'created_at',
            'created_by',
            'updated_at',
            'updated_by',
        ],
    ]) ?>

</div>
