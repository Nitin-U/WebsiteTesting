<?php  
	include "crud/connection.php";
	if (isset($_GET['trad_decl'])) 
	{
		$emailSql="Select EMAIL from user_master where USER_ID =" .$_GET['trad_decl'];
			$email_result = oci_parse($conn, $emailSql);
			oci_execute($email_result);
			$row=oci_fetch_assoc($email_result);

			$email = $row['EMAIL'];

		$decline_trader = "DELETE FROM user_master WHERE USER_ID=" .$_GET['trad_decl'];
		$decline_result = oci_parse($conn, $decline_trader);
		echo $decline_trader;
		if (oci_execute($decline_result)) 
		{
			$_SESSION['passmessage'] = "Trader declined successfully";
			header('location: decline_email.php?email='.$email);
		}
		//header("Location: manageTrader.php");
	}

?>