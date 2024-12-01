<?php 
// koneksi database
include 'koneksi.php';
 
// menangkap data yang di kirim dari form
$nama = $_POST['nama'];
$username = $_POST['username'];
$jabatan = $_POST['jabatan'];
$no_telepon = $_POST['no_telepon'];
$password = $_POST['password'];
// menginput data ke database
mysqli_query($koneksi,"insert into staff (nama,username,password,jabatan,no_telepon) values('$nama','$username','$password','$jabatan','$no_telepon')");
 
// mengalihkan halaman kembali ke index.php
header("location:tampil.php");
 
?>