<?php
date_default_timezone_set("Asia/Jakarta");
error_reporting(0);
if (isset($_POST['upload'])) {

   include '../../koneksi/koneksi.php';
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

if (isset($_POST['revisi'])) {

   include '../../koneksi/koneksi.php';
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
