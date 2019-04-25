<?php

use yii\widgets\DetailView;
use common\models\Branches;
/* @var $this yii\web\View */
/* @var $model common\models\StdSessions */
?>
<div class="std-sessions-view">
 <?php 

        $branch_id = $model->session_branch_id;

        $branch_name = Yii::$app->db->createCommand("SELECT branch_name FROM branches WHERE branch_id = '$branch_id'")->queryAll();

        if (!empty($branch_name)) {
            $branch_name = $branch_name[0]['branch_name'];
            $branch_name = "<span class='label label-success'>$branch_name</span>";
        }

  ?>
  <?php 

    $created_by = $model->created_by;
    $updated_by = $model->updated_by;

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
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'session_id',

            'sessionBranch.branch_name',
            'session_name',
            'session_start_date',
            'session_end_date',
            'installment_cycle',
            'status',
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
