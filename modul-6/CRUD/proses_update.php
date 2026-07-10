<?php
include '../koneksi.php';

$id = $_POST['id'];
$nama = $_POST['nama_pasien'];
$tgl_lahir = $_POST['tanggal_lahir'];
$jk = $_POST['jenis_kelamin'];
$alamat = $_POST['alamat'];
$no_telp = $_POST['no_telp'];

$sql = "UPDATE pasien SET
        nama_pasien = '$nama',
        tanggal_lahir = '$tgl_lahir',
        jenis_kelamin = '$jk',
        alamat = '$alamat',
        no_telp = '$no_telp'
        WHERE id_pasien = $id";

if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Data berhasil diupdate!'); window.location='../index.php';</script>";
} else {
    echo "Error: " . $conn->error;
}

$conn->close();
?>
