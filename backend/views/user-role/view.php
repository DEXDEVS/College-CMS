<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\UserRole */
?>
<div class="user-role-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'user_role_id',
            'user_role_name',
            'created_at',
            'updated_at',
            'created_by',
            'updated_by',
        ],
    ]) ?>

</div>
