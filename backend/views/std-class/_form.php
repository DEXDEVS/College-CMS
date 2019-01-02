<?php
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use common\models\StdClassName;
use common\models\StdSessions;
use common\models\StdSections;

/* @var $this yii\web\View */
/* @var $model common\models\StdClass */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="std-class-form">

    <?php $form = ActiveForm::begin(); ?>
        <div class="row">
            <div class="col-md-6">
                <?= $form->field($model, 'class_name_id')->dropDownList(
                    ArrayHelper::map(StdClassName::find()->where(['delete_status'=>1])->all(),'class_name_id','class_name'),
                    ['prompt'=>'Select Class',]
                )?>
            </div>
            <div class="col-md-6">
                <?= $form->field($model, 'session_id')->dropDownList(
                    ArrayHelper::map(StdSessions::find()->where(['delete_status'=>1])->all(),'session_id','session_name'),
                    [
                        'prompt'=>'Select Session',
                        'id' => 'sessionId',
                        'onchange'=>
                            '$.post("index.php?r=std-sections/lists&id='.'"+$(this).val(), function( data ){
                                $("select#sectionId").html(data);
                            });'
                    ]);?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <?= $form->field($model, 'section_id')->dropDownList(
                    ArrayHelper::map(StdSections::find()->where(['delete_status'=>1])->all(),'section_id','section_name'),
                    ['prompt'=>'Select Section','id'=>'sectionId']
                )?>
            </div>
            <!-- <div class="col-md-6">
                 <?= $form->field($model, 'class_name')->textInput(['maxlength' => true]) ?>
            </div> -->
        </div>

  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
