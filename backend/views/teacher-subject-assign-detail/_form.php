<?php
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use common\models\EmpInfo;
use kartik\select2\Select2;
use common\models\StdEnrollmentHead;
use common\models\Subjects;

/* @var $this yii\web\View */
/* @var $model common\models\TeacherSubjectAssignDetail */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="teacher-subject-assign-detail-form">
    
    <?php $form = ActiveForm::begin(); ?>
    <h3 style="color: #337AB7; margin-top: -10px"><small> ( Fields with <span style="color: red;">red stars </span>are required )</small> </h3>
        <div class="row">
            <div class="col-md-6">
                <i class="fa fa-star" style="font-size: 8px; color: red; position: relative; left: 95px; top: 18px"></i>
                <?= $form->field($teacherSubjectAssignHead, 'teacher_id')->dropDownList(
                    ArrayHelper::map(EmpInfo::find()->where(['group_by' => 'Faculty', 'delete_status'=>1])->all(),'emp_id','emp_name'),
                    ['prompt'=>'Select Teacher']
                )?>
            </div>
            <div class="col-md-6">
                <i class="fa fa-star" style="font-size: 8px; color: red; position: relative; left: 80px; top: 18px"></i>
                <?= $form->field($model, 'class_id')->widget(Select2::classname(), [
                    'data' => ArrayHelper::map(StdEnrollmentHead::find()->where(['delete_status'=>1])->all(),'std_enroll_head_id','std_enroll_head_name'),
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
                <i class="fa fa-star" style="font-size: 8px; color: red; position: relative; left: 93px; top: 18px"></i>
                <?= $form->field($model, 'subject_id')->widget(Select2::classname(), [
                    'data' => ArrayHelper::map(Subjects::find()->where(['delete_status'=>1])->all(),'subject_id','subject_name'),
                    'language' => 'en',
                    'options' => ['placeholder' => 'Select'],
                    'pluginOptions' => [
                        'allowClear' => true,
                        'multiple' => true
                    ],
                ]);
                ?>
            </div>
            <div class="col-md-6">
                <i class="fa fa-star" style="font-size: 8px; color: red; position: relative; left: 93px; top: 18px"></i>
                <?= $form->field($model, 'no_of_lecture')->dropDownList([ '1 Lecture' => '1 Lecture', '2 Lectures' => '2 Lectures', '3 Lectures' => '3 Lectures', '4 Lectures' => '4 Lectures', '5 Lectures' => '5 Lectures', '6 Lectures' => '6 Lectures', 'Full Week' => 'Full Week', ], ['prompt' => 'Select Lecture']) ?>
            </div>
        </div>

    <?php if (!Yii::$app->request->isAjax){ ?>
        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>
    <?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
