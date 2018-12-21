<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\FeeTransactionDetail */

?>
<div class="fee-transaction-detail-create">
    <?= $this->render('_form', [
        'model' => $model,
        'feeTransactionHead' => $feeTransactionHead,
    ]) ?>
</div>
