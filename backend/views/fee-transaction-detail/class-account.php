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
	<h1 class="well well-sm" align="center">Manage Class Fee Accounts</h1>
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
                            <option value="">Select Section</option>
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
            <div class="col-md-4">
                <div class="form-group">
                    <label>Select Month</label>
                    <input type="month" class="form-control" name="monthYear">   
                </div>    
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label>Date</label>
                    <input type="date" class="form-control" name="date">     
                </div>    
            </div> 
            <div class="col-md-2 col-md-offset-1">
                <div class="form-group" style="margin-top: 24px;">
                    <button type="submit" name="submit" class="btn btn-info btn-flat btn-block">Get Class</button>
                </div>    
            </div>
        </div>
    </form>
    <!-- Header Form Close-->
<?php 

    if(isset($_POST['submit'])){ 
        $classid   = $_POST["classid"];
        $sessionid = $_POST["sessionid"];
        $sectionid = $_POST["sectionid"];
        $month     = $_POST["monthYear"];
        $date      = $_POST["date"];
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
                <table class="table table-bordered table-responsive table-hover table-condensed" border="1" style="text-align: center;">
                    <tr class="label-primary">
                        <th rowspan="2">Sr #</th>
                        <th rowspan="2">Roll #</th>
                        <th rowspan="2">Student<br> Name</th>
                        <th rowspan="2">Admission<br> Fee</th>
                        <th rowspan="2">Tuition<br> Fee</th>
                        <th rowspan="2">Late Fee<br> Fine</th>
                        <th rowspan="2">Absent<br> Fine</th>
                        <th rowspan="2">Library<br> Dues</th>
                        <th rowspan="2">Transportation<br> Fee</th>
                        <th colspan="3" style="text-align: center;">Amount</th>
                    </tr>
                    <tr style="background-color: #87CEFA">
                        <th>Total</th>
                        <th>Discount</th>
                        <th>Net</th>
                    </tr>
                    <?php 
                        $length = count($student);
                        foreach ($student as $id =>$value) {
                            $stdId = $student[$id]['std_enroll_detail_std_id'];
                            $studentId[$id] = $stdId;
                            $stdName = Yii::$app->db->createCommand("SELECT std_name FROM std_personal_info  WHERE std_id = '$stdId'")->queryAll();
                            $studentName[$id] = $stdName[0]['std_name'];
                            $fee = Yii::$app->db->createCommand("SELECT net_addmission_fee , net_tuition_fee  FROM std_fee_details WHERE std_id = '$value[std_enroll_detail_std_id]'")->queryAll(); 
                            $admissionFee = $fee[0]['net_addmission_fee'];
                            $tuitionFee = $fee[0]['net_tuition_fee'];
                            $netTotal = $admissionFee + $tuitionFee;
                    ?>
                    <tr>
                        <td>
                            <p style="margin-top: 8px"><?php echo $id+1; ?></p>
                        </td>
                        <td>
                            <p style="margin-top: 8px"><?php echo $stdId;?></p>
                        </td>
                        <td>
                            <p style="margin-top: 8px"><?php echo $stdName[0]['std_name'];?></p>
                         </td>
                        <td align="center">
                            <input class="form-control" type="number" name="admission_fee[]" value="<?php echo $fee[0]['net_addmission_fee']; ?>" readonly="" id="admissionFee_<?php echo $id; ?>" style="width: 80px; border: none;">
                        </td>
                        <td align="center">
                            <input class="form-control" type="number" name="tuition_fee[]" value="<?php echo $fee[0]['net_tuition_fee']; ?>" readonly="" id="tuitionFee_<?php echo $id; ?>" style="width: 80px; border: none;">
                        </td>
                        <td>
                            <input class="form-control" type="number" id="lateFeeFine_<?php echo $id; ?>" name="late_fee_fine[]"  onChange="lateFeeFine(<?php echo $id; ?>)"  style="width: 80px; border: none;">
                        </td>
                        <td>
                            <input class="form-control" type="number" id="absentFine_<?php echo $id; ?>" name="absent_fine[]"  onChange="absentFine(<?php echo $id; ?>)" style="width: 80px; border: none;">
                        </td>


                        <td>
                            <input class="form-control" type="number" id="libraryDues_<?php echo $id; ?>" name="library_dues[]"  onChange="libraryDues(<?php echo $id; ?>)" style="width: 80px; border: none;">
                        </td>
                        <td>
                            <input class="form-control" type="number" id="transportFee_<?php echo $id; ?>" name="transport_fee[]"  onChange="transportationFee(<?php echo $id; ?>)" style="width: 80px; border: none;">
                        </td>
                        <td>
                            <input class="form-control" type="number" id="totalAmount_<?php echo $id; ?>" readonly="" name=" total_amount[]" value="<?php echo $netTotal ; ?>"  style="width: 80px; border: none;">
                        </td>
                        <td>
                            <input class="form-control" type="number" id="discountAmount_<?php echo $id; ?>" name="discount_amount[]" onChange="totalDiscount(<?php echo $id; ?>)" value="0" style="width: 80px; border: none;">
                        </td>
                        <td>
                            <input class="form-control" type="number" id="netTotal_<?php echo $id; ?>" readonly="" name="net_total[]" value="<?php echo $netTotal; ?>" style="width: 80px; border: none;">
                        </td>
                    </tr>
                <?php } ?>
                </table>
            </div>
        </div>
		<div class="row">
			<div class="col-md-4">
                <div class="form-group">
                    
                        <?php foreach ($studentId as $value) {
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
                    <button type="submit" name="save" class="btn btn-success">Submit</button>
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
                
                $headTransId = Yii::$app->db->createCommand("SELECT fee_trans_id FROM fee_transaction_head where class_name_id= '$classid' AND session_id = '$sessionid' AND section_id = '$sectionid' AND month = '$month'")->queryAll();
                $transId = $headTransId[0]['fee_trans_id'];
                if($headTransId == null){
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
                                }
                    //end of for loop
                    }
                // end of if
                } else {
                    for ($i=0; $i <$length ; $i++) { 
                        if($headTransId != null AND $discount_amount[$i] > 0 OR $late_fee_fine[$i] > 0  OR $absent_fine[$i] > 0 OR
                            $library_dues[$i] > 0 OR $transport_fee[$i] > 0 OR $discount_amount[$i] > 0){
                            $updateStatus = '1';
                            $i = $length + 1;
                        }  
                        else {
                            $updateStatus = '0';
                        }
                    // end of for loop
                    }
                // end of else 
                }
                if($updateStatus == '1'){
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
                    }
                    for($i=0; $i<$length; $i++){
                    $detailID = Yii::$app->db->createCommand("SELECT fee_trans_detail_id FROM fee_transaction_detail where fee_trans_detail_head_id = '$transId'")->queryAll();
                    $detailId = $detailID[$i]['fee_trans_detail_id'];
                    die();
                    for($i=0; $i<$length; $i++){
                        for($j=0;$j<6;$j++){
                                    if($feeType[$j] == 1 && $admission_fee[$i] != 0){
                                        $feeDetails = Yii::$app->db->createCommand()->update('fee_transaction_detail',[
                                        'fee_trans_detail_head_id' => $transId+$i,
                                        'fee_type_id'=> $feeType[$j],
                                        'fee_amount'=> $admission_fee[$i]],
                                        ['fee_trans_detail_id' => $detailId+$i] 
                                        )->execute();
                                    }
                                    if($feeType[$j] == 2 && $tuition_fee[$i] != 0){
                                        $feeDetails = Yii::$app->db->createCommand()->update('fee_transaction_detail',[
                                        'fee_trans_detail_head_id' => $transId+$i,
                                        'fee_type_id'=> $feeType[$j],
                                        'fee_amount'=> $tuition_fee[$i]],
                                        ['fee_trans_detail_id' => $detailId+$i]  
                                        )->execute();
                                    }
                                    if($feeType[$j] == 3 && $late_fee_fine[$i] != 0){
                                        $feeDetails = Yii::$app->db->createCommand()->update('fee_transaction_detail',[
                                        'fee_trans_detail_head_id' => $transId+$i,
                                        'fee_type_id'=> $feeType[$j],
                                        'fee_amount'=> $late_fee_fine[$i]],
                                        ['fee_trans_detail_id' => $detailId+$i] 
                                        )->execute();
                                    }
                                    if($feeType[$j] == 4 && $absent_fine[$i] != 0){
                                        $feeDetails = Yii::$app->db->createCommand()->update('fee_transaction_detail',[
                                        'fee_trans_detail_head_id' => $transId+$i,
                                        'fee_type_id'=> $feeType[$j],
                                        'fee_amount'=> $absent_fine[$i]],
                                        ['fee_trans_detail_id' => $detailId+$i]  
                                        )->execute();
                                    }
                                    if($feeType[$j] == 5 && $library_dues[$i] != 0){
                                        $feeDetails = Yii::$app->db->createCommand()->update('fee_transaction_detail',[
                                        'fee_trans_detail_head_id' => $transId+$i,
                                        'fee_type_id'=> $feeType[$j],
                                        'fee_amount'=> $library_dues[$i]],
                                        ['fee_trans_detail_id' => $detailId+$i] 
                                        )->execute();
                                    }
                                    if($feeType[$j] == 6 && $transport_fee[$i] != 0){
                                        $feeDetails = Yii::$app->db->createCommand()->update('fee_transaction_detail',[
                                        'fee_trans_detail_head_id' => $transId+$i, 
                                        'fee_type_id'=> $feeType[$j],
                                        'fee_amount'=> $transport_fee[$i]], 
                                        ['fee_trans_detail_id' => $detailId+$i] 
                                        )->execute();
                                    }
                                }
                    //end of for loop
                    }    
                        
                    } 
                } else {
                    echo "Nothing"; 
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