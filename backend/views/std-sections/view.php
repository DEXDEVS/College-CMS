<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\StdSections */
?>
<div class="std-sections-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'section_id',
            'session_id',
            'section_name',
            'section_description',
            'section_intake',
            'section_subjects',
            'created_at',
            'updated_at',
            'created_by',
            'updated_by',
        ],
    ]) ?>

</div>
