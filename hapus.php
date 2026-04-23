<?php
include 'koneksi.php';

$id = $_GET['id'];

mysqli_query($conn, "DELETE FROM perpus WHERE id='$id'");

header("Location: index.php");
?>