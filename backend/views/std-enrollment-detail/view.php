<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\StdEnrollmentDetail */
?>
<div class="std-enrollment-detail-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'std_enroll_detail_id',
            'std_enroll_detail_head_id',
            'std_enroll_detail_std_id',
            'std_roll_no'
            'created_at',
            'updated_at',
            'created_by',
            'updated_by',
        ],
    ]) ?>

</div>
