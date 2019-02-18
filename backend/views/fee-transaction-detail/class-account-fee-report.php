<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<!-- class fee account report start-->
<div class="row container-fluid">
	<div class="col-md-12">
		<h2 style="text-align: center;box-shadow: 1px 1px 1px 1px; padding: 5px;">
			Brookfield Group of Colleges<br>
			<p style="font-size: 20px;">Rahim Yar Khan</p>
		</h2>
		<div class="row">
			<div class="col-md-12">
				<table class="table table-bordered">
					<tr align="center">
						<td colspan="6" style="font-size: 20px;"><b><u>Class Fee Account Details</u></b></td>
					</tr>
					<tr align="center">
						<td><p><b>Class:</b></p></td>
						<td>Engineering-1</td>
						<td><p><b>Section:</b></p></td>
						<td>Section-1</td>
						<td><p><b>Session:</b></p></td>
						<td>2018-2020</td>
					</tr>
				</table>
			</div>
		</div>
		<table class="table table-bordered">
			<thead>
			<tr style="background-color:#337ab7;color: white;">
				<th>Sr.#</th>
				<th>Roll No.</th>
				<th>Name</th>
				<th>Class</th>
				<th>T.PKG</th>
				<th>1st Instll</th>
				<th>1st Paid</th>
				<th>2nd</th>
				<th>2nd Paid</th>
				<th>3rd</th>
				<th>3rd Paid</th>
				<th>4th</th>
				<th>4th Paid</th>
				<th>5th</th>
				<th>5th Paid</th>
				<th>G.Total</th>
				<th>Remain</th>
				<th>Status</th>
			</tr>
			</thead>
			<tbody>
				<?php

				$rollno = array("RYK-01-FMG1-19-001","RYK-01-FMG1-19-002","RYK-01-FMG1-19-003","RYK-01-FMG1-19-004","RYK-01-FMG1-19-005");
				$name = array("nauman","ali","ahmad","saif","farhan");
				
				for ($i=1; $i <5 ; $i++) {

				?>
				<tr>
					<td><?php echo $i; ?></td>
					<td><?php echo $rollno[$i]; ?></td>
					<td>
						<?php echo $name[$i]; ?>		
					</td>
					<td>EG-1</td>
					<td>10000</td>
					<td style="background-color: gray;">2000</td>
					<td></td>
					<td style="background-color: gray;">2000</td>
					<td></td>
					<td style="background-color: gray;">2000</td>
					<td></td>
					<td style="background-color: gray;">2000</td>
					<td></td>
					<td style="background-color: gray;">2000</td>
					<td></td>
					<td>5000</td>
					<td style="background-color:silver;">5000</td>
					<td></td>
				</tr>
				<?php
				}
				?>
				<tr>
					<td colspan="4" align="center" style="background-color:lightgray;">
						EG-1-Session 2018-2020
					</td>
					<td>100000</td>
					<td>20000</td>
					<td>15000</td>
					<td>20000</td>
					<td>10000</td>
					<td>20000</td>
					<td>5000</td>
					<td>20000</td>
					<td>18000</td>
					<td>20000</td>
					<td>10000</td>
					<td>50000</td>
					<td>14000</td>
					<td></td>
				</tr>
			</tbody>
		</table>
		<hr>
		<div class="row">
			<div class="col-md-12">
				<table class="table table-bordered">
					<tr align="center">
						<td colspan="6" style="font-size: 20px;"><b><u>Bad Debts</u></b></td>
					</tr>
					<!-- <tr align="center">
						<td><p><b>Class:</b></p></td>
						<td>Engineering-1</td>
						<td><p><b>Section:</b></p></td>
						<td>Section-1</td>
						<td><p><b>Session:</b></p></td>
						<td>Session 2018-2020</td>
					</tr> -->
				</table>
			</div>
		</div>
		<table class="table table-bordered">
			<!-- <thead>
			<tr style="background-color:#337ab7;color: white;">
				<th>Sr.#</th>
				<th>Roll No.</th>
				<th>Name</th>
				<th>Class</th>
				<th>T.PKG</th>
				<th>1st Instll</th>
				<th>1st Paid</th>
				<th>2nd</th>
				<th>2nd Paid</th>
				<th>3rd</th>
				<th>3rd Paid</th>
				<th>4th</th>
				<th>4th Paid</th>
				<th>5th</th>
				<th>5th Paid</th>
				<th>G.Total</th>
				<th>Remain</th>
				<th>Status</th>
			</tr>
			</thead> -->
			<tbody>
				<?php
				for ($i=1; $i <=3 ; $i++) { 
				?>
				<tr>
					<td><?php echo $i; ?></td>
					<td><?php echo "RYK-01-FMG1-19-".$i; ?></td>
					<td>nauman hashmi</td>
					<td>ICS</td>
					<td>10000</td>
					<td style="background-color: gray;">2000</td>
					<td></td>
					<td style="background-color: gray;">2000</td>
					<td></td>
					<td style="background-color: gray;">2000</td>
					<td></td>
					<td style="background-color: gray;">2000</td>
					<td></td>
					<td style="background-color: gray;">2000</td>
					<td></td>
					<td>5000</td>
					<td style="background-color:silver;">5000</td>
					<td></td>
				</tr>
				<?php
				}

				?>
				<tr>
					<td colspan="4" align="center" style="background-color: lightgray;">
						Total Left
					</td>
					<td>100000</td>
					<td>20000</td>
					<td>15000</td>
					<td>20000</td>
					<td>10000</td>
					<td>20000</td>
					<td>5000</td>
					<td>20000</td>
					<td>18000</td>
					<td>20000</td>
					<td>10000</td>
					<td>50000</td>
					<td>14000</td>
					<td></td>
				</tr>
				<tr>
					<td colspan="4" align="center" style="background-color: lightgray;">
						Actual After Bad Debts
					</td>
					<td>100000</td>
					<td>20000</td>
					<td>15000</td>
					<td>20000</td>
					<td>10000</td>
					<td>20000</td>
					<td>5000</td>
					<td>20000</td>
					<td>18000</td>
					<td>20000</td>
					<td>10000</td>
					<td>50000</td>
					<td>14000</td>
					<td></td>
				</tr>
			</tbody>
		</table>
	</div>
</div>
<!-- class fee account report end-->
</body>
</html>