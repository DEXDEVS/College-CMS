<!DOCTYPE html>
<html>
<head>
	<title>Sending SMS</title>
 	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<hr>
<?php
	if (isset($_POST['submit'])) {

	$url_no = $_POST['url_no'];
	$message = "SMS From DEXDEVS!\n\n".$_POST["message"];
	//$std = "Anas Shafqat";
	//$class = "BSCS 8th Semester ";
	//$message = "SMS From DEXDEVS... \n\nDear Parents, your son ".$std." student of ".$class.$message;	

	$conn = mysqli_connect("localhost","root","","school_db");
	$sql = "SELECT guardian_contact_no_1 FROM std_guardian_info";
	$res = mysqli_query($conn,$sql);

	while ($r = mysqli_fetch_array($res)) {
			
	try{
	$phoneNumber = $r["guardian_contact_no_1"]; 

	//var_dump($phoneNumber);
	
	$u="http://192.168.1.".$url_no.":8090/SendSMS?username=Sadiq&password=1234&phone=";

	if($message !=null && $phoneNumber !=null){
		$url = $u.$phoneNumber."&message=".urlencode($message);
		$curl = curl_init($url);
		curl_setopt($curl,CURLOPT_RETURNTRANSFER, true);
		$curl_response = curl_exec($curl);

		if($curl_response === false){
			$info = curl_getinfo($curl);
			curl_close($curl);
			die('Error occurred'.var_export($info));
		}

		curl_close($curl);

		$response  = json_decode($curl_response);
		if($response->status == 2){
			echo "";
		}else{
			'Technical Problem';
		}
	}
	}
	catch(Exception $ex){
		echo "Exception: ".$ex;
	}
}
// while loop...
echo 
	"<center>
		<div class='alert alert-success col-md-6 col-md-offset-3'>
			<b>Message</b> has been sent <b>successfully...!</b>
		</div>
	</center>
	";
}
// if(isset$_GET)...
?>
<form method="post">
 <div class="row">
 	<div class="col-md-4 col-md-offset-4">
 		
  <div class="panel panel-primary">
    <div class="panel-heading"><h2>Message Panel</h2></div>
    <div class="panel-body">
    	
 		<input type="number" class="form-control" name="url_no" placeholder=" Enter IP No. like 102" maxlength="3"><br>
    	 <textarea type='message' name='message' class="form-control" rows="7" placeholder="Type Your Alert Message Here ..."></textarea>
    </div>
    <div class="panel-footer panel-primary">
    	<input type="submit" name="submit" value="Send" class="btn btn-block btn-success"  /></div>
  </div>
</div>

</div>
</form>
</body>
</html>