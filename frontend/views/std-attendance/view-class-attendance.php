<!DOCTYPE html>
<html>
<head>
	<title>Class Attendance</title>
</head>
<body>

    <form  action = "class-attendance" method="POST" style="margin-top: -35px">
        <h1 class="well well-sm text" align="center">Attendance</h1>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <input type="hidden" name="_csrf" class="form-control" value="<?=Yii::$app->request->getCsrfToken()?>">          
                </div>    
            </div>    
        </div>
        <div class="row">
            <?php
                $empEmail = Yii::$app->user->identity->email;
                $empId = Yii::$app->db->createCommand("SELECT emp.emp_id FROM emp_info as emp WHERE emp.emp_email = '$empEmail'")->queryAll();
                $teacher_id = $empId[0]['emp_id'];
                $classId = Yii::$app->db->createCommand("SELECT DISTINCT d.class_id FROM teacher_subject_assign_detail as d INNER JOIN teacher_subject_assign_head as h ON d.teacher_subject_assign_detail_head_id = h.teacher_subject_assign_head_id WHERE h.teacher_id = '$teacher_id'")->queryAll();
            ?>
            <div class="col-md-3">
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
            <div class="col-md-2 col-md-offset-10">
                <div class="form-group">
                    <label></label>
                    <button type="submit" name="submit" class="btn btn-success form-control" style="margin-top: -25px;">
                    <i class="fa fa-sign-in" aria-hidden="true"></i>    
                    <b>View Attendance</b></button>
                </div>    
            </div>    
        </div>
    </form>

 <?php
    if(isset($_POST["submit"])){ 
        $classid= $_POST["classid"];
        $sessionid = $_POST["sessionid"];
        $sectionid = $_POST["sectionid"];

        //Select studnet roll no and name
        $student = Yii::$app->db->createCommand("SELECT sed.std_enroll_detail_id ,sed.std_enroll_detail_std_id, sed.std_roll_no FROM std_enrollment_detail as sed INNER JOIN std_enrollment_head as seh ON seh.std_enroll_head_id = sed.std_enroll_detail_head_id WHERE seh.class_name_id = '$classid' AND seh.session_id = '$sessionid' AND seh.section_id = '$sectionid'")->queryAll();
        $studentLength = count($student);

        //creating array for student attendance
        $attendanceArr = array();
        for( $sId=0; $sId<$studentLength; $sId++) {
            $stdId = $student[$sId]['std_enroll_detail_std_id'];
            $attendance = Yii::$app->db->createCommand("SELECT subject_id,CAST(date AS DATE),status,student_id FROM std_attendance WHERE class_name_id = '$classid' AND session_id = '$sessionid' AND section_id = '$sectionid' AND student_id = '$stdId' ")->queryAll();
            $attendanceArr[$sId] = $attendance;
        }
        for($z=0; $z<$studentLength; $z++){
            for ($y=0; $y<15; $y++){
            }
        }
        // foreach ($attendanceArr as $key => $value) {
        //     var_dump($value);
        //     echo "<br>";
        // }
        // Selected Class Name
        $className = Yii::$app->db->createCommand("SELECT class_name FROM std_class_name WHERE class_name_id = '$classid'")->queryAll();
        // get Sbjects for selected class
        $subjectComb = Yii::$app->db->createCommand("SELECT std_subject_name FROM std_subjects WHERE class_id = '$classid'")->queryAll();
        $subComb = $subjectComb[0]['std_subject_name'];
        $singleSubject = explode(',', $subComb);
        $subjectlength = count($singleSubject);
        $subjectId = array();
        $subjectAlias = array();
        foreach ($singleSubject as $key => $subj) {
        $subAls = Yii::$app->db->createCommand("SELECT subject_id, subject_alias FROM subjects WHERE subject_name like '%$subj%'")->queryAll();
                
        $subjectAlias[$key] = $subAls[0]['subject_alias'];
        $subjectId[$key] = $subAls[0]['subject_id'];
        }
        //get current month and date
        $currentMonth =date('F Y');
        $m = date('m-Y');
        $lastDateOfMonth = date("Y-m-t", strtotime($currentMonth));
        $lastDate = explode('-', $lastDateOfMonth);
        $lDate = $lastDate[2];

        $temp = $lDate / 7;
        if($temp == 4){
            $rowCount = $temp;
        } else {
            $rowCount = 5;
        }
        $d=0;

        // getting sunday of the current month....
        function getSundays($m){ 
            $date = "$m-01";
            $first_day = date('N',strtotime($date));
            $first_day = 7 - $first_day + 1;
            $last_day =  date('t',strtotime($date));
            $days = array();
            for($i=$first_day; $i<=$last_day; $i=$i+7 ){
                $days[] = $i;
            }
            return  $days;
        }

        $days = getSundays(2016,04);
        print_r($days);
        ?> 

<div class="container-fluid">
	<div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header label-success">
              <h3 class="box-title"><?php echo $className[0]['class_name']; ?></h3>
              <h3 class="box-title" style="float: right;"><?php echo "Attendance ( ".$currentMonth." )"; ?></h3>
            </div>
            <!-- /.box-header -->
            <?php for ($row=0; $row <$rowCount ; $row++) {  ?>
            <div class="box-body table-responsive no-padding">
                
              <table class="table table-hover table-bordered table-striped">
            
                <tr>
                  	<th rowspan="2">Sr<br>#</th>
					<th rowspan="2">Roll<br>#</th>
					<th rowspan="2">Student<br>Name</th>
					<?php 
                        $countDate=0;
                        for ($date=1; $date <= 7 ; $date++) { 
                             $d++;
                             if ($d <= $lDate) {
                                echo "<th colspan='6' style='text-align: center;'>$d-$m</th>";  
                                $countDate++;
                             }
                        }
					?>
                </tr>
                <tr>
                	<?php 
                    for ($r=0; $r <$countDate ; $r++) { 
                        //loop to print subjects
                		for ($s=0; $s <$subjectlength ; $s++) { ?>
						<th style='padding: 1px 5px'><?php echo $subjectAlias[$s]; ?></th>
					<?php	
                        }
                    } 
                	?>
                </tr>

                <?php   for( $std=0; $std<$studentLength; $std++) { ?>
                            <tr>
                                <td><?php echo $std+1; ?></td>
                                <td><?php echo $student[$std]['std_roll_no']; ?></td>
                                <?php $stdId = $student[$std]['std_enroll_detail_std_id'];
                                      $stdName = Yii::$app->db->createCommand("SELECT std_name FROM std_personal_info  WHERE std_id = '$stdId'")->queryAll(); 
                                      
                                      $attendanceCount = count($attendance);
                                      $attSubject = $attendance[0]['subject_id'];
                                      $subAls = Yii::$app->db->createCommand("SELECT subject_alias FROM subjects WHERE subject_id = '$attSubject' ")->queryAll();
                                      $subjAlias = $subAls[0]['subject_alias'];
                                      
                                var_dump($attendanceArr[$std][0]['student_id']);
                                ?>
                                <td><?php echo $stdName[0]['std_name']; ?></td>
                                <?php for ($k=1; $k <=$countDate ; $k++) {
                                            for ($j=0; $j<$subjectlength ; $j++) {  
                                    ?>
                                    <td>
                                        <?php 
                                            if ($subjectAlias[$j] == $subjAlias) {

                                            }
                                        ?>
                                    </td>

                                <?php       // end of j loop
                                            } 
                                    //end of k loop      
                                    } ?>
                        </tr>
                    <?php //end of std loop 
                        } ?> 
                
              </table>
                    
              
            <?php 
                    } ?>
            <!-- /.box-body -->
          </div>
          <hr>
          <div class="row">
                <div class="col-md-5">
                  <table class="table-bordered table table-condensed">
                    <tr class="label-success">
                        <th colspan="3" class="text-center">Lectures</th>
                    </tr>
                    <tr>
                        <th>Previous Lectures</th>
                        <th>Current Lectures</th>
                        <th>Total Lectures</th>
                    </tr>
                    <tr align="center">
                        <td>24</td>
                        <td>24</td>
                        <td>48</td>
                    </tr>       
                  </table>
                </div>
                <div class="col-md-6 col-md-offset-1">
                  <table class="table-bordered table table-condensed">
                    <tr class="label-success">
                        <th colspan="4" class="text-center">Attendance</th>
                    </tr>
                    <tr>
                        <th>Previous Percentage</th>
                        <th>Month Attendance</th>
                        <th>Total</th>
                        <th>% Percentage</th>
                    </tr>
                    <tr align="center">
                        <td>90%</td>
                        <td>- - -</td>
                        <td>- - -</td>
                        <td>- - -</td>
                    </tr>       
                  </table>
                </div>
              </div>

              <hr>

            </div>
          <!-- /.box -->
        </div>
    </div>
    <?php 
    // closing of if isset
     } ?>
</div>
<!-- container-fluid close -->
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
                options += '<option value="'+ jsonResult[i].section_id +'">'+ jsonResult[i].section_name +'</option>';
            }
            // Append to the html
            $('#sectionId').append(options);
        }           
    });       
});

// $('#sectionId').on('change',function(){
//     var clsId = $('#classId').val();
//     var sessId = $('#sessionId').val();
//     var sectId = $('#sectionId').val();
    
//     $.ajax({
//         type:'post',
//         data:{class:clsId,session:sessId,section:sectId},
//         url: "$url",

//         success: function(result){
//         console.log(result);
//         var jsonResult = JSON.parse(result.substring(result.indexOf('{'), result.indexOf('}')+1));
            
//             var len =jsonResult[0].length;
//             var option = "";
//             $('#subjectId').empty();
//             $('#subjectId').append("<option>"+"Select Subject"+"</option>");
//             for(var i=0; i<len; i++)
//             {
//             var subId = jsonResult[0][i];
//             var subName = jsonResult[1][i];
            
//             option += '<option value="'+ subId +'">'+ subName +'</option>';
//             }
//             $('#subjectId').append(option);      
//          }           
//     });       
// });

JS;
$this->registerJs($script);
?>
</script>