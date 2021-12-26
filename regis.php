<?php
require 'function.php';

if (isset($_POST['register'])) {

	if (regis($_POST) > 0) {
		echo "<script>
			alert('user berhasil ditambahkan');
			document.location.href = 'welcomepage.php';
			</script>";
	} else {
		echo mysqli_error($conn);
	}
}




?>
<!DOCTYPE html>
<html>

<head>
	<title>Halaman Registrasi</title>
	<style>
		label {
			display: block;
		}
	</style>
</head>

<body>

	<h1>Halaman Registrasi</h1>

	<form action="" method="post">
		<ul>
			<li>
				<label for="nama">nama : </label>
				<input type="text" name="nama">
			</li>
			<li>
				<label for="email">email : </label>
				<input type="text" name="email">
			</li>
			<li>
				<label for="username">username : </label>
				<input type="text" name="username">
			</li>
			<li>
				<label for="password">password : </label>
				<input type="password" name="password">
			</li>
			<li>
				<label for="password2">konfirmasi password : </label>
				<input type="password" name="password2">
			</li>
			<li>
				<button type="submit" name="register">register</button>
			</li>
		</ul>
	</form>
</body>

</html>