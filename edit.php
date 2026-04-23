<?php
session_start();
include 'koneksi.php';

$id = $_GET['id'];
$data = mysqli_query($conn, "SELECT * FROM perpus WHERE id='$id'");
$d = mysqli_fetch_assoc($data);

if(isset($_POST['update'])){
    mysqli_query($conn, "UPDATE perpus SET
    nama_peminjam='$_POST[nama_peminjam]',
    judul_buku='$_POST[judul_buku]',
    tanggal_pinjam='$_POST[tanggal_pinjam]',
    tanggal_kembali='$_POST[tanggal_kembali]',
    keterangan='$_POST[keterangan]'
    WHERE id='$id'");

    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Data</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;

            /* BACKGROUND GRADIASI */
            background: linear-gradient(135deg, #4facfe, #00f2fe);
            min-height: 100vh;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .card {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.2);
            width: 100%;
            max-width: 500px;
        }

        h2 {
            margin-top: 0;
            text-align: center;
        }

        /* BIAR RAPI & SEJAJAR */
        input, textarea, button {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            border-radius: 5px;
            box-sizing: border-box;
        }

        input, textarea {
            border: 1px solid #ccc;
        }

        textarea {
            resize: none;
            height: 80px;
        }

        button {
            background: #28a745;
            border: 1px solid #28a745;
            color: white;
            cursor: pointer;
            font-size: 16px;
            transition: 0.3s;
        }

        button:hover {
            background: #218838;
        }

        .btn-kembali {
            display: block;
            text-align: center;
            margin-top: 10px;
            text-decoration: none;
            background: #6c757d;
            color: white;
            padding: 10px;
            border-radius: 5px;
        }

        .btn-kembali:hover {
            background: #5a6268;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="card">
        <h2>✏️ Edit Data</h2>

        <form method="POST">
            Nama Peminjam:
            <input type="text" name="nama_peminjam" value="<?= $d['nama_peminjam'] ?>" required>

            Judul Buku:
            <input type="text" name="judul_buku" value="<?= $d['judul_buku'] ?>" required>

            Tanggal Pinjam:
            <input type="date" name="tanggal_pinjam" value="<?= $d['tanggal_pinjam'] ?>" required>

            Tanggal Kembali:
            <input type="date" name="tanggal_kembali" value="<?= $d['tanggal_kembali'] ?>" required>

            Keterangan:
            <textarea name="keterangan"><?= $d['keterangan'] ?></textarea>

            <button type="submit" name="update">Update</button>
        </form>

        <a href="index.php" class="btn-kembali">← Kembali ke Data</a>
    </div>
</div>

</body>
</html>