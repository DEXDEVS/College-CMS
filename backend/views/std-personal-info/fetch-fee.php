<?php
	$classId = $_POST['class_Id'];
	$sessionId = $_POST['session_Id'];

 	$studentFeeDetail = Yii::$app->db->createCommand("SELECT admission_fee , tutuion_fee  FROM std_fee_pkg WHERE class_id = '$classId' AND session_id = '$sessionId'")->queryAll();
 	echo json_encode($studentFeeDetail);
	
?>