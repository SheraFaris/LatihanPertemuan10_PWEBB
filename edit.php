<?php
require 'config.php';

if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit;
}

$id = (int) $_GET['id'];
$q  = mysqli_query($koneksi, "SELECT * FROM siswa WHERE id=$id");
$data = mysqli_fetch_assoc($q);

if (!$data) {
    echo "Data siswa tidak ditemukan.";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama   = mysqli_real_escape_string($koneksi, $_POST['nama']);
    $nis    = mysqli_real_escape_string($koneksi, $_POST['nis']);
    $jurusan= mysqli_real_escape_string($koneksi, $_POST['jurusan']);
    $jk     = mysqli_real_escape_string($koneksi, $_POST['jenis_kelamin']);
    $no_hp  = mysqli_real_escape_string($koneksi, $_POST['no_hp']);
    $alamat = mysqli_real_escape_string($koneksi, $_POST['alamat']);

    $sql = "UPDATE siswa SET
                nama='$nama',
                nis='$nis',
                jurusan='$jurusan',
                jenis_kelamin='$jk',
                no_hp='$no_hp',
                alamat='$alamat'
            WHERE id=$id";

    if (mysqli_query($koneksi, $sql)) {
        header("Location: index.php");
        exit;
    } else {
        $error = "Gagal mengubah data: " . mysqli_error($koneksi);
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Siswa - SMK Coding</title>
</head>
<body>

<h2>Edit Data Siswa</h2>
<p><a href="index.php">← Kembali ke daftar</a></p>

<?php if (!empty($error)) echo "<p style='color:red;'>$error</p>"; ?>

<form method="post">
    <p>
        <label>Nama Lengkap<br>
            <input type="text" name="nama" value="<?= htmlspecialchars($data['nama']); ?>" required>
        </label>
    </p>
    <p>
        <label>NIS<br>
            <input type="text" name="nis" value="<?= htmlspecialchars($data['nis']); ?>" required>
        </label>
    </p>
    <p>
        <label>Jurusan<br>
            <select name="jurusan" required>
                <option value="">-- pilih jurusan --</option>
                <option value="RPL" <?= $data['jurusan']=='RPL'?'selected':''; ?>>RPL</option>
                <option value="TKJ" <?= $data['jurusan']=='TKJ'?'selected':''; ?>>TKJ</option>
                <option value="DKV" <?= $data['jurusan']=='DKV'?'selected':''; ?>>DKV</option>
            </select>
        </label>
    </p>
    <p>
        <label>Jenis Kelamin<br>
            <input type="radio" name="jenis_kelamin" value="L" <?= $data['jenis_kelamin']=='L'?'checked':''; ?>> Laki-laki
            <input type="radio" name="jenis_kelamin" value="P" <?= $data['jenis_kelamin']=='P'?'checked':''; ?>> Perempuan
        </label>
    </p>
    <p>
        <label>No HP<br>
            <input type="text" name="no_hp" value="<?= htmlspecialchars($data['no_hp']); ?>">
        </label>
    </p>
    <p>
        <label>Alamat<br>
            <textarea name="alamat" rows="3"><?= htmlspecialchars($data['alamat']); ?></textarea>
        </label>
    </p>
    <p>
        <button type="submit">Update</button>
    </p>
</form>

</body>
</html>
