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
            'branch_name',
            'branch_code',
            'branch_type',
            'branch_location',
            'branch_contact_no',
            'branch_email:email',
            'status',
            'branch_head_name',
            'branch_head_contact_no',
            'branch_head_email:email',
            'created_at',
            'updated_at',
            'created_by',
            'updated_by',
        ],
    ]) ?>

</div>
