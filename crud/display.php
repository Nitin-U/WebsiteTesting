<?php
include_once('connection.php');
$stid = oci_parse($conn, 'SELECT * FROM DEPT');
oci_execute($stid);

echo "<table border='1'>\n";
while ($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {
    echo "<tr>\n";
    foreach ($row as $item) {
        echo "    <td>" . ($item !== null ? htmlentities($item, ENT_QUOTES) : "&nbsp;") . "</td>\n";
    }
    echo "</tr>\n";
}
echo "</table>\n";


$stid = oci_parse($conn, 'SELECT * FROM DEPT');
oci_execute($stid);
while (oci_fetch($stid)) {
    echo oci_result($stid, 'DEPTNO');
    echo oci_result($stid, 'DNAME');
    echo oci_result($stid, 'LOC') . "<br>\n";
}
oci_free_statement($stid);



$stid = oci_parse($conn, 'SELECT * FROM DEPT');
oci_execute($stid);
while ($row = oci_fetch_array($stid)) {
    echo $row['DEPTNO'];
    echo $row['DNAME'];
    echo $row['LOC']; "<br>\n";
  
}
oci_free_statement($stid);
oci_close($conn);

?>