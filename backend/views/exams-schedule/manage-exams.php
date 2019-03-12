<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Manage Exams</title>
</head>
<body>
<div class="container-fluid">
	<div class="box box-primary">
		<div class="box-header">
			<h3>Exams Criteria</h3>
		</div>
		<div class="box-body">
			<form method="post">
				 <input type="hidden" name="_csrf" class="form-control" value="<?=Yii::$app->request->getCsrfToken()?>"> 
				<div class="row">
					<div class="col-md-4">	
						<div class="form-group">
							<label>Select Exam Category</label>
							<select name="exam_category" class="form-control">
								<option>Select Exam Category</option>
								<?php 

								 $ExamCategories = Yii::$app->db->createCommand("SELECT * FROM exams_category")->queryAll();					 	
								 ?>
								 <?php foreach ($ExamCategories as $key => $value) { ?>
								 <option value="<?php echo $value['exam_category_id']; ?>">
								 	<?php echo $value['category_name']; ?>
								 </option>
								<?php } ?>
							</select>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label>Select Class</label>
							<select name="class_head" class="form-control">
								<option>Select Class</option>
								<?php 

								 $Classes = Yii::$app->db->createCommand("SELECT std_enroll_head_id,std_enroll_head_name FROM std_enrollment_head")->queryAll();					 	
								 ?>
								 <?php foreach ($Classes as $key => $value) { ?>
								 <option value="<?php echo $value['std_enroll_head_id']; ?>">
								 	<?php echo $value['std_enroll_head_name']; ?>
								 </option>
								<?php } ?>
							</select>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label>Exam Start Date</label>
							<input type="date" name="exam_start_date" class="form-control">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-4">	
						<div class="form-group">
							<label>Exam End Date</label>
							<input type="date" name="exam_end_date" class="form-control">
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label>Exam Start Time</label>
							<input type="time" name="exam_start_time" class="form-control">
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label>Exam End Time</label>
							<input type="time" name="exam_end_time" class="form-control">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-4">
						<button type="submit" name="get_subjects" class="btn btn-success btn-xs">
							<i class="fa fa-sign-in"></i> Get Subjects</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
<?php 
	if(isset($_POST['get_subjects']))
	{
		$exam_category 		= $_POST["exam_category"];
		$headId 			= $_POST["class_head"];
		$exam_start_date 	= $_POST["exam_start_date"];
		$exam_end_date 		= $_POST["exam_end_date"];
		$exam_start_time 	= $_POST["exam_start_time"];
		$exam_end_time 		= $_POST["exam_end_time"];

		$subjects = Yii::$app->db->createCommand("SELECT std_subject_name FROM std_subjects
			INNER JOIN std_enrollment_head
			ON std_subjects.class_id = std_enrollment_head.class_name_id
			WHERE std_enrollment_head.std_enroll_head_id = '$headId'")->queryAll();
		//var_dump($subjects);
		$subjCount = count($subjects);
 ?>
<form method="post">
	<table>
		<thead>
			<thead>
				<tr>
					<th>Subjects</th>
					<th>Date</th>
					<th>Teacher</th>
				</tr>
			</thead>
			<tbody>
				<?php for ($i=0; $i <$subjCount ; $i++) { ?>
					<tr>
						<?php foreach ($subjects as $key => $value) { ?>
							<td>
								<?php echo $value['std_subject_name']; ?>
							</td>
							<td>
								<?php echo "hello"; ?>
							</td>
							<td>
								<?php echo "hello"; ?>
							</td>
						<?php } ?>
					</tr>
				<?php } ?>
			</tbody>
		</thead>
	</table>
</form>
<?php } ?>
</body>
</html>