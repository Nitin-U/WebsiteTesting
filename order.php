<!-- <?php
	include "crud/connection.php";

	$chooseweek = $_COOKIE["chooseweek"];
	$chooseday = $_COOKIE["chooseday"];
	$choosetime = $_COOKIE["choosetime"];
	$grandtotal = $_COOKIE["grandtotal"];

	// echo $chooseweek;
	// echo $chooseday;
	// echo $choosetime;
	// echo $grandtotal;

	$orders_query = "INSERT INTO ORDERS (COLLECTION_WEEK, COLLECTION_DAY, COLLECTION_TIME, PAYMENT, FK1_USER_ID) VALUES ('$chooseweek', '$chooseday', '$choosetime', '$grandtotal', ".$_SESSION['id'].")";
	echo $orders_query;

?> -->