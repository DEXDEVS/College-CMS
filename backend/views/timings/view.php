<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Timings */
?>
<div class="timings-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'timing_id',
            'Timings',
            'timing_description',
            'created_at',
            'updated_at',
            'created_by',
            'updated_by',
        ],
    ]) ?>

</div>
