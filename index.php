<?php
session_start();
include 'koneksi.php';

if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}

$data = mysqli_query($conn, "SELECT * FROM perpus");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Peminjaman</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #4facfe, #00f2fe);
            min-height: 100vh;
        }

        .navbar {
            background: rgba(0,0,0,0.2);
            padding: 15px 20px;
            color: white;
            display: flex;
            justify-content: space-between;
        }

        .container {
            padding: 30px;
            display: flex;
            justify-content: center;
        }

        .card {
            background: white;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.2);
            width: 100%;
            max-width: 1000px;
        }

        h2 {
            margin-top: 0;
        }

        .top-action {
            margin-bottom: 15px;
        }

        .btn {
            display: inline-block;
            padding: 10px 15px;
            background: #4facfe;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            margin-right: 10px;
        }

        .btn:hover {
            background: #007bff;
        }

        .btn-kembali {
            background: #6c757d;
        }

        .btn-kembali:hover {
            background: #5a6268;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table th {
            background: #4facfe;
            color: white;
            padding: 10px;
        }

        table td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }

        table tr:hover {
            background: #f1f1f1;
        }

        /* 🔥 PERBAIKAN ALIGNMENT */

        /* No */
        table th:first-child,
        table td:first-child {
            width: 50px;
            text-align: center;
        }

        /* Nama & Judul  */
        table th:nth-child(2),
        table td:nth-child(2),
        table th:nth-child(3),
        table td:nth-child(3) {
            text-align: left;
        }

        /* Tanggal & Keterangan */
        table th:nth-child(4),
        table th:nth-child(5),
        table th:nth-child(6),
        table td:nth-child(4),
        table td:nth-child(5),
        table td:nth-child(6) {
            text-align: center;
        }

        /* Aksi */
        table th:nth-child(7),
        table td:nth-child(7) {
            text-align: center;
        }

        .aksi a {
            text-decoration: none;
            padding: 5px 10px;
            border-radius: 5px;
            font-size: 14px;
            margin-right: 5px;
        }

        .edit {
            background: #28a745;
            color: white;
        }

        .hapus {
            background: #dc3545;
            color: white;
        }

        .edit:hover {
            background: #218838;
        }

        .hapus:hover {
            background: #c82333;
        }
    </style>
</head>
<body>

<div class="navbar">
    <div><b>Sistem Perpustakaan</b></div>
    <div><?= $_SESSION['username']; ?></div>
</div>

<div class="container">
    <div class="card">
        <h2>📚 Data Peminjaman</h2>

        <div class="top-action">
            <a href="tambah.php" class="btn">+ Tambah Data</a>
            <a href="dashboard.php" class="btn btn-kembali">← Kembali</a>
        </div>

        <table>
            <tr>
                <th>No</th>
                <th>Nama Peminjam</th>
                <th>Judul Buku</th>
                <th>Tanggal Pinjam</th>
                <th>Tanggal Kembali</th>
                <th>Keterangan</th>
                <th>Aksi</th>
            </tr>

            <?php $no=1; while($d = mysqli_fetch_array($data)){ ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $d['nama_peminjam'] ?? '' ?></td>
                <td><?= $d['judul_buku'] ?? '' ?></td>
                <td><?= $d['tanggal_pinjam'] ?? '' ?></td>
                <td><?= $d['tanggal_kembali'] ?? '' ?></td>
                <td><?= $d['keterangan'] ?? '' ?></td>
                <td class="aksi">
                    <a href="edit.php?id=<?= $d['id'] ?>" class="edit">Edit</a>
                    <a href="hapus.php?id=<?= $d['id'] ?>" class="hapus" onclick="return confirm('Yakin mau hapus?')">Hapus</a>
                </td>
            </tr>
            <?php } ?>
        </table>

    </div>
</div>

</body>
</html>