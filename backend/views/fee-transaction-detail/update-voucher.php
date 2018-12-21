<?php
    $session = Yii::$app->session;
    
    $voucherNo        = $_POST["voucher_no"];
    $paidAmount       = $_POST["paid_amount"];
    $remainingAmount  = $_POST["remaining_amount"];
    $status           = $_POST["status"];

    $updateTransactionHead = Yii::$app->db->createCommand()->update('fee_transaction_head', ['paid_amount'=> $paidAmount, 'remaining'=> $remainingAmount , 'status' => $status], ['fee_trans_id' => $voucherNo])->execute();
    if ($updateTransactionHead) {
        //Success
        echo "{\"";
        echo true;
        echo "\"}";
        } else {
        //Failure
        echo "{";
        echo false;
        echo "}";
    }
?>