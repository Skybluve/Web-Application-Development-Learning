<?php
$koneksi = mysqli_connect("localhost", "root", "", "belajarwad");

if (isset($_GET['action']) && $_GET['action'] == 'deleted' && isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "DELETE FROM toko_sisfo WHERE id = $id";
    mysqli_query($koneksi, $query);
    header("Location: form_admin.php"); // Redirect untuk memperbarui tampilan setelah penghapusan data
    exit;
}

$result = mysqli_query($koneksi, "SELECT * FROM toko_sisfo");
$count = 1; // Inisialisasi variabel untuk nomor urut

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>HALAMAN ADMIN</title>
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
        <h1 class="mt-4 mb-4">TOKO FITRAH SISFO 3</h1>
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>No</th>
                    <th>Nama Barang</th>
                    <th>Kode Barang</th>
                    <th>Gambar</th>
                    <th>Harga Jual</th>
                    <th>Stok</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $count . "</td>"; // Tampilkan nomor urut
                    echo "<td>" . $row['nama_barang'] . "</td>";
                    echo "<td>" . $row['kode_barang'] . "</td>";
                    echo "<td><img src='images/" . $row['gambar'] . "' width='100' height='100'></td>";
                    echo "<td>Rp. " . $row['harga_jual'] . "</td>";
                    echo "<td>" . $row['stok_barang'] . "</td>";
                    echo "<td>
                            <a href='edit.php?id=" . $row['id'] . "' class='btn btn-warning text-white' onclick=\"return confirm('Apakah Anda ingin mengubah data ini?')\">Edit</a>
                            <a href='form_admin.php?action=deleted&id=" . $row['id'] . "' class='btn btn-danger' onclick=\"return confirm('Apakah Anda yakin ingin menghapus item ini?')\">Delete</a>
                          </td>";
                    echo "</tr>";
                    $count++; // Tambahkan nilai nomor urut
                }
                ?>
            </tbody>
        </table>
        <a class="btn btn-success" href="tambah.php" onclick="return confirm('Apakah Anda yakin ingin menambahkan data baru?')">Tambah</a>

    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</body>
</html>
