<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Events */
?>
<div class="events-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'event_id',
            'event_title',
            'event_detail:ntext',
            'event_venue',
            'event_start_datetime',
            'event_end_datetime',
            'created_at',
            'created_by',
            'updated_at',
            'updated_by',
            'is_status',
        ],
    ]) ?>

</div>
