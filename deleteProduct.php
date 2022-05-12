<?php
	//Make connection to database
	include 'crud/connection.php';

	//Gather id from $_GET[]
	$id=$_GET['PRODUCT_ID'];

	//Construct DELETE query to remove record where WHERE id provided equals the id in the table
	$query="DELETE from PRODUCT where PRODUCT_ID=$id";

	//run $query
    $result = oci_parse($conn,$query);
    oci_execute($result);

	//Redirect to displayProduct.php page
	header('Location: displayProduct.php');
?>