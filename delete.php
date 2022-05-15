<!DOCTYPE html>
<html>
<head>
	<title></title>

	<?php
		include "crud/connection.php";
	?>

</head>
<body>

	<?php

		if (isset($_GET['ID'])) 
		{
			$delete_item = "Delete from cart where ID = ".$_GET['ID']. "AND FK1_USER_ID=" .$_SESSION['id'];
			$delete_result = oci_parse($conn, $delete_item);
			oci_execute($delete_result);
			$_SESSION['passmessage'] = "Item deleted successfully";
			header("Location: temp.php");
		}

		if (isset($_POST['deleteBtn'])) 
		{
			$delete_item = "Delete from cart WHERE FK1_USER_ID=" .$_SESSION['id'];
			$delete_result = oci_parse($conn, $delete_item);
			oci_execute($delete_result);
			$_SESSION['passmessage'] = "Cart emptied successfully";
			header("Location: temp.php");
		}

	?>

</body>
</html>