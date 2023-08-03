<?php include_once "header.php";
    include "../../koneksi/koneksi.php";
    $id=$_GET['id'];
    $query = mysqli_query($koneksi, "SELECT * from tpengmas where id_pengmas='$id'");
    $row = mysqli_fetch_array($query);
?>
<div id="layoutSidenav_content">
<main>
    <div class="card-header">
    <i class="fas fa-table mr-1"></i>Revisi Pengmas</div>
                            <div class="card-body">
                                <form action="upload.php" method="post" enctype="multipart/form-data">
                                 <div class="form-group">
                                    <label for="judul">Judul</label>
                                    <input type="hidden" class="form-control" id="id" name="id" required value="<?= $row['id_pengmas']?>">  
                                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Judul Penelitian" required value="<?= $row['judul_pengmas']?>">
                                  </div>
                                  <div class="form-group">
                                    <label for="nama">Kode Dosen</label>
                                    <input type="text" class="form-control" id="nim" value="<?= $_SESSION['username']; ?>" name="nim" readonly required>
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleFormControlFile1">Upload Berkas Pengmas</label>
                                    <input type="file" name="file" class="form-control-file" id="exampleFormControlFile1" required> 
                                </div>
                                <div class="form-group">
                                    <label for="revisi">File yang di revisi :</label>
                                    <a href="../uploads/pengmas/<?= $row['file_pengmas']?>"><?= $row['file_pengmas'] ?></a> 
                                </div>
                                  <hr>
                                  <input type="submit" class="btn btn-primary" name="revisi_pengmas" value="Kirim">
                                </form>
                            </div>
                        </div>
</div>
</main>
<?php include_once "header.php"; ?>