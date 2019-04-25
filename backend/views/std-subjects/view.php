<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\StdSubjects */
?>
<div class="std-subjects-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'std_subject_id',
            //'class_id',
            'class.class_name',
            'std_subject_name',
        ],
    ]) ?>

</div>
