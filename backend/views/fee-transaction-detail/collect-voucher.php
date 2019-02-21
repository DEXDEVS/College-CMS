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
        $transactionDetail = Yii::$app->db->createCommand("SELECT fee_type_id,fee_amount FROM fee_transaction_detail WHERE fee_trans_detail_head_id = '$voucherNo'")->queryAll();
        var_dump($transactionDetail);
        $count = count($transactionDetail);
        $status = $transactionHead[0]['status'];
        $remainingAmount = $transactionHead[0]['remaining'];

        if ($status == "Unpaid") {

        $studentID = $transactionHead[0]['std_id'];
        $classID = $transactionHead[0]['class_name_id'];
        $month = $transactionHead[0]['month']; 
        $installmentNo = $transactionHead[0]['installment_no'];

        $student = Yii::$app->db->createCommand("SELECT std_name FROM std_personal_info WHERE std_id = '$studentID'")->queryAll();        

        $class = Yii::$app->db->createCommand("SELECT class_name FROM std_class_name WHERE class_name_id = '$classID'")->queryAll();       
    ?>  


<!-- modified collect voucher start -->
<div class="row container-fluid">
    <div class="col-md-12">
        <table class="table table-bordered">
            <tr>
                <thead>
                        <th colspan="4" style="text-align: center;background-color:black;color:white; ">Voucher # : <span><?php echo $voucherNo; ?></span></th>
                </thead>
            </tr>
            <tr>
                <thead>
                    <th>Student:</th>
                    <td><?php echo $student[0]['std_name']; ?></td>
                    <th>Class:</th>
                    <td><?php echo $class[0]['class_name']; ?></td>
                </thead>
            </tr>
             <tr>
                <thead>
                    <th>Month:</th>
                    <td><?php echo date('F, Y', strtotime($month)); ?></td>
                    <th>Installment:</th>
                    <td><?php echo $installmentNo; ?></td>
                </thead>
            </tr>
            <tbody>
                <tr>
                    <td colspan="4" align="center" style="background-color: lightgray;"><b>Details</b></td>
                </tr>
                <form method="post" action="index.php?r=fee-transaction-detail/collect-voucher">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <input type="hidden" name="_csrf" class="form-control" value="<?=Yii::$app->request->getCsrfToken()?>">          
                            </div>    
                        </div>    
                    </div>
                    <?php for ($i=0; $i < $count ; $i++) { 
                        $typeId = $transactionDetail[$i]['fee_type_id'];
                        $typeIdArray[$i] = $typeId;
                        $feeAmount = $transactionDetail[$i]['fee_amount'];
                        $feeTypeName = Yii::$app->db->createCommand("SELECT fee_type_name FROM fee_type WHERE fee_type_id = '$typeId'")->queryAll();

                    ?>
                        <tr>
                            <td width="150px"><?php echo $feeTypeName[0]['fee_type_name'];?></td>
                            <td width="80px">
                                <div class="form-group">
                                    <input type="text" name="amount<?php echo $i;?>" class="form-control" value="<?php echo $feeAmount;?>">
                                </div>
                            </td>
                        </tr>
                    <?php } ?>
                    <tr>
                        <td width="150px">Total Amount</td>
                        <div class="form-group">
                            <?php
                                if ($remainingAmount==0) { ?>
                                    <td>
                                        <input type="text" name="total_amount" class="form-control" id="total_amount" readonly="" value="<?php echo $transactionHead[0]['total_amount'] ?>" />
                                    </td>
                            <?php 
                                } else{ ?>
                                    <td>
                                        <input type="text" name="total_amount" class="form-control" id="total_amount" readonly="" value="<?php echo $transactionHead[0]['remaining'] ?>" />
                                    </td>
                            <?php   
                                }
                            ?>
                        </div>
                        <td width="150px">Discount Amount</td>
                        <td width="80px">
                            <input type="text" class="form-control" readonly="" value="<?php echo $transactionHead[0]['total_discount'] ?>"/>
                        </td>
                        
                    </tr>
                    <tr>
                        <td width="150px">Paid Amount</td>
                        <td width="90px">
                            <input type="number" class="form-control" id="paid_amount" name="paid_amount" onchange="setAmount()" required="" />
                        </td>
                        <td width="150px">Remaining Amount</td>
                        <td width="90px">
                            <input type="text" class="form-control" id="remaining_amount" name="remaining_amount" readonly="" />
                        </td>
                        <td width="150px">Status</td>
                        <td width="90px">
                            <input type="text" class="form-control" id="status" name="status" readonly="" />
                        </td>
                    </tr>
                    <tfoot>
                        <tr>
                            <td colspan="4">
                               <button type="submit" name="save" id="btn" class="btn btn-success btn-flat" style="padding: 5px 27px;"><span class="fa fa-check-square" aria-hidden="true"></span><b> Collect Voucher</b></button>
                            </td>
                        </tr>
                        <div class="row">
                            <?php foreach ($typeIdArray as $value) {
                                    echo '<input type="hidden" name="typeIdArray[]" value="'.$value.'">';
                                }
                            ?>
                            <div class="col-md-4 invisible">
                                <input type="number" name="voucherNo"  class="form-control" value="<?php echo $voucherNo; ?>">
                            </div>
                        </div>
                    </tfoot>
                </form>
            </tbody>
        </table>
    </div>
</div>
<!-- modified collect voucher close -->
<?php 
    }
    // if close...
    else{
        echo 
            "<br><div class='row container-fluid'>
                <div class='col-md-12 alert alert-success'>
                    <p style='text-align:center'><b>This voucher has already paid...!
                    </b></p>
                </div>
            </div>";
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

    $updateTransactionHead = Yii::$app->db->createCommand()->update('fee_transaction_head', ['paid_amount'=> $paidAmount, 'remaining'=> $remainingAmount , 'status' => $status], ['fee_trans_id' => $voucherNo])->execute();
    for ($i=0; $i <$length; $i++) { 
        $updateTransactionDetail = Yii::$app->db->createCommand()->update('fee_transaction_detail', ['collected_fee_amount'=> $feeAmount[$i]], ['fee_trans_detail_head_id' => $voucherNo, 'fee_type_id'=> $typeIdArray[$i]])->execute();
    }
    
    if ($updateTransactionHead) {
        //Success
        echo "<br><div class='row container-fluid'>
                <div class='col-md-12 alert alert-success'>
                    <p style='text-align:center'><b>Voucher paid Successfully...!
                    </b></p>
                </div>
            </div>";
        } else {
        //Failure
        echo "<br><div class='row container-fluid'>
                <div class='col-md-12 alert alert-danger'>
                    <p style='text-align:center'><b>Voucher not paid...!
                    </b></p>
                </div>
            </div>";
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
        var paid = "Paid";
        var unPaid = "Unpaid";
        document.getElementById('remaining_amount').value = remainingAmount;
        if (remainingAmount==0) {
            document.getElementById('status').value = paid;
        }
        else{
            document.getElementById('status').value = unPaid;
        }
    }
</script>
