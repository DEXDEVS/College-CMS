<?php

use yii\widgets\DetailView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\EmpDocuments */
// $photoInfo = $model->DocumentInfo;
// $photo = Html::img($photoInfo['url'],['height' => '200','width' => '200','class' => 'img-circle'],['alt'=>$photoInfo['alt']]);
// $logo = ['data-lightbox'=>'profile image','data-title'=>$photoInfo['alt']];

$id = $_GET['id'];

$empDocument = Yii::$app->db->createCommand("SELECT emp_document FROM emp_documents WHERE emp_document_id = '$id'")->queryAll();
$count = count($empDocument);
?>
<div class="emp-documents-view">

    <center>
        <figure>
            <?php for ($i=0; $i <$count ; $i++) { ?>
                <div class="row">
                    <div class="col-md-6">
                        <img src="<?php echo $empDocument[$i]['emp_document']; ?>">
                    </div>
                </div>
            <?php } ?>
        </figure>    
    </center>
    
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'emp_document_id',
            'emp_info_id',
            'emp_document',
            'created_at',
            'updated_at',
            'created_by',
            'updated_by',
        ],
    ]) ?>

</div>
