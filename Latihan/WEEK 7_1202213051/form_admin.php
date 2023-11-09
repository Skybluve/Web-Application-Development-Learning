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
    <title>HALAMAN ADMIN BUAH</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: cyan;
            font-family: Arial, sans-serif;
            padding-top: 20px;
            margin: 0;
        }
        h1 {
            text-align: center;
            color: #fff;
            padding: 20px;
            margin-bottom: 20px;
            border: 2px solid #343a40;
            background: linear-gradient(to right, #007bff, #28a745);
        }
        th {
            background-color: #343a40;
            color: #fff;
        }
        .table {
            margin-bottom: 20px;
        }
        tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        .btn-action {
            margin: 2px;
        }
        .btn-add {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Toko Buah Buahan</h1>
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th>No</th>
                        <th>Nama Buah</th>
                        <th>Kode Buah</th>
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
                        echo "<td>" . $count . "</td>";
                        echo "<td>" . $row['nama_barang'] . "</td>";
                        echo "<td>" . $row['kode_barang'] . "</td>";
                        echo "<td><img src='images/" . $row['gambar'] . "' width='100' height='100'></td>";
                        echo "<td>Rp. " . $row['harga_jual'] . "</td>";
                        echo "<td>" . $row['stok_barang'] . "</td>";
                        echo "<td>
                                <a href='edit.php?id=" . $row['id'] . "' class='btn btn-warning btn-action' onclick=\"return confirm('Apakah Anda ingin mengubah data ini?')\">Edit</a>
                                <a href='form_admin.php?action=deleted&id=" . $row['id'] . "' class='btn btn-danger btn-action' onclick=\"return confirm('Apakah Anda yakin ingin menghapus item ini?')\">Hapus</a>
                              </td>";
                        echo "</tr>";
                        $count++;
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <a class="btn btn-success btn-add" href="tambah.php" onclick="return confirm('Apakah Anda yakin ingin menambahkan data baru?')">Tambah Buah</a>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
