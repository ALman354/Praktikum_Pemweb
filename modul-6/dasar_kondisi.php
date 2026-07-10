<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latihan Kondisi PHP</title>
    <style>
        .lulus { color: green; font-weight: bold; }
        .gagal { color: red; font-weight: bold; }
    </style>
</head>
<body>
    <h1>Cek Nilai</h1>

    <?php
        // Inisialisasi nilai
        $nilai = 85;

        // Tampilkan nilai
        echo "<p>Nilai Anda: <strong>$nilai</strong></p>";

        // Cek kelulusan
        if ($nilai >= 75) {
            echo "<p class='lulus'>✅ Selamat, Anda Lulus!</p>";
        } else {
            echo "<p class='gagal'>❌ Maaf, Anda perlu belajar lagi.</p>";
        }
    ?>
</body>
</html>