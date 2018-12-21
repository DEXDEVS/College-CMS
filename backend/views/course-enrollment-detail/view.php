<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\CourseEnrollmentDetail */
?>
<div class="course-enrollment-detail-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'course_enroll_detail_id',
            'course_enroll_detail_head_id',
            'course_enroll_detail_course_id',
            'created_at',
            'updated_at',
            'created_by',
            'updated_by',
        ],
    ]) ?>

</div>
