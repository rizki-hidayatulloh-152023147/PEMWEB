<?php 
// koneksi database
include 'koneksi.php';
 
// menangkap data yang di kirim dari form
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$no_telepon = $_POST['no_telepon'];
// menginput data ke database
mysqli_query($koneksi,"insert into anggota (nama,alamat,no_telepon) values('$nama','$alamat','$no_telepon')");
 
// mengalihkan halaman kembali ke index.php
header("location:index.php");
 
?>