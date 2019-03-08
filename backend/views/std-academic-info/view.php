<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\StdAcademicInfo */
?>
<div class="std-academic-info-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'academic_id',
            'std_id',
            'class_name_id',
            'previous_class',
            'previous_class_rollno',
            'subject_combination',
            'passing_year',
            'total_marks',
            'obtained_marks',
            'grades',
            'percentage',
            'Institute',
            'std_enroll_status',
            'created_at',
            'updated_at',
            'created_by',
            'updated_by',
        ],
    ]) ?>

</div>
