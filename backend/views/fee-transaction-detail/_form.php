<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\StdClassName;
use common\models\StdSessions;
use common\models\StdSections;
use common\models\FeeType;
use common\models\StdPersonalInfo;
use dosamigos\datetimepicker\DateTimePicker;

/* @var $this yii\web\View */
/* @var $model common\models\FeeTransactionDetail */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="fee-transaction-detail-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
            <div class="col-md-4">
                <i class="fa fa-star" style="font-size: 8px; color: red; position: absolute; left: 115px; top: 6px"></i>
                <?= $form->field($feeTransactionHead, 'class_name_id')->dropDownList(
                    ArrayHelper::map(StdClassName::find()->where(['delete_status'=>1])->all(),'class_name_id','class_name'),
                    ['prompt'=>'Select Class',
                    'id' => 'classId',
                ])?> 
            </div>
            <div class="col-md-4">
            <i class="fa fa-star" style="font-size: 8px; color: red; position: absolute; left: 90px; top: 6px"></i>     
                <?= $form->field($feeTransactionHead, 'session_id')->dropDownList(
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
            <div class="col-md-4">
                <i class="fa fa-star" style="font-size: 8px; color: red; position: absolute; left: 86px; top: 6px"></i> 
                <?= $form->field($feeTransactionHead, 'section_id')->dropDownList(
                    ArrayHelper::map(StdSections::find()->where(['delete_status'=>1])->all(),'section_id','section_name'),
                    ['prompt'=>'Select Section',
                    'id'=>'sectionId',
                ])?> 
            </div>

            <div class="col-md-4">
                <i class="fa fa-star" style="font-size: 8px; color: red; position: absolute; left: 58px; top: 6px"></i> 
                <?= $form->field($feeTransactionHead, 'std_id')->dropDownList(
                    ArrayHelper::map(StdPersonalInfo::find()->where(['delete_status'=>1])->all(),'std_id','std_name'),
                    ['prompt'=>'Select Student',
                    'id' => 'std',
                ])?>
            </div>
            <div class="col-md-4">
                <i class="fa fa-star" style="font-size: 8px; color: red; position: absolute; left: 60px; top: 6px"></i>
                <?= $form->field($feeTransactionHead, 'month')->dropDownList([ '1' => 'January', '2' => 'Fabruary', '3' => 'March', '4' => 'April', '5' => 'May', '6' => 'June', '7' => 'July', '8' => 'August', '9' => 'September', '10' => 'October', '11' => 'November', '12' => 'December', ], ['prompt' => 'Select Month','id'=>'month']) ?>
            </div>
            <div class="col-md-4">
                <i class="fa fa-star" style="font-size: 8px; color: red; position: absolute; left: 130px; top: 6px"></i>
                <label>Transaction Date</label>
                <?= DateTimePicker::widget([
                    'model' => $feeTransactionHead,
                    'attribute' => 'transaction_date',
                    'language' => 'en',
                    'size' => 'ms',
                    'clientOptions' => [
                        'autoclose' => true,
                        'format' => 'yyyy-mm-dd HH:ii:ss',
                        'todayBtn' => true,
                        'id'=>'date'
                    ]
                ]);?>
            </div>
        </div>
        <!-- Fee Transaction Detail-->
        <div class="row">
            <div class="col-md-3">
                <!-- <i class="fa fa-star" style="font-size: 8px; color: red; position: absolute; left: 119px; top: 6px"></i> -->
                <?= $form->field($model, 'fee_type_id')->dropDownList(
                    ArrayHelper::map(FeeType::find()->where(['delete_status'=>1])->all(),'fee_type_id','fee_type_name'),
                    ['prompt'=>'Select FeeType','id'=>'feeType']
                )?>  
            </div>
            <div class="col-md-3">
                <!-- <i class="fa fa-star" style="font-size: 8px; color: red; position: absolute; left: 99px; top: 6px"></i> -->
                <?= $form->field($model, 'fee_amount')->textInput(['id'=>'feeAmount']) ?>
            </div>
            <div class="col-md-3">
                <!-- <i class="fa fa-star" style="font-size: 8px; color: red; position: absolute; left: 105px; top: 6px"></i> -->
                <?= $form->field($model, 'fee_discount')->textInput(['id'=> 'feeDiscount']) ?>
            </div>
            <div class="col-md-3">
                <?= $form->field($model, 'discounted_value')->textInput(['id'=>'discountValue', 'readonly' => true]) ?>
            </div>
        </div>

    <div class="row">
        <div class="col-md-6">
            <?= $form->field($feeTransactionHead, 'total_amount')->textInput(['id'=>'totalAmount', 'readonly' => true]) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($feeTransactionHead, 'total_discount')->textInput(['id'=>'totalDiscount', 'readonly' => true]) ?>
        </div>
    </div>

    <div class="row"> 
        <div class="col-md-4" >
            <input type="button" name="" value ="Add" class="btn btn-success" id= "addInfo">
        </div>        
        <div class=" col-md-4 invisible">
            <?= $form->field($model, 'net_total')->textInput(['id'=>'netTotal', 'readonly' => true]) ?>
        </div>
    </div>
    
    <div id="mydata">
        <br/>
        <table  id="infoTable" class="table table-striped table-bordered dt-responsive nowrap" align ="center" width="70%" style="display: none;">
            <tr>
            <th>Index No</th>
            <th> Fee Type ID         </th>
            <th> Total Amount        </th>
            <th> Fee Discount        </th>
            <th> Discounted Value    </th>
            <th> Fee Amount          </th>
            <th>Delete</th>
            </tr>
        </table>
        <br/>
    </div>

    <div class="row"> 
        <div class="col-lg-4">
            <input type="button" name="btn" class="btn btn-info" value="Confirm" id= "insert" >
        </div>       
    </div>
    
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>

<?php
$url = \yii\helpers\Url::to("fee-transaction-detail/fetch-students");

$script = <<< JS
$('#sectionId').on('change',function(){
   var classId = $('#classId').val();
   var sessionId = $('#sessionId').val();
   var sectionId = $('#sectionId').val();
   
   $.ajax({
        type:'post',
        data:{class_Id:classId,session_Id:sessionId,section_Id:sectionId},
        url: "$url",

        success: function(result){
            var jsonResult = JSON.parse(result.substring(result.indexOf('{'), result.indexOf('}')+1));
            
            var len =jsonResult[0].length;
            var html = "";
            $('#std').empty();
            $('#std').append("<option>"+"Select Student.."+"</option>");
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

//get student detail
var netTotal = 0;
$('#std').on('change',function(){
    var studentId = $('#std').val();
    $('#feeType').val('');
    $('#feeAmount').val('');
    $('#discountValue').val('');
    $('#feeDiscount').val('');
    $('#netTotal').val('');
    netTotal = 0;

    $.ajax({
        type:'post',
        cache:false,
        data:{studentId:studentId},
        url: "$url",

        success: function(result){

            var jsonResult = JSON.parse(result.substring(result.indexOf('{'), result.indexOf('}')+1));
            var netAddmissionFee = jsonResult['net_addmission_fee'];
            var netMonthlyFee = jsonResult['net_monthly_fee'];
            $('#feeType').on('change',function(){
                var feeType = $('#feeType').val();
                
                if(feeType == 1){
                    $('#feeAmount').val(netAddmissionFee);

                }else if (feeType == 2){
                    $('#feeAmount').val(netMonthlyFee);
                   
                }else {
                    $('#feeAmount').val('');  
                }      
            });   
        }         
    });       
});
let amountt = 0;
let discountt = 0;
    $('#feeDiscount').on('change',function(){
        var netValue = $('#feeAmount').val();
        var total = parseInt(netValue);
        var discount = $('#feeDiscount').val();
        var feeDiscount = parseInt(discount);

        if(discount == feeDiscount + '%'){
            amount = parseInt((total * feeDiscount)/100);
            $('#discountValue').val(amount);
            amountt = total - amount;
            netTotal += amountt; 
        } else {
            amountt = parseInt(total - feeDiscount);
            $('#discountValue').val(feeDiscount); 
            netTotal += amountt;
        }
    });  
   //arrays declaration
    let feeTypeArray = new Array();
    let feeAmountArray = new Array();
    let feeDiscountArray = new Array();
    let discountValueArray = new Array();
  //this code apply on the add button
     $('#addInfo').on('click',function(){
        var amountTotal = 0;
        var discountTotal = 0;

            $('#infoTable').show();
            let fType = $('#feeType').val();
            let fDiscount=$('#feeDiscount').val();
            let totalFeeAmount = $('#feeAmount').val();
            let dValue =$('#discountValue').val();

           feeTypeArray.push(fType);
           feeAmountArray.push(amountt);
           feeDiscountArray.push(fDiscount);
           discountValueArray.push(dValue);

            for(let x=0; x<feeAmountArray.length; x++){
                amountTotal += parseInt(feeAmountArray[x]);
            }
            $('#netTotal').val(parseInt(amountTotal));
            $('#totalAmount').val(parseInt(amountTotal));

            //Total Disscount
            for(let x=0; x<discountValueArray.length; x++){
                discountTotal += parseInt(discountValueArray[x]);
            }
            $('#totalDiscount').val(parseInt(discountTotal));

            var table = document.getElementById('infoTable');
            let rowCount = table.rows.length;

            let row = table.insertRow(rowCount);

            row.insertCell(0).innerHTML = rowCount;
            row.insertCell(1).innerHTML = fType;
            row.insertCell(2).innerHTML = totalFeeAmount;
            row.insertCell(3).innerHTML = fDiscount;
            row.insertCell(4).innerHTML = dValue;
            row.insertCell(5).innerHTML = amountt;

            row.insertCell(6).innerHTML = "<span class='glyphicon glyphicon-remove' style='color:red; font-size: 18px; padding-left: 20px;' onclick='deleteRecord(this);'></span>";

            discountt += parseInt(dValue);
            $('#totalDiscount').val(discountt);

            $('#feeAmount').val('');
            $('#discountValue').val(''); 
            $('#feeDiscount').val('');

        });

    //function for delete the record from array
        function deleteRecord(value){
            alert("Are you sure you want to delete it?");
            var i = value.parentNode.parentNode.rowIndex;
            document.getElementById("infoTable").deleteRow(i);
            var j=i-1;
            let sum = 0;
            let summ = 0;
            feeTypeArray.splice(j,1);
            feeAmountArray.splice(j,1);
            feeDiscountArray.splice(j,1);
            discountValueArray.splice(j,1); 

            for(let x=0; x<feeAmountArray.length; x++){
                sum += parseInt(feeAmountArray[x]);
            }
            $('#netTotal').val(sum);
            $('#totalAmount').val(sum);
            //Total Disscount

            for(let x=0; x<discountValueArray.length; x++){
                summ += parseInt(discountValueArray[x]);
            }
            $('#totalDiscount').val(parseInt(summ));
        }
$('#insert').on('click',function(){ 
        alert("Are you sure you complete your transaction?");
        $('#netTotal').val(feeTypeArray);
        $('#feeAmount').val(feeAmountArray);
        $('#feeDiscount').val(feeDiscountArray);
        $('#discountValue').val(discountValueArray); 
    });
        
        
JS;
$this->registerJs($script);
?>
</script>