<?php
require 'function.php';
// cek tombol submit sudah ketekan atau belum
if (isset($_POST["submit"])) {

    //cek apakah data berhasil ditambahkan atau tidak
    if (tambahPengembalian($_POST) > 0) {
        echo " 
			<script>
			alert('data pengembalian berhasil ditambahkan');
			document.location.href = 'pengembalian.php';
			</script>
		";
    } else {
        echo "<script>
        	alert('data pengembalian gagal ditambahkan');
        	document.location.href = 'pengembalian.php';
        	</script>";
        // echo 'Query Error : ' . mysqli_errno($conn) . '-' . mysqli_error($conn);
        // mysqli_error($conn);
    }
}

if (isset($_POST["back"])) {
    echo "<script>
        	document.location.href = 'pengembalian.php';
        	</script>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>halaman pengembalian</title>
</head>

<body>

    <form action="" method="POST">
        <ul>
            <li>
                <label for="id_pinjam"> ID Peminjaman : </label>
                <input type="text" name="id_pinjam" id="id_pinjam">
            </li>
            <li>
                <label for="id_member">ID Member : </label>
                <input type="text" name="id_member" id="id_member">
            </li>
            <li>
                <label for="idFilm">ID Film : </label>
                <input type="text" name="idFilm" id="idFilm">
            </li>
            <li>
                <label for="tgl_pengembalian"> Tanggal Kembali : </label>
                <input type="date" name="tgl_pengembalian" id="tgl_pengembalian">
            </li>
            <br>
            <li>
                <button type="submit" name="submit">tambah ke pengembalian </button>
                <button type="submit" name="back">kembali</button>
            </li>
        </ul>
    </form>
</body>

</html>