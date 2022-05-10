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
			$delete_item = "Delete from cart where ID = ".$_GET['ID'];
			$delete_result = oci_parse($conn, $delete_item);
			oci_execute($delete_result);
			header("Location: temp.php");
		}

	?>

</body>
</html>