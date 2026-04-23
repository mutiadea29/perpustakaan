<?php
session_start();

if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;

            /* BACKGROUND GRADIASI */
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
            display: flex;
            justify-content: center;
            align-items: center;
            height: 85vh;
        }

        .card {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.2);
            width: 100%;
            max-width: 600px;
            text-align: center;
        }

        h2 {
            margin-top: 0;
        }

        .menu {
            margin-top: 20px;
        }

        .menu a {
            display: block;
            text-decoration: none;
            background: #4facfe;
            color: white;
            padding: 12px;
            border-radius: 5px;
            margin: 10px 0;
            text-align: center;
            font-size: 15px;
            transition: 0.3s;
        }

        .menu a:hover {
            background: #007bff;
        }

        .logout-btn {
            background: #dc3545 !important;
        }

        .logout-btn:hover {
            background: #c82333 !important;
        }
    </style>
</head>
<body>

<div class="navbar">
    <div><b>Dashboard</b></div>
    <div><?= $_SESSION['username']; ?></div>
</div>

<div class="container">
    <div class="card">
        <h2>Sistem Perpustakaan</h2>
        <p>Selamat datang, <b><?= $_SESSION['username']; ?></b> 👋</p>

        <div class="menu">
            <a href="/perpustakaan/index.php">📚 Data Peminjam Buku</a>

            <a href="/perpustakaan/logout.php" class="logout-btn" 
               onclick="return confirm('Yakin mau logout?')">
               🚪 Logout
            </a>
        </div>
    </div>
</div>

</body>
</html>