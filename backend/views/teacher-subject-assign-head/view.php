<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\TeacherSubjectAssignHead */
?>
<div class="teacher-subject-assign-head-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'teacher_subject_assign_head_id',
            'teacher_id',
            'teacher_subject_assign_head_name',
            'created_at',
            'updated_at',
            'created_by',
            'updated_by',
        ],
    ]) ?>

</div>
