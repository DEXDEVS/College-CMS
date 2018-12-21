<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\StdClass */
?>
<div class="std-class-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'class_id',
            'class_name_id',
            'session_id',
            'section_id',
            'class_name',
            'created_at',
            'updated_at',
            'created_by',
            'updated_by',
        ],
    ]) ?>

</div>
