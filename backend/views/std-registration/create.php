<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\StdRegistration */

$this->title = 'Student Registration';
$this->params['breadcrumbs'][] = ['label' => 'Student Personal Info', 'url' => ['/std-personal-info']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="std-registration-create">

    <?= $this->render('_form', [
        'model' => $model,
        'stdGuardianInfo' => $stdGuardianInfo,
        'stdIceInfo' => $stdIceInfo,
        'stdAcademicInfo' => $stdAcademicInfo,
        'stdFeeDetails' => $stdFeeDetails,
        'stdFeeInstallments' => $stdFeeInstallments,
    ]) ?>

</div>
