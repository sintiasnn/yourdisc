<?php
require 'function.php';

//ambil data
$id = $_GET["idFilm"];

//query data berdasarkan id yg dikirim
$film = query("SELECT * FROM tbl_film where idFilm='$id'")[0];
// var_dump($films);
// die;

// cek tombol submit sudah ketekan atau belum
if (isset($_POST["submit"])) {

    //cek apakah data berhasil diubah atau tidak
    if (ubahFilm($_POST) > 0) {
        echo " 
			<script>
			alert('data berhasil diubah');
			document.location.href = 'index.php';
			</script>
		";
    } else {
        echo "<script>
			alert('data gagal diubah');
			document.location.href = 'index.php';
			</script>";
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>ubah data mahasiswa</title>
</head>

<body>

    <h1>ubah data film</h1>

    <form action="" method="post" enctype="multipart/form-data">
        <input type="hidden" name="idFilm" id="idFilm" required value="<?= $film['idFilm']; ?>">
        <ul>
            <li>
                <label for="judul">judul : </label>
                <input type="text" name="judul" id="judul" required value="<?= $film['judul']; ?>">
            </li>
            <li>
                <label for="kode_film">Kode Film : </label>
                <input type="number" name="kode_film" id="kode_film" required value="<?= $film['kode_film']; ?>">
            </li>
            <li>
                <label for="pemain">Pemain : </label>
                <input type="text" name="pemain" id="pemain" required value="<?= $film['pemain']; ?>">
            </li>
            <li>
                <label for="tipe_disc">Tipe Disc : </label>
                <input type="text" name="tipe_disc" id="tipe_disc" placeholder="DVD/VCD" required value="<?= $film['tipe_disc']; ?>">
            </li>
            <li>
                <label for="jml_disc">Jumlah Disc : </label>
                <input type="number" name="jml_disc" id="jml_disc" required value="<?= $film['jml_disc']; ?>">
            </li>
            <li>
                <label for="sinopsis">sinopsis : </label>
                <input type="text" name="sinopsis" id="sinopsis" required value="<?= $film['sinopsis']; ?>">
            </li>
            <li>
                <label for="stok">stok : </label>
                <input type="number" name="stok" id="stok" required value="<?= $film['stok']; ?>">
            </li>
            <li>
                <label for="harga">harga : </label>
                <input type="number" name="harga" id="harga" required value="<?= $film['harga']; ?>">
            </li>
            <br>
            <li>
                <button type="submit" name="submit">Tambah Data</button>
            </li>
        </ul>

    </form>
</body>

</html>