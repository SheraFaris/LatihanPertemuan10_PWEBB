<?php
require 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama   = mysqli_real_escape_string($koneksi, $_POST['nama']);
    $nis    = mysqli_real_escape_string($koneksi, $_POST['nis']);
    $jurusan= mysqli_real_escape_string($koneksi, $_POST['jurusan']);
    $jk     = mysqli_real_escape_string($koneksi, $_POST['jenis_kelamin']);
    $no_hp  = mysqli_real_escape_string($koneksi, $_POST['no_hp']);
    $alamat = mysqli_real_escape_string($koneksi, $_POST['alamat']);
    $tgl    = date('Y-m-d'); // otomatis tanggal hari ini

    $sql = "INSERT INTO siswa (nama, nis, jurusan, jenis_kelamin, no_hp, alamat, tanggal_daftar)
            VALUES ('$nama', '$nis', '$jurusan', '$jk', '$no_hp', '$alamat', '$tgl')";

    if (mysqli_query($koneksi, $sql)) {
        header("Location: index.php");
        exit;
    } else {
        $error = "Gagal menyimpan: " . mysqli_error($koneksi);
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Siswa - SMK Coding</title>
</head>
<body>

<h2>Form Pendaftaran Siswa Baru</h2>
<p><a href="index.php">← Kembali ke daftar</a></p>

<?php if (!empty($error)) echo "<p style='color:red;'>$error</p>"; ?>

<form method="post">
    <p>
        <label>Nama Lengkap<br>
            <input type="text" name="nama" required>
        </label>
    </p>
    <p>
        <label>NIS<br>
            <input type="text" name="nis" required>
        </label>
    </p>
    <p>
        <label>Jurusan<br>
            <select name="jurusan" required>
                <option value="">-- pilih jurusan --</option>
                <option value="RPL">RPL (Rekayasa Perangkat Lunak)</option>
                <option value="TKJ">TKJ (Teknik Komputer & Jaringan)</option>
                <option value="DKV">DKV (Desain Komunikasi Visual)</option>
            </select>
        </label>
    </p>
    <p>
        <label>Jenis Kelamin<br>
            <input type="radio" name="jenis_kelamin" value="L" required> Laki-laki
            <input type="radio" name="jenis_kelamin" value="P" required> Perempuan
        </label>
    </p>
    <p>
        <label>No HP<br>
            <input type="text" name="no_hp">
        </label>
    </p>
    <p>
        <label>Alamat<br>
            <textarea name="alamat" rows="3"></textarea>
        </label>
    </p>
    <p>
        <button type="submit">Simpan</button>
    </p>
</form>

</body>
</html>
