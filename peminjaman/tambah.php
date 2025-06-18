<?php
include '../config/koneksi.php';
$buku = mysqli_query($conn, "SELECT * FROM buku");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama_peminjam'];
    $id_buku = $_POST['id_buku'];
    $tgl_pinjam = $_POST['tanggal_pinjam'];
    $tgl_kembali = $_POST['tanggal_kembali'];

    // 1. Ambil stok buku
    $query_stok = mysqli_query($conn, "SELECT stok FROM buku WHERE id_buku = $id_buku");
    $data_stok = mysqli_fetch_assoc($query_stok);
    $stok = $data_stok['stok'];

    // 2. Hitung jumlah yang sedang dipinjam
    $query_dipinjam = mysqli_query($conn, "SELECT COUNT(*) AS jumlah FROM peminjaman WHERE id_buku = $id_buku AND status = 'Dipinjam'");
    $data_dipinjam = mysqli_fetch_assoc($query_dipinjam);
    $dipinjam = $data_dipinjam['jumlah'];

    // 3. Cek stok
    if ($stok > $dipinjam) {
        // Simpan data peminjaman
        mysqli_query($conn, "INSERT INTO peminjaman (nama_peminjam, id_buku, tanggal_pinjam, tanggal_kembali, status) 
                             VALUES ('$nama', $id_buku, '$tgl_pinjam', '$tgl_kembali', 'Dipinjam')");
        header('Location: list.php');
    } else {
        $error = "Stok buku habis! Tidak bisa dipinjam saat ini.";
    }
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
        text-align: center;
        color: #0277bd;
        margin-bottom: 25px;
    }
    form {
        background-color: #e0f7fa;
        padding: 20px 40px 30px 40px ;
        border-radius: 15px;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
        width: 90%;
        max-width: 500px;
    }
    form input,
    form select {
        width: 100%;
        padding: 12px 20px;
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
    }
    form a {
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
        font-size: 15px;
    }
    form a:hover span {
        display: block;
    }
</style>
<div class="container">
    <?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
    <form method="post">
        <h2>Form Tambah Peminjaman</h2>
        <input name="nama_peminjam" placeholder="Nama Peminjam" required>
        <select name="id_buku" required>
            <option value="">-- Pilih Buku --</option>
            <?php while ($b = mysqli_fetch_assoc($buku)) { ?>
                <option value="<?= $b['id_buku'] ?>"><?= $b['judul'] ?></option>
            <?php } ?>
        </select>
        <input type="date" name="tanggal_pinjam" required>
        <input type="date" name="tanggal_kembali" required>
        <input type="submit" value="Simpan">
        <a href="list.php"><span><<</span>Kembali ke Daftar Buku<span><<</span></a>
    </form>
</div>
