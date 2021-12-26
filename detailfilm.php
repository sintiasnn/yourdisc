<?php
require 'function.php';

//check url
if (!isset($_GET["idFilm"])) {
    header("Location: index.php");
    exit();
} else {
    $idFilm = $_GET["idFilm"];
    $res = mysqli_query($conn, "SELECT * FROM tbl_film WHERE idFilm=$idFilm");
    $mem = mysqli_fetch_assoc($res);

    if ($mem["idFilm"] === null) {
        header("Location: index.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail </title>
</head>

<body>

</body>

</html>