<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\Programs;
use common\models\Courses;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model common\models\AssignCourse */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="assign-course-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'program_id')->dropDownList(
    	ArrayHelper::map(Programs::find()->all(),'program_id','program_name')
     ); ?>

    <?= $form->field($model, 'course_id')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(Courses::find()->all(),'course_id','course_name'),
        'language' => 'en',
        'options' => ['placeholder' => 'Select a state ...'],
        'pluginOptions' => [
            'allowClear' => true,
            'multiple' => true
        ],
    ]);
    ?>

	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
