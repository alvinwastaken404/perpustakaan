<?php
include '../config/koneksi.php';
$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM buku WHERE id_buku = $id");
$row = mysqli_fetch_assoc($result);
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $judul = $_POST['judul'];
    $penulis = $_POST['penulis'];
    $tahun = $_POST['tahun_terbit'];
    $kategori = $_POST['kategori'];
    $stok = $_POST['stok'];

    mysqli_query($conn, "UPDATE buku SET judul='$judul', penulis='$penulis', tahun_terbit='$tahun', kategori='$kategori', stok=$stok WHERE id_buku=$id");
    header('Location: list.php');
}
?>
<style>
    body {
        margin: 0;
        padding: 0;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background: linear-gradient(to bottom right, #4facfe, #00f2fe);
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: flex-start;
        padding-top: 60px;
    }
    h2 {
        color: #0277bd;
        text-align: center;
    }
    form {
        background-color: #e0f7fa;
        padding: 30px 40px 20px 40px;
        border-radius: 15px;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
        width: 90%;
        max-width: 500px;
    }
    form input {
        width: 100%;
        padding: 12px 15px;
        margin-bottom: 15px;
        border: 1px solid #b3e5fc;
        border-radius: 8px;
        background-color: #f0faff;
        font-size: 15px;
        color: #0277bd;
        outline: none;
        transition: 0.3s ease;
    }
    form input:focus {
        border-color: #2196f3;
        box-shadow: 0 0 5px rgba(33, 150, 243, 0.5);
    }
    form input[type="submit"] {
        background-color: #2196f3;
        color: white;
        border: none;
        font-weight: bold;
        text-transform: uppercase;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }
    form input[type="submit"]:hover {
        background-color: #1976d2;
    }form a {
        display: flex;
        width: 92.5%;
        text-decoration: none;
        border-radius: 8px;
        background-color: #2196f3;
        padding: 12px 20px;
        justify-content: center;
        font-weight: bold;
        font-size: 14px;
        color: white;
        text-transform: uppercase;
        transition: .3s ease;
        flex-direction: horizontal;
        gap: 5px;
    }
    form a:hover {
        background-color: #1976d2;
    }
    form a span {
        display: none;
        color: white;
        font-weight: 900;
        transition: .3s ease;
        font-size: 14px;
    }
    form a:hover span {
        display: block;
    }

</style>
<form method="post">
    <h2>Edit Buku</h2>
    <input name="judul" value="<?= $row['judul'] ?>">
    <input name="penulis" value="<?= $row['penulis'] ?>">
    <input name="tahun_terbit" value="<?= $row['tahun_terbit'] ?>">
    <input name="kategori" value="<?= $row['kategori'] ?>">
    <input name="stok" type="number" value="<?= $row['stok'] ?>">
    <input type="submit" value="Update">
    <a href="list.php"><span><<</span>Kembali ke Daftar Buku<span><<</span></a>
</form>
