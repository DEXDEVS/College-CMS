<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Departments */
?>
<div class="departments-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'department_id',
            'department_name',
            'department_description',
            'created_at',
            'updated_at',
            'created_by',
            'updated_by',
        ],
    ]) ?>

</div>
