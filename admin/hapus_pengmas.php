<?php
// koneksi database
include '../../koneksi/koneksi.php';

// menangkap data id yang di kirim dari url
$id = $_GET['id'];
$q = mysqli_query($koneksi, "SELECT * from tpengmas left join laporan_hasil on tpengmas.id_pengmas = laporan_hasil.id_penelitian where tpengmas.id_pengmas='$id'");
$res = mysqli_fetch_array($q);
mysqli_query($koneksi, "delete from tpengmas where id_pengmas='$id'");
unlink("../uploads/pengmas/".$res['file_pengmas']);

if($res['status_pengmas']=="Disetujui")
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
}
echo "<script> window.location = 'cek_pengmas.php';</script>";

// menghapus data dari database dan menghapus file

