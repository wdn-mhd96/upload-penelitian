<?php 
// koneksi database
include '../../koneksi/koneksi.php';

// menangkap data id yang di kirim dari url
$id = $_GET['id'];
$q = mysqli_query($koneksi, "SELECT * from surat_mhs where Id='$id'");
$res = mysqli_fetch_array($q);

// menghapus data dari database dan menghapus file
mysqli_query($koneksi,"delete from surat_mhs where Id='$id'");
unlink("../uploads/".$res['file']);
// mengalihkan halaman kembali ke index.php
header("location:suratku.php");
