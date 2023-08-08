<?php
// koneksi database
include '../../koneksi/koneksi.php';

// menangkap data id yang di kirim dari url
$id = $_GET['id'];
$q = mysqli_query($koneksi, "SELECT surat_mhs.*, laporan_hasil.id_penelitian, laporan_hasil.file_laporan, logbook2.id_logbook from surat_mhs inner join laporan_hasil on surat_mhs.Id = laporan_hasil.id_penelitian inner join logbook2 on laporan_hasil.id_penelitian =logbook2.id_penelitian where surat_mhs.Id='$id'");
$res = mysqli_fetch_array($q);

// menghapus data dari database dan menghapus file

mysqli_query($koneksi, "delete from surat_mhs where Id='$id'");
unlink("../uploads/".$res['file']);

if($res['status']=="Disetujui")
{
    mysqli_query($koneksi, "delete from laporan_hasil where id_penelitian='$id'");
    if($res['file_laporan']=="")
    {
    echo "<script>alert('Deleted Successfully');</script>";
    }
    else
    {
        if(file_exists("../uploads/laporan/".$res['file_laporan']))
        {
        unlink("../uploads/laporan/".$res['file_laporan']);
        echo "<script>alert('File Deleted Successfully');</script>";
        }
    }
    $id_log = $res['id_logbook'];
    mysqli_query($koneksi, "delete from logbook_header where id_penelitian='$id'");
    mysqli_query($koneksi, "delete from logbook_detail where id_logbook='$id_log'");
}
echo "<script> window.location = 'suratku.php';</script>";
