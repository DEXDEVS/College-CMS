<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\StdGuardianInfo */
?>
<div class="std-guardian-info-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'std_guardian_info_id',
            'std_id',
            'guardian_name',
            'guardian_relation',
            'guardian_cnic',
            'guardian_email:email',
            'guardian_contact_no_1',
            'guardian_contact_no_2',
            'guardian_monthly_income',
            'guardian_occupation',
            'guardian_designation',
            'created_at',
            'updated_at',
            'created_by',
            'updated_by',
        ],
    ]) ?>

</div>
