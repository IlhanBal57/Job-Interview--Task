<?php
include 'db.php';

$id = $_GET['id'];

$sql = "DELETE FROM Student WHERE Id = ?";
$params = array($id);

$stmt = sqlsrv_query($conn, $sql, $params);

if ($stmt === false) {
    die(print_r(sqlsrv_errors(), true));
} else {
    header("Location: students.php");
}

sqlsrv_free_stmt($stmt);
sqlsrv_close($conn);
?>
