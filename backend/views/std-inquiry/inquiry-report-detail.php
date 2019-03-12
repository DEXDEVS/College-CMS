<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Document</title>
</head>
<body>
  <?php
  if(isset($_POST["submit"])){
    $startDate = $_POST["start_date"];
    $endDate = $_POST["end_date"];
    $inquiryReport = Yii::$app->db->createCommand("SELECT * FROM std_inquiry WHERE std_inquiry_date >= '$startDate' AND std_inquiry_date <= '$endDate'")->queryAll();
    $session = $inquiryReport[0]['inquiry_session'];
?>

<div class="container-fluid" style="margin-top: -30px;">  
  <div class="row">
    <div class="col-md-12">
      <h2 class="well well-sm">Inquiry Report (<?php echo $session; ?>) <span style="float: right;">From: <?php echo $startDate." to ".$endDate;?></span>
        </h2>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <table class="table table-striped table-bordered table-responsive table-condensed">
        <tr class="label-primary">
          <th style="text-align: center;">Sr #</th> 
          <th>Inquiry Date</th>
          <th>Inquiry No</th> 
          <th>Student Name</th>
          <th>Father Name</th>
          <th>Student Contact No.</th>
          <th>Refered By</th>
          <th>Interested Class</th>
          <th>Previous Institute Name</th>
          <th style="text-align: center;">% age</th>
          <th>Status</th> 
        </tr>
        <?php 
            foreach($inquiryReport as $key => $item) { ?>
        <tr>
          <td style="text-align: center;"><b><?php echo $key+1; ?></b></td>
          <td><?php echo $item['std_inquiry_date'] ?></td>
          <td><?php echo $item['std_inquiry_no'] ?></td>
          <td><?php echo $item['std_name'] ?></td>
          <td><?php echo $item['std_father_name'] ?></td>
          <td><?php echo $item['std_contact_no'] ?></td>
          <td><?php echo $item['refrence_name'] ?></td>
          <td><?php echo $item['std_intrested_class'] ?></td>
          <td><?php echo $item['previous_institute'] ?></td>
          <td style="text-align: center;"><b><?php echo $item['std_percentage'] ?></b></td>
          <td><?php echo $item['inquiry_status'] ?></td>
        </tr>
        <?php 
          }
          // ending of foreach loop...
        }
        // ending of isset...
        ?>
      </table>
    </div>
  </div>
</div>
</body>
</html>