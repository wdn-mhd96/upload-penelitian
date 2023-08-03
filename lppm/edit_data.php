<?php 
// koneksi database


// menangkap data yang di kirim dari form
if(isset($_POST['update']))
{
include '../../koneksi/koneksi.php';
$id = $_POST['id'];
$nama = $_POST['nama'];
$nim = $_POST['nim'];
$status = $_POST['status'];
$krs = $_POST['krs'];
// update data ke database
$a = mysqli_query($koneksi, "UPDATE surat_mhs SET judul='$nama', nim='$nim', status='$status', krs ='$krs' where Id='$id'");
    if($a)
        {
            echo "<script>alert('berhasil'); window.location = 'suratlpm.php';</script>";
        }
        else
        {
            echo "<script>alert('gagal'); window.location = 'suratlpm.php';</script>";
            
        }
// mengalihkan halaman kembali ke index.php
}

//update data pengmas

if(isset($_POST['update_pengmas']))
{
include '../../koneksi/koneksi.php';
$id = $_POST['id'];
$nama = $_POST['nama'];
$nim = $_POST['nim'];
$status = $_POST['status'];
$krs = $_POST['krs'];
// update data ke database
$a = mysqli_query($koneksi, "UPDATE tpengmas SET judul_pengmas='$nama', nim='$nim', status_pengmas='$status', catatan ='$krs' where id_pengmas='$id'");
    if($a)
        {
            echo "<script>alert('berhasil'); window.location = 'cek_pengmas.php';</script>";
        }
        else
        {
            echo "<script>alert('gagal'); window.location = 'cek_pengmas.php';</script>";
            
        }
// mengalihkan halaman kembali ke index.php
}

