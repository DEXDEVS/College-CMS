<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\StdAttendanceDetail */
?>
<div class="std-attendance-detail-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'std_atten_detail_id',
            'std_atten_detail_head_id',
            'std_atten_detail_std_id',
            'std_roll_no',
            'std_present',
            'std_absent',
            'std_leave',
            'created_at',
            'updated_at',
            'created_by',
            'updated_by',
        ],
    ]) ?>

</div>
