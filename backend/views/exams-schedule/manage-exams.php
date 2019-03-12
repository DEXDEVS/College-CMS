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
				<div class="row">
					<div class="col-md-4">	
						<div class="form-group">
							<label>Select Exam Category</label>
							<select name="exam-category" class="form-control">
								<option>Select Exam Category</option>
							</select>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label>Select Class</label>
							<select name="exam-category" class="form-control">
								<option>Select Class</option>
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
							<input type="date" name="exam_start_date" class="form-control">
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label>Exam Start Time</label>
							<input type="time" name="exam_start_date" class="form-control">
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label>Exam End Time</label>
							<input type="time" name="exam_start_date" class="form-control">
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
</body>
</html>