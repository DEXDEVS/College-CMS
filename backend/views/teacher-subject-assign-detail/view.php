<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\TeacherSubjectAssignDetail */
?>
<div class="teacher-subject-assign-detail-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'teacher_subject_assign_detail_id',
            'teacher_subject_assign_detail_head_id',
            'class_id',
            'subject_id',
            'no_of_lecture',
            'created_at',
            'updated_at',
            'created_by',
            'updated_by',
            'delete_status',
        ],
    ]) ?>

</div>
