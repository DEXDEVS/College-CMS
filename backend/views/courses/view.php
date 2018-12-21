<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Courses */
?>
<div class="courses-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'course_id',
            'course_name',
        ],
    ]) ?>

</div>
