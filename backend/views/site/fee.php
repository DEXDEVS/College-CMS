<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Fee</title>
</head>
<body>

<div class="container-fluid">
	<h1>Fee</h1>
</div>	

<?php 
		$first = '2019/02/25';
		$last = '2019/03/15';
		$DATE = date_range($first,$last);
		function date_range($first, $last, $step = '+1 day', $output_format = 'd/m/Y' ) {

		    
			$dates = array();
		    $current = strtotime($first);
		    $last = strtotime($last);

		    while( $current <= $last ) {

		        $dates[] = date($output_format, $current);
		        $current = strtotime($step, $current);
		    }

		    return $dates;
		} 
		foreach ($DATE as $key => $d) {
			var_dump($d);
			echo "<br>";
		}
		 
		//echo $dates;

	?>

</body>
</html>