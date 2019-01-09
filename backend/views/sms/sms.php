<div class="container-fluid">
	<form method="post">
		<div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <input type="hidden" name="_csrf" class="form-control" value="<?=Yii::$app->request->getCsrfToken()?>">          
                </div>    
            </div>    
        </div>
		<div class="row">
 			<div class="col-md-4 col-md-offset-4">
				<div class="panel panel-primary">
	    			<div class="panel-heading"><h2>Message Panel</h2></div>
	    				<div class="panel-body">
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
//	$conn = mysqli_connect("localhost","root","","college_db");
		
	if(isset($_POST['submit'])) {
		global $message;
		$message = $_POST["message"];

		$numbers = Yii::$app->db->createCommand("SELECT guardian_contact_no_1 FROM std_guardian_info")->queryAll();

		$count = count($numbers);

		// while ($numbers <= $count) {
		for ($i=0; $i <$count ; $i++) { 

			$phoneNumber[$i] = $numbers[$i]['guardian_contact_no_1'];
			var_dump($phoneNumber[$i]);
			// // create a new cURL resource
			$ch = curl_init();
			// set URL and other appropriate options
			$url = "http://sms.lrt.com.pk/api/sms-single-or-bulk-api.php?username=trailaccount&password=trailaccount&sender=B-SMS&phone=".$phoneNumber[$i]."&type=English&message=".$message."";

			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_HEADER, 0);
			// grab URL and pass it to the browser
			curl_exec($ch);

			// close cURL resource, and free up system resources
			curl_close($ch);
		}
		echo 
			"<div class='alert alert-success text-center'>
				<p>Message sent successfully...!</p>
			</div>";
	}	
?>
