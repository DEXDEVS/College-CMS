<?php
	$classId = $_POST['class_Id'];
	$sessions = Yii::$app->db->createCommand("SELECT seh.session_id, sess.session_name FROM std_enrollment_head as seh INNER JOIN std_sessions as sess ON  seh.session_id = sess.session_id WHERE class_name_id = '$classId'")->queryAll();

	$sessId = array();
	$sessName = array();
	$count = count($sessions);
 	for ($i=0; $i <$count; $i++) { 
 		$sessId[$i] = $sessions[$i]['session_id'];
 		$sessName[$i] = $sessions[$i]['session_name'];
 	}

 	$obj = (object) array($sessId,$sessName);
	
	echo json_encode($obj);
	
?>