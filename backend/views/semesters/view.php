<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Semesters */
?>
<div class="semesters-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'semester_id',
            'semester_name',
            'created_at',
            'updated_at',
            'created_by',
            'updated_by',
        ],
    ]) ?>

</div>
