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

    <div class="container-fluid" style="margin-top: -35px">
    <h1 class="well well-sm text text-success" align="center" style="background-color: #DFF0D8;">View Attendance</h1>
    <div class="row">
        <div class="col-md-12">
            <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h4 class="text-primary">Date Wise</h4>
              <p>Class Attendance</p>
            </div>
            <div class="icon">
              <i class="fa fa-calendar-plus-o fa-1"></i>
            </div>
            <a href="./datewise-class-attendance?sub_id=<?php echo $sub_id ?>&class_id=<?php echo $class_id ?>&emp_id=<?php echo $emp_id ?>" class="small-box-footer">View <i class="fa fa-arrow-circle-right"></i></a>

          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h4 class="text-success">Date Range Wise</h4>
              <p>Class Attendance</p>
            </div>
            <div class="icon">
              <i class="fa fa-calendar"></i>
            </div>
            <a href="./emp-info" class="small-box-footer">View <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
                <h4 class="text-warning">Date Wise</h4>
                <p>Student Attendance</p>
            </div>
            <div class="icon">
              <i class="fa fa-calendar-plus-o"></i>
            </div>
            <a href="#" class="small-box-footer">View <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <div class="inner">
              <h4 class="text-success" style="color: #835143;">Date Range Wise</h4>
              <p>Student Attendance</p>
            </div>
            </div>
            <div class="icon">
              <i class="fa fa-calendar"></i>
            </div>
            <a href="#" class="small-box-footer">View <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
        </div>
    </div>
</div>

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
