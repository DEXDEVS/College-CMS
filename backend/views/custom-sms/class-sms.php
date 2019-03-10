
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Class SMS</title>
	<script type="text/javascript" src="jquery/jquery.js"></script>
	<link rel="stylesheet" type="text/css" href="jquery/bootstrap.min.css">
  <link rel="stylesheet" href="jquery/select2.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="jquery/AdminLTE.min.css">
</head>
<body>
<div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <br>
              <h4>SMS to<br> Whole Class</h4>

              <p></p>
            </div>
            <div class="icon">
              <i class="fa fa-comments-o"></i>
            </div>
            <a href="./std-personal-info" class="small-box-footer">Click here to send SMS <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
             <br>
              <h4>SMS to<br> Multiple Classes </h4>

              <p></p>
            </div>
            <div class="icon">
              <i class="fa fa-comments"></i>
            </div>
            <a href="./emp-info" class="small-box-footer">Click here to send SMS <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
             	<br>
              <h4>SMS to<br> Whole Sessions</h4>

              <p></p>
            </div>
            <div class="icon">
              <i class="fa fa-comments-o"></i>
            </div>
            <a href="#" class="small-box-footer">Click here to send SMS <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
            	<br>
              <h4>SMS to <br> Multiple Sessions</h4>
              <p></p>
            </div>
            <div class="icon">
              <i class="fa fa-comments" style="font-size: 70px;"></i>
            </div>
            <a href="#" class="small-box-footer">Click here to send SMS <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->

	<div class="row">
      	<div class="col-md-6">
          	<div class="box box-success collapsed-box box-warning box-solid">
            	<div class="box-header with-border">
            		<i class="fa fa-comments-o"></i>
	              	<h3 class="box-title">SMS to Class</h3>

	              	<div class="box-tools pull-right">
	                	<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
	                	</button>
	              	</div>
	              	<!-- /.box-tools -->
            	</div>
	            <!-- /.box-header -->
	            <div class="box-body">
	              <form method="post">
	              	<div class="form-group">
	              		<select class="form-control" name="classID" id="numbers">
	              			<option>Slect class</option>
	              		<?php 
	              		// get `class_name_id` from `std_enrollment_head`
	              		$classIds = Yii::$app->db->createCommand("SELECT class_name_id
	              			FROM std_enrollment_head")->queryAll();
	              		$count = count($classIds);
	              		
	              		for ($i=0; $i <$count ; $i++) { 
	              		$classID = $classIds[$i]['class_name_id'];

	              		// getting `class_name_id` and `std__id` from `std_enrollment_head` and `std_enrollment_detail`
	              		$classInfo = Yii::$app->db->createCommand("SELECT seh.class_name_id,sed.std_enroll_detail_std_id
	              			FROM std_enrollment_head as seh
    						INNER JOIN std_enrollment_detail as sed
    						ON seh.std_enroll_head_id = sed.std_enroll_detail_head_id 
    						WHERE seh.class_name_id = '$classID'")->queryAll();

	              		$class_name_ID 	  = $classInfo[0]['class_name_id'];
	              		$classStudentId = $classInfo[0]['std_enroll_detail_std_id'];

	              		print_r($classInfo);

	              		$stdNumbers = Yii::$app->db->createCommand("SELECT std_contact_no FROM std_personal_info WHERE std_id  = '$classStudentId'" )->queryAll();
	              		


	              		// gettting `class_name` from `std_class_name`
	              		$classNames = Yii::$app->db->createCommand("SELECT class_name,class_name_id
	              			FROM std_class_name WHERE class_name_id  = '$class_name_ID'" )->queryAll();
	              		
	              		 ?>
	              			
              			<?php 
              			foreach ($classNames as $key => $value) { ?>
		          			<option value="<?php echo $value['class_name_id']; ?>">
		          				<?php echo $value['class_name']; ?>
		          			</option>
	              		<?php 
		              	}
		              	// close foreach loop 
		              	} 
		              	// close for loop
		              	?>
	              		</select>
	              	</div>
	              	<div class="form-group">
	              		<label>SMS Content</label>
	              		<!-- <textarea rows="10" class="form-control" id="message"></textarea>
	              		<p>
					      <span><b>NOTE:</b> 160 characters = 1 SMS</span>
					        <span id="remaining" class="pull-right">160 characters remaining </span>
					      <span id="messages" style="text-align: center;">/ Count SMS(0)</span>
					      <input type="text" value="" id="count"><br>
					      <input type="text" value="" id="sms" style="border: none; color: green; font-weight: bold;">
					    </p> -->
	              	</div>
	              	<button type="submit" name="send" class="btn btn-success btn-block btn-flat">Send SMS</button>
	              </form>
	            </div>
            	<!-- /.box-body -->
          	</div>
		    <!-- /.box -->
		</div>
		<div class="col-md-6">
          	<div class="box box-primary collapsed-box box-solid">
            	<div class="box-header with-border">
            		<i class="fa fa-comments"></i>
	              	<h3 class="box-title">SMS to Multiple Classes</h3>

	              	<div class="box-tools pull-right">
	                	<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
	                	</button>
	              	</div>
	              	<!-- /.box-tools -->
            	</div>
	            <!-- /.box-header -->
	            <div class="box-body">
	              <form method="post">
	              	<div class="form-group">
	              		<label>Multiple</label>
			            <select class="form-control select2" multiple="multiple" data-placeholder="Select a State" id="std_id" style="width: 100%;">
			              <option>Alabama</option>
			              <option>Alaska</option>
			              <option>California</option>
			              <option>Delaware</option>
			              <option>Tennessee</option>
			              <option>Texas</option>
			              <option>Washington</option>
			            </select>
	              	</div>
	              	<div class="form-group">
	              		<label>SMS Content</label>
	              		<textarea name="" rows="10" class="form-control">
	              			
	              		</textarea>
	              	</div>
	              	<button type="submit" name="send" class="btn btn-primary btn-block btn-flat">Send SMS</button>
	              </form>
	            </div>
            	<!-- /.box-body -->
          	</div>
		    <!-- /.box -->
		</div>
    </div>

    <div class="row">
      	<div class="col-md-6">
          	<div class="box box-info collapsed-box box-solid">
            	<div class="box-header with-border">
            		<i class="fa fa-comments-o"></i>
	              	<h3 class="box-title">SMS to Session</h3>

	              	<div class="box-tools pull-right">
	                	<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
	                	</button>
	              	</div>
	              	<!-- /.box-tools -->
            	</div>
	            <!-- /.box-header -->
	            <div class="box-body">
	              <form method="post">
	              	<div class="form-group">
	              		<select class="form-control">
	              			<option>Slect class</option>
	              			<option>Class 1</option>
	              			<option>Class 1</option>
	              			<option>Class 1</option>
	              			<option>Class 1</option>
	              		</select>
	              	</div>
	              	<div class="form-group">
	              		<label>SMS Content</label>
	              		<textarea name="" rows="10" class="form-control">
	              			
	              		</textarea>
	              	</div>
	              	<button type="submit" name="send" class="btn btn-info btn-block btn-flat">Send SMS</button>
	              </form>
	            </div>
            	<!-- /.box-body -->
          	</div>
		    <!-- /.box -->
		</div>
		<div class="col-md-6">
          	<div class="box box-warning collapsed-box box-solid">
            	<div class="box-header with-border">
            		<i class="fa fa-comments"></i>
	              	<h3 class="box-title">SMS to Multiple Sessions</h3>

	              	<div class="box-tools pull-right">
	                	<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
	                	</button>
	              	</div>
	              	<!-- /.box-tools -->
            	</div>
	            <!-- /.box-header -->
	            <div class="box-body">
	              <form method="post">
	              	<div class="form-group">
	              		<select class="form-control">
	              			<option>Slect class</option>
	              			<option>Class 1</option>
	              			<option>Class 1</option>
	              			<option>Class 1</option>
	              			<option>Class 1</option>
	              		</select>
	              	</div>
	              	<div class="form-group">
	              		<label>SMS Content</label>
							
	              	</div>
	              	<button type="submit" name="send" class="btn btn-warning btn-block btn-flat">Send SMS</button>
	              </form>
	            </div>
            	<!-- /.box-body -->
          	</div>
		    <!-- /.box -->
		</div>
    </div>	

<?php 
    global $countNumbers;
    $countNumbers = 10; 
?>

<script>
	$(document).ready(function(){
		$('#numbers').change(function(){
			var number = $('#numbers').val();
			alert(number);
		})

	})
</script>
<!-- <script src="jquery/jquery.min.js"></script>

<script src="jquery/select2.full.min.js"></script>

<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    
    
    
  })
</script> -->
<script>


// $('#class_id').on('change',function(){
//    var class_id = $('#class_id').val();
//    console.log(class_id);
//    alert(class_id);
	   
//    $.ajax({
//         type:'post',
//         data:{class_Id:class_id},
//         url: "$url",
//         success: function(result){ 
//         console.log(result);  
//             var jsonResult = JSON.parse(result.substring(result.indexOf('['), result.indexOf(']')+1));
//             var options = '';
//             $('#subjectId').empty();
//             $('#subjectId').append("<option>"+"Select Subject combination"+"</option>");
//             for(var i=0; i<jsonResult.length; i++) { 
//                 options += '<option value="'+jsonResult[i].std_subject_id+'">'+jsonResult[i].std_subject_name+'</option>';
//             }
//             // Append to the html
//             $('#subjectId').append(options);
//         }         
//     }); 
// });

  $(document).ready(function(){
      var $remaining = $('#remaining'),
          $messages = $remaining.next();
      var numbers = '<?php echo $countNumbers; ?>';
      $('#message').keyup(function(){
          var chars = this.value.length,
            messages = Math.ceil(chars / 160),
            remaining = messages * 160 - (chars % (messages * 160) || messages * 160);
          $messages.text('/ Count SMS (' + messages + ')');
          $messages.css('color', 'red');
          $remaining.text(remaining + ' characters remaining');
          
          $('#count').val(messages);
        var countSMS = $('#count').val();
          var sms = parseInt(countSMS * numbers);
          $('#sms').val("Your Consumed SMS: (" + sms+ ")");
      });
  });
</script>


</body>
</html>