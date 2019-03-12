<?php 
    $voucherId   = $_GET["id"]; 
if(isset($_POST['save'])){
    $voucherNo        = $_GET["id"]; 
    $paidAmount       = $_POST["paid_amount"];
    $remainingAmount  = $_POST["remaining_amount"];
    $status           = $_POST["status"];
    $typeIdArray      = $_POST["typeIdArray"];
    $length = count($typeIdArray);
    $dueDate   = $_POST["date"];
     echo $dueDate;
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
        Yii::$app->session->setFlash('success', "Partial Voucher paid Successfully...!");    
        } else {
        // failure alert message
        Yii::$app->session->setFlash('danger', "Voucher not paid, Try again...!");      
    }
}

        // change the format of dates....
       
        $dueDate  = date('d-m-Y', strtotime($dueDate));
        $todayDate = date('d-m-Y'); 
        
        $voucherDetails = Yii::$app->db->createCommand("SELECT * FROM fee_transaction_detail as ftd INNER JOIN fee_transaction_head as fth ON fth.fee_trans_id = ftd.fee_trans_detail_head_id WHERE fth.fee_trans_id = '$voucherId'")->queryAll();

        $institue = Yii::$app->db->createCommand("SELECT * FROM institute WHERE institute_id = 2")->queryAll();
		$branch = Yii::$app->db->createCommand("SELECT * FROM branches WHERE branch_code = 002 ")->queryAll();
        // Select CLass...
        $classId = $voucherDetails[0]['class_name_id'];
        $className = Yii::$app->db->createCommand("SELECT class_name FROM std_class_name WHERE class_name_id = '$classId'")->queryAll();
        // Select Session... 
        $sessionId = $voucherDetails[0]['session_id'];
        $sessionName = Yii::$app->db->createCommand("SELECT session_name FROM std_sessions WHERE session_id = '$sessionId'")->queryAll();
       // Select Section...
        $sectionId = $voucherDetails[0]['section_id'];
        $sectionName = Yii::$app->db->createCommand("SELECT section_name FROM std_sections WHERE section_id = '$sectionId'")->queryAll();
        // Select Students...
  		$stdId = $voucherDetails[0]['std_id'];
  		$student = Yii::$app->db->createCommand("SELECT std_roll_no FROM std_enrollment_detail WHERE std_enroll_detail_std_id = '$stdId'")->queryAll();
		$stdInfo = Yii::$app->db->createCommand("SELECT std_name , std_father_name  FROM std_personal_info WHERE std_id = '$stdId'")->queryAll();
		$installmentId = $voucherDetails[0]['installment_no'];
		$installment = Yii::$app->db->createCommand("SELECT installment_name FROM installment WHERE installment_id = '$installmentId'")->queryAll();
		$installmentName = $installment[0]['installment_name'];

		$feeType = Yii::$app->db->createCommand("SELECT fee_type_id,fee_type_name  FROM fee_type")->queryAll();
    ?>

