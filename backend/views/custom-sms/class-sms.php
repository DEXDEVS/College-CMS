<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Class SMS</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
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
	              		<select class="form-control">
	              			<option>Select</option>
	              			<option value="">abc</option>
	              			<option value="">abc</option>
	              			<option value="">abc</option>
	              			<option value="">abc</option>
	              		</select>
	              	</div>
	              	<div class="form-group">
	              		<label>SMS Content</label>
	              		<textarea rows="10" class="form-control" id="message"></textarea>
	              		<p>
					      <span><b>NOTE:</b> 160 characters = 1 SMS</span>
					        <span id="remaining" class="pull-right">160 characters remaining </span>
					      <span id="messages" style="text-align: center;">/ Count SMS(0)</span>
					      <input type="hidden" value="" id="count"><br>
					      <input type="text" value="" id="sms" style="border: none; color: green; font-weight: bold;">
					      <input type="text" name="to" id="to">
					    </p>
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
	              		<select class="form-control">
	              			<option>Select</option>
	              			<option value="">abc</option>
	              			<option value="">abc</option>
	              			<option value="">abc</option>
	              			<option value="">abc</option>
	              		</select>
	              	</div>
	              	<div class="form-group">
	              		<label>SMS Content</label>
	              		<textarea name="" rows="10" class="form-control" id="message2"></textarea>
	              		<p>
					      <span><b>NOTE:</b> 160 characters = 1 SMS</span>
					        <span id="remaining2" class="pull-right">160 characters remaining </span>
					      <span id="messages2" style="text-align: center;">/ Count SMS(0)</span>
					      <input type="hidden" value="" id="count2"><br>
					      <input type="text" value="" id="sms2" style="border: none; color: green; font-weight: bold;">
					      <input type="text" name="to" id="to2">
					    </p>
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
	              			<option>Select</option>
	              			<option value="">abc</option>
	              			<option value="">abc</option>
	              			<option value="">abc</option>
	              			<option value="">abc</option>
	              		</select>
	              	</div>
	              	<div class="form-group">
	              		<label>SMS Content</label>
	              		<textarea name="" rows="10" class="form-control" id="message3"></textarea>
	              		<p>
					      <span><b>NOTE:</b> 160 characters = 1 SMS</span>
					        <span id="remaining3" class="pull-right">160 characters remaining </span>
					      <span id="messages3" style="text-align: center;">/ Count SMS(0)</span>
					      <input type="hidden" value="" id="count3"><br>
					      <input type="text" value="" id="sms3" style="border: none; color: green; font-weight: bold;">
					      <input type="text" name="to" id="to3">
					    </p>
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
	              			<option>Select</option>
	              			<option value="">abc</option>
	              			<option value="">abc</option>
	              			<option value="">abc</option>
	              			<option value="">abc</option>
	              		</select>
	              	</div>
	              	<div class="form-group">
	              		<label>SMS Content</label>
	              		<textarea name="" rows="10" class="form-control" id="message4"></textarea>
	              		<p>
					      <span><b>NOTE:</b> 160 characters = 1 SMS</span>
					        <span id="remaining4" class="pull-right">160 characters remaining </span>
					      <span id="messages4" style="text-align: center;">/ Count SMS(0)</span>
					      <input type="hidden" value="" id="count4"><br>
					      <input type="text" value="" id="sms4" style="border: none; color: green; font-weight: bold;">
					      <input type="text" name="to" id="to4">
					    </p>
	              	</div>
	              	<button type="submit" name="send" class="btn btn-warning btn-block btn-flat">Send SMS</button>
	              </form>
	            </div>
            	<!-- /.box-body -->
          	</div>
		    <!-- /.box -->
		</div>
    </div>	

</script>
<?php global $countNumbers;
$countNumbers = 10; ?>
<script>
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

</body>
</html>
<?php 
    global $count;
    $countNumbers = 10; 
?>

<?php
$url = \yii\helpers\Url::to("./fetch-numbers");

$script = <<< JS
// fetch student contact numbers indiviual class wise....
$('#selectClass').on('change',function(){
   	var selectClass = $('#selectClass').val();
 	alert(selectClass);
   	$.ajax({
        type:'post',
        data:{selectClass:selectClass},
        url: "$url",

        success: function(result){
        	
            var jsonResult = JSON.parse(result.substring(result.indexOf('{'), result.indexOf('}')+1));
	
           $('#to').val(jsonResult['std_contact_no']);
        }         
    });       
});
JS;
$this->registerJs($script);
?>

</script>
<script>
// textarea sms counter....
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
// textarea2 sms counter....
$(document).ready(function(){
    var $remaining = $('#remaining2'),
    $messages = $remaining.next();
    var numbers = '<?php echo $countNumbers; ?>';
    $('#message2').keyup(function(){
      	var chars = this.value.length,
        messages = Math.ceil(chars / 160),
        remaining = messages * 160 - (chars % (messages * 160) || messages * 160);
      	$messages.text('/ Count SMS (' + messages + ')');
      	$messages.css('color', 'red');
      	$remaining.text(remaining + ' characters remaining');
      
      	$('#count2').val(messages);
    	var countSMS = $('#count2').val();
      	var sms = parseInt(countSMS * numbers);
      	$('#sms2').val("Your Consumed SMS: (" + sms+ ")");
  	});
}); 
// textarea3 sms counter....
$(document).ready(function(){
    var $remaining = $('#remaining3'),
    $messages = $remaining.next();
    var numbers = '<?php echo $countNumbers; ?>';
    $('#message3').keyup(function(){
      	var chars = this.value.length,
        messages = Math.ceil(chars / 160),
        remaining = messages * 160 - (chars % (messages * 160) || messages * 160);
      	$messages.text('/ Count SMS (' + messages + ')');
      	$messages.css('color', 'red');
      	$remaining.text(remaining + ' characters remaining');
      
      	$('#count3').val(messages);
    	var countSMS = $('#count3').val();
      	var sms = parseInt(countSMS * numbers);
      	$('#sms3').val("Your Consumed SMS: (" + sms+ ")");
  	});
}); 
// textarea4 sms counter....
$(document).ready(function(){
    var $remaining = $('#remaining4'),
    $messages = $remaining.next();
    var numbers = '<?php echo $countNumbers; ?>';
    $('#message4').keyup(function(){
      	var chars = this.value.length,
        messages = Math.ceil(chars / 160),
        remaining = messages * 160 - (chars % (messages * 160) || messages * 160);
      	$messages.text('/ Count SMS (' + messages + ')');
      	$messages.css('color', 'red');
      	$remaining.text(remaining + ' characters remaining');
      
      	$('#count4').val(messages);
    	var countSMS = $('#count4').val();
      	var sms = parseInt(countSMS * numbers);
      	$('#sms4').val("Your Consumed SMS: (" + sms+ ")");
  	});
}); 
</script>