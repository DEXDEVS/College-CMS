<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Programs */
?>
<div class="programs-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'program_id',
            'program_type_id',
            'program_dept_id',
            'program_name',
            'program_description',
            'program_no_semester',
            'created_at',
            'updated_at',
            'created_by',
            'updated_by',
        ],
    ]) ?>

</div>
