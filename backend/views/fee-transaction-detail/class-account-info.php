<h1 class="well well-sm bg-navy" align="center" style="color: #3C8DBC; margin-top: -10px">Class Fee Account Information</h1>

<style>
    input[type=number]::-webkit-inner-spin-button, 
    input[type=number]::-webkit-outer-spin-button { 
      -webkit-appearance: none; 
      margin: 0; 
    }
</style>
<?php 
    if(isset($_POST['submit'])) { 
        $classid        = $_POST["classid"];
        $sessionid      = $_POST["sessionid"];
        $sectionid      = $_POST["sectionid"];
        $month          = $_POST["monthYear"];
        $installment_no = $_POST["installment_no"];
        $date           = $_POST["date"];
        // Select CLass...
        $class = Yii::$app->db->createCommand("SELECT class_name FROM std_class_name WHERE class_name_id = '$classid'")->queryAll();
        $className = $class[0]['class_name'];
        // Select Session... 
        $sessionName = Yii::$app->db->createCommand("SELECT session_name FROM std_sessions WHERE session_id = '$sessionid'")->queryAll();
       // Select Section...
        $sectionName = Yii::$app->db->createCommand("SELECT section_name FROM std_sections WHERE section_id = '$sectionid'")->queryAll();
       // Installment Name...
        $installment = Yii::$app->db->createCommand("SELECT installment_name FROM installment WHERE installment_id = '$installment_no'")->queryAll();
        $installmentName = $installment[0]['installment_name'];
        // Select Students...
        $student = Yii::$app->db->createCommand("SELECT sed.std_enroll_detail_id ,sed.std_enroll_detail_std_id FROM std_enrollment_detail as sed INNER JOIN std_enrollment_head as seh ON seh.std_enroll_head_id = sed.std_enroll_detail_head_id WHERE seh.class_name_id = '$classid' AND seh.session_id = '$sessionid' AND seh.section_id = '$sectionid'")->queryAll();
    ?>

    <form method="POST" action="class-account">
        <div class="row">
            <div class="col-md-6">
                <?php echo "<h3>".$className." - ".$installmentName."</h3>"; ?>
            </div>
            <div class="col-md-6">
                <ol class="breadcrumb" style="float: right;">
                    <li><a href="./home" style="color: #3C8DBC;"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li><a href="./fee-transaction-detail-class-account" style="color: #3C8DBC;">Back</a></li>
                </ol>
            </div>
        </div>
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
                            if ($installment_no != 1) {
                                $admissionFee = 0;    
                            }
                            else{
                                $admissionFee = $admission[0]['net_addmission_fee'];
                            }
                            // get student installment amount
                            $installmentAmount = Yii::$app->db->createCommand("SELECT installment_amount FROM std_fee_installments  WHERE std_fee_id = '$feeId' AND installment_no = '$installment_no'")->queryAll();
                            if(empty($installmentAmount)){
                                $tuitionFee = 0;
                            }
                            else{
                                $tuitionFee = $installmentAmount[0]['installment_amount'];
                            }
                            //$admissionFee = 10000;
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
                            <input class="form-control" type="number" name="admission_fee[]" value="<?php echo $admissionFee; ?>" readonly="" id="admissionFee_<?php echo $id; ?>" style="width: 70px; border: none;">
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
                            <input class="form-control" type="number" id="totalAmount_<?php echo $id; ?>" readonly="" name=" total_amount[]" value="<?php echo $netTotal ; ?>"  style="width: 80px; border: none;">
                        </td>
                        <td>
                            <input class="form-control" type="number" id="discountAmount_<?php echo $id; ?>" name="discount_amount[]" onChange="totalDiscount(<?php echo $id; ?>)" value="0" style="width: 70px; border: none;">
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
                    <input type="hidden" name="installment_no" value="<?php echo $installment_no; ?>">
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