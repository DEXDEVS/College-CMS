<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\StdSections */
?>
<?php 

    $created_by = $model->created_by;
    $updated_by = $model->updated_by;
    $subject_id = $model->section_subjects;

     $subjectName = Yii::$app->db->createCommand("SELECT std_subject_name FROM std_subjects WHERE std_subject_id = '$subject_id'")->queryAll();
     if (!empty($subjectName)) {
        $subjectName = $subjectName[0]['std_subject_name'];
        //$subjectName = "<span class='label label-success'>$subjectName</span>";
    }

    $createdBy = Yii::$app->db->createCommand("SELECT username FROM user WHERE id = '$created_by'")->queryAll();
    if (!empty($createdBy)) {
        $createdBy = $createdBy[0]['username'];
        $createdBy = "<span class='label label-success'>$createdBy</span>";
    }
    $updatedBy = Yii::$app->db->createCommand("SELECT username FROM user WHERE id = '$updated_by'")->queryAll();
    if (!empty($updatedBy)) {
        $updatedBy = $updatedBy[0]['username'];
        $updatedBy = "<span class='label label-danger'>$updatedBy</span>";
    }
    else{
        $updatedBy = "<span class='label label-warning'>Not Updated</span>";
    }
    
 ?>
<div class="std-sections-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'section_id',
            //'session_id',
            'session.session_name',
            'section_name',
            'section_description',
            'section_intake',
            //'section_subjects',
            [
             'attribute' => 'section_subjects',
             'format'=>'raw',
             'value'=> $subjectName,
            ],
            'created_at',
            'updated_at',
            [
             'attribute' => 'created_by',
             'format'=>'raw',
             'value'=> $createdBy,
            ],  
            [
             'attribute' => 'updated_by',
             'format'=>'raw',
             'value'=>  $updatedBy,
            ],
        ],
    ]) ?>

</div>
