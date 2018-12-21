<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Sections */
?>
<div class="sections-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'section_id',
            'section_program_id',
            'section_batch_id',
            'section_name',
            'created_at',
            'updated_at',
            'created_by',
            'updated_by',
        ],
    ]) ?>

</div>
