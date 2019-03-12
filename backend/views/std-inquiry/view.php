<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\StdInquiry */
?>
<div class="std-inquiry-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'std_inquiry_id',
            'std_inquiry_no',
            'inquiry_session',
            'std_name',
            'std_father_name',
            'gender',
            'std_contact_no',
            'std_father_contact_no',
            'std_inquiry_date',
            'std_intrested_class',
            'previous_institute',
            'std_previous_class',
            'std_roll_no',
            'std_obtained_marks',
            'std_total_marks',
            'std_percentage',
            'refrence_name',
            'refrence_contact_no',
            'refrence_designation',
            'std_address',
            'inquiry_status',
            'created_at',
            'updated_at',
            'created_by',
            'updated_by',
        ],
    ]) ?>

</div>
