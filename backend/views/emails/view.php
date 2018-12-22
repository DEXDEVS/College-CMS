<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Emails */
?>
<div class="emails-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'emial_id',
            'receiver_name',
            'receiver_email:email',
            'email_subject:email',
            'email_content:ntext',
            'email_attachment:email',
            'created_at',
            'created_by',
            'updated_at',
            'updated_by',
        ],
    ]) ?>

</div>
