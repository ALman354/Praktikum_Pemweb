<?php
include '../koneksi.php';

$id = $_GET['id'];

$sql = "DELETE FROM pasien WHERE id_pasien = $id";

if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Data berhasil dihapus!'); window.location='../index.php';</script>";
} else {
    echo "Error: " . $conn->error;
}

$conn->close();
?>
