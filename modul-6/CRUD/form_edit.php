<?php
include '../koneksi.php';

$id = $_GET['id'];
$sql = "SELECT * FROM pasien WHERE id = $id";
$result = $conn->query($sql);
$data = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Data Pasien</title>
    <style>
        * { box-sizing: border-box; }
        body { font-family: Arial, sans-serif; margin: 40px; }
        form { width: 400px; }
        label { display: block; margin-top: 10px; font-weight: bold; }
        input, select, textarea {
            width: 100%; padding: 8px; margin-top: 5px;
            border: 1px solid #ccc; border-radius: 4px;
        }
        button { margin-top: 15px; padding: 10px 20px; background: #4CAF50; color: white;
                 border: none; border-radius: 4px; cursor: pointer; }
        button:hover { background: #45a049; }
        .btn-kembali { background: #6c757d; }
        .btn-kembali:hover { background: #5a6268; }
    </style>
</head>
<body>
    <h2>Edit Data Pasien</h2>
    <form method="POST" action="proses_update.php">
        <input type="hidden" name="id" value="<?= $data['id'] ?>">

        <label>Nama Pasien</label>
        <input type="text" name="nama_pasien" value="<?= $data['nama_pasien'] ?>" required>

        <label>Tanggal Lahir</label>
        <input type="date" name="tanggal_lahir" value="<?= $data['tanggal_lahir'] ?>" required>

        <label>Jenis Kelamin</label>
        <select name="jenis_kelamin" required>
            <option value="">-- Pilih --</option>
            <option value="L" <?= $data['jenis_kelamin'] == 'L' ? 'selected' : '' ?>>Laki-laki</option>
            <option value="P" <?= $data['jenis_kelamin'] == 'P' ? 'selected' : '' ?>>Perempuan</option>
        </select>

        <label>Alamat</label>
        <textarea name="alamat" rows="3"><?= $data['alamat'] ?></textarea>

        <label>No. Telepon</label>
        <input type="text" name="no_telp" value="<?= $data['no_telp'] ?>">

        <button type="submit">Update</button>
        <a href="../index.php"><button type="button" class="btn-kembali">Kembali</button></a>
    </form>
</body>
</html>
<?php $conn->close(); ?>
