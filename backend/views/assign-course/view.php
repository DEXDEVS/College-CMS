<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\AssignCourse */
?>
<div class="assign-course-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'assign_cousre_id',
            'program_id',
            'course_id',
        ],
    ]) ?>

</div>
