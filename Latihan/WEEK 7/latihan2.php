<?php 
 
$koneksi = mysqli_connect("localhost","root","","belajarwad");
 
//ambil data dari tabel database / query data toko_sisfo
$result = mysqli_query($koneksi, "SELECT * FROM toko_sisfo");
//var_dump($result);
//mysqli_fetch_row() // mengembalikan array numerik
//mysqli_fetch_assoc() // mengembalikan array associative
//mysqli_fetch_array() // mengembalikan array keduanya
//mysql_fetch_object() // mengembalikan objek
while ($data=mysqli_fetch_assoc($result)) {
    var_dump($data);
}


?>
 


<!DOCTYPE html>
<html lang="en">
<head>
   
    <title>HALAMAN ADMIN</title>
</head>
<body>
    <h1>DAFTAR BARANG TOKO SISFO</h1>

    <a href ="tambah.php">Tambah data barang toko_sisfo</a>
    <br><br>
    <table border ="1" cellpadding="10" cellspacing="0">
        <tr> 
            <th>No.</th>
            <th>Gambar</th>
            <th>Nama Barang</th>
            <th>Kode Barang</th>
            <th>Harga Barang</th>
            <th>Stok Barang</th>
            <th>Action</th>
        </tr>
        <tr>
            <td>1</td>
            <td><img src="mouse.jpg" width="50"></td>
            <td>Mouse</td>
            <td>MS-001</td>
            <td>Rp. 50.000</td>
            <td>10</td>
            <td>
                <a href="">Edit</a> |
                <a href="">Delete</a>
                
            </td>



    