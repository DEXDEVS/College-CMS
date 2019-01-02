<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Collect Voucher</title>
</head>
<body>

<div class="container-fluid" style="margin-top: -30px;">
	<h1 class="well well-sm" align="center">Voucher Collection</h1>
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
                    <button type="submit" name="submit" class="btn btn-info"> Show Voucher Details</button>
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
        $status = $transactionHead[0]['status'];
        $remainingAmount = $transactionHead[0]['remaining'];

        if ($status == "Unpaid") {

        $studentID = $transactionHead[0]['std_id'];
        $classID = $transactionHead[0]['class_name_id'];
        $monthID = $transactionHead[0]['month'];  

        $month = Yii::$app->db->createCommand("SELECT month_name FROM month WHERE month_id = '$monthID'")->queryAll();      

        $student = Yii::$app->db->createCommand("SELECT std_name FROM std_personal_info WHERE std_id = '$studentID'")->queryAll();        

        $class = Yii::$app->db->createCommand("SELECT class_name FROM std_class_name WHERE class_name_id = '$classID'")->queryAll();       
    ?>  

<form method="POST" action="index.php?r=fee-transaction-detail/collect-voucher">
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <input type="hidden" name="_csrf" class="form-control" value="<?=Yii::$app->request->getCsrfToken()?>">          
            </div>    
        </div>    
    </div>
	<div class="row">
		<div class="col-md-12">
			<table class="table table-bordered table-responsive" width="100%">
				<tr>
					<th>Student</th>
					<th>Class</th>
					<th>Month</th>
					<th>Total Amount</th>
					<th>Discount Amount</th>
					<th>Paid Amount</th>
					<th>Remaing Amount</th>
					<th>Status</th>
				</tr>
				<tr>
					<td><?php echo $student[0]['std_name']; ?></td>
					<td><?php echo $class[0]['class_name']; ?></td>
					<td><?php echo $month[0]['month_name']; ?></td>
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
					<td>
                        <input type="text" class="form-control" readonly="" value="<?php echo $transactionHead[0]['total_discount'] ?>"/>
                    </td>
					<td>
                        <input type="number" class="form-control" id="paid_amount" name="paid_amount" onchange="setAmount()" required="" />
                    </td>
					<td>
                        <input type="text" class="form-control" id="remaining_amount" name="remaining_amount" readonly="" />
                    </td>
					<td>
                        <input type="text" class="form-control" id="status" name="status" readonly="" />
                    </td>
				</tr>
			</table>
    	</div>
    </div>
    <div class="row">
        <div class="col-md-4 invisible">
            <input type="number" name="voucherNo"  class="form-control" value="<?php echo $voucherNo; ?>">
        </div>
    </div>
    <div class="row">
        <div class="col-md-1" style="margin-left: 81%;">
            <div class="form-group">
                <button type="submit" name="save" id="btn" class="btn btn-success"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Collect Voucher</button>
            </div> 
        </div>
    </div>
</form>
<?php 
    }
    // if close...
    else{
        echo 
            "<div class='row'>
                <div class='col-md-12 alert alert-success'>
                    <p style='text-align:center'><b>This voucher has been paid...!
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

    $updateTransactionHead = Yii::$app->db->createCommand()->update('fee_transaction_head', ['paid_amount'=> $paidAmount, 'remaining'=> $remainingAmount , 'status' => $status], ['fee_trans_id' => $voucherNo])->execute();
    if ($updateTransactionHead) {
        //Success
        echo "<div class='row'>
                <div class='col-md-12 alert alert-success'>
                    <p style='text-align:center'><b>Voucher paid Successfully...!
                    </b></p>
                </div>
            </div>";
        } else {
        //Failure
        echo "<div class='row'>
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
