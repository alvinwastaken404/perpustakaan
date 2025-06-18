<?php
include '../config/koneksi.php';
mysqli_report(MYSQLI_REPORT_OFF);

$id = $_GET['id'];
$hapus = @mysqli_query($conn, "DELETE FROM buku WHERE id_buku = $id");

if ($hapus) {
    header('Location: list.php');
} else {
    echo "<script>
        alert('Gagal menghapus! Buku masih memiliki data peminjaman.');
        window.location.href = 'list.php';
    </script>";
}
?>