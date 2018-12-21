<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Subjects */
?>
<div class="subjects-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'subject_id',
            'subject_name',
            'created_at',
            'updated_at',
            'created_by',
            'updated_by',
        ],
    ]) ?>

</div>
