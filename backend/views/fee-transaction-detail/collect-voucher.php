<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Collect Voucher</title>
    <style>
        input[type=number]::-webkit-inner-spin-button, 
        input[type=number]::-webkit-outer-spin-button { 
          -webkit-appearance: none; 
          margin: 0; 
        }
    }
    </style>
</head>
<body>

<div class="container-fluid" style="margin-top: -30px;">
	<h1 class="well well-sm bg-navy" align="center">Voucher Collection</h1>
    <form method="POST">
    	<div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <input type="hidden" name="_csrf" class="form-control" value="<?=Yii::$app->request->getCsrfToken()?>">          
                </div>    
            </div>    
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <input type="number" name="voucher_no" class="form-control" placeholder="Enter Voucher Number..." id="voucher_no" required="">
                </div>    
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <button type="submit" name="submit" class="btn btn-success btn-flat"><i class="fa fa-sign-in"></i><b> Show Voucher Details</b></button>
                </div>    
            </div>   
        </div>
    </form>

    <div class="row">
        <div class="col-md-12 x_content"></div>
    </div>

    <?php

    	if(isset($_POST["submit"])){
        global $voucherNo;
		$voucherNo = $_POST["voucher_no"];

    	$transactionHead = Yii::$app->db->createCommand("SELECT * FROM fee_transaction_head WHERE fee_trans_id = '$voucherNo'")->queryAll();
        $transactionDetail = Yii::$app->db->createCommand("SELECT fee_type_id,fee_amount,collected_fee_amount FROM fee_transaction_detail WHERE fee_trans_detail_head_id = '$voucherNo'")->queryAll();
        $count = count($transactionDetail);
        $status = $transactionHead[0]['status'];
        $remainingAmount = $transactionHead[0]['remaining'];

        if ($status == "Partially Paid" OR $status == "Unpaid") {

        $studentID = $transactionHead[0]['std_id'];
        $classID = $transactionHead[0]['class_name_id'];
        $month = $transactionHead[0]['month']; 
        $installmentNo = $transactionHead[0]['installment_no'];

        $student = Yii::$app->db->createCommand("SELECT std_name FROM std_personal_info WHERE std_id = '$studentID'")->queryAll();        

        $class = Yii::$app->db->createCommand("SELECT class_name FROM std_class_name WHERE class_name_id = '$classID'")->queryAll();       
    ?>  


<!-- modified collect voucher start -->
<div class="row container-fluid">
    <div class="row">
        <div class="col-md-12">
            <h3 class="well well-sm">
                <?php echo $student[0]['std_name']." - ".$class[0]['class_name']."<span style='float: right;'>".date('F, Y', strtotime($month))." - Installment No: ".$installmentNo."</span>"; ?>
            </h3>
        </div>
    </div>
    <div class="col-md-4 col-md-offset-2">
        <table class="table table-bordered">
            <tbody>
                <tr class="bg-navy">
                    <th colspan="3" class=" text-center"><b>Voucher #: <?php echo $voucherNo; ?></b></th>
                </tr>
                <tr class="bg-info">
                    <th><b>Fee Types</b></th>
                    <th colspan="2" class="text-center">Amount</th>
                </tr>
                <form method="post" action="fee-transaction-detail-collect-voucher">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <input type="hidden" name="_csrf" class="form-control" value="<?=Yii::$app->request->getCsrfToken()?>">          
                            </div>    
                        </div>    
                    </div>
                    <?php for ($i=0; $i <$count; $i++) { 
                        $typeId = $transactionDetail[$i]['fee_type_id'];
                        $typeIdArray[$i] = $typeId;
                        $feeAmount = $transactionDetail[$i]['fee_amount'];
                        $collectedAmount = $transactionDetail[$i]['collected_fee_amount'];
                        $netFee = $feeAmount - $collectedAmount;
                        $feeTypeName = Yii::$app->db->createCommand("SELECT fee_type_name FROM fee_type WHERE fee_type_id = '$typeId'")->queryAll();
                    ?>
                        <tr>
                            <td width="150px"><?php echo $feeTypeName[0]['fee_type_name'];?></td>
                            <td width="80px">
                                <div class="form-group">
                                    <input type="number" class="form-control" value="<?php echo $netFee;?>"  readonly="" style="width:80px">
                                </div>
                            </td>
                            <td width="80px">
                                <div class="form-group">
                                    <input type="text" name="amount<?php echo $i;?>" class="form-control" value="<?php echo $netFee;?>" required="" style="width:80px">
                                </div>
                            </td>
                        </tr>
                    <?php } ?>
            </tbody>
        </table>        
    </div>
    <div class="col-md-4">
        <table class="table table-bordered">
            <tbody>
                <tr>
                    <th colspan="2" class="text-center bg-navy">Payment</th>
                </tr>
                <tr>
                    <th>Total Amount</th>
                    <div class="form-group">
                        <?php
                        if ($remainingAmount==0) { ?>
                            <td>
                                <input type="text" name="total_amount" class="form-control" id="total_amount" readonly="" value="<?php echo $transactionHead[0]['total_amount'] ?>" style="width: 70px;"/>
                            </td>
                        <?php } else{ ?>
                        <td>
                            <input type="text" name="total_amount" class="form-control" id="total_amount" readonly="" value="<?php echo $transactionHead[0]['remaining'] ?>" style="width: 70px"/>
                        </td>
                        <?php } ?>
                    </div>
                </tr>
                <tr>
                    <th>Total Discount</th>
                    <td>
                        <input type="text" class="form-control" readonly="" value="<?php echo $transactionHead[0]['total_discount'] ?>" style="width: 70px"/>
                    </td>
                </tr>
                <tr>
                    <th>Paid Amount</th>
                    <td>
                        <input type="number" class="form-control" id="paid_amount" name="paid_amount" onchange="setAmount()" required="" style="width: 70px"/>
                    </td>
                </tr>
                <tr>
                    <th>Remaining Amount</th>
                    <td>
                        <input type="text" class="form-control" id="remaining_amount" name="remaining_amount" readonly="" style="width: 70px"/>
                    </td>
                </tr>
                <tr>
                    <th>Status</th>
                    <td>
                        <input type="text" class="form-control" id="status" name="status" readonly="" style="width: 110px">
                    </td>
                </tr>
                <table class="table">
            <tbody>
                <tr>
                    <td>
                       <button type="submit" name="save" id="btn" class="btn btn-success btn-flat  btn-block" style="padding: 5px 27px; display: none;"><span class="fa fa-check-square" aria-hidden="true"></span><b> Collect Voucher</b></button>
                       <div id="date" style="display: none;">
                           <label>New Voucher Due Date</label>
                           <input type="date" name="date" class="form-control"><br>
                       </div>
                       <button id="partialButton" name="save" class="btn btn-warning btn-flat  btn-block" style="display: none;"><i class="fa fa-print"></i><b> Save & Generate Partial Voucher</b></button>
                    </td>
                    <td>
                       <a href="./partial-voucher-head?id=<?php echo $voucherNo; ?>" class="btn btn-success btn-flat">
                           <span class="fa fa-check-square" aria-hidden="true"></span><b> Generate Partial Voucher</b>
                       </a>
                    </td>
                </tr>
            </tbody>
        </table>           
                <tr>
                    <td>
                        <div class="row">
                            <?php foreach ($typeIdArray as $value) {
                                echo '<input type="hidden" name="typeIdArray[]" value="'.$value.'">';
                            } ?>
                            <div class="col-md-2 invisible">
                                <input type="number" name="voucherNo"  class="form-control" value="<?php echo $voucherNo; ?>">
                            </div>
                        </div>
                    </td>
                </tr>
            </tbody>        
        </form>
    </table>
    <div class="row">
        <div class="col-md-2">
                      
        </div>          
    </div>
</div>
<!-- modified collect voucher close -->
<?php 
    }
    // if close...
    else{
        // alert message...
        Yii::$app->session->setFlash('warning', "This voucher has already paid...!");
    }
 }
