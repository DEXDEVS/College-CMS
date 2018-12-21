<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\EmpReference */
?>
<div class="emp-reference-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'emp_ref_id',
            'emp_id',
            'ref_name',
            'ref_contact_no',
            'ref_cnic',
            'ref_designation',
        ],
    ]) ?>

</div>
