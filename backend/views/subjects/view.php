<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Subjects */
?>
<?php 

    $created_by = $model->created_by;
    $updated_by = $model->updated_by;

    $createdBy = Yii::$app->db->createCommand("SELECT username FROM user WHERE id = '$created_by'")->queryAll();
    if (!empty($createdBy)) {
        $createdBy = $createdBy[0]['username'];
        $createdBy = "<span class='label label-success'>$createdBy</span>";
    }
    else{
        $createdBy = "<span class='label label-warning'>Null</span>";
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
<div class="subjects-view">
 <?php echo $created_by. " - ".$updated_by; ?>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'subject_id',
            'subject_name',
            'subject_description',
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