<div class="container-fluid">
	<div class="row">
		<?php 
			$j=4;
			$copyName = Array('Student Copy','Account Copy','Bank Copy');
			for ($i=0;$i<3;$i++){ 
		?>
		<div class="col-md-<?php echo $j; ?>" style="border-right: black dashed 2px;">
			<div class="row">
				<div class="col-md-3">
					<img src="images/brookfield_logo.jpg" class="img-circle img-responsive" style="float: left;" width="100px" >
				</div>
				<div class="col-md-9">
					<h3>
						<?php echo $institue[0]['institute_name'] ?>
					</h3>
					<h4 style="margin-top: -5px; margin-left: 120px;">
						Rahim Yar Khan
					</h4>
					<p style="margin-top: -5px; margin-left: 50px;">
						<small><b>A/C:<?php echo $institue[0]['institute_account_no'] ?></b></small>
					</p>
				</div>
			</div>
			
			<div class="row">
				<di class="col-md-12">
					<p class="text-center" style="border: 1px groove;">
						<b><?php echo $copyName[$i]; ?></b>
					</p>
				</di>
			</div>
			<div class="row">
				<div class="col-md-12">
					<p>
						<b style="float: left;">Voucher # : </b><?php echo $voucherId; ?>
						<span style="float: right;"><b>Session: </b><?php echo $sessionName[0]['session_name'];?></span>
					</p>
				</div>
			</div>

			<div class="row">
				<div class="col-md-12">
					<p>
						<b style="float: left;">Issue Date: &nbsp;</b><?php echo $todayDate; ?>
						<span style="float: right"><b>Due Date: </b><?php echo $dueDate; ?></span>
					</p>
				</div>
			</div>

			<div class="row">
				<div class="col-md-12">
					<p>
						<b>Voucher Month: </b><?php echo date('F, Y', strtotime($voucherDetails[0]["month"])); ?>
					</p>
				</div>
			</div>
			
			<div class="row">
				<div class="col-md-12">
					<p class="text-center" style="border: 1px groove;">
						<b>FEE VOUCHER</b>
					</p>
				</div>
			</div>

			<div class="row">
				<div class="col-md-12">
					<p style="float: left;">
						<b>Name: </b><?php echo $stdInfo[0]['std_name'] ?>
					</p>
					<p style="float: right;">
						<b>Roll No.: </b><?php echo $student[0]['std_roll_no'] ?>
					</p>
				</div>
			</div>

			<div class="row">
				<div class="col-md-12">
					<p class="mb-1">
						<b>Class: </b><?php echo $className[0]['class_name'];?>
						<span style="float: right;">
							<b>Section: </b><?php echo $sectionName[0]['section_name'];?>
						</span>
					</p>
				</div>
			</div>

			<div class="row">
				<div class="col-md-12">
					<table class="table table-bordered" width="100%">
						<tr>
							<th>Sr #</th>
							<th colspan="2">Descrpition</th>
							<th style="text-align: center;">Amount</th>
						</tr>
						<?php foreach ($feeType as $index => $value) { ?>
							<tr>
								<td align="center"><?php echo ($index +1);?></td>
								<td colspan="2">
									<?php if ($feeType[$index]['fee_type_name'] == 'Tuition Fee') {
										echo $feeType[$index]['fee_type_name']. ' (' .$installmentName.')';
									}
									else{
									echo $feeType[$index]['fee_type_name'];
									}?>		
								</td>
								<td align="center">
									<?php
										foreach ($voucherDetails as $key => $value) { 
											if($voucherDetails[$key]['fee_type_id'] == $feeType[$index]['fee_type_id'] ){
												$amount = $voucherDetails[$key]['fee_amount'] -$voucherDetails[$key]['collected_fee_amount'];
												echo $amount;
											}		
										} 
									?>
								</td>
							</tr>
						<?php } ?>	
					</table>
				</div>
			</div>
			<?php
			$currentTotal = $voucherDetails[0]['remaining'];
			$installNo = $voucherDetails[0]['installment_no'];
			$installmentNo = $installNo -1;
			$remaining = 0;
			//$remain = Yii::$app->db->createCommand("SELECT  remaining, total_amount,paid_amount FROM fee_transaction_head WHERE installment_no = $installmentNo AND std_id = $stdId")->queryAll();
			// var_dump($remain);
			//$remainig = $remain[0]['remaining'];
			
			//$finallyRemaining = $remaining - $addmission;
			$paymentByDueDate = $currentTotal + $remaining;
			$paymentAFterDueDate = $paymentByDueDate + 50;
			 ?>			
			<div class="row">
				<div class="col-md-12">
					<table width="100%" class="table table-condensed">
						<tr>
							<th>Current Voucher Total:</th>
							<td align="center"> <?php echo $currentTotal; ?> </td>
						</tr>
						<tr>
							<th>Previous Dues:</th>
							<td align="center"> <?php echo $remaining; ?> </td>
						</tr>
						<tr>
							<th>Total Paymeny by Due Date:</th>
							<td align="center"><?php echo $paymentByDueDate; ?></td>
						</tr>
						<tr>
							<th>Total Payment After Due Date:</th>
							<td align="center"><?php echo $paymentAFterDueDate; ?></td>
						</tr>
					</table>
				</div>
			</div>

			<div class="row">
				<div class="col-md-12" style="margin-top: -25px;">
					<h6><b>MESSAGE:</b></h6>
					<textarea class="form-control border-dark" rows="2"><?php //echo $message; ?></textarea>
				</div>
			</div>

			<div class="row">
				<div class="col-md-12">
					<h5>PAYMENT TERMS:</h5>
					<ol class="text-justify" style="font-size: 13px">
						<li>Late payment surcharge @Rs. 50/- per day.</li>
						<li>Rs.50/- will be charged for each dublicate voucher.</li>
						<li>Any error in calculation of dues by the college will be adjusted in the next voucher.</li>
					</ol>
				</div>
			</div>
			<br><br>

			<div class="row">
				<div class="col-md-6">
					<p>____________________________</p>
					<p align="center">SIGNATURE</p>
				</div>
				<div class="col-md-6 float-right">
					<p>____________________________</p>
					<p align="center">STAMP</p>
				</div>
			</div>
			<br><hr>
			
			<div class="row">
				<div class="col-md-12 text-center">
					<p style="border: 1px"><?php echo "Printed on: "."<b><i>".$todayDate."</i></b>"; ?></p>
					<p style="border: 1px outset;">Devleoped By: <b><i>DEXTEROUS DEVELOPERS</i></b><br> (www.dexdevs.com)</p>
				</div>
			</div>
			<br>
		</div>
		<?php } ?>
	</div>
</div>
