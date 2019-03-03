<!DOCTYPE html>
<html>
<head>
	<title>Class Attendance</title>
</head>
<body>

<div class="container-fluid">
	<div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header label-success">
              <h3 class="box-title">FSC-Part-1 (Pre-Engineering)</h3>
              <h3 class="box-title" style="float: right;">Monthly Attendance (January - 2019)</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover table-bordered table-striped">
                <tr>
                  	<th rowspan="2">Sr<br>#</th>
					<th rowspan="2">Roll<br>#</th>
					<th rowspan="2">Student<br>Name</th>
					<?php 
						for ($i=1; $i <=7 ; $i++) { 
							echo "<th colspan='6' style='text-align: center;'>$i-01-2019</th>";
						} 
					?>
                </tr>
                <tr>
                	<?php 
                		for ($i=1; $i <=7 ; $i++) { 
						echo 
							"<th style='padding: 1px 5px'>P</th>
		                	<th style='padding: 1px 5px'>C</th>
		                	<th style='padding: 1px 5px'>M</th>
		                	<th style='padding: 1px 5px'>E</th>
		                	<th style='padding: 1px 5px'>U</th>
		                	<th style='padding: 1px 7.6px'>I</th>";
						} 
                	?>
                </tr>
                <tr>
                	<th>1</th>
                	<td>01</td>
                	<td>Nadia</td>
                	<?php 
                		for($i=0; $i<42; $i++){
                			echo "<td></td>";
                		}
                	?>
                </tr>
                <tr>
                	<th>2</th>
                	<td>02</td>
                	<td>Kinza</td>
                	<?php 
                		for($i=0; $i<42; $i++){
                			echo "<td></td>";
                		}
                	?>
                </tr>
                <tr>
                	<th>3</th>
                	<td>03</td>
                	<td>Ali</td>
                	<?php 
                		for($i=0; $i<42; $i++){
                			echo "<td></td>";
                		}
                	?>
                </tr>
                <tr>
                	<th>4</th>
                	<td>04</td>
                	<td>Sajid</td>
                	<?php 
                		for($i=0; $i<42; $i++){
                			echo "<td></td>";
                		}
                	?>
                </tr>
                <tr>
                	<th>5</th>
                	<td>05</td>
                	<td>Adnan</td>
                	<?php 
                		for($i=0; $i<42; $i++){
                			echo "<td></td>";
                		}
                	?>
                </tr>
                <tr>
                	<th>6</th>
                	<td>06</td>
                	<td>Qasim</td>
                	<?php 
                		for($i=0; $i<42; $i++){
                			echo "<td></td>";
                		}
                	?>
                </tr>
                <tr>
                	<th>7</th>
                	<td>07</td>
                	<td>Rehan</td>
                	<?php 
                		for($i=0; $i<42; $i++){
                			echo "<td></td>";
                		}
                	?>
                </tr>
                <tr>
                	<th>8</th>
                	<td>08</td>
                	<td>Zeeshan</td>
                	<?php 
                		for($i=0; $i<42; $i++){
                			echo "<td></td>";
                		}
                	?>
                </tr>
                <tr>
                	<th>9</th>
                	<td>09</td>
                	<td>Shahzaib</td>
                	<?php 
                		for($i=0; $i<42; $i++){
                			echo "<td></td>";
                		}
                	?>
                </tr>
                <tr>
                	<th>10</th>
                	<td>010</td>
                	<td>Muneeb</td>
                	<?php 
                		for($i=0; $i<42; $i++){
                			echo "<td></td>";
                		}
                	?>
                </tr>
              </table>

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
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
    </div>
</div>
</body>
</html>