<?php
// $conn = oci_connect('Trinit-E-mart', 'Ganpati11*#', 'localhost/XE');
// $conn = oci_connect('myproject', 'myproject', 'localhost/XE');
session_start();
$conn = oci_connect('project', 'project', 'localhost/XE');
if (!$conn) {
    $e = oci_error();
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
}

?>