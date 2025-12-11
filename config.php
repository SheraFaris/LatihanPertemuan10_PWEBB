<?php
$host = "localhost";
$user = "root";      // ganti kalau beda
$pass = "";          // ganti kalau ada password
$db   = "db_smk_coding";

$koneksi = mysqli_connect($host, $user, $pass, $db);

if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
