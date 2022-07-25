<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style>
		table,td,th{
			border:1px solid black;
		}
	</style>
</head>
<body>

<?php 
    include "nav.php";

?>

<table>
	<thead>
		<tr>
			<th>Product_id</th>
			<th>p_name</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($allSearchedProduct as $i => $Product): ?>
			<tr>
				<td><a href="../showProduct.php?id=<?php echo $Product['ID'] ?>"><?php echo $Product['ID'] ?></a></td>
				<td><?php echo $Product['Name'] ?></td>
				<td><a href="../editProduct.php?id=<?php echo $Product['ID'] ?>">Edit</a>&nbsp <a href="deleteProduct.php?id=<?php echo $Product['ID'] ?>">Delete</a></td>
			</tr>
		<?php endforeach; ?>
		

	</tbody>
	

</table>


</body>
</html>