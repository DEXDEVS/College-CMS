<!DOCTYPE html>
<html>
<head>
	<title>Attendance</title>
</head>
<body>
	<!-- <form  action = "student-attendance" method="POST" style="margin-top: -35px">
		<h1 class="well well-sm text" align="center">Attendance</h1>
    	<div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <input type="hidden" name="_csrf" class="form-control" value="<?=Yii::$app->request->getCsrfToken()?>">          
                </div>    
            </div>    
        </div>
        <div class="row">
        	<div class="col-md-3">
                <div class="form-group">
                	<label>Current Date</label>
                    <input class="form-control" data-date-format="mm/dd/yyyy" type="date" name="date" required="">
                </div>    
            </div> -->
            <?php
            	$techerEmail = Yii::$app->user->identity->email;
            	$teacherId = Yii::$app->db->createCommand("SELECT emp.emp_id FROM emp_info as emp WHERE emp.emp_email = '$techerEmail'")->queryAll();
            	$teacher_id = $teacherId[0]['emp_id'];

				$classId = Yii::$app->db->createCommand("SELECT DISTINCT d.class_id FROM teacher_subject_assign_detail as d INNER JOIN teacher_subject_assign_head as h ON d.teacher_subject_assign_detail_head_id = h.teacher_subject_assign_head_id WHERE h.teacher_id = '$teacher_id'")->queryAll();
				$countClassIds = count($classId);
				// var_dump($countClassIds);
				// die(); 

				
            ?>
            <div class="row">
            	<?php 
            	for ($i=0; $i <$countClassIds ; $i++) {
            	 $idd = $classId[$i]['class_id'];
    		$subjectsIds = Yii::$app->db->createCommand("SELECT d.subject_id FROM teacher_subject_assign_detail as d INNER JOIN teacher_subject_assign_head as h ON d.teacher_subject_assign_detail_head_id = h.teacher_subject_assign_head_id WHERE h.teacher_id = '$teacher_id' AND d.class_id = '$idd'")->queryAll();
            	 ?>
            	<div class="col-md-6">
            		<div class="panel panel-primary">
            			<div class="panel-heading">
            				<?php 
            				$IDD = $classId[$i]['class_id'];
            				$classnameid = Yii::$app->db->createCommand("SELECT class_name_id  FROM std_enrollment_head WHERE std_enroll_head_id = '$IDD'")->queryAll(); 
							$namee = $classnameid[0]['class_name_id'];
							$CLASSName = Yii::$app->db->createCommand("SELECT class_name FROM std_class_name WHERE class_name_id = '$namee'")->queryAll();
							echo $CLASSName[0]['class_name'];
            				?>
            			</div>
            			<div class="panel-body">
            				<form method="post">
            					<div class="form-group">
            						<label>Today's Date</label>
            						<input class="form-control" type="text" name="date" required="" readonly="readonly" value="<?php echo date("d/m/y");?>">
            					</div>
            					<div class="form-group">
            						<label>Select Subject</label>
            						<select name="subject_id" class="form-control">
            							<option>Select subject</option>
            							<?php 
            							foreach ($subjectsIds as $key => $value) {
            							$SID = $subjectsIds[$key]['subject_id'];
            							$SN = Yii::$app->db->createCommand("SELECT subject_name FROM subjects WHERE subject_id = '$SID'")->queryAll();
            							 ?>
            							<option value="subject_id">
            								<?php echo $SN[0]['subject_name']; ?>
            							</option>
            						<?php } ?>
            						</select>
            					</div>
            				</form>
            			</div>
            			<div class="panel-footer"></div>
            		</div>
            	</div>
            	<?php } ?>
            </div>
            <hr>
            <?php 
            	for ($i=0; $i <$countClassIds ; $i++) {
            	 $idd = $classId[$i]['class_id'];
            	 // session id's
            	$sessionIds = Yii::$app->db->createCommand("SELECT DISTINCT seh.session_id
            		FROM std_enrollment_head as seh 
            		INNER JOIN teacher_subject_assign_detail as d
            		ON d.class_id = seh.std_enroll_head_id
            		WHERE seh.std_enroll_head_id = '$idd'")->queryAll();

            	
            	// var_dump($sessionIds);
            	// die();
            	// subject ids
    			// $subjectsIds = Yii::$app->db->createCommand("SELECT d.subject_id FROM teacher_subject_assign_detail as d INNER JOIN teacher_subject_assign_head as h ON d.teacher_subject_assign_detail_head_id = h.teacher_subject_assign_head_id WHERE h.teacher_id = '$teacher_id' AND d.class_id = '$idd'")->queryAll();
            	 ?>

	<div class="col-md-4">
		<form method="post">
          <div class="box box-success collapsed-box">
            <div class="box-header with-border" style="background-color: #dff0d8;">
              <h3 class="box-title">
              	<?php 
					$IDD = $classId[$i]['class_id'];
					$classnameid = Yii::$app->db->createCommand("SELECT class_name_id  FROM std_enrollment_head WHERE std_enroll_head_id = '$IDD'")->queryAll(); 
					$namee = $classnameid[0]['class_name_id'];
					$CLASSName = Yii::$app->db->createCommand("SELECT class_name FROM std_class_name WHERE class_name_id = '$namee'")->queryAll();
				?>
				<b><?php echo $CLASSName[0]['class_name']; ?></b>
				<div class="form-group">
					<input type="hidden" name="class_id" readonly="readonly" class="form-control" value="<?php 
					echo $CLASSName[0]['class_name']; ?>">
				</div>
              </h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                </button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            	<!-- session start -->
			<?php 
			foreach ($sessionIds as $key => $value) {
				$sessID = $sessionIds[$key]['session_id'];
				$sessName = Yii::$app->db->createCommand("SELECT session_name FROM std_sessions WHERE session_id = '$sessID'")->queryAll();

				$sectionIds = Yii::$app->db->createCommand("SELECT DISTINCT seh.section_id
            		FROM std_enrollment_head as seh 
            		INNER JOIN teacher_subject_assign_detail as d
            		ON d.class_id = seh.std_enroll_head_id
            		WHERE seh.std_enroll_head_id = '$idd' AND seh.session_id = '$sessID'")->queryAll();
				// var_dump($sectionIds);
				// die();
			 ?>
            <div class="box box-default collapsed-box">
	            <div class="box-header with-border">
	              <h3 class="box-title">
	              	<b><?php echo $sessName[0]['session_name']; ?></b>
					<div class="form-group">
						<input type="hidden" name="class_id" readonly="readonly" class="form-control" value="<?php 
					echo $sessName[0]['session_name']; ?>">
					</div>
	              </h3>
	              <div class="box-tools pull-right">
	                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
	                </button>
	              </div>
	             
	            </div>
	           
	            <div class="box-body">
	            <table class="table table-bordered table-hover">
	            	<thead>
	            		<tr>
	            			<th style="text-align: center; background-color: #b5d3fa;">Sections</th>
	            		</tr>
	            	</thead>
	            	<tbody>
	            		<tr>
	            			<td>
	            				<select name="section_Id" class="form-control" id="attendance">
	            				<option>Select section</option>
	            				<?php 
					              foreach ($sectionIds as $key => $value) {
					              	$secId = $sectionIds[$key]['section_id'];
					              	$secName = Yii::$app->db->createCommand("SELECT section_id,section_name FROM std_sections WHERE section_id = '$secId' ANd session_id = '$sessID'")->queryAll();
					              	?>
					              <option value="<?php echo $secName[0]['section_name']; ?>">
					              	<?php echo $secName[0]['section_name']; ?>
					              </option>
	              				<?php } ?>
	              				</select>
	            			</td>
	            		</tr>
	            	</tbody>
	            </table>
	            </div>
            
          	</div>
          <?php } ?>
          
            	<!-- session close -->

              
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
      </form>
    </div>
	<?php } ?>




            <hr>
<br><br><br><br><br><br><br><br><br><br><br><br>
            <!-- <div class="col-md-3">
                <div class="form-group">
                    <label>Select Class</label>
                    <select class="form-control" name="classid" id="classId">
                    	<option value="">Select Class </option>
						<?php
						foreach ($classId as $key => $value) {
							$id = $classId[$key]['class_id'];
							$classNameId = Yii::$app->db->createCommand("SELECT class_name_id  FROM std_enrollment_head WHERE std_enroll_head_id = '$id'")->queryAll(); 
							$name = $classNameId[0]['class_name_id'];
							$className = Yii::$app->db->createCommand("SELECT class_name FROM std_class_name WHERE class_name_id = '$name'")->queryAll();
							?>

							<option value="<?php echo $classNameId[0]["class_name_id"]; ?>">
									<?php echo $className[0]["class_name"]; ?>	
							</option>
							
						<?php } ?>
							
					</select>      
                </div>    
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label>Select Session</label>
                    <select class="form-control" name="sessionid" id="sessionId">
							<option value="">Select Session</option>
					</select>      
                </div>    
            </div>  
            <div class="col-md-3">
                <div class="form-group">
                    <label>Select Section</label>
                    <select class="form-control" name="sectionid" id="sectionId" >
                    		<option value="">Select Section</option>
					</select>      
                </div>    
            </div> 

            <div class="col-md-3">
                <div class="form-group">
                    <label>Select Subject</label>
                    <select class="form-control" name="subjectId" id="">
							<option value="">Select Subject</option>
					</select>      
                </div>    
            </div>              
            <div class="col-md-2 col-md-offset-10">
                <div class="form-group">
                	<label></label>
                    <button type="submit" name="submit" class="btn btn-success form-control" style="margin-top: -25px;">
                    <i class="fa fa-sign-in" aria-hidden="true"></i>	
                	<b>Take Attendance</b></button>
                </div>    
            </div>    
        </div>
    </form> -->

<?php
	if(isset($_POST["submit"])){ 
		$classid= $_POST["classid"];
		$sessionid = $_POST["sessionid"];
		$sectionid = $_POST["sectionid"];
		$date = $_POST["date"];

		$student = Yii::$app->db->createCommand("SELECT sed.std_enroll_detail_id ,sed.std_enroll_detail_std_id FROM std_enrollment_detail as sed INNER JOIN std_enrollment_head as seh ON seh.std_enroll_head_id = sed.std_enroll_detail_head_id WHERE seh.class_name_id = '$classid' AND seh.session_id = '$sessionid' AND seh.section_id = '$sectionid'")->queryAll();
		?>
	<div class="container-fluid" style="margin-top: -30px">
		<hr>
		<form method="POST" action="student-attendance">
			<div class="row">
				<div class="col-md-8">
					<table width="100%" class="table table-responsive table-condensed table-hover">
						<tr class="label-success" style="color: white;"> 
							<th>Sr No</th>
							<th>RollNo</th>
							<th>Student Name</th>
							<th class="text-center">Attendance</th>
						</tr>
						
						<?php $length = count($student);
						//$stdId = array(); 
						for( $i=0; $i<$length; $i++) { ?>
							<tr>
								<td><?php echo $i+1 ?></td>
								<td><?php echo $student[$i]['std_enroll_detail_std_id'] ?></td>
								<?php $stdId = $student[$i]['std_enroll_detail_std_id'];
									  $stdName = Yii::$app->db->createCommand("SELECT std_name FROM std_personal_info  WHERE std_id = '$stdId'")->queryAll();?>
								<td><?php echo $stdName[0]['std_name'] ?></td>
								<td align="center">
									<input type="radio" name="std<?php echo $i+1?>" value="P" checked="checked"/> <b  style="color: green">Present </b> &nbsp; &nbsp;| &nbsp; 
									<input type="radio" name="std<?php echo $i+1?>" value="A" /> <b style="color: red">Absent </b> &nbsp; &nbsp;| &nbsp; 
									<input type="radio" name="std<?php echo $i+1?>" value="L" /><b style="color: #F7C564;"> Leave</b>
								</td>
							</tr>
					<?php
						$stdAttendId[$i] = $stdId;
						//closing for loop
						}
					?>
					</table>
				</div>
				<div class="row">
					<div class="col-md-4">
						
						<?php 
							// Select Class Name
							$className = Yii::$app->db->createCommand("SELECT class_name FROM std_class_name WHERE class_name_id = '$classid'")->queryAll();
							// Select Section 
							$sessionName = Yii::$app->db->createCommand("SELECT session_name FROM std_sessions WHERE session_id = '$sessionid'")->queryAll();
							// Select Section
							$sectionName = Yii::$app->db->createCommand("SELECT section_name FROM std_sections WHERE section_id = '$sectionid'")->queryAll();
						?>

						<table width="100%" class="table table-responsive table-bordered table-responsive table-condensed table-hover">
							<tr class="label-success" style="color: white;"> 
								<td align="center" colspan="2"><b>Class Info</b></td>
							</tr>
							<tr>
								<th>Date</th>
								<td><?php echo $date; ?></td>
							</tr>
							<tr>
								<th>Class</th>
								<td><?php echo $className[0]['class_name']; ?></td>
							</tr>
							<tr>
								<th>Session</th>
								<td><?php echo $sessionName[0]['session_name']; ?></td>
							</tr>
							<tr>
								<th>Section </th>
								<td><?php echo $sectionName[0]['section_name']; ?></td>
							</tr>
						</table>
					</div>
				</div>
			</div>
			<hr>

			<div class="row">
				<div class="col-md-2 col-md-offset-5">
					<button type="submit" name="save" class="btn btn-success form-control"><i class="glyphicon glyphicon-saved"></i>
						<b>Save Attendance</b></button>
				</div>
			</div>

			<div class="col-md-2">
	                <div class="form-group">
	                	<?php foreach ($stdAttendId as $value) {
	                		echo '<input type="hidden" name="stdAttendance[]" value="'.$value.'">';
	                	}
	                	?>
	                	<input type="hidden" name="length" value="<?php echo $length; ?>">
	                	<input type="hidden" name="classid" value="<?php echo $classid; ?>">
	                	<input type="hidden" name="sessionid" value="<?php echo $sessionid; ?>">
	                	<input type="hidden" name="sectionid" value="<?php echo $sectionid; ?>">
	                	<input type="hidden" name="date" value="<?php echo $date; ?>">
	                </div>    
	        </div>
	    </form> 
		<?php 
		// closing of if isset
			} ?>	
	</div>
	<!-- container-fluid close -->	

	<?php 	
		if (isset($_POST["save"])) {
				$classid = $_POST["classid"];
				$sessionid = $_POST["sessionid"];
				$sectionid = $_POST["sectionid"];
				$date = $_POST["date"];
				$length = $_POST["length"];
				$stdAttendId = $_POST["stdAttendance"];
				for($i=0; $i<$length;$i++){
					$q=$i+1;
					$std = "std".$q;
					$status[$i] = $_POST["$std"];
				}
				
				//var_dump($status);
				for($i=0; $i<$length; $i++){
					$attendance = Yii::$app->db->createCommand()->insert('std_attendance',[
						'teacher_id' => $teacherId[0]['emp_id'],
						'class_name_id' => $classid,
						'session_id'=> $sessionid,
						'section_id'=> $sectionid,
						'date' => $date,
						'student_id' => $stdAttendId[$i],
						'status' => $status[$i],
					])->execute();
				}
		}
	 ?>
	<!-- attendance model start -->
	<div class="modal fade">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">
                	<h2>Class Information</h2>
                </h4>
              </div>
              <div class="modal-body">
                <table class="table table-bordered table-hover">
                	<thead>
                		<tr>
                			<th>Class: </th>
                			<td><?php echo $CLASSName[0]['class_name']; ?></td>
                		</tr>
                		<tr>
                			<th>Session: </th>
                			<td><?php echo $sessName[0]['session_name']; ?></td>
                		</tr>
                		<tr>
                			<th>Section: </th>
                			<td><?php echo $secName[0]['section_name']; ?></td>
                		</tr>
                		<tr>
                			<th>Date: </th>
                			<td>
                				<form method="post">
                					<input class="form-control" readonly="readonly" type="text" name="" value="<?php echo date("d/m/y"); ?>">
                				</form>
                			</td>
                		</tr>
                	</thead>
                </table>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
	<!-- attendance model close -->
</body>
</html>
<?php
$url = \yii\helpers\Url::to("std-attendance/fetch-section");

$script = <<< JS
$('#classId').on('change',function(){
   var classId = $('#classId').val();
   $.ajax({
        type:'post',
        data:{class_Id:classId},
        url: "$url",

        success: function(result){
            var jsonResult = JSON.parse(result.substring(result.indexOf('['), result.indexOf(']')+1));
            var options = '';
            $('#sessionId').empty();
            $('#sessionId').append("<option>"+"Select Session"+"</option>");
            for(var i=0; i<jsonResult.length; i++) { 
		        options += '<option value="'+jsonResult[i].session_id+'">'+jsonResult[i].session_name+'</option>';
		    }
		    // Append to the html
		    $('#sessionId').append(options);
        }         
    });       
});

$('#sessionId').on('change',function(){
	var sessionId = $('#sessionId').val();
	var classId = $('#classId').val();

	$.ajax({
        type:'post',
        data:{class_Id:classId,session_Id:sessionId},
        url: "$url",

        success: function(result){
        var jsonResult = JSON.parse(result.substring(result.indexOf('['), result.indexOf(']')+1));
            var options = '';
            $('#sectionId').empty();
            $('#sectionId').append("<option>"+"Select Section"+"</option>");
            for(var i=0; i<jsonResult.length; i++) { 
		        options += '<option value="'+jsonResult[i].section_id+'">'+jsonResult[i].section_name+'</option>';
		    }
		    // Append to the html
		    $('#sectionId').append(options);
        }           
    });       
});

$('#sectionId').on('change',function(){
	var classId = $('#classId').val();
	var sessionId = $('#sessionId').val();
	var sectionId = $('#sectionId').val();

	$.ajax({
        type:'post',
        data:{class_Id:classId,session_Id:sessionId,section_Id:sectionId},
        url: "$url",

        success: function(result){
        console.log(result);
      
         }           
    });       
});


$('#attendance').change(function(){

  
  $('.modal').modal('show');

});

JS;
$this->registerJs($script);
?>
</script>