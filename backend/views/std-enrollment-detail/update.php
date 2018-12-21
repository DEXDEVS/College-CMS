<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\StdEnrollmentDetail */
?>
<div class="std-enrollment-detail-update">

    <?= $this->render('_form', [
        'model' => $model,
        'stdEnrollmentHead' => $stdEnrollmentHead,
    ]) ?>

</div>
