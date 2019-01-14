<?php
	if(isset($_POST['class_Id'])){

	$classId = $_POST['class_Id'];
	$sessionId = $_POST['session_Id'];
	$sectionId = $_POST['section_Id'];
	$studentName = Yii::$app->db->createCommand("SELECT sed.std_enroll_detail_std_id , sed.std_enroll_detail_std_name  
		FROM std_enrollment_detail as sed 
		INNER JOIN std_enrollment_head as seh 
		ON seh.std_enroll_head_id = sed.std_enroll_detail_head_id 
		WHERE seh.class_name_id = '$classId' AND seh.session_id = '$sessionId' AND seh.section_id = '$sectionId'")->queryAll();

	$stdId = array();
 	$stdName = array();
 	$count = count($studentName);
 	for ($i=0; $i <$count; $i++) { 
 		$stdId[$i] = $studentName[$i]['std_enroll_detail_std_id'];
 		$stdName[$i] = $studentName[$i]['std_enroll_detail_std_name'];
 	}

 	$obj = (object) array($stdId,$stdName);
 	echo json_encode($obj);
 	}
 	else if(isset($_POST['studentId'])){
	//get student fee

 	$studentId = $_POST['studentId'];
 	$studentFeeDetail = Yii::$app->db->createCommand("SELECT net_addmission_fee , net_monthly_fee  FROM std_fee_details WHERE std_id = '$studentId'")->queryAll();
 	echo json_encode($studentFeeDetail);
	}
	else {
	$sessionId = $_POST['session_Id'];
	$sections = Yii::$app->db->createCommand("SELECT section_id,section_name FROM std_sections WHERE session_id = '$sessionId'")->queryAll();
	echo json_encode($sections);
	}
?>