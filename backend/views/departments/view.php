<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Departments */
?>
<div class="departments-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'dept_id',
            'dept_branch_id',
            'dept_name',
            'dept_description',
            'created_at',
            'updated_at',
            'created_by',
            'updated_by',
        ],
    ]) ?>

</div>
