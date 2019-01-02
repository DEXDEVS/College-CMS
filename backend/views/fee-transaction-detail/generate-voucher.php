<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<style>
		.image img{
			float: left;
		}
		.h2{
			float: left;
			margin: 15px 4px;
			font-weight: bold;
			font-size: 16px;
		}
		.h4{
			float: left;
			margin: -32px 80px;
			font-size: 14px;
		}
		.span{
			float: left;
			margin: -18px 100px;
			font-size: 14px;
		}
		.feeTable th{
			text-align: center;
		}
	</style>
</head>
<body>
<?php
	if(isset($_POST["submit"])){
		$classid = $_POST["classid"];
		$sessionid = $_POST["sessionid"];
		$sectionid = $_POST["sectionid"];
		$month = $_POST["month"];
		$months = Yii::$app->db->createCommand("SELECT * FROM month as m RIGHT JOIN fee_transaction_head as fth ON m.month_id = fth.month WHERE fth.month = '$month'")->queryAll();
		if(!empty($months)){
			$monthId = $months[0]["month_id"];
		}
		if(!empty($months) && $month == $monthId){

			$institue = Yii::$app->db->createCommand("SELECT * FROM institute ")->queryAll();
			$branch = Yii::$app->db->createCommand("SELECT * FROM branches WHERE branch_code = 002 ")->queryAll();
			$className = Yii::$app->db->createCommand("SELECT class_name FROM std_class_name WHERE class_name_id = '$classid'")->queryAll();
			$sessionName = Yii::$app->db->createCommand("SELECT session_name FROM std_sessions WHERE session_id = '$sessionid'")->queryAll();
			$sectionName = Yii::$app->db->createCommand("SELECT section_name FROM std_sections WHERE section_id = '$sectionid'")->queryAll();
			$student = Yii::$app->db->createCommand("SELECT sed.std_enroll_detail_id ,sed.std_enroll_detail_std_id FROM std_enrollment_detail as sed INNER JOIN std_enrollment_head as seh ON seh.std_enroll_head_id = sed.std_enroll_detail_head_id WHERE seh.class_name_id = '$classid' AND seh.session_id = '$sessionid' AND seh.section_id = '$sectionid'")->queryAll();
			foreach ($student as $id =>$value) {
				$stdInfo = Yii::$app->db->createCommand("SELECT std_name , std_father_name  FROM std_personal_info WHERE std_id = '$value[std_enroll_detail_std_id]'")->queryAll();
				$feeDetail = Yii::$app->db->createCommand("SELECT *  FROM fee_transaction_detail as ftd INNER JOIN fee_transaction_head as fth ON fth.fee_trans_id = ftd.fee_trans_detail_head_id WHERE fth.std_id = '$value[std_enroll_detail_std_id]' AND fth.month = '$month'")->queryAll();
				$feeType = Yii::$app->db->createCommand("SELECT fee_type_id,fee_type_name  FROM fee_type")->queryAll();
?>
<div class="container-fluid">
	<div id="div1">
		<div class="row">
			<div class="col-md-4 image">
				<img src="images/school_logo.jpg" class="image img-circle" width="65" height="65">
				<h2 class="h2"><?php echo $institue[0]['institute_name'] ?></h2>
				<h4 class="h4"><?php echo $branch[0]['branch_location'] ?> | Rahim Yar Khan</h4>
				<span class="span">Phone No: <?php echo $branch[0]['branch_contact_no'] ?></span>
			</div>
			<div class="col-md-4 image">
				<img src="images/school_logo.jpg" class="image img-circle" width="65" height="65">
				<h2 class="h2"><?php echo $institue[0]['institute_name'] ?></h2>
				<h4 class="h4"><?php echo $branch[0]['branch_location'] ?> | Rahim Yar Khan</h4>
				<span class="span">Phone No: <?php echo $branch[0]['branch_contact_no'] ?></span>
			</div>
			<div class="col-md-4 image">
				<img src="images/school_logo.jpg" class="image img-circle" width="65" height="65">
				<h2 class="h2"><?php echo $institue[0]['institute_name'] ?></h2>
				<h4 class="h4"><?php echo $branch[0]['branch_location'] ?> | Rahim Yar Khan</h4>
				<span class="span">Phone No: <?php echo $branch[0]['branch_contact_no'] ?></span>
			</div>
		</div><br>

		<div class="row">
			<div class="col-md-4">
				<div style="border: 1px solid; line-height: 2; height: 28px">
					<p align="center">
						<b><?php echo $months[0]["month_name"] ." - ". date('Y'); ?></b>
					</p>
				</div>
				<p style="background-color: black; color: white; padding: 5px"><b>Fee Receipt / Student Copy <span style="float: right;">Voucher # <?php echo $feeDetail[0]['fee_trans_detail_head_id'] ?></span></b></p>
				<div style="border: 1px solid; line-height: 2; padding: 5px; height: 28px; margin-top: -10px">
					<p style="font-size: 9px;">
						<b>The Bank of Punjab, Abu Dhabi Road RYK.  &nbsp;|&nbsp;&nbsp;Account Number: 
							<?php echo $institue[0]['institute_account_no'] ?></b>
					</p>
				</div>
			</div>
			<div class="col-md-4">
				<div style="border: 1px solid; line-height: 2; height: 28px">
					<p align="center">
						<b><?php echo $months[0]["month_name"] ." - ". date('Y'); ?></b>
					</p>
				</div>
				<p style="background-color: black; color: white; padding: 5px"><b>Fee Receipt / Institue Copy <span style="float: right;">Voucher # <?php echo $feeDetail[0]['fee_trans_detail_head_id'] ?></span></b></p>
				<div style="border: 1px solid; line-height: 2; padding: 5px; height: 28px; margin-top: -10px">
					<p style="font-size: 9px;">
						<b>The Bank of Punjab, Abu Dhabi Road RYK. &nbsp;|&nbsp;&nbsp;Account Number: <?php echo $institue[0]['institute_account_no'] ?></b>
					</p>
				</div>
			</div>
			<div class="col-md-4">
				<div style="border: 1px solid; line-height: 2; height: 28px">
					<p align="center">
						<b><?php echo $months[0]["month_name"] ." - ". date('Y'); ?></b>
					</p>
				</div>
				<p style="background-color: black; color: white; padding: 5px"><b>Fee Receipt / Bank Copy <span style="float: right;">Voucher # <?php echo $feeDetail[0]['fee_trans_detail_head_id'] ?></span></b></p>
				<div style="border: 1px solid; line-height: 2; padding: 5px; height: 28px; margin-top: -10px">
					<p style="font-size: 9px;">
						<b>The Bank of Punjab, Abu Dhabi Road RYK. &nbsp;|&nbsp;&nbsp;Account Number: <?php echo $institue[0]['institute_account_no'] ?></b>
					</p>
				</div>
			</div>
		</div>
		<hr>
		<div class="row">
			<div class="col-md-4">
				<table width="100%">
					<tr>
						<th>Student Name:</th>
						<td><?php echo $stdInfo[0]['std_name'] ?></td>
						<th>Father Name:</th>
						<td><?php echo $stdInfo[0]['std_father_name'] ?></td>
						<th>Roll #</th>
						<td><?php echo $student[$id]['std_enroll_detail_id'] ?></td>
					</tr>
					<tr>
						<th>Session:</th>
						<td><?php echo $sessionName[0]['session_name']?></td>
						<th>Class</th>
						<td><?php echo $className[0]['class_name']?></td>
						<th>Section</th>
						<td><?php echo $className[0]['class_name'] .'-'. $sectionName[0]['section_name']?></td>
					</tr>
					<tr>
						<th>Issue Date:</th>
						<td><?php echo date('d-m-Y') ?></td>
						<th>Due Date:</th>
						<td>10-11-2018</td>			
						<th>Valid Date:</th>
						<td>20-11-2018</td>		
					</tr>
				</table>
			</div>

			<div class="col-md-4">
				<table width="100%" style="border:1px">
					<tr>
						<th>Student Name:</th>
						<td><?php echo $stdInfo[0]['std_name'] ?></td>
						<th>Father Name:</th>
						<td><?php echo $stdInfo[0]['std_father_name'] ?></td>
						<th>Roll #</th>
						<td><?php echo $student[$id]['std_enroll_detail_id'] ?></td>
					</tr>
					<tr>
						<th>Session:</th>
						<td><?php echo $sessionName[0]['session_name']?></td>
						<th>Class</th>
						<td><?php echo $className[0]['class_name']?></td>
						<th>Section</th>
						<td><?php echo $className[0]['class_name'] .'-'. $sectionName[0]['section_name']?></td>
					</tr>
					<tr>
						<th>Issue Date:</th>
						<td><?php echo date('d-m-Y') ?></td>
						<th>Due Date:</th>
						<td>10-11-2018</td>			
						<th>Valid Date:</th>
						<td>20-11-2018</td>		
					</tr>
				</table>
			</div>
			<div class="col-md-4">
				<table width="100%" style="border:1px">
					<tr>
						<th>Student Name:</th>
						<td><?php echo $stdInfo[0]['std_name'] ?></td>
						<th>Father Name:</th>
						<td><?php echo $stdInfo[0]['std_father_name'] ?></td>
						<th>Roll #</th>
						<td><?php echo $student[$id]['std_enroll_detail_id'] ?></td>
					</tr>
					<tr>
						<th>Session:</th>
						<td><?php echo $sessionName[0]['session_name']?></td>
						<th>Class</th>
						<td><?php echo $className[0]['class_name']?></td>
						<th>Section</th>
						<td><?php echo $className[0]['class_name'] .'-'. $sectionName[0]['section_name']?></td>
					</tr>
					<tr>
						<th>Issue Date:</th>
						<td><?php echo date('d-m-Y') ?></td>
						<th>Due Date:</th>
						<td>10-11-2018</td>			
						<th>Valid Date:</th>
						<td>20-11-2018</td>		
					</tr>
				</table>
			</div>
		</div><hr>

		<div class="row">
			<div class="col-md-4">
				<table class="table feeTable" width="100%" border="" height="150px">
					<tr>
						<th>Sr #</th>
						<th colspan="2">Descrpition</th>
						<th>Amount</th>
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
			
			<div class="col-md-4">
				<table class="table table-danger feeTable" width="100%" border="1">
					<tr>
						<th>Sr #</th>
						<th colspan="2">Descrpition</th>
						<th>Amount</th>
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
			<div class="col-md-4">
				<table class="table table-danger feeTable" width="100%" border="1">
					<tr>
						<th>Sr #</th>
						<th colspan="2">Descrpition</th>
						<th>Amount</th>
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

		<div class="row">
			<div class="col-md-4 right">
				<table class="table">
					<tr>
						<th>Current Voucher Total:</th>
						<td> <?php echo $feeDetail[0]['total_amount'];?> </td>
					</tr>
					<tr>
						<th>Previous Dues:</th>
						<td> <?php echo $feeDetail[0]['remaining'];?> </td>
					</tr>
					<tr>
						<th>Receivable within due date:</th>
						<td> <b><?php echo $feeDetail[0]['total_amount'];?></b> </td>
					</tr>
				</table>
			</div>
			<div class="col-md-4 right">
				<table width="100%" class="table">
					<tr>
						<th>Current Voucher Total:</th>
						<td> <?php echo $feeDetail[0]['total_amount'];?> </td>
					</tr>
					<tr>
						<th>Previous Dues:</th>
						<td> <?php echo $feeDetail[0]['remaining'];?> </td>
					</tr>
					<tr>
						<th>Receivable within due date:</th>
						<td> <b><?php echo $feeDetail[0]['total_amount'];	?></b></td>
					</tr>
				</table>
			</div>
			<div class="col-md-4 right">
				<table width="100%" class="table">
					<tr>
						<th>Current Voucher Total:</th>
						<td> <?php echo $feeDetail[0]['total_amount'];?> </td>
					</tr>
					<tr>
						<th>Previous Dues:</th>
						<td> <?php echo $feeDetail[0]['remaining'];?> </td>
					</tr>
					<tr>
						<th>Receivable within due date:</th>
						<td> <b><?php echo $feeDetail[0]['total_amount'];	?></b></td>
					</tr>
				</table>
			</div>
		</div>

		<div class="row">
			<div class="col-md-4">
				<table class="table table-condensed table-bordered" height="50px">
					<tr>
						<td align="center"><p style="font-size: 11px;"><b>Bank Stamp + Sign</b></p></td>
						<td align="center"><p style="font-size: 11px;"><b>Receiving Date</b></p></td>
						<td align="center"><p style="font-size: 11px;"><b>Amount Received</b></p></td>
					</tr>
					<tr>
						<td align="center">.</td>
						<td></td>
						<td></td>
					</tr>
				</table>
			</div>

			<div class="col-md-4">
				<table class="table table-condensed table-bordered" height="50px">
					<tr>
						<td align="center"><p style="font-size: 11px;"><b>Bank Stamp + Sign</b></p></td>
						<td align="center"><p style="font-size: 11px;"><b>Receiving Date</b></p></td>
						<td align="center"><p style="font-size: 11px;"><b>Amount Received</b></p></td>
					</tr>
					<tr>
						<td align="center">.</td>
						<td></td>
						<td></td>
					</tr>
				</table>
			</div>
			<div class="col-md-4">
				<table class="table table-condensed table-bordered" height="50px">
					<tr>
						<td align="center"><p style="font-size: 11px;"><b>Bank Stamp + Sign</b></p></td>
						<td align="center"><p style="font-size: 11px;"><b>Receiving Date</b></p></td>
						<td align="center"><p style="font-size: 11px;"><b>Amount Received</b></p></td>
					</tr>
					<tr>
						<td align="center">.</td>
						<td></td>
						<td></td>
					</tr>
				</table>
			</div>
		</div>
		
		<div class="row">
			<div class="col-md-4">
				<p>A fine of Rs. 100 will be charged after due date. This voucher is not valid after the date of validity and bank will not receive it. For unpaid fee voucher, a fine of Rs. 200 will be charged in the voucher of next month.</p>
			</div>
			<div class="col-md-4">
				<p>A fine of Rs. 100 will be charged after due date. This voucher is not valid after the date of validity and bank will not receive it. For unpaid fee voucher, a fine of Rs. 200 will be charged in the voucher of next month.</p>
			</div>
			<div class="col-md-4">
				<p>A fine of Rs. 100 will be charged after due date. This voucher is not valid after the date of validity and bank will not receive it. For unpaid fee voucher, a fine of Rs. 200 will be charged in the voucher of next month.</p>
			</div>
		</div><hr>
	</div>
	<!-- print-content close -->
	<?php 
		//ending of foreach loop
		}
	?>
	
<!-- 	<right style="float: right;">
	    <button class="btn btn-warning hidden-print" id="btnprint" onclick="printContent('div1')"><span class="glyphicon glyphicon-print" aria-hidden="true"></span> Print </button>
	</right> -->

<?php
	// ending of if statement
	} else {
		echo 
			"<div class='row' style='margin:0px -10px 0px 15px;'>
				<div class='col-md-12 alert alert-warning' style='text-align: center'>
					Please Select a valid month
				</div>
			</div>";
	}
//ending of isset if
}
?> 

</div>
<!-- container-fluid close -->