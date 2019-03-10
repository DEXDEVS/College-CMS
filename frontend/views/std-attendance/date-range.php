<?php 

    if(isset($_GET['sub_id'])){
        $sub_id = $_GET['sub_id'];  
        $class_id = $_GET['class_id'];
        $emp_id = $_GET['emp_id'];   
?>

<!DOCTYPE html>
<html>
<head>
  <title>View Attendance</title>

</head>
<body>
  <form  action = "date-range" method="POST" style="margin-top: -35px">
        <h1 class="well well-sm text" align="center">View Attendance</h1>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <input type="hidden" name="_csrf" class="form-control" value="<?=Yii::$app->request->getCsrfToken()?>">          
                </div>    
            </div>    
        </div>
        <div class="row">
            <div class="col-md-3">
		       <label>Start Date:</label>
		        <div class="input-group">
		          	<div class="input-group-addon">
		            	<i class="fa fa-calendar" style="color: #3C8DBC"></i>
		          	</div>
		          <input type="date" class="form-control" name="start_date">
		        </div>
		    </div>
		    <div class="col-md-3">
		    	<label>End Date:</label>
		        <div class="input-group">
		          	<div class="input-group-addon">
		            	<i class="fa fa-calendar" style="color: #3C8DBC"></i>
		          	</div>
		          	<input type="date" class="form-control" name="end_date">
		        </div>
		    </div>
           
            <div class="col-md-2 col-md-offset-10">
                <div class="form-group">
                    <label></label>
                    <button type="submit" name="submit" class="btn btn-success form-control" style="margin-top: -25px;">
                    <i class="fa fa-sign-in" aria-hidden="true"></i>    
                    <b>View Attendance</b></button>
                </div>    
            </div> 
            <input type="hidden" name="sub_id" value="<?php echo $sub_id; ?>">
            <input type="hidden" name="class_id" value="<?php echo $class_id; ?>">
            <input type="hidden" name="emp_id" value="<?php echo $emp_id; ?>">
        </div>
    </form>
    <?php 
        }

    if(isset($_POST["submit"])){ 
        $sub_id = $_POST["sub_id"];
        $class_id = $_POST["class_id"];
        $emp_id = $_POST["emp_id"];
        $startDate = $_POST["start_date"];
        $endDate = $_POST["end_date"];

        $stDate = explode('-', $startDate);
        $enDate = explode('-', $endDate);

        $rangeLen = $enDate[2] - $stDate[2];

  //       list($y,$m,$d)=explode('-',$startDate);
		// $date2 = Date("Y-m-d", mktime(0,0,0,$m,$d+1,$y));
        // var_dump($rangeLen);
        //echo "<br>";
        //var_dump($enDate[2]);
        $students = Yii::$app->db->createCommand("SELECT seh.std_enroll_head_name,sed.std_enroll_detail_std_id,sed.std_enroll_detail_std_name, sed.std_roll_no
        FROM std_enrollment_detail as sed
        INNER JOIN std_enrollment_head as seh
        ON seh.std_enroll_head_id = sed.std_enroll_detail_head_id
        WHERE sed.std_enroll_detail_head_id = '$class_id'")->queryAll();
    
	    $countstd = count($students);
	    $subName = Yii::$app->db->createCommand("SELECT subject_name FROM subjects WHERE subject_id = '$sub_id'")->queryAll();

	    $classDetail = Yii::$app->db->createCommand("SELECT DISTINCT seh.class_name_id, seh.session_id, seh.section_id FROM std_enrollment_head as seh INNER JOIN teacher_subject_assign_detail as d ON d.class_id = seh.std_enroll_head_id WHERE d.class_id = '$class_id'")->queryAll();
	    $classnameid = $classDetail[0]['class_name_id'];
	    $sessionid = $classDetail[0]['session_id'];
	    $sectionid = $classDetail[0]['section_id'];
    
?> 
    <div class="row">
        <div class="col-md-12">
            <form method="POST" action="view-attendance">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <td align="center" colspan="4">
                            <b style="font-size: 30px;">Class Attendance - From: <?php echo $startDate." to ".$endDate; ?></b>
                        </td>
                    </tr>
                    <tr>
                        <th>Class:</th>
                        <td><?php echo $students[0]['std_enroll_head_name']; ?></td>
                        <th>Subject:</th>
                        <td><?php echo $subName[0]['subject_name']; ?></td>
                    </tr>
                    <tr style="background-color:#add8e6; ">
                        <th >Sr #.</th>
                        <th >Roll #.</th>
                        <th >Name</th>
                        <?php 
                        	for($i=$stDate[2]; $i<=$enDate[2]; $i++){
                        ?>
                        		<th><?php echo $i; ?></th>
                        <?php
                    		}
                        ?>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    for ($i=0; $i <$countstd ; $i++) { 
                     ?>
                    <tr>
                        <td><?php echo $i+1 ?></td>
                        <td><?php echo $students[$i]['std_roll_no']; ?></td>
                        <td><?php echo $students[$i]['std_enroll_detail_std_name'];?></td>
                            <?php 
                            $stdId = $students[$i]['std_enroll_detail_std_id'];
					        $atten = Yii::$app->db->createCommand("SELECT att.date, att.status FROM std_attendance as att WHERE att.teacher_id = '$emp_id' AND att.class_name_id = '$classnameid' AND att.session_id = '$sessionid' AND att.section_id = '$sectionid' AND att.subject_id = '$sub_id' AND att.student_id = '$stdId' AND CAST(date AS DATE) >= '$startDate' AND CAST(date AS DATE) <= '$endDate'")->queryAll();
					        $coun = count($atten);
	                        	for ($j=0; $j <$coun ; $j++) { 
		                        	$date1 = $atten[$j]['date'];
		                            $date2 = explode(' ', $date1);
		                            $date3 = $date2[0];
		                            $date4 = explode('-', $date3);
		                            $date5[$j] = $date4[2];

	                        		if($date5[$j] >= $stDate[2] && $date5[$j] <= $enDate[2]){
	                        ?>

	                                	<td> <?php echo $atten[$j]['status']; ?> </td>
	                        <?php
		                            } else {
		                    ?>
		                            <td><?php  echo 'N/A'; ?> </td>
		                    <?php
		                            }
                    			}
                        	?>
                    </tr>
                    
                    <?php
                    //closing for loop
                    } ?>
                </tbody>
                
                </form>
            </table>
        </div>
    </div>
<?php
//closing of ifisset
    }
?>


</body>
</html>
