<?php
include "crud/connection.php";

$id = $_GET['prod'];
//echo $id;

$select_product = "SELECT * FROM PRODUCT where PRODUCT_ID =" .$id;
$product_result = oci_parse($conn, $select_product);
oci_execute($product_result);
$row = oci_fetch_assoc($product_result);

if (trim($_SESSION['id'])==null)
{
	header("Location: " . $_SERVER["HTTP_REFERER"]);
	$_SESSION['failmessage']="You need to be logged in.";
}
elseif ($_SESSION['role']!='customer') {
	header("Location: " . $_SERVER["HTTP_REFERER"]);
	$_SESSION['failmessage']="You need to be logged in as customer.";
}
else{
	if (isset($_GET['prod']) && $row['STOCK']=='Out of Stock') 
	{
		$_SESSION['failmessage'] = "This item is currently out of stock";
		header("Location: " . $_SERVER["HTTP_REFERER"]);
	}
	elseif (isset($_GET['prod'])) 
	{
		
		$product_quantity = 1;
		$product_ID = $_GET['prod'];

		$sql = "SELECT * FROM cart WHERE FK2_PRODUCT_ID = $product_ID AND FK1_USER_ID=" .$_SESSION['id'];
		$result2 = oci_parse($conn,$sql);
		oci_execute($result2);
		$cart=oci_fetch_assoc($result2);

		$quantityQuery = "select sum(quantity) as QUANTITYTOTAL from cart WHERE FK1_USER_ID=" .$_SESSION['id'];
		$quantityResult = oci_parse($conn,$quantityQuery);
		oci_execute($quantityResult);
		$quantityTotal = oci_fetch_assoc($quantityResult);
		if($quantityTotal['QUANTITYTOTAL']==20)
		{
			$_SESSION['failmessage']="Product quantity cannot exceed 20";
		}
		elseif($cart)
		{  
			//$message[] = 'product already added to cart';
			$update= "Update cart SET QUANTITY = QUANTITY + 1 where FK2_PRODUCT_ID = $product_ID AND FK1_USER_ID=" .$_SESSION['id'];
			//echo $update;
			//die();
			$result4 = oci_parse($conn,$update);
			oci_execute($result4);
			$_SESSION['passmessage']="Product quantity increased by 1";

		}
		else 
		{
			$insert_product = "INSERT INTO CART (Quantity,FK2_PRODUCT_ID,FK1_USER_ID) VALUES ($product_quantity,$product_ID, '".$_SESSION['id']."')";
			$result3 = oci_parse($conn,$insert_product);
			oci_execute($result3);
			//echo $insert_product;

			//$message[] = 'product added to cart';
			$_SESSION['passmessage']="Product added to cart successfully"; 

		}
		header("Location: " . $_SERVER["HTTP_REFERER"]);

	}
}


?>