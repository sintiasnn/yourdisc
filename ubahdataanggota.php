<?php
require 'function.php';

//ambil data
$id = $_GET["id_member"];

//query data berdasarkan id
$member = query("SELECT * FROM tbl_member where id_member='$id'")[0];

// cek tombol submit sudah ketekan atau belum
if (isset($_POST["submit"])) {

    //cek apakah data berhasil diubah atau tidak
    if (ubahMember($_POST) > 0) {
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

    <h1>ubah data mahasiswa</h1>

    <form action="" method="post">
        <input type="hidden" name="id_member" id="id_member" value="<?= $member["id_member"]; ?>">
        <ul>
            <li>
                <label for="nama">nama : </label>
                <input type="text" name="nama" id="nama" value="<?= $member["nama"]; ?>">
            </li>
            <li>
                <label for="tmplahir">tempat lahir : </label>
                <input type="text" name="tmplahir" id="tmplahir" value="<?= $member["tmplahir"]; ?>">
            </li>
            <li>
                <label for="tgllahir">tanggal lahir : </label>
                <input type="text" name="tgllahir" id="tgllahir" value="<?= $member["tgllahir"]; ?>">
            </li>
            <li>
                <label for="JK">Jenis Kelamin : </label>
                <input type="text" name="JK" id="JK" value="<?= $member["JK"]; ?>">
            </li>
            <li>
                <label for="alamat">alamat : </label>
                <input type="text" name="alamat" id="alamat" value="<?= $member["alamat"]; ?>">
            </li>
            <li>
                <label for="telp">no. telpon : </label>
                <input type="text" name="telp" id="telp" value="<?= $member["telp"]; ?>">
            </li>
            <li>
                <label for="email">email : </label>
                <input type="text" name="email" id="email" value="<?= $member["email"]; ?>">
            </li>
            <li>
                <button type="submit" name="submit">ubah Data</button>
            </li>
        </ul>

    </form>

</body>

</html>