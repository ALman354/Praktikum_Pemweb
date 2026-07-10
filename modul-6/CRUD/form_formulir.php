<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Data Pasien</title>
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
    </style>
</head>
<body>
    <h2>Tambah Data Pasien</h2>
    <form method="POST" action="proses_tambah.php">
        <label>Nama Pasien</label>
        <input type="text" name="nama_pasien" required>

        <label>Tanggal Lahir</label>
        <input type="date" name="tanggal_lahir" required>

        <label>Jenis Kelamin</label>
        <select name="jenis_kelamin" required>
            <option value="">-- Pilih --</option>
            <option value="L">Laki-laki</option>
            <option value="P">Perempuan</option>
        </select>

        <label>Alamat</label>
        <textarea name="alamat" rows="3"></textarea>

        <label>No. Telepon</label>
        <input type="text" name="no_telp">

        <button type="submit">Simpan</button>
    </form>
</body>
</html>
