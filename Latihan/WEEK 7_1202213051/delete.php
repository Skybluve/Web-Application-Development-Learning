<?php
$koneksi = mysqli_connect("localhost", "root", "", "belajarwad");

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "DELETE FROM toko_sisfo WHERE id = $id";
    
    if (mysqli_query($koneksi, $query)) {
        header("Location: form_admin.php"); // Redirect kembali ke halaman utama setelah hapus
        exit;
    } else {
        echo "Gagal menghapus data";
    }
}
?>
