<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Forget Password</title>
</head>
<body>

	<div>
		<?php include 'header.php';?>				
	</div>

	<br>

	<div align="center" style="width:500px">
		<fieldset>
			<form action="login.php">
				<p><h2>Forget Password</h2></p>
				<table>
					<tr>
						<td>Enter Email</td>
						<td>:</td>
						<td><input type="text" name="email"></td>
					</tr>
				</table> <br>
				<input type="submit" name="submit">
			</form>			
		</fieldset>		
	</div>

	<br>

	<div align="center">
		<?php include 'footer.php';?>
	</div>

</body>
</html>