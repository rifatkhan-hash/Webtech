<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Dashboard</title>
</head>
<body>
	
	<?php 
	session_start();

	if (isset($_SESSION['username'])) {		

	} else {
		header("location:login.php");
	}
 	?>

 	<?php

	$currentpassword = $newpassword = $retypepassword = "";
	$currentpasswordErr = $newpasswordErr = $retypepasswordErr = "";
	$isValid = true;

	if ($_SERVER["REQUEST_METHOD"] == "POST") {

		#----- Current Password Varificaion -----#

		if (!isset($_POST['currentpassword']) || empty($_POST["currentpassword"])) {
			$currentpasswordErr = "Current password is required";
			$isValid = false;
		}
		else{
			$currentpassword = $_POST["currentpassword"];
			
			if ($_SESSION['data']['password'] !== $currentpassword) {
				$currentpasswordErr = "Current password is not match";
				$isValid = false;
			}
		}

		#----- New Password Verification -----#

		if (!isset($_POST['newpassword']) || empty($_POST["newpassword"])) {
			$newpasswordErr = "New password is required";
			$isValid = false;
		}
		else{
			$newpassword = $_POST["newpassword"];

			if($newpassword == $currentpassword){
				$newpasswordErr = "New password should not be same as current password";
				$isValid = false;
			}
		}

		#----- Retype New Password -----#
		if (!isset($_POST['retypepassword']) || empty($_POST["retypepassword"])) {
			$retypepasswordErr = "Retype password is required";
			$isValid = false;
		}
		else{
			$retypepassword = $_POST["retypepassword"];

			if ($retypepassword != $newpassword) {
				$retypepasswordErr = "Password is not same as New password";
				$isValid = false;
			}
		}

		if ($isValid) {
			$data = json_decode(file_get_contents('data.json'), true);

			foreach ($data as $key => $value) {
				if ($value['username'] == $_SESSION['data']['username']) {
					
					$set = [
						'name' => $_SESSION['data']['name'],
						'email' => $_SESSION['data']['email'],
						'username' => $_SESSION['data']['username'],
						'password' => $newpassword,
						'gender' => $_SESSION['data']['gender'],
						'dob' => $_SESSION['data']['dob'],
						'profilepicpath' => $_SESSION['data']['profilepicpath']
					];
					$_SESSION['data'] = $set;
					$data[$key] = $_SESSION['data'];
					file_put_contents('data.json', json_encode($data));
					header('Location: dashboard.php');
					break;
				}
			}
		}
	}
	?>

	<div>
		<?php include 'header.php';?>				
	</div>	

	<br>

	<div>
		<fieldset>
			<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
				<div>
					<table>
						<tr>
							<td style="width: 300px;">
								<label><b>Account</b></label> 
								<hr> <br>
								<ul>
									<li><a href="dashboard.php">Dashboard</a></li>
									<li><a href="viewprofile.php">View Profile</a></li>
									<li><a href="editprofile.php">Edit Profile</a></li>
									<li><a href="changeprofilepicture.php">Change Profile Picture</a></li>
									<li><a href="changepassword.php">Change Password</a></li>
									<li><a href="Logout.php">Logout</a></li>
								</ul>
							</td>
							<td>
								<fieldset>

									<legend><h2>Change Password</h2></legend>

									<table>

										<tr>
											<td>Current Password</td>
											<td>:</td>
											<td><input type="text" name="currentpassword" value="<?php echo $currentpassword;?>"><span class="red">*<? php echo $currentpasswordErr;?></span></td>
										</tr>

										<tr>
											<td>New Password</td>
											<td>:</td>
											<td><input type="text" name="newpassword" value="<?php echo $newpassword;?>"><span class="red">*<?php echo $newpasswordErr;?></span></td>
										</tr>

										<tr>
											<td>Retype New Password</td>
											<td>:</td>
											<td><input type="text" name="retypepassword" value="<?php echo $retypepassword;?>"><span class="red">*<?php echo $retypepasswordErr?></span></td>
										</tr>										
									</table>

									<hr>

									<input type="submit" name="submit">

								</fieldset>
							</td>
						</tr>
					</table>
				</div>
			</form>
		</fieldset>
	</div>

	<br>

	<div align="center">
		<?php include 'footer.php';?>
	</div>
</body>
</html>