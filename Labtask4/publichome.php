<!DOCTYPE html>
<html>
<head>
	<title>Lab Task</title>
</head>
<body>

	<div class="container">
		<form method="post" action="<?php echo ($_SERVER['PHP_SELF']);?>" novalidate>

			<div>
				<?php include 'header.php';?>				
			</div>

			<div style="height: 100px;" align="center">
				<p style="font-size: 30px;">Welcome to <b> Web Learning Center</b></p>
			</div>

			<div align="center">
				<?php include 'footer.php';?>
			</div>			
			
		</form>
	</div>

</body>
</html>