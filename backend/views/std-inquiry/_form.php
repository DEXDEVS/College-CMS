<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\StdInquiry;
use dosamigos\datetimepicker\DateTimePicker;

/* @var $this yii\web\View */
/* @var $model common\models\StdInquiry */
/* @var $form yii\widgets\ActiveForm */
 
$stdInquiry = StdInquiry::find()->orderBy(['std_inquiry_id'=> SORT_DESC])->one();
$id = $stdInquiry['std_inquiry_id']+1;
$year = date('y');

?>

<div class="std-inquiry-form">
    <?php $form = ActiveForm::begin(); ?>
    <h3 style="color: #337AB7; margin-top: -10px"><small> ( Fields with <span style="color: red;">red stars </span>are required )</small> </h3>
    <div class="row">
        <div class="col-md-4">
            <?= $form->field($model, 'std_inquiry_no')->textInput(['maxlength' => true,'value'=> 'STD-Y'.$year.'-0'.$id, 'readonly'=> true]) ?>
        </div>
        <div class="col-md-4">
            <?php   $sDate = date('Y'); 
                    $eDate = $sDate + 2;
            ?>
            <?= $form->field($model, 'inquiry_session')->textInput(['maxlength' => true,'readonly'=> true,'value' => $sDate .' - '.$eDate]) ?>
        </div>
        <div class="col-md-4">
            <label>Date</label>
                <?= DateTimePicker::widget([
                    'model' => $model,
                    'attribute' => 'std_inquiry_date',
                    'language' => 'en',
                    'size' => 'xs',
                    'clientOptions' => [
                        'autoclose' => true,
                        'format' => 'yyyy-mm-dd HH:ii:ss',
                        //'startDate' => date('1960-01-01'),
                        //'endDate' => date(''),
                        'todayBtn' => true
                    ]
                ]);?>
        </div>
    </div>
    <div class="row">    
        <div class="col-md-4">
            <i class="fa fa-star" style="font-size: 8px; color: red; position: relative; left: 95px; top: 18px"></i>
             <?= $form->field($model, 'std_name')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-4">
            <i class="fa fa-star" style="font-size: 8px; color: red; position: relative; left: 85px; top: 18px"></i>
             <?= $form->field($model, 'std_father_name')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-4">
            <i class="fa fa-star" style="font-size: 8px; color: red; position: relative; left: 131px; top: 18px"></i>
            <?= $form->field($model, 'std_contact_no')->textInput(['maxlength' => 12, 'placeholder' => 'Number format must be 923xxxxxxxxx']) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <i class="fa fa-star" style="font-size: 8px; color: red; position: relative; left: 122px; top: 18px"></i>
            <?= $form->field($model, 'std_father_contact_no')->textInput(['maxlength' => 12, 'placeholder' => 'Number format must be 923xxxxxxxxx']) ?>
        </div>
        <div class="col-md-4">
            <i class="fa fa-star" style="font-size: 8px; color: red; position: relative; left: 101px; top: 18px"></i>
            <?= $form->field($model, 'previous_institute')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-4">
            <i class="fa fa-star" style="font-size: 8px; color: red; position: relative; left: 101px; top: 18px"></i>
            <?= $form->field($model, 'std_previous_class')->textInput(['maxlength' => true]) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <i class="fa fa-star" style="font-size: 8px; color: red; position: relative; left: 154px; top: 18px"></i>
            <?= $form->field($model, 'std_roll_no')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-4">
            <i class="fa fa-star" style="font-size: 8px; color: red; position: relative; left: 209px; top: 18px"></i>
            <?= $form->field($model, 'std_obtained_marks')->textInput(['id' => 'obtainedMarks']) ?>
        </div>
        <div class="col-md-4">
            <i class="fa fa-star" style="font-size: 8px; color: red; position: relative; left: 181px; top: 18px"></i>
            <?= $form->field($model, 'std_total_marks')->textInput(['id' => 'totalMarks']) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
           <?= $form->field($model, 'std_percentage')->textInput(['maxlength' => true, 'id'=> 'percentage', 'readonly'=> true]) ?> 
        </div>
        <div class="col-md-4">
            <i class="fa fa-star" style="font-size: 8px; color: red; position: relative; left: 100px; top: 18px"></i>
            <?= $form->field($model, 'std_intrested_class')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-4">
            <i class="fa fa-star" style="font-size: 8px; color: red; position: relative; left: 57px; top: 18px"></i>
            <?= $form->field($model, 'std_address')->textInput(['maxlength' => true]) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <?= $form->field($model, 'refrence_name')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-4">
             <?= $form->field($model, 'refrence_contact_no')->textInput(['maxlength' => 12, 'placeholder' => 'Number format must be 923xxxxxxxxx']) ?>
        </div>
        <div class="col-md-4">
             <?= $form->field($model, 'refrence_designation')->textInput(['maxlength' => true]) ?>
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
$script = <<< JS
// calculate totalMarks....
    $('#totalMarks').on('change',function(){
        var tMarks = $('#totalMarks').val();
        var obtMarks = $('#obtainedMarks').val();
        var percentage = ((parseInt(obtMarks) / parseInt(tMarks))*100);
        var per = Math.round(percentage)+'%';
        $('#percentage').val(per); 
    });
JS;
$this->registerJs($script);
?>