<?php

use yii\widgets\DetailView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\EmpInfo */
$photoInfo = $model->PhotoInfo;
$photo = Html::img($photoInfo['url'],['height' => '250','width' => '250','class' => 'img-circle'],['alt'=>$photoInfo['alt']]);
$options = ['data-lightbox'=>'profile image','data-title'=>$photoInfo['alt']];

$degreeInfo = $model->DegreeInfo;
$degree = Html::img($degreeInfo['url'],['height' => '250','width' => '250'],['alt'=>$degreeInfo['alt']]);
$degOptions = ['data-lightbox'=>'profile image','data-title'=>$degreeInfo['alt']];

?>
<div class="emp-info-view">

        <center>
            <figure>
            <?= Html::a($photo,$photoInfo['url'],$options); ?>
            <!-- <figcaption>(Click to enlarge)</figcaption> -->
        </figure>
        </center>
           
    <br>
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'emp_id',
            'emp_name',
            'emp_father_name',
            'emp_cnic',
            'emp_contact_no',
            'emp_perm_address',
            'emp_temp_address',
            'emp_marital_status',
            'emp_gender',
            'emp_photo',
            'emp_designation_id',
            'emp_type_id',
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
        ],
    ]) ?>
    <center>
        <button class="btn btn-success">Display Degree Image</button>
    </center>
    
    <br/>
    <div id="figure" style="display:none;margin-top: 10px; ">
        <center>
            <figure>
            <?= Html::a($degree,$degreeInfo['url'],$degOptions); ?>
            <!-- <figcaption>(Click to enlarge)</figcaption> -->
        </figure> 
        </center>    
    </div>
</div>
<?php
$script = <<< JS
$(document).ready(function(){
    $("button").click(function(){
        $("#figure").toggle();
    });
});
JS;
$this->registerJs($script);
?>
