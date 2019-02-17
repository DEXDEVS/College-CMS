<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>Fee Vocher</title>
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
	<h1 class="well well-sm bg-navy" align="center" style="color: #3C8DBC;">Manage Class Fee Accounts</h1>
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
                    <label>Select Month</label>
                    <input type="month" class="form-control" name="monthYear">   
                </div>    
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label>Installment No</label>
                    <select name="installment_no" class="form-control">
                        <option>Select Installment No</option>
                        <option value="1st Installment">1st Installment</option>
                        <option value="2nd Installment">2nd Installment</option>
                        <option value="3rd Installment">3rd Installment</option>
                        <option value="4th Installment">4th Installment</option>
                        <option value="5th Installment">5th Installment</option>
                        <option value="6th Installment">6th Installment</option>
                    </select>
                </div>    
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label>Date</label>
                    <input type="date" class="form-control" name="date">     
                </div>    
            </div> 
            <div class="col-md-3">
                <div class="form-group" style="margin-top: 24px;">
                    <button type="submit" name="submit" class="btn btn-success btn-flat btn-block"><i class="fa fa-check-square-o" aria-hidden="true"></i><b> Get Class</b></button>
                </div>    
            </div>
        </div>
    </form>
    <!-- Header Form Close-->
<?php 

    if(isset($_POST['submit'])){ 
        $classid        = $_POST["classid"];
        $sessionid      = $_POST["sessionid"];
        $sectionid      = $_POST["sectionid"];
        $month          = $_POST["monthYear"];
        $installment_no    = $_POST["installment_no"];
        $date           = $_POST["date"];
        // Select CLass...
        $className = Yii::$app->db->createCommand("SELECT class_name FROM std_class_name WHERE class_name_id = '$classid'")->queryAll();
        // Select Session... 
        $sessionName = Yii::$app->db->createCommand("SELECT session_name FROM std_sessions WHERE session_id = '$sessionid'")->queryAll();
       // Select Section...
        $sectionName = Yii::$app->db->createCommand("SELECT section_name FROM std_sections WHERE section_id = '$sectionid'")->queryAll();
        // Select Students...
        $student = Yii::$app->db->createCommand("SELECT sed.std_enroll_detail_id ,sed.std_enroll_detail_std_id FROM std_enrollment_detail as sed INNER JOIN std_enrollment_head as seh ON seh.std_enroll_head_id = sed.std_enroll_detail_head_id WHERE seh.class_name_id = '$classid' AND seh.session_id = '$sessionid' AND seh.section_id = '$sectionid'")->queryAll();
    ?>

    <form method="POST">
    	<div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <input type="hidden" name="_csrf" class="form-control" value="<?=Yii::$app->request->getCsrfToken()?>">          
                </div>    
            </div>    
        </div>
        <div class="row">
            <div class="col-md-12">
                <table class="table table-bordered table-responsive table-condensed" border="1" style="text-align: center;">
                    <tr class="bg-navy">
                        <th rowspan="2" style="text-align: center">Sr #</th>
                        <th rowspan="2" style="text-align: center">Roll #</th>
                        <th rowspan="2" style="text-align: center">Student Name</th>
                        <th rowspan="2" style="text-align: center">Admission Fee</th>
                        <th rowspan="2" style="text-align: center">Tuition Fee</th>
                        <th rowspan="2" style="text-align: center">Late Fee Fine</th>
                        <th rowspan="2" style="text-align: center">Absent Fine</th>
                        <th rowspan="2" style="text-align: center">Library Dues</th>
                        <th rowspan="2" style="text-align: center">Transportation Fee</th>
                        <th colspan="3" style="text-align: center;">Amount</th>
                    </tr>
                    <tr style="background-color: #87CEFA">
                        <th style="text-align: center">Total</th>
                        <th style="text-align: center">Discount</th>
                        <th style="text-align: center">Net</th>
                    </tr>
                    <?php 
                        $length = count($student);
                        foreach ($student as $id =>$value) {
                            $stdId = $student[$id]['std_enroll_detail_std_id'];
                            $studentId[$id] = $stdId;
                            $stdName = Yii::$app->db->createCommand("SELECT std_reg_no,std_name FROM std_personal_info  WHERE std_id = '$stdId'")->queryAll();
                            $studentName[$id] = $stdName[0]['std_name'];
                            // getting student roll no...
                            $stdRollNo = Yii::$app->db->createCommand("SELECT std_roll_no FROM  std_enrollment_detail WHERE std_enroll_detail_std_id = '$stdId'")->queryAll(); 
                            // getting student fee...
                            $admission = Yii::$app->db->createCommand("SELECT net_addmission_fee , fee_id FROM std_fee_details WHERE std_id = '$value[std_enroll_detail_std_id]'")->queryAll();

                            $feeId = $admission[0]['fee_id'];
                            $installmentAmount = Yii::$app->db->createCommand("SELECT installment_amount FROM std_fee_installments  WHERE std_fee_id = '$feeId' AND installment_no = '$installment_no'")->queryAll();

                            $admissionFee = $admission[0]['net_addmission_fee'];
                            if(empty($installmentAmount)){
                                $tuitionFee = 0;
                            }
                            else{
                                $tuitionFee = $installmentAmount[0]['installment_amount'];
                            }
                            $netTotal = $admissionFee + $tuitionFee;
                    ?>
                    <tr>
                        <td>
                            <p style="margin-top: 8px"><b><?php echo $id+1; ?></b></p>
                        </td>
                        <td>
                            <p style="margin-top: 8px"><b><?php echo $stdRollNo[0]['std_roll_no'];?></b></p>
                        </td>
                        <td>
                            <p style="margin-top: 8px"><?php echo $stdName[0]['std_name'];?></p>
                         </td>
                        <td align="center">
                            <input class="form-control" type="number" name="admission_fee[]" value="<?php echo $admission[0]['net_addmission_fee']; ?>" readonly="" id="admissionFee_<?php echo $id; ?>" style="width: 70px; border: none;">
                        </td>
                        <td align="center">
                            <input class="form-control" type="number" name="tuition_fee[]" value="<?php echo $tuitionFee; ?>" readonly="" id="tuitionFee_<?php echo $id; ?>" style="width: 70px; border: none;">
                        </td>
                        <td>
                            <input class="form-control" type="number" id="lateFeeFine_<?php echo $id; ?>" name="late_fee_fine[]"  onChange="lateFeeFine(<?php echo $id; ?>)"  style="width: 70px; border: none;">
                        </td>
                        <td>
                            <input class="form-control" type="number" id="absentFine_<?php echo $id; ?>" name="absent_fine[]"  onChange="absentFine(<?php echo $id; ?>)" style="width: 70px; border: none;">
                        </td>


                        <td>
                            <input class="form-control" type="number" id="libraryDues_<?php echo $id; ?>" name="library_dues[]"  onChange="libraryDues(<?php echo $id; ?>)" style="width: 70px; border: none;">
                        </td>
                        <td>
                            <input class="form-control" type="number" id="transportFee_<?php echo $id; ?>" name="transport_fee[]"  onChange="transportationFee(<?php echo $id; ?>)" style="width: 100px; border: none;">
                        </td>
                        <td>
                            <input class="form-control" type="number" id="totalAmount_<?php echo $id; ?>" readonly="" name=" total_amount[]" value="<?php echo $netTotal ; ?>"  style="width: 70px; border: none;">
                        </td>
                        <td>
                            <input class="form-control" type="number" id="discountAmount_<?php echo $id; ?>" name="discount_amount[]" onChange="totalDiscount(<?php echo $id; ?>)" value="0" style="width: 70px; border: none;">
                        </td>
                        <td>
                            <input class="form-control" type="number" id="netTotal_<?php echo $id; ?>" readonly="" name="net_total[]" value="<?php echo $netTotal; ?>" style="width: 70px; border: none;">
                        </td>
                    </tr>
                <?php } ?>
                </table>
            </div>
        </div>
		<div class="row">
			<div class="col-md-4">
                <div class="form-group">
                    <?php 
                        foreach ($studentId as $value) {
                            echo '<input type="hidden" name="studentId[]" value="'.$value.'">';
                        }
                        foreach ($studentName as $value) {
                            echo '<input type="hidden" name="studentName[]" value="'.$value.'">';
                        }
                    ?>
                    <input type="hidden" name="length" value="<?php echo $length; ?>">
                    <input type="hidden" name="classid" value="<?php echo $classid; ?>">
                    <input type="hidden" name="sessionid" value="<?php echo $sessionid; ?>">
                    <input type="hidden" name="sectionid" value="<?php echo $sectionid; ?>">
                    <input type="hidden" name="month" value="<?php echo $month; ?>">
                    <input type="hidden" name="date" value="<?php echo $date; ?>">
                    <button type="submit" name="save" class="btn btn-success btn-flat"><i class="fa fa fa-sign-in" aria-hidden="true"></i><b> Submit</b></button>
                </div>    
            </div>
		</div>
    </form>
    <!-- Fee Transaction Form Close -->
<?php
    }
