<?php
	include "crud/connection.php";

	if (isset($_GET['id'])) 
	{
		$prod_id = $_GET['id'];
		$wishlist_product="SELECT * FROM WISHLIST WHERE FK1_PRODUCT_ID = $prod_id AND FK2_USER_ID =" .$_SESSION['id'];
		$wishlist_Presult = oci_parse($conn, $wishlist_product);
		oci_execute($wishlist_Presult);
		if($row=oci_fetch_assoc($wishlist_Presult))
		{
			$_SESSION['failmessage']="Product already in wishlist";
			header("Location:".$_SERVER["HTTP_REFERER"]);
		}
		else
		{
			$wishlist_insert = "INSERT INTO WISHLIST (FK1_PRODUCT_ID, FK2_USER_ID) VALUES ($prod_id, ".$_SESSION['id'].")";
		// echo $wishlist_insert;
		$wishlist_result = oci_parse($conn, $wishlist_insert);
		oci_execute($wishlist_result);
		$_SESSION['passmessage']="Product added to wishlist";
			header("Location:".$_SERVER["HTTP_REFERER"]);
		}
		
	}

?>