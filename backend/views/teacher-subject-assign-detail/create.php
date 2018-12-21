<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\TeacherSubjectAssignDetail */

?>
<div class="teacher-subject-assign-detail-create">
    <?= $this->render('_form', [
        'model' => $model,
        'teacherSubjectAssignHead' => $teacherSubjectAssignHead,
    ]) ?>
</div>
