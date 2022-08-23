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
	if(!isset($_COOKIE['rem'])) {
        header('location: /labtask6/view/logout.php');
    }
	if (isset($_SESSION['username'])) {		

	} else {
		header("location: /labtask6/view/login.php");
	}
 	?>

	<div>
		<?php include '../view/log_top.php';?>				
	</div>	

	<br>

	<div>
		<fieldset>
			<form>
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
							<td style="width: 1000px; color:Green; font-size: 30px; text-align: center; vertical-align: text-top;">Welcome to City Garden <b><?php echo $_SESSION['name'];?></b></td>
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