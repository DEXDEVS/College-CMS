<!DOCTYPE html>
<html>
<head>
	<title>Exams Date Sheet</title>
</head>
<body>
<?php 
	if(isset($_POST['get_subjects']))
	{
		$headId = $_POST["std_enroll_head_id"];

		$subjects = Yii::$app->db->createCommand("SELECT * FROM std_subjects
			INNER JOIN std_enrollment_head
			ON std_subjects.class_id = std_enrollment_head.class_name_id
			WHERE std_enrollment_head.std_enroll_head_id = '$headId'")->queryAll();
	}
 ?>

</body>
</html>