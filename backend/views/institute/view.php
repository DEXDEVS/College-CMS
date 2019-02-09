<?php

use yii\widgets\DetailView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Institute */

$photoInfo = $model->PhotoInfo;
$photo = Html::img($photoInfo['url'],['height' => '200','width' => '200','class' => 'img-circle'],['alt'=>$photoInfo['alt']]);
$logo = ['data-lightbox'=>'profile image','data-title'=>$photoInfo['alt']];

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
            'institute_id',
            'institute_name',
            'institute_logo',
            'institute_account_no',
            'created_at',
            'updated_at',
            'created_by',
            'updated_by',
        ],
    ]) ?>

</div>
