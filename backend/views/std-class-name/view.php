<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\StdClassName */
?>
<div class="std-class-name-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'class_name_id',
            'class_name',
            'class_name_description',
            'class_nature',
            'class_start_date',
            'class_end_date',
            'status',
            'created_at',
            'updated_at',
            'created_by',
            'updated_by',
        ],
    ]) ?>

</div>
