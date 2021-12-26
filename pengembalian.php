<?php
require 'function.php';
$kembali = query("SELECT * FROM detail_pengembalian");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>pengembalian</title>
</head>

<body>
    <h1>halaman pengembalian</h1>

    <a href="formpengembalian.php">tambah</a> |
    <a href="index.php">kembali </a>

    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>ID Pinjam</th>
            <th>Nama Member</th>
            <th>Tanggal Pinjam</th>
            <th>Tanggal Kembali</th>
            <th>Denda</th>
        </tr>
        <?php foreach ($kembali as $row) : ?>
            <tr>
                <td><?= $row["id_pinjam"]; ?></td>
                <td><?= $row["nama"]; ?></td>
                <td><?= $row["tgl_pinjam"]; ?></td>
                <td><?= $row["tgl_pengembalian"]; ?></td>
                <td><?= $row["denda"]; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>

</html>