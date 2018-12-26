<?php

use yii\widgets\DetailView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\StdPersonalInfo */

$photoInfo = $model->PhotoInfo;
$photo = Html::img($photoInfo['url'],['height' => '250','width' => '250'],['alt'=>$photoInfo['alt']]);
$options = ['data-lightbox'=>'profile image','data-title'=>$photoInfo['alt']];

?>
<div class="std-personal-info-view">

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
            'std_id',
            'std_name',
            'std_father_name',
            'std_contact_no',
            'std_DOB',
            'std_gender',
            'std_permanent_address',
            'std_temporary_address',
            'std_email:email',
            'std_photo',
            'std_b_form',
            'std_district',
            'std_religion',
            'std_nationality',
            'std_tehseel',
            'created_at',
            'updated_at',
            'created_by',
            'updated_by',
        ],
    ]) ?>

</div>
