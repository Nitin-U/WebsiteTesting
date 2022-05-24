<!-- <h1 style="color: lightgreen;">SUCCESSFULL PAYMENT!</h1>
 -->
 <?php
	include "crud/connection.php";
	// header("Location: collection.php");
	// $_SESSION['passmessage'] = "Order placed. Click here to get receipt <a href='order.php'>Here</a>";
	date_default_timezone_set('Asia/Kathmandu');
	//$today = date("d-m-Y H:i:s");
	$today = date('d-m-Y H:i:s');
	//echo $today;  

	$chooseweek = $_COOKIE["chooseweek"];
	$chooseday = $_COOKIE["chooseday"];
	$choosetime = $_COOKIE["choosetime"];
	$grandtotal = $_COOKIE["grandtotal"];
	if (isset($_SESSION['discount'])) {
        $discount = $_SESSION['discount'];
    }else{
    	$discount = 0;
    }
	
/*putting order_id as tokens in ORDERS table*/	
	$token = openssl_random_pseudo_bytes(3);
	$token = bin2hex($token);
	//echo $token;
		

/*orders insertin query*/
	$orders_query = "INSERT INTO ORDERS (ORDER_ID ,COLLECTION_WEEK, COLLECTION_DAY, COLLECTION_TIME, PAYMENT, DISCOUNT, ORDER_DATE, FK1_USER_ID) VALUES ('$token' ,'$chooseweek', '$chooseday', '$choosetime', $grandtotal, $discount, to_date('".$today."','dd-mm-yy hh24:mi:ss'), ".$_SESSION['id'].")";
	echo $orders_query;
	$orders_result = oci_parse($conn, $orders_query);
	oci_execute($orders_result);



/*selecting cart quantity and id from cart table to put order_product insertion query*/
	$select_cart = "SELECT * FROM CART WHERE FK1_USER_ID = " .$_SESSION['id'];
	$cart_result = oci_parse($conn, $select_cart);
	oci_execute($cart_result);
	while($row = oci_fetch_assoc($cart_result))
	{
		$quantity_cart = $row['QUANTITY'];
		$product_id = $row['FK2_PRODUCT_ID'];

		$select_product = "Select * from PRODUCT WHERE PRODUCT_ID=".$product_id;
		$product_result = oci_parse($conn, $select_product);
		oci_execute($product_result);
		$product=oci_fetch_assoc($product_result);
		$product_name=$product['PRODUCT_NAME'];
		$product_price=$product['PRODUCT_PRICE'];


/*order_product insertin query*/
		$order_prod_query = "INSERT INTO ORDER_PRODUCT (QUANTITY, PRODUCT_NAME, PRODUCT_PRICE, FK1_ORDER_ID, FK2_PRODUCT_ID) VALUES ('$quantity_cart', '$product_name', '$product_price', '$token', $product_id)";
		echo $order_prod_query;
		$order_prod_result = oci_parse($conn, $order_prod_query);
		oci_execute($order_prod_result);

	}

	$empty_cart = "DELETE FROM cart WHERE FK1_USER_ID =" .$_SESSION['id'];
	$empty_cart_result = oci_parse($conn, $empty_cart);
	oci_execute($empty_cart_result);
	$_SESSION['discount'] = 0;

	$_SESSION['passmessage'] = "Your order was placed sucessfully. Here is the receipt <a href='invoice.php?id=".$token."' target='_blank' rel='noopener noreferrer'>Here</a>";
	header("Location: index.php?id=".$token);	

?>