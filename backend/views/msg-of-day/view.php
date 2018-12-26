<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\MsgOfDay */
?>
<div class="msg-of-day-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'msg_of_day_id',
            'msg_details',
            'msg_user_type',
            'created_at',
            'created_by',
            'updated_at',
            'updated_by',
            'is_status',
        ],
    ]) ?>

</div>
