<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>Fee Vocher</title>
</head>
<body>
<div class="container-fluid" style="margin-top: -30px;">
	<h1 class="well well-sm bg-navy" align="center" style="color: #3C8DBC;">Manage Class Fee Accounts</h1>
    <!-- action="index.php?r=fee-transaction-detail/class-account-info" -->
    <form method="POST" action="index.php?r=fee-transaction-detail/class-account-info">
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
                    <select class="form-control" name="classid" id="classId" required="required">
                        <option>Select Class</option>
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
                    <select class="form-control" name="sessionid" id="sessionId" required="">
                            <option value="">Select Session</option>
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
                    <select class="form-control" name="sectionid" id="section" required="">
                            <option value="">Select Section</option>
                    </select>      
                </div>    
            </div>    
        </div>
        <div class="row">              
            <div class="col-md-3">
                <div class="form-group">
                    <label>Select Month</label>
                    <input type="month" class="form-control" name="monthYear" required="">   
                </div>    
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label>Installment No</label>
                    <select name="installment_no" class="form-control" required>
                        <option>Select Installment No</option>
                        <option value="1">1st Installment</option>
                        <option value="2">2nd Installment</option>
                        <option value="3">3rd Installment</option>
                        <option value="4">4th Installment</option>
                        <option value="5">5th Installment</option>
                        <option value="6">6th Installment</option>
                    </select>
                </div>    
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label>Date</label>
                    <input type="date" class="form-control" name="date" required="">     
                </div>    
            </div> 
            <div class="col-md-3">
                <div class="form-group" style="margin-top: 24px;">
                    <button type="submit" name="submit" class="btn btn-success btn-flat btn-block"><i class="fa fa-check-square-o" aria-hidden="true"></i><b> Get Class</b></button>
                </div>    
            </div>
        </div>
    </form>
    <!-- Header Form Close--> 
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
