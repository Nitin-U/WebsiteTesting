<?php
include "crud/connection.php";

if (isset($_GET['tradID'])) 
{

	$update_status = "UPDATE user_master SET STATUS = 'Verified' where USER_ID =" .$_GET['tradID'];
	//echo $update_status;
	$status_result = oci_parse($conn, $update_status);
	if (oci_execute($status_result)) 
	{
		$emailSql="Select EMAIL from user_master where USER_ID =" .$_GET['tradID'];
		$email_result = oci_parse($conn, $emailSql);
		oci_execute($email_result);
		$row=oci_fetch_assoc($email_result);
		header('location: email_send.php?email='.$row['EMAIL']);
	}

	$_SESSION['passmessage'] = "Trader verified successfully";

	// header("Location: manageTrader.php");
}

elseif (isset($_GET['trad_deac_ID'])) 
{

	$update_status = "UPDATE user_master SET STATUS = 'Deactivate' where USER_ID =" .$_GET['trad_deac_ID'];
	//echo $update_status;
	$status_result = oci_parse($conn, $update_status);
	oci_execute($status_result);

	$_SESSION['passmessage'] = "Trader Deactivated successfully";
	header("Location: manageTrader.php");
}

?>