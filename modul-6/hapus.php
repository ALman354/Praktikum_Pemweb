<?php
include 'koneksi.php';
include 'config/produk.php';

$id = $_GET['id'] ?? 0;

if ($id > 0) {
    hapusProduk($conn, $id);
}

$conn->close();
header('Location: index.php');
exit;
