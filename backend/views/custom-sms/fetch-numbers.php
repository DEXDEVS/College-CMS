<?php
	if(isset($_POST['selectClass'])){

	$classId = $_POST['selectClass'];

 	$classInfo = Yii::$app->db->createCommand("SELECT seh.class_name_id,sed.std_enroll_detail_std_id FROM std_enrollment_head as seh 
 		INNER JOIN std_enrollment_detail as sed 
 		ON seh.std_enroll_head_id = sed.std_enroll_detail_head_id  
 		WHERE sed.std_enroll_detail_head_id = '$classId'")->queryAll();

 	$stdNumbers = array();
 	$countStudents = count($classInfo);
 	for ($i=0; $i <$countStudents; $i++) { 
 		$std_id = $classInfo[$i]['std_enroll_detail_std_id'];
 		$contactNumbers = Yii::$app->db->createCommand("SELECT std_contact_no FROM std_personal_info WHERE std_id = '$std_id'")->queryAll();
 		$stdNumbers[$i] = $contactNumbers[$i]['std_contact_no'];
 		// $stdNames[$i] = $contactNumbers[$i]['std_name'];
		
 	}

 	//$obj = (object) array($stdNumbers,$stdNames);
 	echo json_encode($stdNumbers);
 	
	}
?>