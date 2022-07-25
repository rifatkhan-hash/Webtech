<?php  
require_once 'controller/productInfo.php';

$Product = fetchProduct($_GET['id']);


    include "nav.php";



?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<table>
	<tr>
		<th>Name</th>
		<th>Buying</th>
		<th>Selling</th>
		<th>Quantity</th>
		<th>Image</th>
	</tr>
	<tr>
		<td><a href="showProduct.php?id=<?php echo $Product['ID'] ?>"><?php echo $Product['Name'] ?></a></td>
		<td><?php echo $Product['Buying'] ?></td>
		<td><?php echo $Product['Selling'] ?></td>
		<td><?php echo $Product['Quantity'] ?></td>
		<td><img width="100px" src="uploads/<?php echo $Product['image'] ?>" alt="<?php echo $Product['Name'] ?>"></td>
	</tr>

</table>


</body>
</html>