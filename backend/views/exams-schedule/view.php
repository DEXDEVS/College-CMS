<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\ExamsSchedule */
?>
<div class="exams-schedule-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'exam_schedule_id',
            'exam_criteria_id',
            'subject_id',
            'emp_id',
            'date',
            'full_marks',
            'passing_marks',
            'created_at',
            'updated_at',
            'created_by',
            'updated_by',
        ],
    ]) ?>

</div>
