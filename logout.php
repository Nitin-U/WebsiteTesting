<?php

	session_start();
	session_unset();
	session_destroy();

	session_start();
	$_SESSION['passmessage']="Logged out successfully";
	header('location: index.php');

	include "footer.php";
?>