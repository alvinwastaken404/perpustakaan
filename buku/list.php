<?php
include '../config/koneksi.php';
$result = mysqli_query($conn, "SELECT * FROM buku");
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
        padding-top: 50px;
    }
    .container {
        background-color: #ffffffcc;
        padding: 20px 30px 30px 30px;
        border-radius: 15px;
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        width: 90%;
        max-width: 1000px;
        margin: 20px auto;
    }

    .container h2 {
        color: #0277bd;
        margin-bottom: 20px;
        text-align: center;
    }
    a {
        display: inline-block;
        margin: 10px 0px;
        padding: 10px 20px;
        color: #2196f3;
        border: 1px solid #2196f3;
        border-radius: 6px;
        text-transform: uppercase;
        text-decoration: none;
        font-weight: bold;
        transition: all 0.3s ease;
        overflow: hidden;
    }
    a:hover {
        background-color: #2196f3;
        color: white;
    }
    a.hapus {
        color: #e53935;
        border-color: #e53935;
    }
    a.hapus:hover {
        background-color: #e53935;
        color: white;
    }
    .back {
        margin-top: 20px;
        display: inline-block;
    }
    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
        margin-bottom: 20px;
    }
    table th, table td {
        border: 1px solid #ccc;
        padding: 5px;
        text-align: center;
    }
    table th {
        background-color: #f1faff;
        color: #0277bd;
    }
    table tr:nth-child(even) {
        background-color: #f9f9f9;
    }
    table tr:hover {
        background-color: #e3f2fd;
    }
    td a {
        display: inline-block;
        margin-right: 5px;
        border-radius: 6px;
        text-decoration: none;
        color: #2196f3;
        border: 1px solid #2196f3;
        transition: 0.3s;
        font-size: 14px;
        padding: 10px 15px;
    }
    table th:last-child,
    table td:last-child {
        width: 240px;
    }
</style>
<div class="container">
    <h2>Daftar Buku</h2>
    <a href="tambah.php">Tambah Buku</a>
    <table>
        <tr><th>Judul</th><th>Penulis</th><th>Tahun</th><th>Kategori</th><th>Stok</th><th>Aksi</th></tr>
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td><?= $row['judul'] ?></td>
                <td><?= $row['penulis'] ?></td>
                <td><?= $row['tahun_terbit'] ?></td>
                <td><?= $row['kategori'] ?></td>
                <td><?= $row['stok'] ?></td>
                <td>
                    <a href="edit.php?id=<?= $row['id_buku'] ?>">Edit</a>
                    <a class="hapus" href="hapus.php?id=<?= $row['id_buku'] ?>">Hapus</a>
                </td>
            </tr>
        <?php } ?>
    </table>
    <a class="back" href="../auth/dashboard.php">Back to Dashboard</a>
</div>