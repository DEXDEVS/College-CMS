<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>Class Vocher</title>
</head>
<body>
<div class="container-fluid" style="margin-top: -30px;">
	<h1 class="well well-sm" align="center">Generate Class Fee Vouchers</h1>
    <form method="POST" action="index.php?r=fee-transaction-detail/voucher">
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
                            <option value="">Select Section</option>
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
                    <select class="form-control" name="month">
                        <option value="">Select Month</option>
                            <?php 
                                $month = Yii::$app->db->createCommand("SELECT month_name FROM month where delete_status=1")->queryAll();
                                
                                    foreach ($month as  $value) { ?>  
                                    <option value="<?php echo $value["month_id"]; ?>">
                                        <?php echo $value["month_name"]; ?>   
                                    </option>
                            <?php } ?>
                    </select>      
                </div>    
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label>Date</label>
                    <input type="date" class="form-control" name="date">     
                </div>    
            </div> 
            <div class="col-md-2 col-md-offset-1">
                <div class="form-group" style="margin-top: 24px;">
                    <button type="submit" name="submit" class="btn btn-info btn-flat btn-block">Get Class</button>
                </div>    
            </div>
        </div>
    </form>
    <!-- Header Form Close-->
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