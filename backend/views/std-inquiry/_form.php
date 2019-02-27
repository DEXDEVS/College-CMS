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
    <div class="row">
        <div class="col-md-4">
            <?= $form->field($model, 'std_inquiry_no')->textInput(['maxlength' => true,'value'=> 'STD-Y'.$year.'-0'.$id, 'readonly'=> true]) ?>
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
             <?= $form->field($model, 'std_name')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-4">
             <?= $form->field($model, 'std_father_name')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'std_contact_no')->widget(yii\widgets\MaskedInput::class, [ 'mask' => '+99-999-9999999', ]) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <?= $form->field($model, 'std_father_contact_no')->widget(yii\widgets\MaskedInput::class, [ 'mask' => '+99-999-9999999', ]) ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'std_previous_class')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'std_roll_no')->textInput(['maxlength' => true]) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <?= $form->field($model, 'std_obtained_marks')->textInput(['id' => 'obtainedMarks']) ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'std_total_marks')->textInput(['id' => 'totalMarks']) ?>
        </div>
        <div class="col-md-4">
           <?= $form->field($model, 'std_percentage')->textInput(['maxlength' => true, 'id'=> 'percentage', 'readonly'=> true]) ?> 
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <?= $form->field($model, 'std_intrested_class')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-8">
            <?= $form->field($model, 'std_address')->textInput(['maxlength' => true]) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <?= $form->field($model, 'refrence_name')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-4">
             <?= $form->field($model, 'refrence_contact_no')->widget(yii\widgets\MaskedInput::class, [ 'mask' => '+99-999-9999999', ]) ?>
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