<!DOCTYPE html>
<html>
<head>
	<title>Inquiry Report</title>
</head>
<body>
<div class="container-fluid" style="margin-top: -30px;">  
  <div class="row">
    <div class="col-md-12">
      <h2 class="well well-sm" align="center">Inquiry Report</h2>
    </div>
  </div>
  <div class="row">
    <form method="post" action="./inquiry-report-detail">
      <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <input type="hidden" name="_csrf" class="form-control" value="<?=Yii::$app->request->getCsrfToken()?>">          
                </div>    
            </div>    
        </div>
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
      <div class="col-md-3" style="margin-top: 25px">
        <button type="submit" name="submit" class="btn btn-success btn-flat">
          <i class="fa fa-sign-in"></i><b> Get Report</b>
        </button>
      </div>
    </form>    
  </div>
</div>
</body>
</html>