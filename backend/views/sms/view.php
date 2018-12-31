<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Sms */
?>
<div class="sms-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'sms_id',
            'sms_name',
            'sms_template:ntext',
            'created_at',
            'updated_at',
            'created_by',
            'updted_at',
        ],
    ]) ?>

</div>
