<?php
include 'koneksi.php';
include 'config/produk.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama_produk'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];

    if (tambahProduk($conn, $nama, $harga, $stok)) {
        $conn->close();
        header('Location: index.php');
        exit;
    } else {
        $error = "Gagal menambahkan produk.";
    }
}
$conn->close();
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Produk - Puskesmas</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #e0f7fa 0%, #f0fdf4 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px 20px;
        }

        .card {
            background: white;
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 520px;
            overflow: hidden;
        }

        .card-header {
            background: linear-gradient(135deg, #0d9488, #14b8a6);
            padding: 28px 32px;
            color: white;
        }

        .card-header h1 {
            font-size: 22px;
            font-weight: 700;
        }

        .card-header h1 i {
            margin-right: 10px;
        }

        .card-header p {
            font-size: 13px;
            opacity: 0.85;
            margin-top: 4px;
        }

        .card-body {
            padding: 32px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            font-size: 13px;
            font-weight: 600;
            color: #374151;
            margin-bottom: 6px;
        }

        .form-group label i {
            margin-right: 6px;
            color: #0d9488;
        }

        .input-wrapper {
            position: relative;
        }

        .input-wrapper .prefix {
            position: absolute;
            left: 14px;
            top: 50%;
            transform: translateY(-50%);
            color: #9ca3af;
            font-weight: 600;
            font-size: 14px;
        }

        .form-control {
            width: 100%;
            padding: 12px 16px;
            border: 2px solid #e5e7eb;
            border-radius: 10px;
            font-size: 14px;
            transition: all 0.2s;
            outline: none;
            font-family: inherit;
        }

        .form-control:focus {
            border-color: #0d9488;
            box-shadow: 0 0 0 3px rgba(13, 148, 136, 0.1);
        }

        .form-control.price-input {
            padding-left: 40px;
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 16px;
        }

        .btn-group {
            display: flex;
            gap: 12px;
            margin-top: 28px;
        }

        .btn {
            padding: 12px 24px;
            border-radius: 10px;
            border: none;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            transition: all 0.2s;
            font-family: inherit;
            flex: 1;
        }

        .btn-primary {
            background: linear-gradient(135deg, #0d9488, #14b8a6);
            color: white;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(13, 148, 136, 0.3);
        }

        .btn-secondary {
            background: #f1f5f9;
            color: #475569;
        }

        .btn-secondary:hover {
            background: #e2e8f0;
        }

        .alert {
            padding: 12px 16px;
            border-radius: 10px;
            background: #fef2f2;
            color: #991b1b;
            font-size: 13px;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        @media (max-width: 480px) {
            .form-row {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <div class="card">
        <div class="card-header">
            <h1><i class="fas fa-plus-circle"></i> Tambah Produk</h1>
            <p>Masukkan data produk baru ke dalam inventaris</p>
        </div>
        <div class="card-body">
            <?php if (isset($error)): ?>
                <div class="alert"><i class="fas fa-exclamation-circle"></i> <?= $error ?></div>
            <?php endif; ?>

            <form method="POST">
                <div class="form-group">
                    <label><i class="fas fa-box"></i> Nama Produk</label>
                    <input type="text" name="nama_produk" class="form-control" placeholder="Masukkan nama produk" required>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label><i class="fas fa-tag"></i> Harga</label>
                        <div class="input-wrapper">
                            <span class="prefix">Rp</span>
                            <input type="number" name="harga" class="form-control price-input" placeholder="0" min="0" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label><i class="fas fa-cubes"></i> Stok</label>
                        <input type="number" name="stok" class="form-control" placeholder="0" min="0" required>
                    </div>
                </div>

                <div class="btn-group">
                    <a href="index.php" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Kembali
                    </a>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
