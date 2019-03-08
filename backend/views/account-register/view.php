<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\AccountRegister */
?>
<div class="account-register-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'account_register_id',
            'account_nature_id',
            'account_name',
            'account_description:ntext',
            'created_at',
            'updated_at',
            'created_by',
            'updated_by',
        ],
    ]) ?>

</div>
