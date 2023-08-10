<?php 
include '../../koneksi/koneksi.php';
$id_lap = $_GET['id'];
$q = mysqli_query($koneksi,"SELECT * from laporan_hasil where id_laporan = '$id_lap'");
$row=mysqli_fetch_array($q);
if(!file_exists('../uploads/laporan/'.$row['file_laporan']))
{
    echo "<script>window.location = 'laporan_hasil.php';</script>";
}
else
{
    unlink('../uploads/laporan/'.$row['file_laporan']);
}
$idpel=$row['id_penelitian'];
mysqli_query($koneksi, "DELETE from laporan_hasil where id_laporan = '$id_lap'");
if($row['jenis_laporan']=="pengmas")
{
mysqli_query($koneksi, "Update tpengmas set status_pengmas = 'Revisi' where id_pengmas='$idpel'");
}
else
{
    mysqli_query($koneksi, "Update surat_mhs set status = 'Revisi' where Id='$idpel'");

}
echo "<script>window.location = 'laporan_hasil.php';</script>";
?>