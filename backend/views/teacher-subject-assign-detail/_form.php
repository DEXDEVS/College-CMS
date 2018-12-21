<?php
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use common\models\EmpInfo;
use kartik\select2\Select2;
use common\models\StdClass;
use common\models\Subjects;

/* @var $this yii\web\View */
/* @var $model common\models\TeacherSubjectAssignDetail */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="teacher-subject-assign-detail-form">
    
    <?php $form = ActiveForm::begin(); ?>
        <div class="row">
            <div class="col-md-6">
                <?= $form->field($teacherSubjectAssignHead, 'teacher_id')->dropDownList(
                    ArrayHelper::map(EmpInfo::find()->where(['group_by' => 'Faculty'])->all(),'emp_id','emp_name'),
                    ['prompt'=>'Select Teacher']
                )?>
            </div>
            <div class="col-md-6">
                <?= $form->field($model, 'class_id')->widget(Select2::classname(), [
                    'data' => ArrayHelper::map(StdClass::find()->all(),'class_id','class_name'),
                    'language' => 'en',
                    'options' => ['placeholder' => 'Select'],
                    'pluginOptions' => [
                        'allowClear' => true,
                        'multiple' => true
                    ],
                ]);
                ?>
            </div>
        </div>
         <div class="row">
            <div class="col-md-6">
                <?= $form->field($model, 'subject_id')->widget(Select2::classname(), [
                    'data' => ArrayHelper::map(Subjects::find()->all(),'subject_id','subject_name'),
                    'language' => 'en',
                    'options' => ['placeholder' => 'Select'],
                    'pluginOptions' => [
                        'allowClear' => true,
                        'multiple' => true
                    ],
                ]);
                ?>
            </div>
        </div>

    <?php if (!Yii::$app->request->isAjax){ ?>
        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>
    <?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
