<?php 
// koneksi database
include 'koneksi.php';
 
// menangkap data yang di kirim dari form
$judul = $_POST['judul'];
$penulis = $_POST['penulis'];
$penerbit = $_POST['penerbit'];
$kategori = $_POST['kategori'];
$stok = $_POST['stok'];
// menginput data ke database
mysqli_query($koneksi,"insert into buku (judul,penulis,stok,penerbit,kategori) values('$judul','$penulis','$stok','$penerbit','$kategori')");
 
// mengalihkan halaman kembali ke index.php
header("location:index.php");
 
?>