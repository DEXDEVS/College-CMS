<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\StdAttendanceHead */
?>
<div class="std-attendance-head-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'std_atten_head_id',
            'std_atten_head_class_id',
            'std_atten_head_course_id',
            'datetime',
            'total_students',
            'total_present_students',
            'total_absent_students',
            'Total_leave_students',
            'created_at',
            'updated_at',
            'created_by',
            'updated_by',
        ],
    ]) ?>

</div>
