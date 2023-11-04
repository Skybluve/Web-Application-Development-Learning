<?php
$koneksi = mysqli_connect("localhost", "root", "", "belajarwad");

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Lakukan query SELECT sesuai dengan ID yang dipilih
    $result = mysqli_query($koneksi, "SELECT * FROM toko_sisfo WHERE id = $id");

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $nama_barang = $row['nama_barang'];
        $kode_barang = $row['kode_barang'];
        $gambar = $row['gambar'];
        $harga_jual = $row['harga_jual'];
        $stok_barang = $row['stok_barang'];
    } else {
        echo "Data tidak ditemukan";
        exit;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $nama_barang = $_POST['nama_barang'];
    $kode_barang = $_POST['kode_barang'];
    $gambar = $_POST['gambar'];
    $harga_jual = $_POST['harga_jual'];
    $stok_barang = $_POST['stok_barang'];
    $id = $_POST['id'];

    $query = "UPDATE toko_sisfo SET nama_barang = '$nama_barang', kode_barang = '$kode_barang', gambar = '$gambar', harga_jual = '$harga_jual', stok_barang = '$stok_barang' WHERE id = $id";
    if (mysqli_query($koneksi, $query)) {
        header("Location: form_admin.php"); // Redirect kembali ke halaman utama setelah update
        exit;
    } else {
        echo "Gagal melakukan update data";
    }
}
?>

<!-- Form Edit -->
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Edit Barang Toko Sisfo</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            margin: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1 class="mt-4 mb-4">Edit Barang Toko Sisfo</h1>
        <form action="" method="post">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <div class="form-group">
                <label for="gambar">Gambar :</label>
                <input type="text" class="form-control" name="gambar" value="<?php echo $gambar; ?>">
            </div>

            <div class="form-group">
                <label for="nama_barang">Nama Barang :</label>
                <input type="text" class="form-control" name="nama_barang" value="<?php echo $nama_barang; ?>">
            </div>

            <div class="form-group">
                <label for="kode_barang">Kode Barang :</label>
                <input type="text" class="form-control" name="kode_barang" value="<?php echo $kode_barang; ?>">
            </div>

            <div class="form-group">
                <label for="harga_barang">Harga Barang :</label>
                <input type="text" class="form-control" name="harga_jual" value="<?php echo $harga_jual; ?>">
            </div>

            <div class="form-group">
                <label for="stok_barang">Stok Barang :</label>
                <input type="text" class="form-control" name="stok_barang" value="<?php echo $stok_barang; ?>">
            </div>

            <button type="submit" class="btn btn-primary" name="submit">Update Data</button>
        </form>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</body>

</html>
