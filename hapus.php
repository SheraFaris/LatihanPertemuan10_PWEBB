<?php
require 'config.php';

if (isset($_GET['id'])) {
    $id = (int) $_GET['id'];
    mysqli_query($koneksi, "DELETE FROM siswa WHERE id=$id");
}

header("Location: index.php");
exit;
