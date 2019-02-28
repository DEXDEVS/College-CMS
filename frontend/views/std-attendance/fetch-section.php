<?php
	if(isset($_POST['session_Id']))  {
		$classId = $_POST['class_Id'];
		$sessionId = $_POST['session_Id'];

		$sections = Yii::$app->db->createCommand("SELECT seh.section_id, sect.section_name FROM std_enrollment_head as seh INNER JOIN std_sections as sect ON seh.section_id = sect.section_id WHERE seh.class_name_id = '$classId' AND seh.session_id = '$sessionId'")->queryAll();

		echo json_encode($sections);
	}
	else if(isset($_POST['section_Id'])){
		$classId = $_POST['class_Id'];
		$sessionId = $_POST['session_Id'];
		$sectionId = $_POST['section_Id'];

		$subjectId = Yii::$app->db->createCommand("SELECT tsad.subject_id FROM teacher_subject_assign_detail as tsad INNER JOIN std_enrollment_head as seh ON tsad.class_id = seh.class_name_id WHERE seh.class_name_id = '$classId' AND seh.session_id = '$sessionId' AND seh.section_id = '$sectionId' ")->queryAll();

		$subId = array();
		$subName = array();
		$count = count($subjectId);
		 	for ($i=0; $i <$count; $i++) { 
		 		$subId[$i] = $subjectId[$i]['subject_id'];

		 		$subjectName = Yii::$app->db->createCommand("SELECT std_subject_name FROM std_subjects WHERE std_subject_id = '$subId[$i]['subject_id']'")->queryAll();
		 		$subName[$i] = $subjectName[$i]['std_subject_name'];
		 	}
		 $obj = (object) array($subId,$subName);
 		echo json_encode($obj);
	} 
	else {

		$classId = $_POST['class_Id'];
	
		$sessions = Yii::$app->db->createCommand("SELECT seh.session_id, sess.session_name FROM std_enrollment_head as seh INNER JOIN std_sessions as sess ON  seh.session_id = sess.session_id WHERE seh.class_name_id = '$classId'")->queryAll();

		echo json_encode($sessions);
	} 
?>
 