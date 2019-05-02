<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Grades */
?>
<div class="grades-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'grade_id',
            'grade_name',
            'grade_from',
            'grade_to',
            'created_at',
            'updated_at',
            'created_by',
            'updated_by',
        ],
    ]) ?>

</div>
