<?php

$conn = mysqli_connect('localhost', 'root', '', 'labtask') or die("Connection Failed");

$sql = "SELECT * FROM products";
$result = mysqli_query($conn, $sql) or die("SQL Query Failed.");
$output = "";
if(mysqli_num_rows($result) > 0 ){
    $output = '<table border="1" width="100%" cellspacing="0" cellpadding="10px">
            <tr>
                <th>Name</th>
                <th>Buying Price</th>
                <th>Selling Price</th>
            </tr>';

            while($row = mysqli_fetch_assoc($result)){
                $output .= "<tr><td align='center'>{$row["Name"]}</td>
                <td align='center'>{$row["Buying_Price"]}</td>
                <td align='center'>{$row["Selling_Price"]}</td>
                </tr>";
            }
    $output .= "</table>";

    mysqli_close($conn);

    echo $output;
}else{
    echo "<h2>No Record Found.</h2>";
}
?>
