<?php
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use common\models\StdPersonalInfo;
use common\models\StdClassName;
use common\models\StdSubjects;

/* @var $this yii\web\View */
/* @var $model common\models\StdAcademicInfo */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="std-academic-info-form">

    <?php $form = ActiveForm::begin(); ?>
        <div class="row">
            <div class="col-md-6">
                <?= $form->field($model, 'std_id')->dropDownList(
                    ArrayHelper::map(StdPersonalInfo::find()->where(['delete_status'=>1])->all(),'std_id','std_name'),
                    ['prompt'=>'']
                )?>
            </div>
            <div class="col-md-6">
                <?= $form->field($model, 'class_name_id')->dropDownList(
                    ArrayHelper::map(StdClassName::find()->where(['delete_status'=>1])->all(),'class_name_id','class_name'),
                    ['prompt'=>'']
                )?>
            </div>
        </div>
        <div class="row"> 
            <div class="col-md-8">
                <?= $form->field($model, 'subject_combination')->dropDownList(
                        ArrayHelper::map(StdSubjects::find()->all(),'std_subject_id','std_subject_name'),
                        ['prompt'=>'Select Subject combination']
                    )?>
            </div>
            <div class="col-md-4">
                <!-- <i class="fa fa-star" style="font-size: 8px; color: red; position: absolute; left: 166px; top: 6px"></i> -->
                <?= $form->field($model, 'previous_class_rollno')->textInput() ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <?= $form->field($model, 'previous_class')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-md-6">
                 <?= $form->field($model, 'passing_year')->textInput(['maxlength' => true]) ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <?= $form->field($model, 'obtained_marks')->textInput(['id'=>'oM']) ?>
            </div>
            <div class="col-md-6">
                <?= $form->field($model, 'total_marks')->textInput(['id'=>'tM']) ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <?= $form->field($model, 'percentage')->textInput(['id'=>'perc']) ?>
            </div>
            <div class="col-md-6">
                <?= $form->field($model, 'grades')->textInput(['maxlength' => true, 'id'=>'grade']) ?>
            </div>
            <div class="col-md-6">
                <?= $form->field($model, 'Institute')->textInput(['maxlength' => true]) ?>
            </div>
        </div>
       



  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
<script type="text/javascript">
// calculate totalMarks....
    $('#tM').on('change',function(){
        var tMarks = $('#tM').val();
        var obtMarks = $('#oM').val();
        var percn = ((parseInt(obtMarks) / parseInt(tMarks))*100);
        var per = Math.round(percn)+'%';
        $('#perc').val(per);
        
    });

    // calculate perc....
    $('#perc').on('focus',function(){
       var percent = $('#perc').val();
       

       var percentt = parseInt(percent);
       if (percentt>=90){
            $('#grade').val('A+');
       }
       else if (percentt>=80){
            $('#grade').val('A'); 
       }
       else if (percentt>=70){
            $('#grade').val('B+');
       }
       else if (percentt>=60){
            $('#grade').val('B');
       }
       else if (percentt>=50){
            $('#grade').val('C');
       }
       else if (percentt>=40){
            $('#grade').val('D');
       }else{
            $('#grade').val('F');
       }

       


    });

// $('#grade').on('click',function(){
//         var tMarks = $('#tM').val();
//         var obtMarks = $('#oM').val();
//         var percn = $('#perc').val();
//         var grd = $('#grade').val();
        
//         alert(tMarks);
//        alert(obtMarks);
//        alert(perc.value);
//        alert(grade.value);
//     });
</script>