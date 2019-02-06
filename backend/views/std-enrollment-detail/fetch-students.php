<?php 
	if(isset($_POST['class_Id'])){

	$classId = $_POST['class_Id'];
	
	$studentName = Yii::$app->db->createCommand("SELECT spi.std_id ,spi.std_name FROM std_personal_info as spi
		INNER JOIN std_academic_info as sai
		ON sai.std_id = spi.std_id 
		WHERE sai.class_name_id = '$classId' AND sai.std_enroll_status= 'unsign'")->queryAll();

	$stdId = array();
 	$stdName = array();
 	$count = count($studentName);
 	for ($i=0; $i <$count; $i++) { 
 		$stdId[$i] = $studentName[$i]['std_id'];
 		$stdName[$i] = $studentName[$i]['std_name'];
 	}
 	$obj = (object) array($stdId,$stdName);
 	echo json_encode($obj);
 	}
?> 	