<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\CustomSms */
?>
<div class="custom-sms-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'send_to:ntext',
            'message:ntext',
            'created_at',
            'updated_at',
            'created_by',
            'updated_by',
        ],
    ]) ?>

</div>
