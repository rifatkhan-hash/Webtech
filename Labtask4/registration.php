<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Registration</title>
</head>
<body>

	<style type="text/css">
		.red{
			color: red;
		}
	</style>

	<?php

	$name = $email = $username = $password = $confirmpassword = $gender = $dob = "";
	$nameErr = $emailErr = $usernameErr = $passwordErr = $confirmpasswordErr = $genderErr = $dobErr = $message = "";
	$isValid = true;

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		

		#----- Name Verification -----#
		if(!isset($_POST['name']) || empty($_POST['name'])){
			$nameErr = "Name is required";
			$isValid = false;
		}
		else{
			$name = $_POST['name'];
			if(!preg_match("/^[a-zA-Z-' ]*$/", $name)){
				$nameErr = "Only letters, whitespaces, - and ' are acceptable";
				$isValid = false;
			}
			else if(str_word_count($name)<2){
				$nameErr = "Name has to contain at least two words ";
				$isValid = false;
			}
		}

		#----- Email Verification -----#
		if (!isset($_POST['email']) || empty($_POST["email"])) {
			$emailErr = "Email is required";
			$isValid = false;
		}
		else{
			$email = $_POST["email"];
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				$emailErr = "Invalid email format";
				$isValid = false;
			}
		}

		#----- User Name Verification -----#
		if (!isset($_POST['username']) || empty($_POST['username'])) {
			$usernameErr = "User Name is required";
			$isValid = false;
		}
		else{
			$username = $_POST['username'];
			if (!preg_match("/^[a-zA-Z-0-9' ]*$/", $username)) {
				$usernameErr = "Only letters and white space are allowed";
				$isValid = false;
			}
			elseif (str_word_count($username)<2) {
				$usernameErr = "User Name has to contain at least two words";
				$isValid = false;
			}
		}

		#----- Password Verification -----#
		if (!isset($_POST['password']) || empty($_POST['password'])) {
			$passwordErr = "Password is required";
			$isValid = false;
		}
		else{
			$password = $_POST['password'];

			if(strlen($password) < 8){
				$passwordErr = "Password must contain at least 8 characters";
				$isValid = false;
			}
		}

		#----- Confirm Password Verification -----#
		if (!isset($_POST['confirmpassword']) || empty($_POST['confirmpassword'])) {
			$confirmpasswordErr = "Confirm password is required";
			$isValid = false;
		}
		else{
			$confirmpassword = $_POST['confirmpassword'];

			if ($password !== $confirmpassword) {
				$confirmpasswordErr = "Password is not match";
				$isValid = false;
			}
		}

		#----- Gender Verification -----#
		if (!isset($_POST['gender']) || empty($_POST['gender'])) {
			$genderErr = "Gender is required";
			$isValid = false;
		}
		else{
			$gender = $_POST['gender'];
		}

		#----- Date of Birth Verification -----#
		if (!isset($_POST['dob']) || empty($_POST['dob'])) {
			$dobErr = "Date of Birth is required";
			$isValid = false;
		}
		else{
			$dob = $_POST['dob'];
		}

		if($isValid){
			$set = [
				'name'			=> $_POST['name'],
				'email'			=> $_POST['email'],
				'username' 		=> $_POST['username'],
				'password' 		=> $_POST['password'],
				'gender' 			=> $_POST['gender'],
				'dob' 			=> $_POST['dob'],
				'profilepicpath' 	=> 'profilepic/1.jpg'
			];

			if(!file_exists('data.json')){
				@file_put_contents('data.json', '');
			}

			$data = json_decode(file_get_contents('data.json'), true);

			foreach ($data as $key => $value) {
				if($value['email'] == $_POST['email'] && $value['username'] == $_POST['username'] ){
					$userExist = "User Already Exist!";
					break;
				}
			}
			if(empty($userExist)){
				$data[] = $set;
				file_put_contents('data.json', json_encode($data));
				header('Location: login.php');
			}
		}

		
	}

	?>

	<div>
		<?php include 'header.php';?>				
	</div>

	<br>

	<div align="center" style="width:600px">
		<fieldset>
			<form method="post" action="<?php echo ($_SERVER['PHP_SELF']); ?>">
				<p><h2>Registration</h2></p>
				<table>
					<tr>
						<td>Name</td>
						<td>:</td>
						<td><input type="text" name="name" value="<?php echo $name;?>"><span class="red">*<?php echo $nameErr?></span></td>
					</tr>

					<tr>
						<td>E-mail</td>
						<td>:</td>
						<td><input type="text" name="email" value="<?php echo $email;?>"><span class="red">*<?php echo $emailErr?></span></td>
					</tr>

					<tr>
						<td>User Name</td>
						<td>:</td>
						<td><input type="text" name="username" value="<?php echo $username;?>"><span class="red">*<?php echo $usernameErr?></span></td>
					</tr>

					<tr>
						<td>Password</td>
						<td>:</td>
						<td><input type="text" name="password" value="<?php echo $password;?>"><span class="red">*<?php echo $passwordErr?></span></td>
					</tr>

					<tr>
						<td>Confirm Password</td>
						<td>:</td>
						<td><input type="text" name="confirmpassword" value="<?php echo $confirmpassword;?>"><span class="red">*<?php echo $confirmpasswordErr?></span></td>
					</tr>

					<tr>
						<td>Gender</td>
						<td>:</td>
						<td>
							<input type="radio" name="gender" value="Male" id="Male"> Male
							<input type="radio" name="gender" value="Female" id="Female">Female
							<input type="radio" name="gender" value="Other" id="Other">Other<span class="red">*<?php echo $genderErr?></span>
						</td>
					</tr>

					<tr>
						<td>Date of Birth</td>
						<td>:</td>
						<td><input type="date" name="dob" value="<?php echo $dob;?>"><span class="red">*<?php echo $dobErr?></span></td>
					</tr>
				</table> <br>

				<input type="submit" name="Submit" value="Submit">
				<input type="reset" name="Reset" value="reset">

			</form>			
		</fieldset>
	</div>

	<br>

	<div align="center">
		<?php include 'footer.php';?>
	</div>
	
</body>
</html>