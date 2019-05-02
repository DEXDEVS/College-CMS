<?php

use yii\widgets\DetailView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Institute */

$photoInfo = $model->PhotoInfo;
$photo = Html::img($photoInfo['url'],['height' => '200','width' => '200','class' => 'img-circle'],['alt'=>$photoInfo['alt']]);
$logo = ['data-lightbox'=>'profile image','data-title'=>$photoInfo['alt']];

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
<div class="institute-view">

    <center>
        <figure>
            <?= Html::a($photo,$photoInfo['url'],$logo); ?>
            <!-- <figcaption>(Click to enlarge)</figcaption> -->
        </figure>    
    </center>
    <br>
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'institute_id',
            'institute_name',
            'institute_logo',
            'institute_account_no',
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
