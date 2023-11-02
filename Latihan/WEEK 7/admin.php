<?php
$koneksi = mysqli_connect("localhost", "root", "", "belajarwad");

// Perbarui tabel setelah operasi CRUD
if (isset($_GET['action']) && $_GET['action'] == 'deleted' && isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "DELETE FROM toko_sisfo WHERE id = $id";
    mysqli_query($koneksi, $query);
    header("Location: admin.php"); // Redirect untuk memperbarui tampilan setelah penghapusan data
    exit;
}

$result = mysqli_query($koneksi, "SELECT * FROM toko_sisfo");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>HALAMAN ADMIN</title>
</head>
<body>
    <h1>DAFTAR BARANG TOKO SISFO</h1>
    <br><br>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nama Barang</th>
            <th>Kode Barang</th>
            <th>Gambar</th>
            <th>Harga Jual</th>
            <th>Stok</th>
            <th>Aksi</th>
        </tr>
        <?php
        $result = mysqli_query($koneksi, "SELECT * FROM toko_sisfo");
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['nama_barang'] . "</td>";
            echo "<td>" . $row['kode_barang'] . "</td>";
            echo "<td><img src='" . $row['gambar'] . "' width='50'></td>";
            echo "<td>Rp. " . $row['harga_jual'] . "</td>";
            echo "<td>" . $row['stok_barang'] . "</td>";
            echo "<td>
                    <a href='edit.php?id=" . $row['id'] . "'>Edit</a> |
                    <a href='admin.php?action=deleted&id=" . $row['id'] . "'>Hapus</a>
                  </td>";
            echo "</tr>";
        }
        ?>
    </table>
    <a href="tambah.php">Tambah</a>
</body>
</html>
