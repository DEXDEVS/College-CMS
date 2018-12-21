<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\EmpInfo */

?>
<div class="emp-info-create">
    <?= $this->render('_form', [
        'model' => $model,
        'empRefModel' => $empRefModel,
    ]) ?>
</div>
