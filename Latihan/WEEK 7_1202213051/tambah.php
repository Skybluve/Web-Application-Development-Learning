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
        header("Location: form_admin.php"); // Redirect kembali ke halaman admin setelah menambah data
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
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            margin: 20px;
            font-family: Arial, sans-serif;
        }
        .container {
            max-width: 500px;
            margin: 0 auto;
            background: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .container h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }
        .form-group {
            margin-bottom: 20px;
        }
        label {
            font-weight: bold;
        }
        button[type="submit"] {
            width: 100%;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Tambah Data Barang</h1>
        <form action="" method="post">
            <div class="form-group">
                <label for="gambar">Gambar :</label>
                <input type="text" class="form-control" name="gambar" id="gambar">
            </div>

            <div class="form-group">
                <label for="nama_barang">Nama Barang :</label>
                <input type="text" class="form-control" name="nama_barang" id="nama_barang">
            </div>

            <div class="form-group">
                <label for="kode_barang">Kode Barang :</label>
                <input type="text" class="form-control" name="kode_barang" id="kode_barang">
            </div>

            <div class="form-group">
                <label for="harga_jual">Harga Barang :</label>
                <input type="text" class="form-control" name="harga_jual" id="harga_jual">
            </div>

            <div class="form-group">
                <label for="stok_barang">Stok Barang :</label>
                <input type="text" class="form-control" name="stok_barang" id="stok_barang">
            </div>

            <button type="submit" class="btn btn-primary" name="submit" onclick="return confirm('Apakah Anda yakin ingin menambahkan data?')">Tambah Data</button>
        </form>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</body>
</html>
