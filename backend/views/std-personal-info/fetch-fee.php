<?php
	if(isset($_POST['class_Id'])){
	$classId = $_POST['class_Id'];
	$sessionId = $_POST['session_Id'];

 	$studentFeeDetail = Yii::$app->db->createCommand("SELECT admission_fee , tutuion_fee  FROM std_fee_pkg WHERE class_id = '$classId' AND session_id = '$sessionId'")->queryAll();
 	echo json_encode($studentFeeDetail);
	}
	else {
	$concession = $_POST['concession'];	
	$concessionName = Yii::$app->db->createCommand("SELECT concession_name FROM concession WHERE concession_id = '$concession'")->queryAll();
	$concesion = $concessionName[0]['concession_name'];
	$trimConcesion = trim($concesion,' Concession');
	$data = trim($trimConcesion,'');
 	echo json_encode($data);
	}
?>