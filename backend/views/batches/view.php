<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Batches */
?>
<div class="batches-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'batch_id',
            'batch_program_id',
            'batch_name',
            'batch_start_date',
            'batch_end_date',
            'batch_status',
            'created_at',
            'updated_at',
            'created_by',
            'updated_by',
        ],
    ]) ?>

</div>
