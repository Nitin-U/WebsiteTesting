<?php
	//Make connection to database
	include 'crud/connection.php';

	if (isset($_POST)) 
	{
            $id=$_POST['productid'];
            $name=$_POST['name'];
            $price=$_POST['price'];
            $productdescription=$_POST['proddesc'];
            $allergyinformation=$_POST['allergyinfo'];
            $quantity=$_POST['quantity'];
            $productimage=$_POST['prodimg'];
            $shopType = $_POST['shopType'];

if(trim($productimage!=null))
{
      $updateproduct_display = "UPDATE PRODUCT SET PRODUCT_NAME ='".$name."', PRODUCT_DESC ='".$productdescription."', ALLERGY_INFO = '".$allergyinformation."', PRODUCT_IMAGE = '".$productimage."', PRODUCT_PRICE = '".$price."', QUANTITY = '".$quantity."', FK1_SHOP_ID = '".$shopType."' WHERE PRODUCT_ID =". $id;
}
else
{
      $updateproduct_display = "UPDATE PRODUCT SET PRODUCT_NAME ='".$name."', PRODUCT_DESC ='".$productdescription."', ALLERGY_INFO = '".$allergyinformation."', PRODUCT_PRICE = '".$price."', QUANTITY = '".$quantity."', FK1_SHOP_ID = '".$shopType."' WHERE PRODUCT_ID =". $id;
}
      

      $update_result = oci_parse($conn, $updateproduct_display);
      oci_execute($update_result);
      //echo $updateproduct_display;
      //die();

      //if ($row = oci_fetch_assoc($update_result) > 0) 
      //{
            $_SESSION['passmessage']="Product updated successfully";
      	header("Location: displayProduct.php");
      //}

	}

		
?>