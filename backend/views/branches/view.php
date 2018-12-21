<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Branches */
?>
<div class="branches-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'branch_id',
            'institute_id',
            'branch_code',
            'branch_name',
            'branch_location',
            'branch_contact_no',
            'branch_email:email',
            'status',
            'created_at',
            'updated_at',
            'created_by',
            'updated_by',
        ],
    ]) ?>

</div>
