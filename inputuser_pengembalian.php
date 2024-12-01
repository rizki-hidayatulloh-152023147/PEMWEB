<?php 
// koneksi database
include 'koneksi.php';
 
// menangkap data yang di kirim dari form
$id_anggota = $_POST['id_anggota'];
$id_buku = $_POST['id_buku'];
$id_staff = $_POST['id_staff'];
$tanggal_peminjaman = $_POST['tanggal_peminjaman'];
$tanggal_kembalikan = $_POST['tanggal_kembalikan'];
$status = $_POST['status'];
// menginput data ke database
mysqli_query($koneksi,"insert into peminjaman (id_anggota,id_buku,id_Staff,tanggal_peminjaman,tanggal_kembalikan,status) values('$id_anggota','$id_buku','$id_staff','$tanggal_peminjaman','$tanggal_kembalikan','$status')");
 
// mengalihkan halaman kembalikan ke index.php
header("location:pengembalian.php");
 
?>