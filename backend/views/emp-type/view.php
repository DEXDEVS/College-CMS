<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\EmpType */
?>
<div class="emp-type-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'emp_type_id',
            'emp_type',
            'created_at',
            'updated_at',
            'created_by',
            'updated_by',
        ],
    ]) ?>

</div>
