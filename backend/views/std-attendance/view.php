<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\StdAttendance */
?>
<div class="std-attendance-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'std_attend_id',
            'teacher_id',
            'class_id',
            'date',
            'student_id',
            'status',
        ],
    ]) ?>

</div>
