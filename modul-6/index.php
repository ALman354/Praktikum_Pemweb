<?php
include 'koneksi.php';
include 'config/produk.php';

$produkList = getAllProduk($conn);
$conn->close();
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Puskesmas - Manajemen Produk</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #e0f7fa 0%, #f0fdf4 100%);
            min-height: 100vh;
            padding: 40px 20px;
        }

        .container {
            max-width: 1100px;
            margin: 0 auto;
            background: white;
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .header {
            background: linear-gradient(135deg, #0d9488, #14b8a6);
            padding: 30px 40px;
            color: white;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .header h1 {
            font-size: 26px;
            font-weight: 700;
            letter-spacing: -0.5px;
        }

        .header h1 i {
            margin-right: 12px;
        }

        .header .sub {
            font-size: 13px;
            opacity: 0.85;
            margin-top: 4px;
        }

        .btn-tambah {
            background: white;
            color: #0d9488;
            padding: 12px 24px;
            border-radius: 12px;
            text-decoration: none;
            font-weight: 600;
            font-size: 14px;
            transition: all 0.3s;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .btn-tambah:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
        }

        .content { padding: 30px 40px 40px; }

        .table-wrapper {
            overflow-x: auto;
            border-radius: 12px;
            border: 1px solid #e5e7eb;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 14px;
        }

        thead {
            background: #f1f5f9;
        }

        thead th {
            padding: 14px 16px;
            text-align: left;
            font-weight: 600;
            color: #475569;
            text-transform: uppercase;
            font-size: 12px;
            letter-spacing: 0.5px;
            border-bottom: 2px solid #e2e8f0;
        }

        tbody td {
            padding: 14px 16px;
            border-bottom: 1px solid #f1f5f9;
            color: #334155;
        }

        tbody tr:hover {
            background: #f8fafc;
        }

        tbody tr:last-child td {
            border-bottom: none;
        }

        .badge {
            display: inline-block;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
        }

        .badge-stok {
            background: #dcfce7;
            color: #166534;
        }

        .badge-stok-low {
            background: #fef2f2;
            color: #991b1b;
        }

        .harga-text {
            font-weight: 600;
            color: #0f172a;
        }

        .aksi {
            display: flex;
            gap: 8px;
        }

        .btn {
            padding: 8px 16px;
            border-radius: 8px;
            border: none;
            font-size: 13px;
            font-weight: 500;
            cursor: pointer;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            transition: all 0.2s;
        }

        .btn-edit {
            background: #eff6ff;
            color: #1d4ed8;
        }

        .btn-edit:hover {
            background: #dbeafe;
        }

        .btn-hapus {
            background: #fef2f2;
            color: #dc2626;
        }

        .btn-hapus:hover {
            background: #fee2e2;
        }

        .empty-state {
            text-align: center;
            padding: 60px 20px;
            color: #94a3b8;
        }

        .empty-state i {
            font-size: 48px;
            margin-bottom: 16px;
            opacity: 0.5;
        }

        .empty-state p {
            font-size: 16px;
        }

        @media (max-width: 640px) {
            .header {
                flex-direction: column;
                align-items: flex-start;
                gap: 16px;
                padding: 20px;
            }

            .content { padding: 20px; }

            .aksi { flex-direction: column; }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <div>
                <h1><i class="fas fa-boxes"></i> Manajemen Produk</h1>
                <div class="sub">Puskesmas - Inventaris Produk Kesehatan</div>
            </div>
            <a href="tambah.php" class="btn-tambah">
                <i class="fas fa-plus"></i> Tambah Produk Baru
            </a>
        </div>
        <div class="content">
            <div class="table-wrapper">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama Produk</th>
                            <th>Harga</th>
                            <th>Stok</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($produkList)): ?>
                            <tr>
                                <td colspan="5">
                                    <div class="empty-state">
                                        <i class="fas fa-box-open"></i>
                                        <p>Belum ada produk tersedia.</p>
                                    </div>
                                </td>
                            </tr>
                        <?php else: ?>
                            <?php foreach ($produkList as $produk): ?>
                            <tr>
                                <td><strong>#<?= $produk['produk_id'] ?></strong></td>
                                <td><?= htmlspecialchars($produk['nama_produk']) ?></td>
                                <td><span class="harga-text">Rp <?= number_format($produk['harga'], 0, ',', '.') ?></span></td>
                                <td>
                                    <span class="badge <?= $produk['stok'] > 20 ? 'badge-stok' : 'badge-stok-low' ?>">
                                        <?= $produk['stok'] ?> unit
                                    </span>
                                </td>
                                <td>
                                    <div class="aksi">
                                        <a href="edit.php?id=<?= $produk['produk_id'] ?>" class="btn btn-edit">
                                            <i class="fas fa-pen"></i> Edit
                                        </a>
                                        <a href="hapus.php?id=<?= $produk['produk_id'] ?>" class="btn btn-hapus" onclick="return confirm('Yakin ingin menghapus produk ini?')">
                                            <i class="fas fa-trash"></i> Hapus
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
