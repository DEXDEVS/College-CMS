<?php
	$sessionId = $_POST['session_Id'];
	$sections = Yii::$app->db->createCommand("SELECT section_id,section_name FROM std_sections WHERE session_id = '$sessionId'")->queryAll();
	echo json_encode($sections);
	
?>