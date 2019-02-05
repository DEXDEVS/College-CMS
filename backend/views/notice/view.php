<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Notice */
?>
<div class="notice-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'notice_id',
            'notice_title',
            'notice_description:ntext',
            'notice_start',
            'notice_end',
            'notice_user_type',
            'created_at',
            'created_by',
            'updated_at',
            'updated_by',
            'is_status',
        ],
    ]) ?>

</div>
