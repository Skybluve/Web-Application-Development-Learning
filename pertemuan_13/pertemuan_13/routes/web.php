<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
//TUTORIAL 1
Route::get('/', function () {
    return 'Selamat Belajar Laravel 10';
 });
//TUTORIAL 2
//Menambahkan tag html misalkan tipe huruf B
Route::get('/', function () {
    return '<b>Selamat Belajar Laravel 10';
 });
//TUTORIAL 3
//Menambahkan tag html misalkan ukuran huruf
Route::get('/', function () {
    return '<h1>Selamat Belajar Laravel 10</h1>';
 });
//TUTORIAL 4
//Memanggil data dari halaman lain
Route::get('/', function () {
    return '<h1>Selamat Belajar Laravel 10</h1>';
 });

Route::get('/about', function () {
  
});
//Tutorial 5
//Menggunakan rumus logika sederhana
//membuat perkalian atau rumus sederhana 2klai 5
Route::get('/hasil', function () {
    return 2*5 ;
 });
//Tutorial 6
//Menampilkan data di view
Route::get('/beritaapa', function () {
    return view ('beritaapa')
 });
//Tutorial 8
//Mengirim variabel ke view
Route::get('/beritabaru', function () {
    return view ('infotahunbaru.beritabaru',['judul' => 'Sebentar lagi tahun baru'])
});
//Tutorial 9
//Menambahkan deskripsi pada file berita baru pada folder didalam view
Route::get('/beritabaru', function () {
    return view ('infotahunbaru.beritabaru',[
        'judul' => 'Sebentar lagi tahun baru'
        //tanggal
        'tanggal' => '31 Desember 2020',

    ]);
});
//Tutorial 10
//Setelah itu membuat Usercontroller pada routes untu menyambungkan folder controller
Route::get('/user',[UserController::class,'index']);















