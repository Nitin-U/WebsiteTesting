<?php


include('connection.php');
/*

$stid = oci_parse($conn, "INSERT INTO DEPT (DEPTNO, DNAME, LOC) VALUES (50, 'EXAM','KTM' )");

if(oci_execute($stid))
{
    echo"Data inserted";
}
else{
    echo "Error while inserting  data";
}
// The row is committed and immediately visible to other users

*/

$stid = oci_parse($conn, "INSERT INTO DEPT (DEPTNO, DNAME, LOC) VALUES (:deptno, :dname, :loc)");
$deptno=60;
$dname="Finance";
$loc= "Bhaktapur";

oci_bind_by_name($stid, ":deptno", $deptno);
oci_bind_by_name($stid, ":dname", $dname);
oci_bind_by_name($stid, ":loc", $loc);
oci_execute($stid, OCI_NO_AUTO_COMMIT);  // 
oci_commit($conn);  
oci_free_statement($stid);
oci_close($conn);


?>