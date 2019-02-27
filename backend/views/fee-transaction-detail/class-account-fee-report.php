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
	    }
	}
</style>
</head>
<body>
<div class="row container-fluid"> 

	<!-- class fee account report start-->
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
                    <select class="form-control" name="classid" id="classId" required="">
                    	<option>Select Class</option>
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
                    <select class="form-control" name="sessionid" id="sessionId" required="">
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
                    <select class="form-control" name="sectionid" id="section" required="">
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
        	WHERE seh.class_name_id  = '$classid' AND seh.session_id = '$sessionid' AND seh.section_id = '$sectionid'")->queryAll();
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
					$totalFee = $total1st = $total2nd = $total3rd = $total4th = $total5th = $total6th = $paid1st = $paid2nd = $paid3rd = $paid4th = $paid5th = $paid6th = 0;
					
					foreach ($students as $id => $value) {
					// students `id`
					$stdID = $students[$id]['std_enroll_detail_std_id'];
					// get students `std_name`
					$stdName = Yii::$app->db->createCommand("SELECT std_name FROM std_personal_info  WHERE std_id = '$stdID'")->queryAll();
					// get student fee pakg
					$stdFeePakg = Yii::$app->db->createCommand("SELECT tuition_fee FROM std_fee_details WHERE std_id = '$stdID'")->queryAll();
					$stdFee = Yii::$app->db->createCommand("SELECT sfd.fee_id, sfi.installment_no, sfi.installment_amount FROM std_fee_details as sfd INNER JOIN std_fee_installments as sfi ON sfi.std_fee_id = sfd.fee_id WHERE sfd.std_id  = '$stdID'")->queryAll();
					
					//var_dump($stdFee);
					//echo "<br>";
					
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
				?>
				<tr>
					<td><?php echo $id+1; ?></td>
					<td><?php echo  $students[$id]['std_roll_no']; ?></td>
					<td><?php echo $stdName[0]['std_name']; ?></td>
					<td align="center"><?php echo $stdFeePakg[0]['tuition_fee']; ?></td>
					<?php for ($i=0; $i <6; $i++) { ?>
						<td class="tdcolor" align="center" style="background-color: #ccc">
							<?php
								if (empty($stdFee[$i]['installment_amount'])) {
									echo '';
								}
								else{
									echo $stdFee[$i]['installment_amount'];
								}
							?>
						</td>
						<td align="center">1029</td>
					<?php } ?>
					<td style="background-color: gray;" class="a text-center">---</td>
					<td style="width: 60px">---</td>
				</tr>
			<?php } ?>
				
				<tr align="center" style="background-color: #ccc;">
					<th colspan="3" align="center" class="bg-navy text-center tdcolor" >
						<?php echo "<b>".$sectionName[0]['section_name']." Session (".$sessionName[0]['session_name'].")</b>";?>
					</th>
					<td class="tdcolor"><b><?php echo $totalFee; ?></b></td>
					<td class="tdcolor"><b><?php echo $total1st; ?></b></td>
					<td style="background-color: gray;" class="a">---</td>
					<td class="tdcolor"><b><?php echo $total2nd; ?></b></td>
					<td style="background-color: gray;" class="a">---</td>
					<td class="tdcolor"><b><?php echo $total3rd; ?></b></td>
					<td style="background-color: gray;" class="a">---</td>
					<td class="tdcolor"><b><?php echo $total4th; ?></b></td>
					<td style="background-color: gray;" class="a">---</td>
					<td class="tdcolor"><b><?php echo $total5th; ?></b></td>
					<td style="background-color: gray;" class="a">---</td>
					<td class="tdcolor"><b><?php echo $total6th; ?></b></td>
					<td style="background-color: gray;" class="a">---</td>
					<td style="background-color: gray;" class="a">---</td>
					<td></td>
				</tr>
			</tbody>
		</table>
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
			<!-- <tbody>
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
			</tbody> -->
		</table>
	</div>
	<?php  } ?>
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

$('#sub').on('click',function(){
	//$("#hideForm").hide()
});

JS;
$this->registerJs($script);
?>
</script>