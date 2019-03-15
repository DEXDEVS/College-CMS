<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Users */
?>
<div class="users-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'user_name',
        ],
    ]) ?>

</div>
