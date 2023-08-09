<?php include_once "header.php"; ?>
<div id="layoutSidenav_content">
<main>
    <div class="card-header">
    <i class="fas fa-table mr-1"></i>Revisi Penelitian</div>
                            <div class="card-body">
                         <?php 
                          include "../../koneksi/koneksi.php";
                            if(isset($_GET['id']))
                            {
                            $id=$_GET['id'];
                            $query = mysqli_query($koneksi, "SELECT * from surat_mhs where Id='$id'");
                            $row = mysqli_fetch_array($query);
                            }
                            else
                            { ?>
                            <form action="" method="post">
                             <div class="form-row ml-1">
                             <select name="pilih" id="" class="form-control w-25">
                              <?php 
                              $nim=$_SESSION['username'];
                              $query = mysqli_query($koneksi, "SELECT * from surat_mhs where nim='$nim' and status='Disetujui'");
                              while($row = mysqli_fetch_array($query)) { ?> 
                              <option value=<?= $row['Id'] ?>><?= $row['judul'] ?></option>
                              <?php } ?>
                              </select>
                              <button type="submit" name="revisi_judul" class="btn btn-success ml-1">Revisi</button>
                             </div>
                            </form>
                              
                            <?php }
                              if(isset($_POST['revisi_judul']))
                              {
                                $judul=$_POST['pilih'];
                                $q=mysqli_query($koneksi, "SELECT * from surat_mhs where Id=$judul");
                                $row=mysqli_fetch_array($q);

                              }
                            ?>
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