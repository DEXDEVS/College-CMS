<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\EmpInfo */
?>
<div class="emp-info-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'emp_id',
            'emp_reg_no',
            'emp_name',
            'emp_father_name',
            'emp_cnic',
            'emp_contact_no',
            'emp_perm_address',
            'emp_temp_address',
            'emp_marital_status',
            'emp_fb_ID',
            'emp_gender',
            'emp_photo',
            'emp_designation_id',
            'emp_type_id',
            'emp_salart_type',
            'group_by',
            'emp_branch_id',
            'emp_email:email',
            'emp_qualification',
            'emp_passing_year',
            'emp_institute_name',
            'degree_scan_copy',
            'emp_salary',
            'created_at',
            'updated_at',
            'created_by',
            'updated_by',
            'delete_status',
        ],
    ]) ?>

</div>
