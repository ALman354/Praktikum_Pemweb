<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "puskesmas";

$conn = new mysqli(
    $servername,
    $username,
    $password,
    $dbname
);

if ($conn->connect_error) {
    die(
        "Koneksi ke database gagal: "
        . $conn->connect_error
    );
}

$conn->set_charset("utf8mb4");

?>