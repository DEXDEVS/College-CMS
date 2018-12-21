<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Institute */
?>
<div class="institute-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'institute_id',
            'institute_name',
            'institute_logo',
            'institute_account_no',
            'created_at',
            'updated_at',
            'created_by',
            'updated_by',
        ],
    ]) ?>

</div>
