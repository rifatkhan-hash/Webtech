<?php 
	session_start();
	if(!isset($_COOKIE['rem'])) {
        header('location: /labtask6/view/logout.php');
    }
	if (isset($_SESSION['username'])) {		

	} else {
		header("location: /labtask6/view/login.php");
	}

	$ezl = new mysqli("localhost", "root", "", "labtask");

    if ($ezl->connect_error) {
        die("Data base Connection failed: " . $ezl->connect_error);
    }

    $sql = "SELECT * FROM user";
    $qry = $ezl->query($sql);
    while($data = $qry->fetch_assoc()) {
    	if($data['ID'] == $_SESSION['id']) {
    		$name = $data['Name'];
    		$gender = $data['Gender'];
    		$dob = $data['DateOfBirth'];
    		$email = $data['Email'];
    		$phone = $data['Contact'];
    	}
    }
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Dashboard</title
	<script src="../view/js/user.js"></script>
</head>
<body>
	<div>
		<?php include '../view/log_top.php';?>				
	</div>	

	<br>

	<div>
		<fieldset>
			<form action="/labtask6/controller/editprofileControl.php" method="POST" onsubmit="return validteacher(this)">
				<div>
					<table>
						<tr>
							<td style="width: 300px;">
								<label><b>Account</b></label> 
								<hr> <br>
								<ul>
									<li><a href="/labtask6/view/dashboard.php">Dashboard</a></li>
									<li><a href="/labtask6/view/viewprofile.php">View Profile</a></li>
									<li><a href="/labtask6/view/editprofile.php">Edit Profile</a></li>
									<li><a href="/labtask6/view/changepassword.php">Change Password</a></li>
									<li><a href="/labtask6/view/logout.php">Logout</a></li>
								</ul>
							</td>
							<td>
								<fieldset>
									<legend><h2>Edit Profile</h2></legend>
									<span id="inputErr" style="color: red;"></span>
									<table>
										<input type="number" name="id" value="<?php echo $_SESSION['id'] ?>" hidden>
										<tr>
											<td>Name</td>
											<td>:</td>
											<td><input type="text" name="name" value="<?php echo $name; ?>"><?php if(isset($_COOKIE['name'])){echo $_COOKIE['name'];} ?></td>
										</tr>
										<tr>
											<td>Email</td>
											<td>:</td>
											<td><input type="text" name="email" value="<?php echo $email; ?>"><?php if(isset($_COOKIE['email'])){echo $_COOKIE['email'];} ?><span id="emailErr" style="color: red;"></span></td>
										</tr>

										<tr>
											<td>Gender</td>
											<td>:</td>
											<td>
												<input <?php  if($gender == 'Male') {echo 'checked="checked"';} ?> type="radio" name="gender" value="Male" id="male"><label for="male">Male</label> 
							                    <input <?php if($gender == 'Female') {echo 'checked="checked"';} ?> type="radio" name="gender" value="Female" id="female"> <label for="female">Female</label>
							                    <input <?php if($gender == 'Other') {echo 'checked="checked"';} ?> type="radio" name="gender" value="Other" id="other"> <label for="other">Others</label><?php if(isset($_COOKIE['gender'])){echo $_COOKIE['gender'];} ?>
											</td>
											</tr>
										</tr>											
										<tr>
											<td>Contact No</td>
											<td>:</td>
											<td><input type="text" name="phone" value="<?php echo $phone; ?>"><?php if(isset($_COOKIE['phone'])){echo $_COOKIE['phone'];} ?></td>
										</tr>
										<tr>
											<td>Date of Birth</td>
											<td>:</td>
											<td><input type="date" name="dob" value="<?php echo $dob; ?>"><?php if(isset($_COOKIE['dob'])){echo $_COOKIE['dob'];} ?><br><span id="dobErr" style="color: red;"></span></td>
										</tr>
									
									</table>
									<input type="submit" name="submit" value="Update">
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
		<?php include '../view/footer.php';?>
	</div>
</body>
</html>