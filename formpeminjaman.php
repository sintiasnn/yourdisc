<?php
require 'function.php';
// cek tombol submit sudah ketekan atau belum
if (isset($_POST["submit"])) {

    //cek apakah data berhasil ditambahkan atau tidak
    if (tambahPeminjaman($_POST) > 0) {
        echo " 
			<script>
			alert('data peminjaman berhasil ditambahkan');
			document.location.href = 'peminjaman.php';
			</script>
		";
    } else {
        echo "<script>
			alert('data peminjaman gagal ditambahkan');
			document.location.href = 'peminjaman.php';
			</script>";
    }
}

if (isset($_POST["back"])) {
    echo "<script>
        	document.location.href = 'peminjaman.php';
        	</script>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>form peminjaman</title>
</head>

<body>

    <form action="" method="POST">
        <ul>
            <li>
                <label for="id_pinjam"> ID Peminjaman : </label>
                <input type="text" name="id_pinjam" id="id_pinjam">
            </li>
            <li>
                <label for="id_member"> ID Member : </label>
                <input type="text" name="id_member" id="id_member">
            </li>
            <li>
                <label for="idFilm"> ID Film : </label>
                <input type="text" name="idFilm" id="idFilm">
            </li>
            <li>
                <label for="jml_barang"> Qty : </label>
                <input type="number" name="jml_barang" id="jml_barang">
            </li>
            <li>
                <label for="tgl_pinjam">Tanggal Pinjam : </label>
                <input type="date" name="tgl_pinjam" id="tgl_pinjam">
            </li>
            <li>
                <label for="tgl_kembali">Tanggal Kembali : </label>
                <input type="date" name="tgl_kembali" id="tgl_kembali">
            </li>
            <li>
                <label for="status">Status : </label>
                <select name="status" id="status">
                    <option value="dipinjam">dipinjam</option>
                    <option value="dikembalikan">dikembalikan</option>
                </select>
            </li>
            <br>
            <li>
                <button type="submit" name="submit">masukan ke peminjaman</button>
                <button type="submit" name="back">kembali</button>
            </li>
        </ul>
    </form>
</body>

</html>