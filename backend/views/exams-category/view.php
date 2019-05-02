<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\ExamsCategory */
?>
<div class="exams-category-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'exam_category_id',
            'category_name',
            'description',
            'created_at',
            'updated_at',
            'created_by',
            'updated_by',
        ],
    ]) ?>

</div>
