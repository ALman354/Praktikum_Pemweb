<?php
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "puskesmas";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Koneksi ke database gagal: " . $conn->connect_error);
}
?>