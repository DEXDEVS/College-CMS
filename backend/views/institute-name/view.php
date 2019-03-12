<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\InstituteName */
?>
<div class="institute-name-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'Institute_name_id',
            'Institute_name',
            'Institutte_address',
            'Institute_contact_no',
            'head_name',
            'created_by',
            'updated_by',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
