<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\ProgramType */
?>
<div class="program-type-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'program_type_id',
            'program_type_name',
            'created_at',
            'updated_at',
            'created_by',
            'updated_by',
        ],
    ]) ?>

</div>
