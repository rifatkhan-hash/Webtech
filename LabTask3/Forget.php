<?php

$currentpassword = $newpassword = $retypepassword = "";
	$currentpasswordErr = $newpasswordErr = $retypepasswordErr = "";
	$setuppassword = "abc@123";

	if ($_SERVER['REQUEST_METHOD'] == "POST") {
		echo '<pre>';
		print_r($_POST);
		echo '</pre>';

		#Current Password Varificaion
		if (empty($_POST["currentpassword"])) {
			$currentpasswordErr = "Current password is required";
		}
		else{
			$currentpassword = $_POST["currentpassword"];
			
			if ($setuppassword !== $currentpassword) {
				$currentpasswordErr = "Current password is not match";
			}
		}

		#New Password Verification
		if (empty($_POST["newpassword"])) {
			$newpasswordErr = "New password is required";
		}
		else{
			$newpassword = $_POST["newpassword"];

			if($newpassword == $currentpassword){
				$newpasswordErr = "New password should not be same as current password";
			}
		}

		#Retype New Password
		if (empty($_POST["retypepassword"])) {
			$retypepasswordErr = "Retype password is required";
		}
		else{
			$retypepassword = $_POST["retypepassword"];

			if ($retypepassword != $newpassword) {
				$retypepasswordErr = "Password is not same as New password";
			}
		}
	}


?>
	<fieldset>
		<legend>CHANGE PASSWORD</legend>
	    Current Password :
		<input type="text" name="currentpassword" value="<?php echo $currentpassword;?>"><span style="color: red">*<?php echo $currentpasswordErr ?></span>
		<br>
		 New Password :
		<input type="text" name="newpassword" value="<?php echo $newpassword;?>"><span style="color: red">*<?php echo $newpasswordErr ?></span>
		<br>
         Retype New Password :
        <input type="text" name="retypepassword" value="<?php echo $retypepassword;?>"><span style="color: red">*<?php echo $retypepasswordErr ?></span>
        <br>
		<input type="submit" name="submit" value="submit">

	</fieldset>







