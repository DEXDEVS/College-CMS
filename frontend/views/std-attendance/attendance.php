<!DOCTYPE html>
<html>
<head>
	<title>Attendance</title>
</head>
<body>
	<form  action = "index.php?r=std-attendance/attendance" method="POST" style="margin-top: -35px">
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
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label>Select Class</label>
                    <select class="form-control" name="classid" id="classId">
							<?php 
								$className = Yii::$app->db->createCommand("SELECT * FROM std_class_name")->queryAll();
								
								  	foreach ($className as  $value) { ?>	
									<option value="<?php echo $value["class_name_id"]; ?>">
										<?php echo $value["class_name"]; ?>	
									</option>
							<?php } ?>
					</select>      
                </div>    
            </div>  
            <div class="col-md-3">
                <div class="form-group">
                    <label>Select Session</label>
                    <select class="form-control" name="sessionid" id="sessionId">
							<?php 
								$sessionName = Yii::$app->db->createCommand("SELECT * FROM std_sessions")->queryAll();
								
								  	foreach ($sessionName as  $value) { ?>	
									<option value="<?php echo $value["session_id"]; ?>">
										<?php echo $value["session_name"]; ?>	
									</option>
							<?php } ?>
					</select>      
                </div>    
            </div>  
            <div class="col-md-3">
                <div class="form-group">
                    <label>Select Section</label>
                    <select class="form-control" name="sectionid" id="section" >
                    		<option value="">Select Section</option>
					</select>      
                </div>    
            </div>              
            <div class="col-md-2 col-md-offset-10">
                <div class="form-group">
                	<label></label>
                    <button type="submit" name="submit" class="btn btn-info form-control" style="margin-top: -25px;">
                    <i class="fa fa-sign-in" aria-hidden="true"></i>	
                	<b>Get Class</b></button>
                </div>    
            </div>    
        </div>
    </form>

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
		<form method="POST" action="index.php?r=std-attendance/attendance">
			<div class="row">
				<div class="col-md-8 col-md-offset-2">
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
									<input type="radio" name="std<?php echo $i+1?>" value="L" /><b style="color: #F7C564;">Leave</b>
								</td>
							</tr>
					<?php
						$stdAttendId[$i] = $stdId;
						//closing for loop
						}
					?>
					</table>
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
				$techerEmail = Yii::$app->user->identity->email;
				$teacherId = Yii::$app->db->createCommand("SELECT emp.emp_id FROM emp_info as emp WHERE emp.emp_email = '$techerEmail'")->queryAll();

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
</body>
</html>
<?php
$url = \yii\helpers\Url::to("index.php?r=std-attendance/fetch-section");

$script = <<< JS
$('#sessionId').on('change',function(){
   var session_Id = $('#sessionId').val();
  
   $.ajax({
        type:'post',
        data:{session_Id:session_Id},
        url: "$url",

        success: function(result){
     
            var jsonResult = JSON.parse(result.substring(result.indexOf('['), result.indexOf(']')+1));
            var options = '';
            for(var i=0; i<jsonResult.length; i++) { 
		        options += '<option value="'+jsonResult[i].section_id+'">'+jsonResult[i].section_name+'</option>';
		    }
		    // Append to the html
		    $('#section').append(options);
        }         
    });       
});
JS;
$this->registerJs($script);
?>
</script>