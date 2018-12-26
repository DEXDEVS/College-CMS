<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\StdPersonalInfo */

?>
<div class="std-personal-info-create">
    <?= $this->render('_form', [
        'model' => $model,
        'stdGuardianInfo' => $stdGuardianInfo,
        'stdAcademicInfo' => $stdAcademicInfo,
        'stdFeeDetails' => $stdFeeDetails,
    ]) ?>
</div>
