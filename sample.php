<?php// Connects to the XE service (i.e. database) on the "localhost" machine
$conn = oci_connect('system', 'Hari2000', 'localhost/ORCL');
if (!$conn) {
    $e = oci_error();
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
}

$stid = oci_parse($conn, 'SELECT * FROM students');
oci_execute($stid);

echo "<table border='1'> ";
while ($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {
    echo "<tr> ";
    foreach ($row as $item) {
        echo "    <td>" . ($item !== null ? htmlentities($item, ENT_QUOTES) : "&nbsp;") . "</td> ";
    }
    echo "</tr> ";
}
echo "</table> ";

?>