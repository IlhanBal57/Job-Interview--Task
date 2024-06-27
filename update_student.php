<?php
include 'db.php';

$id = $_POST['id'];
$name = $_POST['name'];
$classId = $_POST['classId'];

$sql = "UPDATE Student SET Name = ?, ClassId = ? WHERE Id = ?";
$params = array($name, $classId, $id);

$stmt = sqlsrv_query($conn, $sql, $params);

if ($stmt === false) {
    die(print_r(sqlsrv_errors(), true));
} else {
    header("Location: students.php");
}

sqlsrv_free_stmt($stmt);
sqlsrv_close($conn);
?>
