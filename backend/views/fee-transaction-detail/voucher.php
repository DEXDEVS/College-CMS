<!DOCTYPE html>
<html>
<head>
	<title>Voucher</title>
</head>
<body>
<?php 

    if(isset($_POST['submit'])){ 
        $classid   = $_POST["classid"];
        $sessionid = $_POST["sessionid"];
        $sectionid = $_POST["sectionid"];
        $month     = $_POST["month"];
        $issueDate = $_POST["issue_date"];
        $dueDate   = $_POST["due_date"];
        $message   = $_POST["message"];
        // change the format of dates....
        $issueDate  = date('d-m-Y', strtotime($issueDate));
        $dueDate  = date('d-m-Y', strtotime($dueDate)); 
        
        $months = Yii::$app->db->createCommand("SELECT month FROM fee_transaction_head WHERE month = '$month'")->queryAll();
		
		if(!empty($months)){
        $institue = Yii::$app->db->createCommand("SELECT * FROM institute WHERE institute_id = 2")->queryAll();
		$branch = Yii::$app->db->createCommand("SELECT * FROM branches WHERE branch_code = 002 ")->queryAll();
        // Select CLass...
        $className = Yii::$app->db->createCommand("SELECT class_name FROM std_class_name WHERE class_name_id = '$classid'")->queryAll();
        // Select Session... 
        $sessionName = Yii::$app->db->createCommand("SELECT session_name FROM std_sessions WHERE session_id = '$sessionid'")->queryAll();
       // Select Section...
        $sectionName = Yii::$app->db->createCommand("SELECT section_name FROM std_sections WHERE section_id = '$sectionid'")->queryAll();
        // Select Students...
        $student = Yii::$app->db->createCommand("SELECT sed.std_enroll_detail_id ,sed.std_enroll_detail_std_id FROM std_enrollment_detail as sed INNER JOIN std_enrollment_head as seh ON seh.std_enroll_head_id = sed.std_enroll_detail_head_id WHERE seh.class_name_id = '$classid' AND seh.session_id = '$sessionid' AND seh.section_id = '$sectionid'")->queryAll();
        foreach ($student as $id =>$value) {
				$stdInfo = Yii::$app->db->createCommand("SELECT std_name , std_father_name  FROM std_personal_info WHERE std_id = '$value[std_enroll_detail_std_id]'")->queryAll();
				$feeDetail = Yii::$app->db->createCommand("SELECT * FROM fee_transaction_detail as ftd INNER JOIN fee_transaction_head as fth ON fth.fee_trans_id = ftd.fee_trans_detail_head_id WHERE fth.std_id = '$value[std_enroll_detail_std_id]' AND fth.month = '$month'")->queryAll();
				$feeType = Yii::$app->db->createCommand("SELECT fee_type_id,fee_type_name  FROM fee_type")->queryAll();
    ?>

<div class="container-fluid">
	<div class="row">
		<?php 
			$j=4;
			$copyName = Array('Student Copy','Account Copy','Bank Copy');
			for ($i=0;$i<3;$i++){ 
		?>
		<div class="col-md-<?php echo $j; ?>" style="border-right: black dotted 1px;">
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
						<b style="float: left;">Voucher # : </b><?php echo $feeDetail[0]['fee_trans_detail_head_id'] ?>
						<span style="float: right;"><b>Session: </b><?php echo $sessionName[0]['session_name'];?></span>
					</p>
				</div>
			</div>

			<div class="row">
				<div class="col-md-12">
					<p>
						<b style="float: left;">Issue Date: &nbsp;</b><?php echo $issueDate; ?>
						<span style="float: right"><b>Due Date: </b><?php echo $dueDate; ?></span>
					</p>
				</div>
			</div>

			<div class="row">
				<div class="col-md-12">
					<p>
						<b>Voucher Month: </b><?php echo date('F, Y', strtotime($months[0]["month"])); ?>
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
						<b>Roll No.: </b><?php echo $student[$id]['std_enroll_detail_id'] ?>
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
								<td colspan="2"><?php echo $feeType[$index]['fee_type_name'];?></td>
								<td align="center">
									<?php
										foreach ($feeDetail as $key => $value) { 
											if($feeDetail[$key]['fee_type_id'] == $feeType[$index]['fee_type_id'] ){
												echo $feeDetail[$key]['fee_amount'];
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
			$currentTotal = $feeDetail[0]['total_amount'];
			$remaining = $feeDetail[0]['remaining'];
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
					<textarea class="form-control border-dark" rows="2"><?php echo $message; ?></textarea>
				</div>
			</div>

			<div class="row">
				<div class="col-md-12">
					<h5>PAYMENT TERMS:</h5>
					<ol class="text-justify" style="font-size: 13px">
						<li>Late payment surcharge @Rs. 50/- per day.</li>
						<li>Rs. 10/- will be charged for each dublicate voucher.</li>
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
			<br><br><br><hr>

			<div class="row">
				<div class="col-md-12 text-center">
					<p style="border: 1px outset;">Devleoped By: <b><i>DEXTEROUS DEVELOPERS</i></b><br> (www.dexdevs.com)</p>
				</div>
			</div>
			<br>
		</div>
		<?php } ?>
	</div>
</div>
<?php
	//ending of foreach loop
	}
	// ending of if statement
	} else {
		echo 
			"<div class='row' style='margin:0px -10px 0px 15px;'>
				<div class='col-md-12 alert alert-warning' style='text-align: center'>
					<p>Please Select a valid month....!</p>
				</div>
			</div>";
	}
	//ending of isset if
    }
?>
</body>
</html>