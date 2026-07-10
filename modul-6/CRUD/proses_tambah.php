<?php
include '../koneksi.php';

$nama = $_POST['nama_pasien'];
$tgl_lahir = $_POST['tanggal_lahir'];
$jk = $_POST['jenis_kelamin'];
$alamat = $_POST['alamat'];
$no_telp = $_POST['no_telp'];

$sql = "INSERT INTO pasien (nama_pasien, tanggal_lahir, jenis_kelamin, alamat, no_telp)
        VALUES ('$nama', '$tgl_lahir', '$jk', '$alamat', '$no_telp')";

if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Data berhasil ditambahkan!'); window.location='../index.php';</script>";
} else {
    echo "Error: " . $conn->error;
}

$conn->close();
?>
