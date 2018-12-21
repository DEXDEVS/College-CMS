<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\EmpDesignation */
?>
<div class="emp-designation-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'emp_designation_id',
            'emp_designation',
            'created_at',
            'updated_at',
            'created_by',
            'updated_by',
        ],
    ]) ?>

</div>
