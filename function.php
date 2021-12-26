<?php
//make connection to database
$conn = mysqli_connect("localhost", "root", "", "yourdisc");

function query($query)
{
	global $conn;
	$result = mysqli_query($conn, $query);
	$rows = [];
	while ($row = mysqli_fetch_assoc($result)) {
		$rows[] = $row;
	}
	return $rows;
}

function regis($data)
{
	global $conn;
	$nama = $data["nama"];
	$email = $data["email"];
	$username = strtolower(stripcslashes($data["username"]));
	$password = mysqli_real_escape_string($conn, $data["password"]);
	$password2 = mysqli_real_escape_string($conn, $data["password2"]);

	//cek username sudah ada atau belum
	$result = mysqli_query($conn, "SELECT username FROM tbl_admin where username='$username'");

	if (mysqli_fetch_assoc($result)) {
		echo "<script>
		alert('username sudah terdaftar');
		</script>";
		return false;
	}

	//cek konfirmasi pass
	if ($password !== $password2) {
		echo "<script>
		alert('konfirmasi pass tidak sesuai');
		</script>";
		return false;
	}

	//enkripsi password 
	$password = password_hash($password, PASSWORD_DEFAULT);

	//tambahkan user baru ke database
	mysqli_query(
		$conn,
		"INSERT INTO tbl_admin 
		VALUES('','$nama','$email','$username','$password')"
	);

	return mysqli_affected_rows($conn);
}

function tambahMember($data)
{
	global $conn;
	$id_member = $data["id_member"];
	$nama = htmlspecialchars($data["nama"]);
	$tmplahir = htmlspecialchars($data["tmplahir"]);
	$tgllahir = htmlspecialchars($data["tgllahir"]);
	$JK = htmlspecialchars($data["JK"]);
	$alamat = htmlspecialchars($data["alamat"]);
	$telp = htmlspecialchars($data["telp"]);
	$email = htmlspecialchars($data["email"]);

	//query insert data
	$query = "INSERT INTO tbl_member
			VALUES
			('$id_member','$nama','$tmplahir','$tgllahir','$JK','$alamat','$telp','$email')";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}

function tambahFilm($data)
{
	global $conn;
	$idFilm = htmlspecialchars($data["idFilm"]);
	$judul = htmlspecialchars($data["judul"]);
	$kode_film = $data["kode_film"];
	$pemain = htmlspecialchars($data["pemain"]);
	$tipe_disc = htmlspecialchars($data["tipe_disc"]);
	$jml_disc = ($data["jml_disc"]);
	$sinopsis = htmlspecialchars($data["sinopsis"]);
	$stok = ($data["stok"]);
	$harga = ($data["harga"]);

	//query insert data
	$query = "INSERT INTO tbl_film
			VALUES
			('$idFilm','$judul','$kode_film','$pemain',
			'$tipe_disc','$jml_disc','$sinopsis','$stok','$harga')";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}

function ubahMember($data)
{
	global $conn;
	$id_member = $data["id_member"];
	$nama = htmlspecialchars($data["nama"]);
	$tmplahir = htmlspecialchars($data["tmplahir"]);
	$tgllahir = htmlspecialchars($data["tgllahir"]);
	$JK = htmlspecialchars($data["JK"]);
	$alamat = htmlspecialchars($data["alamat"]);
	$telp = htmlspecialchars($data["telp"]);
	$email = htmlspecialchars($data["email"]);

	//query update data
	$query = "UPDATE tbl_member SET
			nama = '$nama',	
			tmplahir = '$tmplahir',
			tgllahir = '$tgllahir',
			JK = '$JK',
			alamat = '$alamat',
			telp = '$telp',
			email = '$email' 
			where id_member='$id_member'
			";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}

function ubahFilm($data)
{
	global $conn;
	$idFilm = htmlspecialchars($data["idFilm"]);
	$judul = htmlspecialchars($data["judul"]);
	$kode_film = $data["kode_film"];
	$pemain = htmlspecialchars($data["pemain"]);
	$tipe_disc = htmlspecialchars($data["tipe_disc"]);
	$jml_disc = $data["jml_disc"];
	$sinopsis = htmlspecialchars($data["sinopsis"]);
	$stok = $data["stok"];
	$harga = $data["harga"];

	//query update data
	$query = "UPDATE tbl_film
			SET
			judul = '$judul',
			kode_film = $kode_film,
			pemain = '$pemain',
			tipe_disc = '$tipe_disc',
			jml_disc=$jml_disc,
			sinopsis='$sinopsis',
			stok= $stok,
			harga= $harga
			where idFilm='$idFilm'";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}

function cariMember($keyword)
{
	$query = "SELECT * FROM tbl_member
			where
			nama like '%$keyword%' or 
			tmplahir like '%$keyword%' or 
			tgllahir like '%$keyword%' or
			JK like '%$keyword%' or 
			alamat like '%$keyword%' or
			telp like '%$keyword%' or
			email like '%$keyword%'
			";
	return query($query);
}

function cariFilm($keyword)
{
	$query = "SELECT * FROM tbl_film
			where
			id_film like '%$keyword%' or 
			judul like '%$keyword%' or 
			kode_film like '%$keyword%' or 
			tipe_disc like '%$keyword%' or
			jml_disc like '%$keyword%' or
			sinopsis like '%$keyword%' or
			stok like '%$keyword%' or
			harga like '%$keyword%'			
			";
	return query($query);
}

function hapusMember($id)
{
	global $conn;
	mysqli_query($conn, "DELETE FROM tbl_member where id_member='$id'");
	return mysqli_affected_rows($conn);
}

function hapusFilm($id)
{
	global $conn;
	mysqli_query($conn, "DELETE FROM tbl_film where idFilm='$id'");
	return mysqli_affected_rows($conn);
}

function tambahPeminjaman($data)
{
	global $conn;
	$id_pinjam = htmlspecialchars($data["id_pinjam"]);
	$id_member = htmlspecialchars($data["id_member"]);
	$idFilm = htmlspecialchars($data["idFilm"]);
	$jml_barang = ($data["jml_barang"]);
	$tgl_pinjam = ($data["tgl_pinjam"]);
	$tgl_kembali = ($data["tgl_kembali"]);
	$status = ($data["status"]);

	//query insert data
	$query = "INSERT INTO tbl_peminjaman
			VALUES
			('$id_pinjam','$id_member','$idFilm','$jml_barang','$tgl_pinjam','$tgl_kembali','$status')";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}

function tambahPengembalian($data)
{
	global $conn;
	$id_pinjam = htmlspecialchars($data["id_pinjam"]);
	$id_member = htmlspecialchars($data["id_member"]);
	$idFilm = htmlspecialchars($data["idFilm"]);
	$tgl_pengembalian = ($data["tgl_pengembalian"]);

	$query = "INSERT INTO tbl_pengembalian 
			VALUES
			('$id_pinjam','$id_member','$idFilm','$tgl_pengembalian')";
	mysqli_query($conn, $query);
	return mysqli_affected_rows($conn);
}
