<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "perpustakaan";
$port = 3307;

$conn = mysqli_connect($host, $user, $pass, $db, $port);
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>