<?php
	if(isset($_POST['session_Id'])){
		$classId = $_POST['class_Id'];
		$sessionId = $_POST['session_Id'];

		$sections = Yii::$app->db->createCommand("SELECT seh.section_id, sect.section_name FROM std_enrollment_head as seh INNER JOIN std_sections as sect ON seh.section_id = sect.section_id WHERE seh.class_name_id = '$classId' AND seh.session_id = '$sessionId'")->queryAll();

		echo json_encode($sections);
	}

	else {
		$classId = $_POST['class_Id'];
	
	$sessions = Yii::$app->db->createCommand("SELECT seh.session_id, sess.session_name FROM std_enrollment_head as seh INNER JOIN std_sessions as sess ON  seh.session_id = sess.session_id WHERE class_name_id = '$classId'")->queryAll();

	echo json_encode($sessions);
	} 
?>
