<?php
// koneksi database
include '../../koneksi/koneksi.php';

// menangkap data id yang di kirim dari url
$id = $_GET['id'];
$q = mysqli_query($koneksi, "SELECT * from tpengmas where id_pengmas='$id'");
$res = mysqli_fetch_array($q);

// menghapus data dari database dan menghapus file
mysqli_query($koneksi, "delete from tpengmas where id_pengmas='$id'");
if (file_exists("../uploads/pengmas/" . $res['file_pengmas'])) {
    unlink("../uploads/pengmas/" . $res['file_pengmas']);
}
// mengalihkan halaman kembali ke index.php
header("location:cek_pengmas.php");
