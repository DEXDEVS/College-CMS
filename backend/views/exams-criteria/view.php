<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\ExamsCriteria */
?>
<div class="exams-criteria-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'exam_criteria_id',
            'exam_category_id',
            'std_enroll_head_id',
            'exam_start_date',
            'exam_end_date',
            'exam_start_time',
            'exam_end_time',
            'exam_room',
            'created_at',
            'updated_at',
            'created_by',
            'updated_by',
        ],
    ]) ?>

</div>
