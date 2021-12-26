<?php
require 'function.php';
// cek tombol submit sudah ketekan atau belum
if (isset($_POST["submit"])) {

    //cek apakah data berhasil ditambahkan atau tidak
    if (tambahMember($_POST) > 0) {
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
    <title>Tambah data mahasiswa</title>
</head>

<body>

    <h1>tambah data mahasiswa</h1>

    <form action="" method="post">
        <ul>
            <li>
                <label for="id_member">ID Member : </label>
                <input type="text" name="id_member" id="id_member">
            </li>
            <li>
                <label for="nama">nama : </label>
                <input type="text" name="nama" id="nama">
            </li>
            <li>
                <label for="tmplahir">tempat lahir : </label>
                <input type="text" name="tmplahir" id="tmplahir">
            </li>
            <li>
                <label for="tgllahir">tanggal lahir : </label>
                <input type="text" name="tgllahir" id="tgllahir">
            </li>
            <li>
                <label for="JK">Jenis Kelamin : </label>
                <input type="text" name="JK" id="JK">
            </li>
            <li>
                <label for="alamat">alamat : </label>
                <input type="text" name="alamat" id="alamat">
            </li>
            <li>
                <label for="telp">no. telpon : </label>
                <input type="text" name="telp" id="telp">
            </li>
            <li>
                <label for="email">email : </label>
                <input type="text" name="email" id="email">
            </li>
            <li>
                <button type="submit" name="submit">Tambah Data</button>
            </li>
        </ul>

    </form>

</body>

</html>