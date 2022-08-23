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

 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1">
 	<title>Edit User</title>
	<script src="../view/js/edituser.js"></script>
 </head>
 <body>
 	<div>
		<?php 
			include '../view/log_top.php';

            $id = $name = $gender = $dob = $phone = $email = $username = "";

            $id = $_SESSION['id'];
            $name = $_SESSION['name'];
            $gender = $_SESSION['gender'];
            $dob = $_SESSION['dob'];
            $phone = $_SESSION['phone'];
            $email = $_SESSION['email'];
        ?>			
	</div>

	<br>

	<div>
		<fieldset>
				<div>
					<table>
						<tr>
							<td style="width:300px;">
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
					            <fieldset style="width: 30em;">
					                <legend><h3>Profile</h3></legend>
					                <?php
					                    if(isset($_COOKIE['msg'])) {
					                        echo $_COOKIE['msg'];
					                    }
					                ?>
					                <table>
					                	<input type="number" name="id" value="<?php echo $id; ?>" hidden>
					                    <tr>
					                        <td>
					                            <label for="name">Name </label>
					                        </td>
					                        <td>:</td>
					                        <td><?php echo $name; ?>
					                        </td>
					                    </tr>
					                    <tr>
					                        <td>
					                            <label for="dob">Date of Birth </label>
					                        </td>
					                        <td>:</td>
					                        <td><?php echo $dob; ?>
					                        </td>
					                    </tr>
					                    <tr>
					                        <td>
					                            <label for="dob">Gender </label>
					                        </td>
					                        <td>:</td>
					                        <td><?php echo $gender; ?>
					                        </td>
					                    </tr>
					                    <tr>
					                        <td>
					                            <label for="phone">Contact No</label>
					                        </td>
					                        <td>:</td>
					                        <td><?php echo $phone; ?>
					                        </td>
					                    </tr>
					                    <tr>
					                        <td>
					                            <label for="email">Email </label> 
					                        </td>
					                        <td>:</td>
					                        <td><?php echo $email; ?>
					                        </td>
					                    </tr>
					                </table>
					                <br>
					            </fieldset>
						        <br>
							</td>
						</tr>
					</table>
				</div>
		</fieldset>
	</div>

	<br>

	<div align="center">
		<?php include '../view/footer.php'?>
	</div>
 </body>
 </html>