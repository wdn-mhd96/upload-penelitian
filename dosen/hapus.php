<?php
// koneksi database
include '../../koneksi/koneksi.php';

// menangkap data id yang di kirim dari url
$id = $_GET['id'];
mysqli_query($koneksi, "delete from logbook_detail where id_log_detail='$id'");
echo "<script> window.location = 'log_book.php';</script>";
