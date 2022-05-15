<?php 
include "crud/connection.php";
include "header.php";
$id=$_GET['id'];
$query="SELECT * FROM PRODUCT where PRODUCT_ID = ".$id;
$result = oci_parse($conn,$query);
oci_execute($result);
$row = oci_fetch_assoc($result);
print_r($row);
?>

<a href="index.php">Go back</a>