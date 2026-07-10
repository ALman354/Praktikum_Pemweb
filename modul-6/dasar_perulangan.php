<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latihan Perulangan PHP</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        ul {
            list-style-type: square;
            padding-left: 20px;
        }
        li {
            margin: 5px 0;
            font-size: 1.1em;
        }
    </style>
</head>
<body>
    <h1>Daftar Angka 1 sampai 5</h1>
    <ul>
        <?php
            // Perulangan for dari 1 sampai 5
            for ($i = 1; $i <= 5; $i++) {
                echo "<li>Ini adalah item nomor " . $i . "</li>";
            }
        ?>
    </ul>
</body>
</html>