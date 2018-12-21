<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\StdInfo */

?>
<div class="std-info-create">
    <?= $this->render('_form', [
        'model' => $model,
        'disease'   => $disease,
        'transport' => $transport,
    ]) ?>
</div>
