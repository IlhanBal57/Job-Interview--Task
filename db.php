<?php
$serverName = ".\sqlexpress"; // Server adını girin
$connectionOptions = array(
    "Database" => "bal",
    "Uid" => "sa",
    "PWD" => "1"
);

// Bağlantı kur
$conn = sqlsrv_connect($serverName, $connectionOptions);

if ($conn === false) {
    die(print_r(sqlsrv_errors(), true));
}
?>
