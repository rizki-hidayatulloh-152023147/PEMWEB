<?php 
// koneksi database
include 'koneksi.php';
 
// menangkap data yang di kirim dari form
$id_anggota = $_POST['id_anggota'];
$id_buku = $_POST['id_buku'];
$id_staff = $_POST['id_staff'];
$tanggal_pinjam = $_POST['tanggal_pinjam'];
$tanggal_kembali = $_POST['tanggal_kembali'];
$status = $_POST['status'];
// menginput data ke database
mysqli_query($koneksi,"insert into peminjaman (id_anggota,id_buku,id_Staff,tanggal_pinjam,tanggal_kembali,status) values('$id_anggota','$id_buku','$id_staff','$tanggal_pinjam','$tanggal_kembali','$status')");
 
// mengalihkan halaman kembali ke index.php
header("location:peminjaman.php");
 
?>