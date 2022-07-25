<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
    <?php 
        include "nav.php";

     ?>
   

 <form action="controller/createProduct.php" method="POST" enctype="multipart/form-data">
  <label for="name">Name:</label><br>
  <input type="text" id="name" name="name"><br>
  <label for="buying">Buying price:</label><br>
  <input type="text" id="buying" name="buying"><br>
  <label for="selling">Selling price:</label><br>
  <input type="text" id="selling" name="selling"><br>
  <label for="quantity">Quantity:</label><br>
  <input type="text" id="quantity" name="quantity"><br><br>
  <input type="file" name="image"><br><br>
  <input type="checkbox" name="Display" value="Display">Display<br>
  <input type="submit" name = "Save" value="Save">
  <input type="reset"> 
</form> 

</body>
</html>

