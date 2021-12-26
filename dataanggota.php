<?php
require 'function.php';
$member = query("SELECT * FROM tbl_member order by id_member ASC");

//klik cari diklik
if (isset($_POST["cari"])) {
    $member = cariMember($_POST["keyword"]);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>tambah data</title>
</head>

<body>
    <a href="tambahanggota.php">Tambah Member</a>
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
            <th>ID Member</th>
            <th>Nama</th>
            <th>tempat lahir</th>
            <th>tanggal lahir</th>
            <th>Jenis Kelamin</th>
            <th>Alamat</th>
            <th>No. Telp</th>
            <th>Email</th>
            <th>aksi</th>
        </tr>
        <?php foreach ($member as $row) : ?>
            <tr>
                <td>
                    <?= $row["id_member"]; ?>
                </td>
                <td>
                    <?= $row["nama"]; ?>
                </td>
                <td>
                    <?= $row["tmplahir"]; ?>
                </td>
                <td>
                    <?= $row["tgllahir"]; ?>
                </td>
                <td>
                    <?= $row["JK"]; ?>
                </td>
                <td>
                    <?= $row["alamat"]; ?>
                </td>
                <td>
                    <?= $row["telp"]; ?>
                </td>
                <td>
                    <?= $row["email"]; ?>
                </td>
                <td>
                    <a href="ubahdataanggota.php?id_member=<?= $row["id_member"]; ?>">ubah</a> |
                    <a href="hapusdataanggota.php?id_member=<?= $row["id_member"]; ?>" onclick="return confirm('yakin?')">hapus</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>

</html>