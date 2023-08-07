<?php include_once "header.php";
    include "../../koneksi/koneksi.php";
    $id=$_GET['id'];
    $query = mysqli_query($koneksi, "SELECT * from laporan left join laporan_hasil on laporan.id_laporan = laporan_hasil.id_laporan where id_laporan='$id'");
    $row = mysqli_fetch_array($query);
?>
<div id="layoutSidenav_content">
<main>
    <div class="card-header">
    <i class="fas fa-table mr-1"></i>Revisi Penelitian</div>
                            <div class="card-body">
                                <form action="upload.php" method="post" enctype="multipart/form-data">
                                 <div class="form-group">
                                    <label for="judul">Judul</label>
                                    <input type="text" class="form-control" id="id" name="id" required value="<?= $row['id_laporan']?>">
                                    <?php if($row['jenis_laporan']=="pengmas") { ?>
                                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Judul Penelitian" required value="<?= $row['judul_pengmas']?>">
                                        <?php } else  { ?>
                                            <input type="text" class="form-control" id="nama" name="nama" placeholder="Judul Penelitian" required value="<?= $row['judul']?>">
                                    <?php } ?>
                                </div>
                                  <div class="form-group">
                                    <label for="nama">Kode Dosen</label>
                                    <input type="text" class="form-control" id="nim" value="<?= $_SESSION['username']; ?>" name="nim" readonly required>
                                  </div>
                                  <div class="form-group">
                                    <label for="file">Upload Berkas Laporan</label>
                                    <input type="file" name="file" class="form-control-file" id="exampleFormControlFile1" required> 
                                </div>
                                  <hr>
                                  <input type="submit" class="btn btn-primary" name="upload_laporan" value="Kirim">
                                </form>
                            </div>
                        </div>
</div>
</main>
<?php include_once "header.php"; ?>