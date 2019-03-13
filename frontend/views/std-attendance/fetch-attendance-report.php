<?php 


	if(isset($_POST["singledateclass"]))
	{
		$sub_id 			= $_POST["subjectID"];
        $class_id 			= $_POST["classID"];
        $emp_id 			= $_POST["empID"];
        $singleDateClass 	= $_POST["singledateclass"];

         $students = Yii::$app->db->createCommand("SELECT sed.std_enroll_detail_std_id,sed.std_enroll_detail_std_name, sed.std_roll_no
        FROM std_enrollment_detail as sed
        INNER JOIN std_enrollment_head as seh
        ON seh.std_enroll_head_id = sed.std_enroll_detail_head_id
        WHERE sed.std_enroll_detail_head_id = '$class_id'")->queryAll();

		$classDetail = Yii::$app->db->createCommand("SELECT DISTINCT seh.class_name_id, seh.session_id, seh.section_id FROM std_enrollment_head as seh INNER JOIN teacher_subject_assign_detail as d ON d.class_id = seh.std_enroll_head_id WHERE d.class_id = '$class_id'")->queryAll();
		$classnameid = $classDetail[0]['class_name_id'];
		$sessionid = $classDetail[0]['session_id'];
		$sectionid = $classDetail[0]['section_id'];

		echo json_encode($students);

	}









 ?>