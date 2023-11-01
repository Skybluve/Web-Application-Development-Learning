<?php
// koneksi ke database mysql
$koneksi = mysqli_connect("localhost","root","","belajarwad");
//cek apakah tombol submit ditekan atau belum
if (isset($_POST["submit"])) {
    //ambil data dari tiap elemen dalam form
    $gambar = $_POST["gambar"];
    $nama_barang = $_POST["nama_barang"];
    $kode_barang = $_POST["kode_barang"];
    $harga_barang = $_POST["harga_barang"];
    $stok_barang = $_POST["stok_barang"];
    //query insert data
    $query = "INSERT INTO toko_sisfo
                VALUES
                ('','$gambar','$nama_barang','$kode_barang','$harga_barang','$stok_barang')
                ";
    mysqli_query($koneksi, $query);
    //cek sukses data ditambah menggunakan mysqli_affected_rows
    //jika kita var_dump maka akan muncul int(1) jika gagal maka akan muncul int(-1)
    //var_dump(mysqli_affected_rows($koneksi));
    if (mysqli_affected_rows($koneksi) > 0) {
        echo "
            <script>
                alert('data berhasil ditambahkan!');
                document.location.href = 'latihan1.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('data gagal ditambahkan!');
                document.location.href = 'latihan1.php';
            </script>
        ";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Tambah data barang toko_sisfo</title>
</head>
<body>
    <h1>Tambah data barang toko_sisfo</h1>
    <form action="" method="post">
        <ul>
            <li>
                <label for="gambar">Gambar :</label>
                <input type="text" name="gambar" id="gambar">
            </li>
            <li>
                <label for="nama_barang">Nama Barang :</label>
                <input type="text" name="nama_barang" id="nama_barang">
            </li>
            <li>
                <label for="kode_barang">Kode Barang :</label>
                <input type="text" name="kode_barang" id="kode_barang">
            </li>
            <li>
                <label for="harga_barang">Harga Barang :</label>
                <input type="text" name="harga_barang" id="harga_barang">
            </li>
            <li>
                <label for="stok_barang">Stok Barang :</label>
                <input type="text" name="stok_barang" id="stok_barang">
            </li>
            <li>
                <button type="submit" name="submit">Tambah Data!</button>
            </li>
        </ul>
    </form>
    
</body>
</html>