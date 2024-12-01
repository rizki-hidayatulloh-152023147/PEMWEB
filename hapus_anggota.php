<?php 
// koneksi database
include 'koneksi.php';
 
// menangkap data id yang di kirim dari url
$id = $_GET['id'];
 
 
// menghapus data dari database
mysqli_query($koneksi,"delete from anggota where id_anggota='$id'");

 
// mengalihkan halaman kembali ke index.php
header("location:index.php");
 
?>