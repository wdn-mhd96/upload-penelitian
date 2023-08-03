<?php
date_default_timezone_set("Asia/Jakarta");
error_reporting(0);
include '../../koneksi/koneksi.php';
if (isset($_POST['upload'])) {


   
   $nama = $_POST['nama'];
   $nim = $_POST['nim'];
   $status = 'Sudah Diajukan';
   $tanggal = date('l, d-m-Y');

   $file = rand(1000, 100000) . "-" . $_FILES['file']['name'];
   $file_loc = $_FILES['file']['tmp_name'];

   $krs = rand(1000, 100000) . "-" . $_FILES['file']['name'];
   $file_loc = $_FILES['file']['tmp_name'];
   $folder = "../uploads/";

   move_uploaded_file($file_loc, $folder . $file);

   $result = mysqli_query($koneksi, "INSERT INTO surat_mhs(judul,nim,status,tanggal,file,krs) VALUES('$nama','$nim','$status', '$tanggal', '$file','$krs')");

   // Show message when user added
   echo "<script>alert('Data Berhasil di Input!'); window.location = 'cek_surat.php'</script>";
}

// Edit Revisi Penelitian
if (isset($_POST['revisi'])) {



   $id=$_POST['id'];
   $nama = $_POST['nama'];
   $nim = $_POST['nim'];
   $status = 'Revisi';
   $tanggal = date('l, d-m-Y');
   $krs = 'Dalam Proses Revisi';
   $folder = "../uploads/";
   $file = rand(1000, 100000) . "-" . $_FILES['file']['name'];
   $file_loc = $_FILES['file']['tmp_name'];
   
   $q = mysqli_query($koneksi, "SELECT * from surat_mhs where Id='$id'");
   $res = mysqli_fetch_array($q);
   unlink("../uploads/".$res['file']);
   move_uploaded_file($file_loc, $folder . $file);

   $result = mysqli_query($koneksi, "UPDATE surat_mhs set judul='$nama', nim='$nim', status='$status', tanggal='$tanggal', file='$file', krs='$krs' where Id='$id'");

   // Show message when user added
   echo "<script>alert('Data Berhasil di Revisi!'); window.location = 'cek_surat.php'</script>";
}


// Tambah Data Pengmas

if (isset($_POST['upload_pengmas'])) {

   $nama = $_POST['nama'];
   $nim = $_POST['nim'];
   $status = 'Sudah Diajukan';
   $tanggal = date('l, d-m-Y');
   $krs = 'Pengmas Baru';

   $folder = "../uploads/pengmas/";
   $file = rand(1000, 100000) . "-" . $_FILES['file']['name'];
   $file_loc = $_FILES['file']['tmp_name'];

   move_uploaded_file($file_loc, $folder . $file);

   $result = mysqli_query($koneksi, "INSERT INTO tpengmas (judul_pengmas,nim,status_pengmas,tanggal_pengmas,file_pengmas,catatan) VALUES('$nama','$nim','$status', '$tanggal', '$file','$krs')");

   // Show message when user added
   echo "<script>alert('Data Pengmas Berhasil di Input!'); window.location = 'cek_pengmas.php'</script>";
}

// Revisi Pengmas
if (isset($_POST['revisi_pengmas'])) {
   $id=$_POST['id'];
   $nama = $_POST['nama'];
   $nim = $_POST['nim'];
   $status = 'Revisi';
   $tanggal = date('l, d-m-Y');
   $krs = 'Dalam Proses Revisi';
   $folder = "../uploads/pengmas/";
   $file = rand(1000, 100000) . "-" . $_FILES['file']['name'];
   $file_loc = $_FILES['file']['tmp_name'];
   
   $q = mysqli_query($koneksi, "SELECT * from tpengmas where id_pengmas='$id'");
   $res = mysqli_fetch_array($q);
   unlink("../uploads/pengmas/".$res['file_pengmas']);
   move_uploaded_file($file_loc, $folder . $file);

   $result = mysqli_query($koneksi, "UPDATE tpengmas set judul_pengmas='$nama', nim='$nim', status_pengmas='$status', tanggal_pengmas='$tanggal', file_pengmas='$file', catatan='$krs' where id_pengmas='$id'");

   // Show message when user added
   echo "<script>alert('Data Berhasil di Revisi!'); window.location = 'cek_pengmas.php'</script>";
}

