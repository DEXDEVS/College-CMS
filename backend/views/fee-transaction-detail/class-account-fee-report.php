<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<!-- class fee account report start-->
<div class="row container-fluid"> 
	<div class="container-fluid" style="margin-top: -30px;">
	<h1 class="well well-sm bg-navy" align="center" style="color: #3C8DBC;">Manage Class Fee Accounts</h1>
	<!-- action="index.php?r=fee-transaction-detail/class-account-info" -->
    <div id='hideForm'>
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
                    <label>Select Class</label>
                    <select class="form-control" name="classid" id="classId">
                            <?php 
                                $className = Yii::$app->db->createCommand("SELECT * FROM std_class_name where delete_status=1")->queryAll();
                                
                                    foreach ($className as  $value) { ?>    
                                    <option value="<?php echo $value["class_name_id"]; ?>">
                                        <?php echo $value["class_name"]; ?> 
                                    </option>
                            <?php } ?>
                    </select>      
                </div>    
            </div>  
            <div class="col-md-4">
                <div class="form-group">
                    <label>Select Session</label>
                    <select class="form-control" name="sessionid" id="sessionId">
                            <option value="">Select Session</option>
                            <?php 
                                $sessionName = Yii::$app->db->createCommand("SELECT * FROM std_sessions where delete_status=1")->queryAll();
                                    foreach ($sessionName as  $value) { ?>  
                                    <option value="<?php echo $value["session_id"]; ?>">
                                        <?php echo $value["session_name"]; ?>   
                                    </option>
                            <?php } ?>
                    </select>      
                </div>    
            </div>  
            <div class="col-md-4">
                <div class="form-group">
                    <label>Select Section</label>
                    <select class="form-control" name="sectionid" id="section" >
                            <option value="">Select Section</option>
                    </select>      
                </div>    
            </div>    
        </div>
        <div class="row"> 
            <div class="col-md-3">
                <div class="form-group">
                    <button type="submit" name="submit" class="btn btn-success btn-flat btn-block" id="sub" value='Yes'><i class="fa fa-check-square-o" aria-hidden="true"></i><b> Get Class</b></button>
                </div>    
            </div>
        </div>
    </form>
    </div>
    <!-- Header Form Close--> 
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
        	WHERE
        	seh.class_name_id  = '$classid'
        	AND seh.session_id = '$sessionid'
        	AND seh.section_id = '$sectionid'")->queryAll();
   
    ?>
			<div class="col-md-12">
		<h2 style="text-align: center;box-shadow: 1px 1px 1px 1px; padding: 5px;">
			Brookfield Group of Colleges<br>
			<p style="font-size: 20px;">Rahim Yar Khan</p>
		</h2>
		<div class="row">
			<div class="col-md-12">
				<table class="table table-bordered">
					<tr align="center">
						<td colspan="6" style="font-size: 20px;"><b><u>Class Fee Account Details</u></b></td>
					</tr>
					<tr align="center">
						<td><p><b>Class:</b></p></td>
						<td><?php echo $class[0]['class_name'];  ?></td>
						<td><p><b>Section:</b></p></td>
						<td><?php echo $sectionName[0]['section_name']; ?></td>
						<td><p><b>Session:</b></p></td>
						<td><?php echo $sessionName[0]['session_name']; ?></td>
					</tr>
				</table>
			</div>
		</div>
		<table class="table table-bordered">
			<thead>
			<tr style="background-color:#337ab7;color: white;">
				<th>Sr.#</th>
				<th>Roll No.</th>
				<th>Name</th>
				<!-- <th>Class</th> -->
				<th>T.PKG</th>
				<th>1st Instll</th>
				<th>1st Paid</th>
				<th>2nd</th>
				<th>2nd Paid</th>
				<th>3rd</th>
				<th>3rd Paid</th>
				<th>4th</th>
				<th>4th Paid</th>
				<th>5th</th>
				<th>5th Paid</th>
				<th>6th</th>
				<th>6th Paid</th>
				<th>Remain</th>
				<th>Status</th>
			</tr>
			</thead>
			<tbody>
				<?php
					$totalFee = 0;
					$total1st = 0;
					$total2nd = 0;
					$total3rd = 0;
					$total4th = 0;
					$total5th = 0;
					$total6th = 0;
					$paid1st = 0;
					$paid2nd = 0;
					$paid3rd = 0;
					$paid4th = 0;
					$paid5th = 0;
					$paid6th = 0;
					foreach ($students as $id => $value) {
					// students `id`
					$stdID = $students[$id]['std_enroll_detail_std_id'];

					// get `std_roll_no`
					$stdRollNo = Yii::$app->db->createCommand("SELECT std_roll_no FROM  std_enrollment_detail WHERE std_enroll_detail_std_id = '$stdID'")->queryAll();

					// get students `std_name`
					$stdName = Yii::$app->db->createCommand("SELECT std_name FROM std_personal_info  WHERE std_id = '$stdID'")->queryAll();
					$studentName = $stdName[0]['std_name'];

					// get student fee pakg
					$stdFeePakg = Yii::$app->db->createCommand("SELECT tuition_fee FROM std_fee_details WHERE std_id = '$stdID'")->queryAll();
					$totalFee += $stdFeePakg[0]['tuition_fee'];

					$stdFee = Yii::$app->db->createCommand("SELECT sfd.fee_id, sfi.installment_no, sfi.installment_amount FROM std_fee_details as sfd
					INNER JOIN std_fee_installments as sfi
					ON sfi.std_fee_id = sfd.fee_id
					WHERE sfd.std_id  = '$stdID'")->queryAll();

					$total1st += $stdFee[0]['installment_amount'];
					$total2nd += $stdFee[1]['installment_amount'];
					$total3rd += $stdFee[2]['installment_amount'];
					if (empty($stdFee[3]['installment_amount'])) {
						echo $total4th += $total4th;
					}
					else{
						$total4th += $stdFee[3]['installment_amount'];
					}
					if (empty($stdFee[4]['installment_amount'])) {
						echo $total5th += $total5th;
					}
					else{
						$total5th += $stdFee[4]['installment_amount'];
					}
					if (empty($stdFee[5]['installment_amount'])) {
						echo $total5th += $total5th;
					}
					else{
						$total6th += $stdFee[5]['installment_amount'];
					}

					// get students paid installments
					// $stdInstallAmount = Yii::$app->db->createCommand("SELECT fth.total_amount
					// 	FROM fee_transaction_head as fth
					// 	INNER JOIN fee_transaction_detail as ftd
					// 	ON fth.fee_trans_id = ftd.fee_trans_detail_head_id
					// 	WHERE fth.std_id = '$stdID'")->queryAll();
				?>
				<tr>
					<td><?php echo $id+1; ?></td>
					<td><?php echo $stdRollNo[0]['std_roll_no']; ?></td>
					<td>
						<?php echo $studentName; ?>		
					</td>
					<!-- <td>EG-1</td> -->
					<td><?php echo $stdFeePakg[0]['tuition_fee']; ?></td>
					<td style="background-color: #ccc;">
						<?php 
							if (empty($stdFee[0]['installment_amount'])) {
								echo 'no';
							}
							else{
								echo $stdFee[0]['installment_amount'];
							}
						?>
					</td>
					<td></td>
					<td style="background-color: #ccc;">
						<?php 
							if (empty($stdFee[1]['installment_amount'])) {
								echo 'no';
							}
							else{
								echo $stdFee[1]['installment_amount'];
							}
						?>
					</td>
					<td></td>
					<td style="background-color: #ccc;">
						<?php 
							if (empty($stdFee[2]['installment_amount'])) {
								echo 'no';
							}
							else{
								echo $stdFee[2]['installment_amount'];
							}
						?>
					</td>
					<td></td>
					</td>
					<td style="background-color: #ccc;">
						<?php 
							if (empty($stdFee[3]['installment_amount'])) {
								echo 'no';
							}
							else{
								echo $stdFee[3]['installment_amount'];
							}
						?>
					</td>
					<td></td>
					<td style="background-color: #ccc;">
						<?php 
							if (empty($stdFee[4]['installment_amount'])) {
								echo 'no';
							}
							else{
								echo $stdFee[4]['installment_amount'];
							}
						?>
					</td>
					<td></td>
					<td>
						<?php 
							if (empty($stdFee[5]['installment_amount'])) {
								echo 'no';
							}
							else{
								echo $stdFee[5]['installment_amount'];
							}
						?>
					</td>
					<td></td>
					<td></td>
					<td></td>
				</tr>
				<?php
				}
				?>
				<tr>
					<td colspan="3" align="center" class="bg-navy"  style="margin-top: 15px;">
						<?php echo "<b>".$sectionName[0]['section_name']." Session (".$sessionName[0]['session_name'].")</b>";?>
					</td>
					<td><?php echo "<b>".$totalFee."</b>"; ?></td>
					<td><?php echo "<b>".$total1st."</b>"; ?></td>
					<td></td>	
					<td><?php echo "<b>".$total2nd."</b>"; ?></td>
					<td></td>
					<td><?php echo "<b>".$total3rd."</b>"; ?></td>
					<td></td>
					<td><?php echo "<b>".$total4th."</b>"; ?></td>
					<td></td>
					<td><?php echo "<b>".$total5th."</b>"; ?></td>
					<td></td>
					<td><?php echo "<b>".$total6th."</b>"; ?></td>
					<td></td>
					<td></td>
					<td></td>
				</tr>
			</tbody>
		</table>
		<hr>
		<div class="row">
			<div class="col-md-12">
				<table class="table table-bordered">
					<tr align="center">
						<td colspan="6" style="font-size: 20px;"><b><u>Bad Debts</u></b></td>
					</tr>
					<!-- <tr align="center">
						<td><p><b>Class:</b></p></td>
						<td>Engineering-1</td>
						<td><p><b>Section:</b></p></td>
						<td>Section-1</td>
						<td><p><b>Session:</b></p></td>
						<td>Session 2018-2020</td>
					</tr> -->
				</table>
			</div>
		</div>
		<table class="table table-bordered">
			<!-- <thead>
			<tr style="background-color:#337ab7;color: white;">
				<th>Sr.#</th>
				<th>Roll No.</th>
				<th>Name</th>
				<th>Class</th>
				<th>T.PKG</th>
				<th>1st Instll</th>
				<th>1st Paid</th>
				<th>2nd</th>
				<th>2nd Paid</th>
				<th>3rd</th>
				<th>3rd Paid</th>
				<th>4th</th>
				<th>4th Paid</th>
				<th>5th</th>
				<th>5th Paid</th>
				<th>G.Total</th>
				<th>Remain</th>
				<th>Status</th>
			</tr>
			</thead> -->
			<tbody>
				<?php
				for ($i=1; $i <=3 ; $i++) { 
				?>
				<tr>
					<td><?php echo $i; ?></td>
					<td><?php echo "RYK-01-FMG1-19-".$i; ?></td>
					<td>nauman hashmi</td>
					<td>ICS</td>
					<td>10000</td>
					<td style="background-color: gray;">2000</td>
					<td></td>
					<td style="background-color: gray;">2000</td>
					<td></td>
					<td style="background-color: gray;">2000</td>
					<td></td>
					<td style="background-color: gray;">2000</td>
					<td></td>
					<td style="background-color: gray;">2000</td>
					<td></td>
					<td>5000</td>
					<td style="background-color:silver;">5000</td>
					<td></td>
				</tr>
				<?php
				}

				?>
				<tr>
					<td colspan="4" align="center" style="background-color: lightgray;">
						Total Left
					</td>
					<td>100000</td>
					<td>20000</td>
					<td>15000</td>
					<td>20000</td>
					<td>10000</td>
					<td>20000</td>
					<td>5000</td>
					<td>20000</td>
					<td>18000</td>
					<td>20000</td>
					<td>10000</td>
					<td>50000</td>
					<td>14000</td>
					<td></td>
				</tr>
				<tr>
					<td colspan="4" align="center" style="background-color: lightgray;">
						Actual After Bad Debts
					</td>
					<td>100000</td>
					<td>20000</td>
					<td>15000</td>
					<td>20000</td>
					<td>10000</td>
					<td>20000</td>
					<td>5000</td>
					<td>20000</td>
					<td>18000</td>
					<td>20000</td>
					<td>10000</td>
					<td>50000</td>
					<td>14000</td>
					<td></td>
				</tr>
			</tbody>
		</table>
	</div>
	<?php  } ?>
</div>
<!-- class fee account report end-->
</body>
</html>

<?php
$url = \yii\helpers\Url::to("index.php?r=fee-transaction-detail/fetch-students");

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

$('#sub').on('click',function(){
	$("#hideForm").hide()
});

JS;
$this->registerJs($script);
?>
</script>