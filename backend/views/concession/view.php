<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Concession */
?>
<div class="concession-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'concession_id',
            'concession_name',
            'created_at',
            'updated_at',
            'created_by',
            'updated_by',
        ],
    ]) ?>

</div>