?>
</div> 
<?php  
    global $length; 
        if (isset($_POST["save"])) {
                $classid = $_POST["classid"];
                $sessionid = $_POST["sessionid"];
                $sectionid = $_POST["sectionid"];
                $date = $_POST["date"];
                $month = $_POST["month"];
                $length = $_POST["length"];
                $studentId = $_POST["studentId"];
                $studentName = $_POST["studentName"];
                $total_amount = $_POST["total_amount"];
                $discount_amount = $_POST["discount_amount"];
                $net_total = $_POST["net_total"];
                // detail values....
                $admission_fee = $_POST["admission_fee"];
                $tuition_fee = $_POST["tuition_fee"];
                $late_fee_fine = $_POST["late_fee_fine"];
                $absent_fine = $_POST["absent_fine"];
                $library_dues = $_POST["library_dues"];
                $transport_fee = $_POST["transport_fee"];
                $feeType = Array('1','2','3','4','5','6');
                $updateStatus =-1;
                
                $headTransId = Yii::$app->db->createCommand("SELECT fee_trans_id FROM fee_transaction_head where class_name_id = '$classid' AND session_id = '$sessionid' AND section_id = '$sectionid' AND month = '$month'")->queryAll();
                if(empty($headTransId)){
                         for($i=0; $i<$length; $i++){
                        $feeHead = Yii::$app->db->createCommand()->insert('fee_transaction_head',[
                            'class_name_id' => $classid,
                            'session_id'=> $sessionid,
                            'section_id'=> $sectionid,
                            'std_id' => $studentId[$i],
                            'std_name' => $studentName[$i],
                            'month'=> $month,
                            'transaction_date' => $date,
                            'total_amount'=> $net_total[$i],
                            'total_discount'=> $discount_amount[$i],
                            'status'=>'unpaid',
                        ])->execute();
                    }
                    for($i=0; $i<$length; $i++){
                        $headID = Yii::$app->db->createCommand("SELECT fee_trans_id FROM fee_transaction_head where class_name_id= '$classid' AND session_id = '$sessionid' AND section_id = '$sectionid' AND transaction_date = '$date'")->queryAll();
                        $headId = $headID[$i]['fee_trans_id'];
                        for($j=0;$j<6;$j++){
                                    if($feeType[$j] == 1 && $admission_fee[$i] != 0){
                                        $feeDetails = Yii::$app->db->createCommand()->insert('fee_transaction_detail',[
                                        'fee_trans_detail_head_id' => $headId,
                                        'fee_type_id'=> $feeType[$j],
                                        'fee_amount'=> $admission_fee[$i], 
                                        ])->execute();
                                    }
                                    if($feeType[$j] == 2 && $tuition_fee[$i] != 0){
                                        $feeDetails = Yii::$app->db->createCommand()->insert('fee_transaction_detail',[
                                        'fee_trans_detail_head_id' => $headId,
                                        'fee_type_id'=> $feeType[$j],
                                        'fee_amount'=> $tuition_fee[$i], 
                                        ])->execute();
                                    }
                                    if($feeType[$j] == 3 && $late_fee_fine[$i] != 0){
                                        $feeDetails = Yii::$app->db->createCommand()->insert('fee_transaction_detail',[
                                        'fee_trans_detail_head_id' => $headId,
                                        'fee_type_id'=> $feeType[$j],
                                        'fee_amount'=> $late_fee_fine[$i],
                                        ])->execute();
                                    }
                                    if($feeType[$j] == 4 && $absent_fine[$i] != 0){
                                        $feeDetails = Yii::$app->db->createCommand()->insert('fee_transaction_detail',[
                                        'fee_trans_detail_head_id' => $headId,
                                        'fee_type_id'=> $feeType[$j],
                                        'fee_amount'=> $absent_fine[$i], 
                                        ])->execute();
                                    }
                                    if($feeType[$j] == 5 && $library_dues[$i] != 0){
                                        $feeDetails = Yii::$app->db->createCommand()->insert('fee_transaction_detail',[
                                        'fee_trans_detail_head_id' => $headId,
                                        'fee_type_id'=> $feeType[$j],
                                        'fee_amount'=> $library_dues[$i],
                                        ])->execute();
                                    }
                                    if($feeType[$j] == 6 && $transport_fee[$i] != 0){
                                        $feeDetails = Yii::$app->db->createCommand()->insert('fee_transaction_detail',[
                                        'fee_trans_detail_head_id' => $headId, 
                                        'fee_type_id'=> $feeType[$j],
                                        'fee_amount'=> $transport_fee[$i], 
                                        ])->execute();
                                    }
                                //end of for loop
                                }
                    //end of for loop
                    }
                    echo 
                        "<div class='row container-fluid' style='margin:0px -10px 0px 15px;'>
                            <div class='col-md-12 alert alert-success text-success' style='text-align: center'>
                                <p>You have <b>Successfully </b>maintain this class account....!</p>
                            </div>
                        </div>";
                 // end of if
                } else {
                    for ($i=0; $i <$length ; $i++) { 
                        if($headTransId != null OR $discount_amount[$i] > 0 OR $late_fee_fine[$i] > 0  OR $absent_fine[$i] > 0 OR
                            $library_dues[$i] > 0 OR $transport_fee[$i] > 0 OR $discount_amount[$i] > 0){
                            $updateStatus = '1';
                            $i = $length + 1;
                        }  
                        else {
                            $updateStatus = '0';
                            $i = $length + 1;
                        }
                    // end of for loop
                    }
                // end of else 
                }
                if($updateStatus == '1'){ 
                    $transId = $headTransId[0]['fee_trans_id'];
                    for($i=0; $i<$length; $i++){
                        $feeHead = Yii::$app->db->createCommand()->update('fee_transaction_head', [
                            'class_name_id' => $classid,
                            'session_id'=> $sessionid,
                            'section_id'=> $sectionid,
                            'std_id' => $studentId[$i],
                            'std_name' => $studentName[$i],
                            'month'=> $month,
                            'transaction_date' => $date,
                            'total_amount'=> $net_total[$i],
                            'total_discount'=> $discount_amount[$i],
                            'status'=>'unpaid'],
                            ['fee_trans_id' => $transId+$i]
                        )->execute();
                    // end of i for loop    
                    }
                    
                    for ($j=0; $j < $length; $j++) { 
                        $id = $transId+$j;
                        $detailID = Yii::$app->db->createCommand("SELECT fee_trans_detail_id, fee_type_id FROM fee_transaction_detail WHERE fee_trans_detail_head_id = '$id'")->queryAll();
                        $updateCount = count($detailID);
                        // asjust feeType Array with index....
                        for ($x=0; $x < $updateCount ; $x++) {     
                            $updatedFeeTypeId = $detailID[$x]['fee_type_id'];
                            $updatedArray[$x] = $updatedFeeTypeId;
                        }
                        for ($y=$updateCount; $y < 6 ; $y++) { 
                            $updatedArray[$y] = 0;
                        }
                        for ($x=0; $x < $updateCount ; $x++) {     
                            $updatedTransId = $detailID[$x]['fee_trans_detail_id'];
                            $transArray[$x] = $updatedTransId;
                        }
                        for ($y=$updateCount; $y < 6 ; $y++) { 
                            $transArray[$y] = 0;
                        }
                        $updateArray    = Array(0,0,0,0,0,0);
                        $detailId    = Array(0,0,0,0,0,0);
                        for ($z=0; $z<6; $z++) {  //use length here
                            if ($updatedArray[$z] == $feeType[$z] ) {
                                $updateArray[$z] = $feeType[$z];
                                $detailId[$z] = $transArray[$z];
                                continue;
                            }
                            else {
                                for ($a=0; $a<6; $a++) {
                                    if($updatedArray[$z] == $feeType[$a]) {
                                        $updateArray[$a] = $feeType[$a];
                                        $detailId[$a] = $transArray[$z];
                                        break;
                                    }
                                } 
                            }
                        }
                        for($m=0; $m < 6; $m++){
                            //admission_fee ..... 
                            if($feeType[$m] == 1){
                                if($updateArray[$m] == $feeType[$m] && $admission_fee[$j] >= 0){
                                    $feeDette_ails = Yii::$app->db->createCommand()->update('fee_transaction_detail',[
                                    'fee_trans_detail_head_id' => $id,
                                    'fee_type_id'=> 1,
                                    'fee_amount'=> $admission_fee[$j]],
                                    ['fee_trans_detail_id' => $detailId[$m]] 
                                    )->execute();
                                }
                                else {
                                    if ($admission_fee[$j] > 0){
                                        $feeDetails = Yii::$app->db->createCommand()->insert('fee_transaction_detail',[
                                        'fee_trans_detail_head_id' => $id,
                                        'fee_type_id'=> 1,
                                        'fee_amount'=> $admission_fee[$j], 
                                        ])->execute();
                                    }
                                }
                            }
                            // tuition_fee ....
                            if($feeType[$m] == 2){
                                if( $updateArray[$m] == $feeType[$m] && $tuition_fee[$j] >= 0){
                                    $feeDetails = Yii::$app->db->createCommand()->update('fee_transaction_detail',[
                                    'fee_trans_detail_head_id' => $id,
                                    'fee_type_id'=> 2,
                                    'fee_amount'=> $tuition_fee[$j]],
                                    ['fee_trans_detail_id' => $detailId[$m]] 
                                    )->execute();
                                }
                                else {
                                    if($tuition_fee[$j] > 0){
                                        $feeDetails = Yii::$app->db->createCommand()->insert('fee_transaction_detail',[
                                        'fee_trans_detail_head_id' => $id,
                                        'fee_type_id'=> 2,
                                        'fee_amount'=> $tuition_fee[$j], 
                                        ])->execute();
                                    }
                                }
                            }
                            // late fee fine ....
                            if($feeType[$m] == 3){ 
                                if($updateArray[$m] == $feeType[$m] && $late_fee_fine[$j] >= 0){
                                    $feeDetails = Yii::$app->db->createCommand()->update('fee_transaction_detail',[
                                    'fee_trans_detail_head_id' => $id,
                                    'fee_type_id'=> 3,
                                    'fee_amount'=> $late_fee_fine[$j]],
                                    ['fee_trans_detail_id' => $detailId[$m]] 
                                    )->execute();
                                }       
                                else {
                                    if($late_fee_fine[$j] > 0){
                                        $feeDetails = Yii::$app->db->createCommand()->insert('fee_transaction_detail',[
                                        'fee_trans_detail_head_id' => $id,
                                        'fee_type_id'=> 3,
                                        'fee_amount'=> $late_fee_fine[$j],
                                        ])->execute();
                                    }
                                }
                            }
                            // absent_fine ....
                            if($feeType[$m] == 4){
                                if( $updateArray[$m] == $feeType[$m] && $absent_fine[$j] >= 0){
                                    $feeDetails = Yii::$app->db->createCommand()->update('fee_transaction_detail',[
                                    'fee_trans_detail_head_id' => $id,
                                    'fee_type_id'=> 4,
                                    'fee_amount'=> $absent_fine[$j]],
                                    ['fee_trans_detail_id' => $detailId[$m]] 
                                    )->execute();
                                }      
                                else {
                                    if($absent_fine[$j] > 0){
                                        $feeDetails = Yii::$app->db->createCommand()->insert('fee_transaction_detail',[
                                        'fee_trans_detail_head_id' => $id,
                                        'fee_type_id'=> 4,
                                        'fee_amount'=> $absent_fine[$j], 
                                        ])->execute();
                                    }
                                }
                            }
                            // library_dues ....
                            if($feeType[$m] == 5){
                                if($updateArray[$m] == $feeType[$m] && $library_dues[$j] >= 0){
                                    $feeDetails = Yii::$app->db->createCommand()->update('fee_transaction_detail',[
                                    'fee_trans_detail_head_id' => $id,
                                    'fee_type_id'=> 5,
                                    'fee_amount'=> $library_dues[$j]],
                                    ['fee_trans_detail_id' => $detailId[$m]] 
                                    )->execute();
                                }
                                else {
                                    if($library_dues[$j] > 0){
                                        $feeDetails = Yii::$app->db->createCommand()->insert('fee_transaction_detail',[
                                        'fee_trans_detail_head_id' => $id,
                                        'fee_type_id'=> 5,
                                        'fee_amount'=> $library_dues[$j],
                                        ])->execute();
                                    }
                                }
                            }
                            // transport_fee ....
                            if($feeType[$m] == 6){
                                if($updateArray[$m] == $feeType[$m] && $transport_fee[$j] >= 0){
                                    $feeDetails = Yii::$app->db->createCommand()->update('fee_transaction_detail',[
                                    'fee_trans_detail_head_id' => $id,
                                    'fee_type_id'=> 6,
                                    'fee_amount'=> $transport_fee[$j]],
                                    ['fee_trans_detail_id' => $detailId[$m]] 
                                    )->execute();
                                }      
                                else {
                                    if($transport_fee[$j] > 0){
                                        $feeDetails = Yii::$app->db->createCommand()->insert('fee_transaction_detail',[
                                        'fee_trans_detail_head_id' => $id, 
                                        'fee_type_id'=> 6,
                                        'fee_amount'=> $transport_fee[$j], 
                                        ])->execute();
                                    }
                                }
                            }       
                        //end of  m for loop
                        }
                    // end of j loop    
                }          
                echo 
                    "<br><div class='row container-fluid' style='margin:0px 0px 0px 0px;'>
                        <div class='col-md-12 alert alert-warning' style='text-align: center'>
                            <p>You have <b>Successfully </b>update this class account....!</p>
                        </div>
                    </div>";
            }
            if($updateStatus == '0'){
                echo
                    "<br><div class='row container-fluid' style='margin:0px 0px 0px 0px;'>
                        <div class='col-md-12 alert alert-warning' style='text-align: center'>
                            </p>You have <b>already maintain</b> this class account....!</p>
                        </div>
                    </div>";
            }
        //end of isset
        }
     ?>  
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
JS;
$this->registerJs($script);
?>
</script>
<script>
    var totalAmount;
    function lateFeeFine(i) {
            var lateFeeFine = parseInt($('#lateFeeFine_'+i).val());
            totalAmount = parseInt($('#totalAmount_'+i).val());
            var sum = 0;
            sum = totalAmount + lateFeeFine;
            $('#totalAmount_'+i).val(sum);
            $('#netTotal_'+i).val(sum);
    }
    function absentFine(i) {
            var absentFine = parseInt($('#absentFine_'+i).val());
            totalAmount = parseInt($('#totalAmount_'+i).val());
            var sum = 0;
            sum = totalAmount + absentFine;
            $('#totalAmount_'+i).val(sum);
            $('#netTotal_'+i).val(sum);
    }
    function libraryDues(i) {
            var libraryDues = parseInt($('#libraryDues_'+i).val());
            totalAmount = parseInt($('#totalAmount_'+i).val());
            var sum = 0;
            sum = totalAmount + libraryDues;
            $('#totalAmount_'+i).val(sum);
            $('#netTotal_'+i).val(sum);
    }
    function transportationFee(i) {
            var transportFee = parseInt($('#transportFee_'+i).val());
            totalAmount = parseInt($('#totalAmount_'+i).val());
            var sum = 0;
            sum = totalAmount + transportFee;
            $('#totalAmount_'+i).val(sum);
            $('#netTotal_'+i).val(sum);
    }
    function totalDiscount(i) {
            var discountAmount = parseInt($('#discountAmount_'+i).val());
            totalAmount = parseInt($('#totalAmount_'+i).val());
            var discount = totalAmount - discountAmount;
            $('#netTotal_'+i).val(discount);
    }
</script>