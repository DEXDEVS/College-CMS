<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\StdInfo */
?>
<div class="std-info-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'std_id',
            'std_reg_no',
            'std_first_name',
            'std_last_name',
            'std_father_name',
            'std_photo',
            'std_cnic',
            'std_contact_no',
            'std_email:email',
            'std_p_address',
            'std_t_address',
            'std_emergency_person_name',
            'std_emergency_contact_person_no',
            'std_dob',
            'std_nationality',
            'std_country',
            'std_district',
            'std_province',
            'std_religion',
            'std_gender',
            'std_serious_disease',
            'std_transport_required',
            'created_at',
            'updated_at',
            'created_by',
            'updated_by',
        ],
    ]) ?>

</div>
