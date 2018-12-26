<?php

	echo "string";

	if (isset($_POST['submit'])) {
		echo "hello";
		die();
	$err="";
		if (isset($_POST['email'])) {

				//$email=mysqli_real_escape_string($conn,$_POST['email']);
				if (empty($email)) {
					$err= "please enter the email which you enter in the record";
				}
				else
				{
					$user = Yii::$app->db->createCommand("SELECT * FROM user")->queryAll();

					var_dump($user);
					die();

					$result=mysqli_query($conn,$query);
					$total=mysqli_num_rows($result);
					if ($total==0) {
						echo "This email does not exist";
					}
					else{
						$row = mysqli_fetch_assoc($result);
						$_SESSION['email']=$email;
						
						if($row['email'] == $email){
						$code=rand(99999,999999);
						$upcod="UPDATE user SET code='$code' WHERE email='$email'";
						$rest=mysqli_query($conn,$upcod);
						if ($rest) {
							//echo " code is updated";				
						}
						else{
							echo "Code is not updated";
						}
						$to=$email;
						$subject = "Email Verification Code ";
						$headers = "From: anasshafqat02@gmail.com" . "\r\n" .
						"CC: somebodyelse@example.com";
						$verify=mail($email,$subject,$code,$headers);
						if($verify){
							header("location:index.php?r=site/verify-password.php");
						}
						else
						{
							echo "code is not sent ";
						}
					}
				}
			}
		}
	}
?>