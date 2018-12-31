<div class="container-fluid">
	<form method="POST">
		<div class="row">
 			<div class="col-md-4 col-md-offset-4">
				<div class="panel panel-primary">
	    			<div class="panel-heading"><h2>Message Panel</h2></div>
	    				<div class="panel-body">
		 					<input type="number" class="form-control" name="url_no" placeholder=" Enter IP No. like 102" maxlength="3"><br>
	    			 		<textarea type="text" name="message" class="form-control" rows="7" placeholder="Type Your Alert Message Here ..."></textarea>
	    				</div>
				    <div class="panel-footer panel-primary">
			    		<input type='submit' name="submit" class="btn btn-block btn-success"/>
			    	</div>
		  		</div>
			</div>
		</div>
	</form>
</div>

<?php
	if(isset($_POST["submit"])) {
		$url_no  = $_POST["url_no"];
		$message = $_POST["message"];
	
		$conn = mysqli_connect("localhost","root","","college_db");
		$sql = "SELECT guardian_contact_no_1 FROM std_guardian_info";
		$res = mysqli_query($conn,$sql);

		while ($r = mysqli_fetch_array($res)) {
				
		try{
		$phoneNumber = $r["guardian_contact_no_1"]; 

		var_dump($phoneNumber);
		
		$u="http://192.168.0.".$url_no.":8090/index.php?r=sms/absent-sms?username=Sadiq&password=1234&phone=";

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
			if($response->status == 200){
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
	echo 
		"<div class='alert alert-success'>
			<p>Message send successfully...!</p>
		</div>";
}
// ending if(isset)...
?>