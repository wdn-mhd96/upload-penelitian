<?php include_once "header.php";
    include "../../koneksi/koneksi.php";
    $id=$_GET['id'];
    $query = mysqli_query($koneksi, "SELECT * from laporan where id_penelitian='$id'");
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
                                    <input type="hidden" class="form-control" id="id" name="id" required value="<?= $row['Id']?>">  
                                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Judul Penelitian" required value="<?= $row['judul']?>">
                                  </div>
                                  <div class="form-group">
                                    <label for="nama">Kode Dosen</label>
                                    <input type="text" class="form-control" id="nim" value="<?= $_SESSION['username']; ?>" name="nim" readonly required>
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleFormControlFile1">Upload Berkas Penelitian</label>
                                    <input type="file" name="file" class="form-control-file" id="exampleFormControlFile1" required> 
                                </div>
                                <div class="form-group">
                                    <label for="revisi">File yang di revisi :</label>
                                    <a href="../uploads/<?= $row['file']?>"><?= $row['file'] ?></a> 
                                </div>
                                  <hr>
                                  <input type="submit" class="btn btn-primary" name="revisi" value="Kirim">
                                </form>
                            </div>
                        </div>
</div>
</main>
<?php include_once "header.php"; ?>