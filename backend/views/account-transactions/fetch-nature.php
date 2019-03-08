<?php
	if(isset($_POST['accountRegister'])){
	$accountRegister = $_POST['accountRegister'];

 	$accountNature = Yii::$app->db->createCommand("SELECT account_nature_id FROM account_register WHERE account_register_id = '$accountRegister'")->queryAll();
 	$natureId = $accountNature[0]['account_nature_id'];
 	$account_nature_name = Yii::$app->db->createCommand("SELECT account_nature_name FROM account_nature WHERE account_nature_id = '$natureId'")->queryAll();
 	//$natureName = $account_nature_name[0]['account_nature_name'];

 	echo json_encode($account_nature_name);
 	}
?>