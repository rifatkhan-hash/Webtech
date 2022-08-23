<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Registration</title>
	<script src="../view/js/registration.js"></script>
</head>
<body>
	<fieldset>
        <?php include('../view/header.php'); ?>
        <div style="float: right;">
            <a href="/labtask6/view/login.php">Log In</a> | <a href="/labtask6/home.php">Home</a>
        </div>
    </fieldset>

	<br>

	<div align="center" style="width:600px; margin-left:auto; margin-right: auto;">
		<fieldset>
			<form method="post" action="/labtask6/controller/registrationControl.php" onsubmit="return validregistration(this)">
				<p><h2>Registration</h2></p>
				<?php 
					if(isset($_COOKIE['msg']))
						echo $_COOKIE['msg'];
				?>
				<table>
					<tr>
						<td>Name</td>
						<td>:</td>
						<td><input type="text" name="name"><span id="nameErr"><?php if(isset($_COOKIE['name'])){echo $_COOKIE['name'];} ?></span></td>
					</tr>

					<tr>
						<td>Contact No</td>
						<td>:</td>
						<td><input type="text" name="phone"><span id="phoneErr"><?php if(isset($_COOKIE['phone'])){echo $_COOKIE['phone'];} ?></span></td>
					</tr>

					<tr>
						<td>E-mail</td>
						<td>:</td>
						<td><input type="text" name="email"><span id="emailErr"><?php if(isset($_COOKIE['email'])){echo $_COOKIE['email'];} ?></span></td>
					</tr>

					<tr>
						<td>Username</td>
						<td>:</td>
						<td><input type="text" name="username" id="user"> <span id="userErr">*<?php if(isset($_COOKIE['user'])) {echo $_COOKIE['user'];} ?></span></td>
					</tr>

					<tr>
						<td>Password</td>
						<td>:</td>
						<td><input type="text" name="password"><span id="passwordErr">*<?php if(isset($_COOKIE['password'])){echo $_COOKIE['password'];} ?></span></td>
					</tr>

					<tr>
						<td>Confirm Password</td>
						<td>:</td>
						<td><input type="password" name="conpassword" id="conpass"> <span id="conpassErr">*</span></td>
					</tr>

					<tr>
						<td>Gender</td>
						<td>:</td>
						<td>
							<input type="radio" name="gender" value="Male" id="Male"> Male
							<input type="radio" name="gender" value="Female" id="Female">Female
							<input type="radio" name="gender" value="Other" id="Other">Other
							<span id="genderErr"></span>
						</td>
					</tr>
					<tr>
						<td>Date of Birth</td>
						<td>:</td>
						<td><input type="date" name="dob"><span id="dobErr"><?php if(isset($_COOKIE['dob'])){echo $_COOKIE['dob'];} ?></span></td>
					</tr>
				</table> <br>

				<input type="submit" name="Submit" value="Submit"><br>
				<input type='reset' name='reset' value='Clear'>

			</form>			
		</fieldset>
	</div>

	<br>

	<div align="center">
		<?php include '../view/footer.php';?>
	</div>
	
</body>
</html>