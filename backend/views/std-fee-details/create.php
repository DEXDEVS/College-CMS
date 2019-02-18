<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\StdFeeDetails */

?>
<div class="std-fee-details-create">
    <?= $this->render('_form', [
        'model' => $model,
        'stdFeeInstallments' => $stdFeeInstallments,
    ]) ?>
</div>
