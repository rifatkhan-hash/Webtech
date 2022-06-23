<!DOCTYPE html>
<html>
<head>
	<title>Header</title>
	<link rel="stylesheet" type="text/css" href="top.css">
</head>
<body>

	<fieldset>
		<div style="width:100%; height:100px; border:1px solid #000;">
		<span style="font-size: 30px; color: limegreen;">E</span> 
		<span style="font-size: 20px; color: black;"><b>z </b></span>
		<span style="font-size: 30px; color: skyblue;">L</span>
		<span style="font-size: 20px; color: black;"><b>earning </b></span>

		
		<p align="right"><a href="publichome.php">Logged in as<?php echo $_SESSION['data']['name']?></a> |
		<a href="login.php">Login</a> |
		<a href="logout.php">Logout</a></p>
	</div>
	</fieldset>
</body>
</html>