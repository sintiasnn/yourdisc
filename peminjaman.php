<?php
require 'function.php';
$pinjam = query("SELECT * FROM detail_peminjaman");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>peminjaman</title>
</head>

<body>

    <h1>halaman peminjaman</h1>

    <a href="formpeminjaman.php">tambah</a> |
    <a href="index.php">kembali</a>
    <br>
    <br>
    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>ID Pinjam</th>
            <th>Nama Member</th>
            <th>judul Film</th>
            <th>Tanggal Pinjam</th>
            <th>Tanggal Kembali</th>
            <th>Harga Sewa</th>
            <th>Status</th>
        </tr>
        <?php foreach ($pinjam as $row) :  ?>
            <tr>
                <td><?= $row["id_pinjam"]; ?></td>
                <td><?= $row["nama"]; ?></td>
                <td><?= $row["Judul_film"]; ?></td>
                <td><?= $row["tgl_pinjam"]; ?></td>
                <td><?= $row["tgl_kembali"]; ?></td>
                <td><?= $row["harga_sewa"]; ?></td>
                <td><?= $row["status"]; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>

</body>

</html>