<?php
include '../config/koneksi.php';
$result = mysqli_query($conn, "SELECT p.*, b.judul FROM peminjaman p JOIN buku b ON p.id_buku = b.id_buku");
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
        margin: 10px 5px;
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
    a.back {
        margin-top: 20px;
        display: inline-block;
        background-color: transparent;
    }
    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
        margin-bottom: 20px;
    }
    table th, table td {
        border: 1px solid #ccc;
        padding: 10px;
        text-align: center;
    }
    table th {
        background-color: #e3f2fd;
        color: #0277bd;
    }
    table tr:nth-child(even) {
        background-color: #f9f9f9;
    }
    table tr:hover {
        background-color: #f1faff;
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
    }
</style>
<div class="container">
    <h2>Daftar Peminjaman</h2>
    <a class="btn" href="tambah.php">Tambah Peminjaman</a>
    <table>
        <tr>
            <th>Nama Peminjam</th><th>Buku</th><th>Tanggal Pinjam</th><th>Tanggal Kembali</th><th>Status</th><th>Aksi</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
        <tr>
            <td><?= $row['nama_peminjam'] ?></td>
            <td><?= $row['judul'] ?></td>
            <td><?= $row['tanggal_pinjam'] ?></td>
            <td><?= $row['tanggal_kembali'] ?></td>
            <td><?= $row['status'] ?></td>
            <td>
                <a href="edit.php?id=<?= $row['id_peminjaman'] ?>">Edit</a>
                <a class="hapus" href="hapus.php?id=<?= $row['id_peminjaman'] ?>">Hapus</a>
            </td>
        </tr>
        <?php } ?>
    </table>
    <a class="btn" href="../auth/dashboard.php">Back to Dashboard</a>
</div>
