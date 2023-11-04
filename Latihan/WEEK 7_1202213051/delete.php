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

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Delete Barang Toko Sisfo</title>
    </head>
    <body>
        <h1>Delete Barang Toko Sisfo</h1>
        <form action="" method="post">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <p>Apakah Anda yakin ingin menghapus data ini?</p>
            <button type="submit" name="submit">Hapus</button>
        </form>
    </body>
</html>