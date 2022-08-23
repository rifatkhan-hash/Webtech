<?php session_start(); 
	if(!isset($_SESSION['username']) && !isset($_COOKIE['username'])){
		header('Location: /labtask6/view/login.php');
	}
	if(!isset($_SESSION['username'])){
		$_SESSION['username'] = json_decode(base64_decode($_COOKIE['username']), true);
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Header</title>
	<link rel="stylesheet" type="text/css" href="top.css">
</head>
<body>
	<fieldset>
		<div class="header">
			<div class="logo"><img src="use_img/cg.jpg" height="150px" width="200px"></div>
			<div class="navigation">
				<div class="profile">Logged in as User , <u><?= $_SESSION['username']['name']?><span> |</span></u></div>
				<div class="logout">
					<form method="POST" action="/labtask6/view/logout.php">
							<button type="submit" name="logout_btn">Log out</button>
					</form>
				</div>
			</div>
		</div>
	</fieldset>
</body>
</html>