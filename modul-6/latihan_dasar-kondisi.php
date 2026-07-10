<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latihan Kondisi PHP</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background: #f5f7fa;
        }
        .container {
            background: white;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            max-width: 500px;
            margin: auto;
        }
        h1 {
            color: #2c3e50;
        }
        .info {
            font-size: 1.1em;
            margin: 10px 0;
        }
        .lulus {
            color: green;
            font-weight: bold;
        }
        .gagal {
            color: red;
            font-weight: bold;
        }
        .kategori {
            background: #ecf0f1;
            padding: 8px 15px;
            border-radius: 5px;
            display: inline-block;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Cek Nilai</h1>

        <?php
            // Nilai yang akan dicek (bisa diubah sesuai keinginan)
            $nilai = 85;

            // Tampilkan nilai
            echo "<p class='info'>Nilai Anda: <strong>$nilai</strong></p>";

            // ========== MENENTUKAN KATEGORI NILAI ==========
            if ($nilai > 90) {
                $kategori = "Sangat Baik";
            } elseif ($nilai > 80) {
                $kategori = "Baik";
            } elseif ($nilai > 70) {
                $kategori = "Cukup";
            } elseif ($nilai > 60) {
                $kategori = "Kurang";
            } else {
                $kategori = "Sangat Kurang";
            }

            // Tampilkan kategori
            echo "<p class='info'>Kategori: <span class='kategori'>$kategori</span></p>";

            // ========== MENENTUKAN KELULUSAN ==========
            if ($nilai >= 75) {
                echo "<p class='lulus'>✅ Selamat, Anda Lulus!</p>";
            } else {
                echo "<p class='gagal'>❌ Maaf, Anda perlu belajar lagi.</p>";
            }
        ?>
    </div>
</body>
</html>