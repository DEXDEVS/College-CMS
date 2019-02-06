<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>Fee Vocher</title>
</head>
<body>
<div class="container-fluid" style="margin-top: -30px;">
	<h1 class="well well-sm" align="center">Generate Voucher</h1>
    <form  action = "index.php?r=fee-transaction-detail/voucher" method="POST">
    	<div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <input type="hidden" name="_csrf" class="form-control" value="<?=Yii::$app->request->getCsrfToken()?>">          
                </div>    
            </div>    
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label>Select Class</label>
                    <select class="form-control" name="classid" id="classId">
							<?php 
								$className = Yii::$app->db->createCommand("SELECT * FROM std_class_name where delete_status=1")->queryAll();
								    foreach ($className as  $value) { ?>	
									<option value="<?php echo $value["class_name_id"]; ?>">
										<?php echo $value["class_name"]; ?>	
									</option>
							<?php } ?>
					</select>      
                </div>    
            </div>  
            <div class="col-md-4">
                <div class="form-group">
                    <label>Select Session</label>
                    <select class="form-control" name="sessionid" id="sessionId">
							<?php 
								$sessionName = Yii::$app->db->createCommand("SELECT * FROM std_sessions where delete_status=1")->queryAll();
								
								  	foreach ($sessionName as  $value) { ?>	
									<option value="<?php echo $value["session_id"]; ?>">
										<?php echo $value["session_name"]; ?>	
									</option>
							<?php } ?>
					</select>      
                </div>    
            </div>  
            <div class="col-md-4">
                <div class="form-group">
                    <label>Select Section</label>
                    <select class="form-control" name="sectionid" id="section" >
                    		<option value="">Select Section</option>
					</select>      
                </div>    
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label>Select Month</label>
                    <input type="month" class="form-control" name="month">
                    <!-- <select class="form-control" name="month">
						<option value="1">January</option>
						<option value="2">Fabruary</option>
						<option value="3">March</option>
						<option value="4">April</option>
						<option value="5">May</option>
						<option value="6">June</option>
						<option value="7">July</option>
						<option value="8">August</option>
						<option value="9">September</option>
						<option value="10">October</option>
						<option value="11">November</option>
						<option value="12">December</option>
					</select>   -->    
                </div>    
            </div>    
            
            <div class="col-md-4">
                <div class="form-group">
                    <label>Issue Date</label>
                    <input type="date" name="issue_date" class="form-control">
                </div>    
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <label>Issue Date</label>
                    <input type="date" name="due_date" class="form-control">
                </div>    
            </div>

            <div class="col-md-8">
                <div class="form-group">
                    <label>Message</label>
                    <textarea rows="1" name="message" class="form-control"></textarea>
                </div>    
            </div>
		
			<div class="col-md-4" style="margin-top: 25px;">
                <div class="form-group">
                    <button type="submit" name="submit" class="btn btn-success btn-block btn-flat">
                        <i class="fa fa-check-square" aria-hidden="true"></i>
                        Generate Voucher
                    </button>
                </div>    
            </div>
		</div>
    </form>
</div>    
</body>
</html>

<?php
$url = \yii\helpers\Url::to("index.php?r=fee-transaction-detail/fetch-students");

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