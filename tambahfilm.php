<?php
require 'function.php';
// cek tombol submit sudah ketekan atau belum
if (isset($_POST["submit"])) {

    //cek apakah data berhasil ditambahkan atau tidak
    if (tambahFilm($_POST) > 0) {
        echo " 
			<script>
			alert('data berhasil ditambahkan');
			document.location.href = 'index.php';
			</script>
		";
    } else {
        echo "<script>
			alert('data gagal ditambahkan');
			document.location.href = 'index.php';
			</script>";
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Tambah data film</title>
</head>

<body>

    <h1>tambah data film</h1>

    <form action="" method="post" enctype="multipart/form-data">
        <ul>
            <li>
                <label for="idFilm">ID Film : </label>
                <input type="text" name="idFilm" id="idFilm" required>
            </li>
            <li>
                <label for="judul">judul : </label>
                <input type="text" name="judul" id="judul" required>
            </li>
            <li>
                <label for="kode_film">Kode Film : </label>
                <input type="number" name="kode_film" id="kode_film" required>
            </li>
            <li>
                <label for="pemain">Pemain : </label>
                <input type="text" name="pemain" id="pemain" required>
            </li>
            <li>
                <label for="tipe_disc">Tipe Disc : </label>
                <input type="text" name="tipe_disc" id="tipe_disc" placeholder="DVD/VCD" required>
            </li>
            <li>
                <label for="jml_disc">Jumlah Disc : </label>
                <input type="number" name="jml_disc" id="jml_disc" required>
            </li>
            <li>
                <label for="sinopsis">sinopsis : </label>
                <input type="text" name="sinopsis" id="sinopsis" required>
            </li>
            <li>
                <label for="stok">stok : </label>
                <input type="number" name="stok" id="stok" required>
            </li>
            <li>
                <label for="harga">harga : </label>
                <input type="number" name="harga" id="harga" required>
            </li>
            <br>
            <li>
                <button type="submit" name="submit">Tambah Data</button>
            </li>
        </ul>

    </form>

</body>

</html>