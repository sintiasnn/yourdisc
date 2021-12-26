<?php
require 'function.php';
$film = query("SELECT * FROM ringkas_film;");

//klik cari diklik
if (isset($_POST["cari"])) {
    $film = cariFilm($_POST["keyword"]);
}

// inisialisasi nilai jumlah data
$jumlah = query("SELECT COUNT(*) FROM ringkas_film")[0];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>list DVD</title>
</head>

<body>
    <a href="tambahfilm.php">Tambah film</a>
    <br>
    <a href="index.php">kembali</a>

    <br><br>
    <form action="" method="POST">
        <input type="text" name="keyword" size="30" autofocus placeholder="masukan keyword" autocomplete="off">
        <button type="submit" name="cari"></button>
    </form>

    <br>
    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>ID Film</th>
            <th>judul</th>
            <th>kategori</th>
            <th>tipe disc</th>
            <th>stok</th>
            <th>harga</th>
            <th>aksi</th>
        </tr>
        <?php foreach ($film as $row) : ?>
            <tr>
                <td>
                    <?= $row["idFilm"]; ?>
                </td>
                <td>
                    <?= $row["judul"]; ?>
                </td>
                <td>
                    <?= $row["Kategori"]; ?>
                </td>
                <td>
                    <?= $row["tipe_disc"]; ?>
                </td>
                <td>
                    <?= $row["stok"]; ?>
                </td>
                <td>
                    <?= $row["harga"]; ?>
                </td>
                <td>
                    <a href="detailfilm.php?idFilm=<?= $row["idFilm"]; ?>">detail</a> |
                    <a href="ubahdatafilm.php?idFilm=<?= $row["idFilm"]; ?>">ubah</a> |
                    <a href="hapusdatafilm.php?idFilm=<?= $row["idFilm"]; ?>" onclick="return confirm('yakin?')">hapus</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    <br> <br>
    <a>Jumlah CD : <?php echo $jumlah["COUNT(*)"]; ?></a>
    <br><br>


</body>

</html>