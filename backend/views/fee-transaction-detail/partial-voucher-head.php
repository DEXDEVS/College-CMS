<!DOCTYPE html>
<html>
<head>
	<title>Voucher</title>
</head>
<body class="text">
<?php $id = $_GET['id']; ?>

<div class="container-fluid" style="margin-top: -30px;">
	<h1 class="well well-sm bg-navy" align="center" style="color: #3C8DBC;">Partial Voucher</h1>
    <!-- action="index.php?r=fee-transaction-detail/class-account-info" -->
    <form method="POST" action="partial-voucher-detail?id=<?php echo $id; ?>">
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
                    <label>Due Date</label>
                    <input type="date" class="form-control" name="due_date" required="">     
                </div>    
            </div> 
            <div class="col-md-3">
                <div class="form-group" style="margin-top: 24px;">
                    <button type="submit" name="submit" class="btn btn-success btn-flat btn-block"><i class="fa fa-check-square-o" aria-hidden="true"></i><b> Get voucher</b></button>
                </div>    
            </div>
        </div>
    </form>
    <!-- Header Form Close--> 
</body>
</body>
</html>