<?php
$koneksi = mysqli_connect("localhost", "root", "", "belajarwad");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $nama_barang = $_POST['nama_barang'];
    $kode_barang = $_POST['kode_barang'];
    $gambar = $_POST['gambar'];
    $harga_jual = $_POST['harga_jual'];
    $stok_barang = $_POST['stok_barang'];

    $query = "INSERT INTO toko_sisfo (nama_barang, kode_barang, gambar, harga_jual, stok_barang) VALUES ('$nama_barang', '$kode_barang', '$gambar', '$harga_jual', '$stok_barang')";
    if (mysqli_query($koneksi, $query)) {
        header("Location: admin.php"); // Redirect kembali ke halaman admin setelah menambah data
        exit;
    } else {
        echo "Gagal menambahkan data";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Tambah Data Barang</title>
</head>
<body>
    <h1>Tambah Data Barang</h1>
    <form action="" method="post">
        <label for="gambar">Gambar :</label>
        <input type="text" name="gambar" id="gambar"><br>

        <label for="nama_barang">Nama Barang :</label>
        <input type="text" name="nama_barang" id="nama_barang"><br>

        <label for="kode_barang">Kode Barang :</label>
        <input type="text" name="kode_barang" id="kode_barang"><br>

        <label for="harga_barang">Harga Barang :</label>
        <input type="text" name="harga_jual" id="harga_jual"><br>

        <label for="stok_barang">Stok Barang :</label>
        <input type="text" name="stok_barang" id="stok_barang"><br>

        <input type="submit" name="submit" value="Tambah Data">
    </form>
</body>
</html>
