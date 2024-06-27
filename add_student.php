<?php
include 'db.php';

$name = $_POST['name'];
$classId = $_POST['classId'];

$sql = "INSERT INTO Student (Name, ClassId) VALUES (?, ?)";
$params = array($name, $classId);

$stmt = sqlsrv_query($conn, $sql, $params);

if ($stmt === false) {
    die(print_r(sqlsrv_errors(), true));
} else {
    header("Location: students.php");
}

sqlsrv_free_stmt($stmt);
sqlsrv_close($conn);
?>
