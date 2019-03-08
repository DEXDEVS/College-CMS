<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\AccountNature;
use common\models\AccountRegister;
use dosamigos\datetimepicker\DateTimePicker;

/* @var $this yii\web\View */
/* @var $model common\models\AccountTransactions */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="account-transactions-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'account_register_id')->dropDownList(
                ArrayHelper::map(AccountRegister::find()->all(),'account_register_id','account_name'),
                ['prompt'=>'Select Account Nature', 'id' => 'accountRegister']
            )?>
        </div>
        <div class="col-md-6">  
            <?= $form->field($model, 'account_nature')->textInput(['readonly' => true, 'id' => 'accountNature']) ?> 
        </div>      
    </div> 
    <div class="row">
        <div class="col-md-6">
            <label>Date</label>
            <?= DateTimePicker::widget([
                'model' => $model,
                'attribute' => 'date',
                'language' => 'en',
                'size' => 'ms',
                'clientOptions' => [
                    'autoclose' => true,
                    'format' => 'yyyy-mm-dd HH:ii:ss',
                    'startDate' => date('1960-01-01'),
                    'endDate' => date(''),
                    'todayBtn' => true
                ]
            ]);?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'total_amount')->textInput() ?>   
        </div>      
    </div>
    <div class="row">
        <div class="col-md-12">
            <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>
        </div>    
    </div> 
    
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>

</script>
<?php
$url = \yii\helpers\Url::to("account-transactions/fetch-nature");
$script = <<< JS

$('#accountRegister').on('change',function(){
   var accountRegister = $('#accountRegister').val();
   
   $.ajax({
        type:'post',
        data:{accountRegister:accountRegister},
        url: "$url",
            success: function(result){ 
                var jsonResult = JSON.parse(result.substring(result.indexOf('{'), result.indexOf('}')+1)); 
                var nature = jsonResult['account_nature_name'];
                $('#accountNature').val(nature);
            }         
    }); 
});


JS;
$this->registerJs($script);
?>
</script>