// isset close.... 
?>

<?php 
if(isset($_POST['save'])){
    $voucherNo        = $_POST["voucherNo"];
    $paidAmount       = $_POST["paid_amount"];
    $remainingAmount  = $_POST["remaining_amount"];
    $status           = $_POST["status"];
    $typeIdArray      = $_POST["typeIdArray"];
    $length = count($typeIdArray);
    for($i=0; $i<$length;$i++){ 
        $amount = "amount".$i;
        $feeAmount[$i] = $_POST["$amount"];
    }

    $paid_amount = Yii::$app->db->createCommand("SELECT paid_amount FROM fee_transaction_head WHERE fee_trans_id = '$voucherNo'")->queryAll();
   $amountPaid = $paidAmount  + $paid_amount[0]['paid_amount'];

    $updateTransactionHead = Yii::$app->db->createCommand()->update('fee_transaction_head', ['paid_amount'=> $amountPaid, 'remaining'=> $remainingAmount , 'status' => $status], ['fee_trans_id' => $voucherNo])->execute();
    for ($i=0; $i <$length; $i++) { 
        $collectedAmount = Yii::$app->db->createCommand("SELECT collected_fee_amount FROM fee_transaction_detail WHERE fee_trans_detail_head_id = $voucherNo AND fee_type_id = $typeIdArray[$i]")->queryAll();
        
        $amountCollected = $feeAmount[$i] + $collectedAmount[0]['collected_fee_amount'];

        $updateTransactionDetail = Yii::$app->db->createCommand()->update('fee_transaction_detail', ['collected_fee_amount'=> $amountCollected], ['fee_trans_detail_head_id' => $voucherNo, 'fee_type_id'=> $typeIdArray[$i]])->execute();
    }
    
    if ($updateTransactionHead) {
        // success alert message...
        Yii::$app->session->setFlash('success', "Voucher paid Successfully...!");    
        } else {
        // failure alert message
        Yii::$app->session->setFlash('danger', "Voucher not paid, Try again...!");      
    }
}
?>  

</div>
</body>
</html>

<script type="text/javascript">
   function setAmount(){
        var totalAmount = parseInt(document.getElementById('total_amount').value);
        var paidAmount = parseInt(document.getElementById('paid_amount').value);
        var remainingAmount = parseInt(totalAmount - paidAmount);
        paid = "Paid";
        partialyPaid = "Partially Paid";
        document.getElementById('remaining_amount').value = remainingAmount;
        if (remainingAmount==0) {
            $('#status').val(paid); 
        }
        else{
            $('#status').val(partialyPaid);
        }
        var status = $('#status').val();
        if (status == "Partially Paid") {
            $('#date').show();
            $('#partialButton').show();
            $('#btn').hide();
        }else{
            $('#btn').show();
            $('#partialButton').hide();
            $('#date').hide();
        }
    }
</script>