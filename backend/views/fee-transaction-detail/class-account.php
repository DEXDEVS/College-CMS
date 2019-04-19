<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>Fee Vocher</title>
</head>
<body>
<div class="container-fluid" style="margin-top: -30px;">
	<h1 class="well well-sm bg-navy" align="center" style="color: #3C8DBC;">Manage Class Fee Accounts</h1>
    <!-- action="index.php?r=fee-transaction-detail/class-account-info" -->
    <form method="POST" action="fee-transaction-detail-class-account-info">
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
                    <select class="form-control" name="classid" id="classId" required="required">
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
                    <label>Select Month</label>
                    <input type="month" class="form-control" name="monthYear" required="">   
                </div>    
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label>Installment No</label>
                    <select name="installment_no" class="form-control" required>
                        <option>Select Installment No</option>
                        <option value="1">1st Installment</option>
                        <option value="2">2nd Installment</option>
                        <option value="3">3rd Installment</option>
                        <option value="4">4th Installment</option>
                        <option value="5">5th Installment</option>
                        <option value="6">6th Installment</option>
                    </select>
                </div>    
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label>Date</label>
                    <input type="date" class="form-control" name="date" required="">     
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
</body> 
</html>

<?php  
    global $length; 
        if (isset($_POST["save"])) {
                $classid            = $_POST["classid"];
                $sessionid          = $_POST["sessionid"];
                $sectionid          = $_POST["sectionid"];
                $date               = $_POST["date"];
                $month              = $_POST["month"];
                $installmentNo      = $_POST["installment_no"];
                $length             = $_POST["length"];
                $studentId          = $_POST["studentId"];
                $studentName        = $_POST["studentName"];
                $total_amount       = $_POST["total_amount"];
                $discount_amount    = $_POST["discount_amount"];
                $net_total          = $_POST["net_total"];
                // detail values....
                $admission_fee      = $_POST["admission_fee"];
                $tuition_fee        = $_POST["tuition_fee"];
                $late_fee_fine      = $_POST["late_fee_fine"];
                $absent_fine        = $_POST["absent_fine"];
                $library_dues       = $_POST["library_dues"];
                $transport_fee      = $_POST["transport_fee"];
                $feeType            = Array('1','2','3','4','5','6');
                $updateStatus       =-1;

               
                $headTransId = Yii::$app->db->createCommand("SELECT fee_trans_id FROM fee_transaction_head where class_name_id = '$classid' AND session_id = '$sessionid' AND section_id = '$sectionid' AND month = '$month' AND installment_no = '$installmentNo'")->queryAll();
                if(empty($headTransId)){
                    for($i=0; $i<$length; $i++){
                        $feeHead = Yii::$app->db->createCommand()->insert('fee_transaction_head',[
                            'class_name_id' => $classid,
                            'session_id'=> $sessionid,
                            'section_id'=> $sectionid,
                            'std_id' => $studentId[$i],
                            'std_name' => $studentName[$i],
                            'month'=> $month,
                            'installment_no'=> $installmentNo,
                            'transaction_date' => $date,
                            'total_amount'=> $net_total[$i],
                            'total_discount'=> $discount_amount[$i],
                            'status'=>'unpaid',
                        ])->execute();
                            
                        $headID = Yii::$app->db->createCommand("SELECT fee_trans_id FROM fee_transaction_head where class_name_id= '$classid' AND session_id = '$sessionid' AND section_id = '$sectionid' AND month = '$month'")->queryAll();
                        $headId = $headID[$i]['fee_trans_id'];
                        for($j=0;$j<6;$j++){
                            if($feeType[$j] == 1 && $admission_fee[$i] > 0){
                                $feeDetails = Yii::$app->db->createCommand()->insert('fee_transaction_detail',[
                                'fee_trans_detail_head_id' => $headId,
                                'fee_type_id'=> $feeType[$j],
                                'fee_amount'=> $admission_fee[$i], 
                                ])->execute();
                            }
                            if($feeType[$j] == 2 && $tuition_fee[$i] > 0){
                                $feeDetails = Yii::$app->db->createCommand()->insert('fee_transaction_detail',[
                                'fee_trans_detail_head_id' => $headId,
                                'fee_type_id'=> $feeType[$j],
                                'fee_amount'=> $tuition_fee[$i], 
                                ])->execute();
                            }
                            if($feeType[$j] == 3 && $late_fee_fine[$i] > 0){
                                $feeDetails = Yii::$app->db->createCommand()->insert('fee_transaction_detail',[
                                'fee_trans_detail_head_id' => $headId,
                                'fee_type_id'=> $feeType[$j],
                                'fee_amount'=> $late_fee_fine[$i],
                                ])->execute();
                            }
                            if($feeType[$j] == 4 && $absent_fine[$i] > 0){
                                $feeDetails = Yii::$app->db->createCommand()->insert('fee_transaction_detail',[
                                'fee_trans_detail_head_id' => $headId,
                                'fee_type_id'=> $feeType[$j],
                                'fee_amount'=> $absent_fine[$i], 
                                ])->execute();
                            }
                            if($feeType[$j] == 5 && $library_dues[$i] > 0){
                                $feeDetails = Yii::$app->db->createCommand()->insert('fee_transaction_detail',[
                                'fee_trans_detail_head_id' => $headId,
                                'fee_type_id'=> $feeType[$j],
                                'fee_amount'=> $library_dues[$i],
                                ])->execute();
                            }
                            if($feeType[$j] == 6 && $transport_fee[$i] > 0){
                                $feeDetails = Yii::$app->db->createCommand()->insert('fee_transaction_detail',[
                                'fee_trans_detail_head_id' => $headId, 
                                'fee_type_id'=> $feeType[$j],
                                'fee_amount'=> $transport_fee[$i], 
                                ])->execute();
                            }
                            //end of J for loop
                        }
                    //end of for loop
                    }
                    // success alert message...
                    Yii::$app->session->setFlash('success', "You have successfully maintain this class account...!"); 
                 // end of if
                } else {
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
                    // adjust feeType Array with index....
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
                    for ($z=0; $z<6; $z++) {  
                        //use length here
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
                Yii::$app->session->setFlash('warning', "You have successfully update this class account...!"); 
        // end of else 
        }
    //end of isset
    }
?>

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
