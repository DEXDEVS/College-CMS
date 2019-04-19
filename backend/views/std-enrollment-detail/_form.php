<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\StdClassName;
use common\models\StdSessions;
use common\models\StdSections;
use common\models\StdPersonalInfo;
use kartik\select2\Select2;


/* @var $this yii\web\View */
/* @var $model common\models\StdEnrollmentDetail */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="std-enrollment-detail-form">

    <?php $form = ActiveForm::begin(); ?>
    <h3 style="color: #337AB7; margin-top: -10px"><small> ( Fields with <span style="color: red;">red stars </span>are required )</small> </h3>
        <div class="row">
            <div class="col-md-6">
                <i class="fa fa-star" style="font-size: 8px; color: red; position: relative; left: 80px; top: 18px"></i>
                <?= $form->field($stdEnrollmentHead, 'class_name_id')->dropDownList(
                    ArrayHelper::map(StdClassName::find()->where(['delete_status'=>1])->all(),'class_name_id','class_name'),
                    ['prompt'=>'Select Class','id'=>'classId']
                )?>
            </div>
            <div class="col-md-6">
                <i class="fa fa-star" style="font-size: 8px; color: red; position: relative; left: 55px; top: 18px"></i>
                <?= $form->field($stdEnrollmentHead, 'session_id')->dropDownList(
                    ArrayHelper::map(StdSessions::find()->where(['delete_status'=>1 , 'status' => 'Active'])->all(),'session_id','session_name'),
                    [    'prompt'=>'Select Session',
                        'id' => 'sessionId',
                    ]);?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <i class="fa fa-star" style="font-size: 8px; color: red; position: relative; left: 51px; top: 18px"></i>
                <?= $form->field($stdEnrollmentHead, 'section_id')->dropDownList(
                    ArrayHelper::map(StdSections::find()->where(['delete_status'=>1])->all(),'section_id','section_name'),
                    ['prompt'=>'Select Section','id'=>'sectionId']
                )?>
            </div>
            <div class="col-md-6">
                <i class="fa fa-star" style="font-size: 8px; color: red; position: relative; left: 153px; top: 16px"></i>
                <?= $form->field($model, 'std_enroll_detail_std_id')->widget(Select2::classname(), [
                    'data' => ArrayHelper::map(StdPersonalInfo::find()->all(),'std_id','std_name'),
                    'language' => 'en',
                    'options' => ['placeholder' => 'Select ' , 'id'=>'std'],
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
<?php
//$url = \yii\helpers\Url::to("std-enrollment-detail/fetch-students");

$script = <<< JS
//here you write all your javascript stuff
$('#sessionId').change(function(){
    var sessionId = $(this).val();
    $.get('std-sections/get-section',{sessionId : sessionId},function(data){
        var data =  $.parseJSON(data)
        console.log(data);
        $('#sectionId').empty();
        $('#sectionId').append("<option>"+"Select Section"+"</option>");
        var options = '';
            for(var i=0; i<data.length; i++) { 
                options += '<option value="'+data[i].section_id+'">'+data[i].section_name+'</option>';
            }
        // Append to the html
        $('#sectionId').append(options);
    });
});
$('#classId').on('change',function(){
   var classId = $('#classId').val();
   
   $.ajax({
        type:'post',
        data:{class_Id:classId},
        url: "$url",

        success: function(result){
            console.log(result);
            var jsonResult = JSON.parse(result.substring(result.indexOf('{'), result.indexOf('}')+1));
            
            var len =jsonResult[0].length;
            var html = "";
            $('#std').empty();
            //$('#std').append("<option>"+"Select Student.."+"</option>");
            for(var i=0; i<len; i++)
            {
            var stdId = jsonResult[0][i];
            var stdName = jsonResult[1][i];
            html += "<option value="+ stdId +">"+stdName+"</option>";
            }
            $(".field-std select").append(html);

        }         
    });       
});
JS;
$this->registerJs($script);
?>
</script>
