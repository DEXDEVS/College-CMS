<?php
	$classId = $_POST['classId'];
	$sessionId = $_POST['sessionId'];
	$sectionId = $_POST['sectionId'];


 	$stdName = array();
 		
 		$stdName[0] = $classId;
 		$stdName[1] = $sessionId;
 		$stdName[2] = $sectionId;

 	$obj = (object) array($stdName);
 	echo json_encode($obj);


	// $studentName = Yii::$app->db->createCommand("SELECT sed.std_enroll_detail_std_id , sed.std_enroll_detail_std_name  FROM std_enrollment_detail as sed INNER JOIN std_enrollment_head as seh ON seh.std_enroll_head_id = sed.std_enroll_detail_head_id WHERE seh.class_name_id = '$classId' AND seh.session_id = '$sessionid' AND seh.section_id = '$sectionId'")->queryAll();
	// echo json_encode($studentName);
?>