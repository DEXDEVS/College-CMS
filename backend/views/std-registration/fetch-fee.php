<?php
	if(isset($_POST['stdInquiryNo'])){
	$stdInquiryNo = $_POST['stdInquiryNo'];

 	$inquiryDetail = Yii::$app->db->createCommand("SELECT * FROM std_inquiry WHERE std_inquiry_no = '$stdInquiryNo'")->queryAll();
 	echo json_encode($inquiryDetail);
 	}
	else if(isset($_POST['session_Id'])){
	$classId = $_POST['class_Id'];
	$sessionId = $_POST['session_Id'];

 	$studentFeeDetail = Yii::$app->db->createCommand("SELECT admission_fee , tutuion_fee  FROM std_fee_pkg WHERE class_id = '$classId' AND session_id = '$sessionId'")->queryAll();
 	echo json_encode($studentFeeDetail);
	} 
	else {
		$classId = $_POST['class_Id'];

		$subjectsCombination = Yii::$app->db->createCommand("SELECT std_subject_id, std_subject_name FROM std_subjects WHERE class_id = '$classId'")->queryAll();
 	echo json_encode($subjectsCombination);
	}

?>