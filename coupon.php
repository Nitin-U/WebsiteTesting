<?php
	include "crud/connection.php";	

	if(isset($_POST['coupon']))
	{
		$coupon = $_POST['coupon'];
		$voucher_query="Select * from VOUCHER WHERE CODE = '$coupon'";
		$voucher_result = oci_parse($conn, $voucher_query);
		oci_execute($voucher_result);

		if ($row = oci_fetch_assoc($voucher_result)) 
		{
			$_SESSION['discount'] = $row['DISCOUNT'];
			$_SESSION['passmessage'] = "Coupon code applied successfully";
			header("Location: temp.php");
		}
		else
		{
			$_SESSION['failmessage'] = "Coupon code invalid";
			header("Location: temp.php");
		}

	}

?>