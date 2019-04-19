<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\StdSessions */
?>
<div class="std-sessions-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'session_id',
            'sessionBranch.branch_name',
            'session_name',
            'session_start_date',
            'session_end_date',
            'installment_cycle',
            'status',
            'created_at',
            'updated_at',
            'created_by',
            'updated_by',
        ],
    ]) ?>

</div>
