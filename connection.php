<?php 
session_start();
//Set up the database access credentials
$hostname = 'localhost'; 
$user = 'root'; //your standard uni id
$password = ''; // the password found on the W: drive
$databaseName = 'watdb'; //the name of the db you are using on phpMyAdmin
$connect = mysqli_connect($hostname, $user, $password, $databaseName) or 
exit("Unable to connect to database!");
?>
