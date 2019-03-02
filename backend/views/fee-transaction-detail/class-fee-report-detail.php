<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
	@media print{
	    .table th{
	        background-color: #001F3F !important;
	        color: #fff !important;
	    }
	    .table .tdcolor{
	    	background-color: #ccc !important;
	    }
	    .table .a{
	    	background-color: gray !important;
	    	 color: #FFF;
	    }
	}
</style>
</head>
<body>
<div class="row container-fluid"> 
	<div class="container-fluid" style="margin-top: -30px;">
	<?php 
	if(isset($_POST['submit']))
    { 
        $classid        = $_POST["classid"];
        $sessionid      = $_POST["sessionid"];
        $sectionid      = $_POST["sectionid"];
        // Select CLass...
        $class = Yii::$app->db->createCommand("SELECT class_name FROM std_class_name WHERE class_name_id = '$classid'")->queryAll();
        // Select Session... 
        $sessionName = Yii::$app->db->createCommand("SELECT session_name FROM std_sessions WHERE session_id = '$sessionid'")->queryAll();
       // Select Section...
        $sectionName = Yii::$app->db->createCommand("SELECT section_name FROM std_sections WHERE section_id = '$sectionid'")->queryAll();
        // Select Students...
        $students = Yii::$app->db->createCommand("SELECT sed.std_enroll_detail_std_id,sed.std_roll_no FROM std_enrollment_detail as sed 
        	INNER JOIN std_enrollment_head as seh
        	ON seh.std_enroll_head_id = sed.std_enroll_detail_head_id
        	WHERE seh.class_name_id  = '$classid' AND seh.session_id = '$sessionid' AND seh.section_id = '$sectionid'")->queryAll();
        $countStudents = count($students);
    ?>
    <div class="row">
		<div class="col-md-12">
			<img src="images/Brookfield_logo.jpg" width="90px" class="img-circle" style="float:left;margin-top: 10px;">
			<h2 align="center">BROOKFIELD GROUP OF COLLEGES<small> (Rahim Yar Khan)</small></h2>
		</div>
		<div class="col-md-12">
			<table width="100%" style="margin-top: -45px;">
				<tr>
					<td align="center">
						<b style="margin-left: 80px"><u>Class Fee Account Details</u></b>
						<h3 style="margin-top: -1px; margin-left: 80px;">
							<?php echo $class[0]['class_name']." - ".$sectionName[0]['section_name']." - Session (".$sessionName[0]['session_name'].")"; ?>
						</h3>
					</td>
				</tr>
			</table>
		</div>
	</div>	
		<div class="row">
			<div class="col-md-12">
				<table class="table table-bordered">
				<thead>
					<tr class="bg-navy">
						<th class="text-center">Sr.#</th>
						<th>Roll No.</th>
						<th>Student Name</th>
						<th class="text-center">T.PKG</th>
						<th class="text-center">1st</th>
						<th class="text-center">1st Paid</th>
						<th class="text-center">2nd</th>
						<th class="text-center">2nd Paid</th>
						<th class="text-center">3rd</th>
						<th class="text-center">3rd Paid</th>
						<th class="text-center">4th</th>
						<th class="text-center">4th Paid</th>
						<th class="text-center">5th</th>
						<th class="text-center">5th Paid</th>
						<th class="text-center">6th</th>
						<th class="text-center">6th Paid</th>
						<th class="text-center">Remaining</th>
						<th class="text-center">Status</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$totalFee = $total1st = $total2nd = $total3rd = $total4th = $total5th = $total6th  = $totalRemaining = 0;
						$paid1st = Array(0,0,0,0,0,0);
						foreach ($students as $id => $value) {
						// students `id`
						$stdID = $students[$id]['std_enroll_detail_std_id'];
						// get students `std_name`
						$stdName = Yii::$app->db->createCommand("SELECT std_name FROM std_personal_info  WHERE std_id = '$stdID'")->queryAll();
						// get student fee pakg
						$stdFeePakg = Yii::$app->db->createCommand("SELECT tuition_fee FROM std_fee_details WHERE std_id = '$stdID'")->queryAll();
						$stdFee = Yii::$app->db->createCommand("SELECT sfd.fee_id, sfi.installment_no, sfi.installment_amount FROM std_fee_details as sfd INNER JOIN std_fee_installments as sfi ON sfi.std_fee_id = sfd.fee_id WHERE sfd.std_id  = '$stdID'")->queryAll();
						$totalFee += $stdFeePakg[0]['tuition_fee'];
						if (empty($stdFee[0]['installment_amount'])) {
							$total1st += 0;
						}
						else{
							$total1st += $stdFee[0]['installment_amount'];
						}
						if (empty($stdFee[1]['installment_amount'])) {
							$total2nd += 0;
						}
						else{
							$total2nd += $stdFee[1]['installment_amount'];
						}
						if (empty($stdFee[2]['installment_amount'])) {
							$total3rd += 0;
						}
						else{
							$total3rd += $stdFee[2]['installment_amount'];
						}				
						if (empty($stdFee[3]['installment_amount'])) {
							$total4th += 0;
						}
						else{
							$total4th += $stdFee[3]['installment_amount'];
						}
						if (empty($stdFee[4]['installment_amount'])) {
							$total5th += 0;
						}
						else{
							$total5th += $stdFee[4]['installment_amount'];
						}
						if (empty($stdFee[5]['installment_amount'])) {
							$total6th += 0;
						}
						else{
							$total6th += $stdFee[5]['installment_amount'];
						}
						for ($i=0; $i <6; $i++) {
							if(!empty($stdFee[$i]['installment_no'])){
								$installNo = $stdFee[$i]['installment_no'];
								$stdCollectedAmount = Yii::$app->db->createCommand("SELECT ftd.collected_fee_amount FROM fee_transaction_detail as ftd INNER JOIN fee_transaction_head as fth ON fth.fee_trans_id = ftd.fee_trans_detail_head_id WHERE fth.std_id = '$stdID' AND ftd.fee_type_id = 2 AND fth.installment_no ='$installNo'")->queryAll();
							}
						}	
						$tuitionFee = $stdFeePakg[0]['tuition_fee'];
					?>
					<tr>
						<td><?php echo $id+1; ?></td>
						<td><?php echo  $students[$id]['std_roll_no']; ?></td>
						<td><?php echo $stdName[0]['std_name']; ?></td>
						<td align="center"><?php echo $tuitionFee;  ?></td>
						<?php 
						$installSum = 0;
						$paidArray[][] = Array();
						for ($i=0; $i <6; $i++) { ?>
							<td class="tdcolor" align="center" style="background-color: #ccc;">
								<?php
									if (empty($stdFee[$i]['installment_amount'])) {
										echo '';
									}
									else{
										echo $stdFee[$i]['installment_amount'];
									}
								?>
							</td>
							<td align="center">
							<?php 
								if(!empty($stdFee[$i]['installment_no'])){
								$installNo = $stdFee[$i]['installment_no'];
								$stdCollectedAmount = Yii::$app->db->createCommand("SELECT ftd.collected_fee_amount FROM fee_transaction_detail as ftd INNER JOIN fee_transaction_head as fth ON fth.fee_trans_id = ftd.fee_trans_detail_head_id WHERE fth.std_id = '$stdID' AND ftd.fee_type_id = 2 AND fth.installment_no ='$installNo'")->queryAll();
								if(!empty($stdCollectedAmount) AND $stdCollectedAmount[0]['collected_fee_amount'] > 0){
									echo $stdCollectedAmount[0]['collected_fee_amount']; 
									$installSum += $stdCollectedAmount[0]['collected_fee_amount'];
									$paidArray[$id][$i] = $stdCollectedAmount[0]['collected_fee_amount'];	
								}
								else {
									echo "<p style='padding: 0px 20px;' class='label-danger'>.</p>";
								} 
							}?>
							</td>
						<?php } ?>
						<th style="background-color: gray; color: #FFF;" class="a text-center">
							<?php 
								$remaining = $tuitionFee - $installSum; 
								echo $remaining;
								$totalRemaining += $remaining;
							?>
						</th>
						<td style="width: 60px">---</td>
					</tr>
					<?php 
						if (empty($paidArray[$id][0])) {
							$paid1st[0] += 0;
						}
						else{
							$paid1st[0] += $paidArray[$id][0];
						}
						if (empty($paidArray[$id][1])) {
							$paid1st[1] += 0;
						}
						else{
							$paid1st[1] += $paidArray[$id][1];
						}
						if (empty($paidArray[$id][2])) {
							$paid1st[2] += 0;
						}
						else{
							$paid1st[2] += $paidArray[$id][2];
						}
						if (empty($paidArray[$id][3])) {
							$paid1st[3] += 0;
						}
						else{
							$paid1st[3] += $paidArray[$id][3];
						}
						if (empty($paidArray[$id][4])) {
							$paid1st[4] += 0;
						}
						else{
							$paid1st[4] += $paidArray[$id][4];
						}
						if (empty($paidArray[$id][5])) {
							$paid1st[5] += 0;
						}
						else{
							$paid1st[5] += $paidArray[$id][5];
						}
					} 	
					?>
					<tr align="center" style="background-color: #ccc;">
						<th colspan="3" align="center" class="bg-navy text-center tdcolor" >
							<?php echo "<b>".$sectionName[0]['section_name']." Session ".$sessionName[0]['session_name']."</b>";?>
						</th>
						<td class="tdcolor"><b><?php echo $totalFee; ?></b></td>
						<td class="tdcolor"><b><?php echo $total1st; ?></b></td>
						<th style="background-color: gray; color: #FFF;" class="a text-center"><?php echo $paid1st[0]; ?></th>
						<td class="tdcolor"><b><?php echo $total2nd; ?></b></td>
						<th style="background-color: gray; color: #FFF;" class="a text-center">
							<?php  echo $paid1st[1]; ?></th>
						<td class="tdcolor"><b><?php echo $total3rd; ?></b></td>
						<th style="background-color: gray; color: #FFF;" class="a text-center"><?php  echo $paid1st[2]; ?></th>
						<td class="tdcolor"><b><?php echo $total4th; ?></b></td>
						<th style="background-color: gray; color: #FFF;" class="a text-center"><?php  echo $paid1st[3]; ?></th>
						<td class="tdcolor"><b><?php echo $total5th; ?></b></td>
						<th style="background-color: gray; color: #FFF;" class="a text-center"><?php  echo $paid1st[4]; ?></th>
						<td class="tdcolor"><b><?php echo $total6th; ?></b></td>
						<th style="background-color: gray; color: #FFF;" class="a text-center"><?php  echo $paid1st[5]; ?></th>
						<th style="background-color: gray; color: #FFF;" class="a text-center"><?php echo $totalRemaining; ?></th>
						<td></td>
					</tr>
					<tr align="center">
						<td colspan="18" style="font-size: 20px;">
							<b>Bad debts
								<?php echo $sectionName[0]['section_name']." ".$sessionName[0]['session_name']?>
							</b>
						</td>
					</tr>
					<?php
				for ($i=1; $i <=3 ; $i++) { 
				?>
				<tr>
					<td><?php echo $i; ?></td>
					<td><?php echo "RYK-01-FMG1-19-".$i; ?></td>
					<td>nauman hashmi</td>
					<td></td>
					<td class="tdcolor" align="center" style="background-color: #ccc;">
					<td></td>
					<td class="tdcolor" align="center" style="background-color: #ccc;">
					<td></td>
					<td class="tdcolor" align="center" style="background-color: #ccc;">
					<td></td>
					<td class="tdcolor" align="center" style="background-color: #ccc;">
					<td></td>
					<td class="tdcolor" align="center" style="background-color: #ccc;">
					<td></td>
					<td class="tdcolor" align="center" style="background-color: #ccc;">
					<td></td>
					<th style="background-color: gray; color: #FFF;" class="a text-center">
						<?php //echo $totalRemaining; ?></th>
					<td></td>
				</tr>
				<?php
				}
				?>
				<tr>
					<td colspan="3" align="center" style="background-color: lightgray;">
						<b>Total Left</b>
					</td>
					<td class="tdcolor" style="background-color: #ccc;"><b>
						<?php //echo $totalFee; ?></b></td>
					<td class="tdcolor" style="background-color: #ccc;"><b>
						<?php //echo $total1st; ?></b></td>
					<th style="background-color: gray; color: #FFF;" class="a text-center">
						<?php // echo $paid1st[0]; ?></th>
					<td class="tdcolor" style="background-color: #ccc;"><b>
						<?php //echo $total2nd; ?></b></td>
					<th style="background-color: gray; color: #FFF;" class="a text-center">
						<?php //echo $paid1st[1]; ?></th>
					<td class="tdcolor" style="background-color: #ccc;"><b>
						<?php //echo $total3rd; ?></b></td>
					<th style="background-color: gray; color: #FFF;" class="a text-center">
						<?php //echo $paid1st[2]; ?></th>
					<td class="tdcolor" style="background-color: #ccc;"><b>
						<?php //echo $total4th; ?></b></td>
					<th style="background-color: gray; color: #FFF;" class="a text-center">
						<?php // echo $paid1st[3]; ?></th>
					<td class="tdcolor" style="background-color: #ccc;"><b>
						<?php //echo $total5th; ?></b></td>
					<th style="background-color: gray; color: #FFF;" class="a text-center">
						<?php // echo $paid1st[4]; ?></th>
					<td class="tdcolor" style="background-color: #ccc;"><b>
						<?php //echo $total6th; ?></b></td>
					<th style="background-color: gray; color: #FFF;" class="a text-center">
						<?php // echo $paid1st[5]; ?></th>
					<th style="background-color: gray; color: #FFF;" class="a text-center">
						<?php //echo $totalRemaining; ?></th>
					<td></td>
				</tr>
				<tr>
					<td colspan="3" align="center" style="background-color: lightgray;">
						<b>Actual After Bad Debts</b>
					</td>
					<td class="tdcolor" style="background-color: #ccc;"><b>
						<?php //echo $totalFee; ?></b></td>
					<td class="tdcolor" style="background-color: #ccc;"><b>
						<?php //echo $total1st; ?></b></td>
					<th style="background-color: gray; color: #FFF;" class="a text-center">
						<?php //echo $paid1st[0]; ?></th>
					<td class="tdcolor" style="background-color: #ccc;"><b>
						<?php //echo $total2nd; ?></b></td>
					<th style="background-color: gray; color: #FFF;" class="a text-center">
						<?php // echo $paid1st[1]; ?></th>
					<td class="tdcolor" style="background-color: #ccc;"><b>
						<?php //echo $total3rd; ?></b></td>
					<th style="background-color: gray; color: #FFF;" class="a text-center">
						<?php // echo $paid1st[2]; ?></th>
					<td class="tdcolor" style="background-color: #ccc;"><b>
						<?php //echo $total4th; ?></b></td>
					<th style="background-color: gray; color: #FFF;" class="a text-center">
						<?php // echo $paid1st[3]; ?></th>
					<td class="tdcolor" style="background-color: #ccc;"><b>
						<?php //echo $total5th; ?></b></td>
					<th style="background-color: gray; color: #FFF;" class="a text-center">
						<?php // echo $paid1st[4]; ?></th>
					<td class="tdcolor" style="background-color: #ccc;"><b>
						<?php //echo $total6th; ?></b></td>
					<th style="background-color: gray; color: #FFF;" class="a text-center">
						<?php // echo $paid1st[5]; ?></th>
					<th style="background-color: gray; color: #FFF;" class="a text-center">
						<?php //echo $totalRemaining; ?></th>
					<td></td>
				</tr>
				</tbody>
			</table>
		</div>
	</div>
		
	<div class="row">
		<div class="col-md-12">
			<table class="table table-bordered">
				
			</table>
		</div>
	</div>
		<table class="table table-bordered">
			<!-- <tbody>
				
			</tbody> -->
		</table>
	</div>
	<?php } ?>
</div>
<!-- class fee account report end-->
</body>
</html>

<?php
$url = \yii\helpers\Url::to("fee-transaction-detail/fetch-students");

$script = <<< JS
$('#sessionId').on('change',function(){
   var session_Id = $('#sessionId').val();
  
   $.ajax({
        type:'post',
        data:{session_Id:session_Id},
        url: "$url",

        success: function(result){
            var jsonResult = JSON.parse(result.substring(result.indexOf('['), result.indexOf(']')+1));
            var options = '';
            for(var i=0; i<jsonResult.length; i++) { 
                options += '<option value="'+jsonResult[i].section_id+'">'+jsonResult[i].section_name+'</option>';
            }
            // Append to the html
            $('#section').append(options);
        }         
    });       
});
JS;
$this->registerJs($script);
?>
</script>