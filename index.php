<?php
require 'config.php';

$result = mysqli_query($koneksi, "SELECT * FROM siswa ORDER BY id DESC");
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>SMK Coding - Pendaftaran Siswa Baru</title>
    <style>
        body { font-family: Arial, sans-serif; }
        h1 { margin-bottom: 5px; }
        table { border-collapse: collapse; width: 100%; max-width: 900px; }
        th, td { border: 1px solid #333; padding: 6px 8px; font-size: 14px; }
        th { background: #ddd; }
        a { text-decoration: none; color: blue; }
        .btn-tambah {
            display: inline-block; margin-bottom: 10px;
            padding: 5px 10px; background: green; color: #fff;
        }
    </style>
</head>
<body>

<h1>SMK Coding</h1>
<h3>Sistem Pendaftaran Siswa Baru</h3>

<a href="tambah.php" class="btn-tambah">+ Tambah Siswa Baru</a>

<table>
    <tr>
        <th>No</th>
        <th>Nama</th>
        <th>NIS</th>
        <th>Jurusan</th>
        <th>JK</th>
        <th>No HP</th>
        <th>Tgl Daftar</th>
        <th>Aksi</th>
    </tr>
    <?php
    $no = 1;
    while ($row = mysqli_fetch_assoc($result)) : ?>
        <tr>
            <td><?= $no++; ?></td>
            <td><?= htmlspecialchars($row['nama']); ?></td>
            <td><?= htmlspecialchars($row['nis']); ?></td>
            <td><?= htmlspecialchars($row['jurusan']); ?></td>
            <td><?= $row['jenis_kelamin']; ?></td>
            <td><?= htmlspecialchars($row['no_hp']); ?></td>
            <td><?= $row['tanggal_daftar']; ?></td>
            <td>
                <a href="edit.php?id=<?= $row['id']; ?>">Edit</a> |
                <a href="hapus.php?id=<?= $row['id']; ?>"
                   onclick="return confirm('Yakin menghapus data ini?');">Hapus</a>
            </td>
        </tr>
    <?php endwhile; ?>
</table>

</body>
</html>
