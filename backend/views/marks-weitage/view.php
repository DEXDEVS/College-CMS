<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\MarksWeitage */
?>
<div class="marks-weitage-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'marks_weitage_id',
            'std_enroll_head_id',
            'subject_id',
            'presentation',
            'assignment',
            'attendance',
            'dressing',
            'theory',
            'practical',
            'created_at',
            'updated_at',
            'created_by',
            'updated_by',
        ],
    ]) ?>

</div>
