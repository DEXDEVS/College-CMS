<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\CourseEnrollmentHead */
?>
<div class="course-enrollment-head-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'course_enroll_head_id',
            'course_enroll_head_class_id',
            'created_at',
            'updated_at',
            'created_by',
            'updated_by',
        ],
    ]) ?>

</div>
