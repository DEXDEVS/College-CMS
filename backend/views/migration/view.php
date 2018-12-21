<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Migration */
?>
<div class="migration-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'version',
            'apply_time:datetime',
        ],
    ]) ?>

</div>
