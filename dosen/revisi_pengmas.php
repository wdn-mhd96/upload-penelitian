<?php include_once "header.php"; ?>
<div id="layoutSidenav_content">
<main>
    <div class="card-header">
    <i class="fas fa-table mr-1"></i>Revisi Pengmas</div>
                            <div class="card-body">
                         <?php 
                          include "../../koneksi/koneksi.php";
                            if(isset($_GET['id']))
                            {
                            $id=$_GET['id'];
                            $query = mysqli_query($koneksi, "SELECT * from tpengmas where id_pengmas='$id'");
                            $row = mysqli_fetch_array($query);
                            }
                            else
                            { ?>
                            <form action="" method="post">
                             <div class="form-row ml-1">
                             <select name="pilih" id="" class="form-control w-25">
                              <?php 
                              $nim=$_SESSION['username'];
                              $query = mysqli_query($koneksi, "SELECT * from tpengmas where nim='$nim' and status='Disetujui dengan Revisi'");
                              while($row = mysqli_fetch_array($query)) { ?> 
                              <option value=<?= $row['id_pengmas'] ?>><?= $row['judul_pengmas'] ?></option>
                              <?php } ?>
                              </select>
                              <button type="submit" name="revisi_judul" class="btn btn-success ml-1">Revisi</button>
                             </div>
                            </form>
                              
                            <?php }
                              if(isset($_POST['revisi_judul']))
                              {
                                $judul=$_POST['pilih'];
                                if($judul=="")
                                {
                                  $kosong = "Tidak ada pengmas Dipilih";
                                }
                                else{
                                $q=mysqli_query($koneksi, "SELECT * from tpengmas where id_pengmas=$judul");
                                $row=mysqli_fetch_array($q);
                                }

                              }
                            echo $kosong;
                            ?>
                                <br>  
                                <form action="upload.php" method="post" enctype="multipart/form-data">
                                 <div class="form-group">
                                    <label for="judul">Judul</label>
                                    <input type="hidden" class="form-control" id="id" name="id" required value="<?= $row['id_pengmas']?>">  
                                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Judul Pengmas" required value="<?= $row['judul_pengmas']?>">
                                  </div>
                                  <div class="form-group">
                                    <label for="nama">Kode Dosen</label>
                                    <input type="text" class="form-control" id="nim" value="<?= $_SESSION['username']; ?>" name="nim" readonly required>
                                  </div>
                                  <div class="form-group">
                                    <label for="nama">Tahun Ajaran</label>
                                    <select name="tanggal" id="" class="form-control">
                                    <?php
                                    for ($x = 2000; $x <= date('Y'); $x++) {
                                        $b=$x+1;
                                        if($x==$row['tanggal_pengmas'])
                                        {
                                          echo "<option value='".$x."/".$b."' selected>".$x."/".$b."</option>";
                                        }
                                        else {
                                      echo "<option value='".$x."/".$b."'>".$x."/".$b."</option>";
                                        }
                                    }
                                    ?>
                                    </select>
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleFormControlFile1">Upload Berkas Penelitian</label>
                                    <input type="file" name="file" class="form-control-file" id="exampleFormControlFile1" required> 
                                </div>
                                <div class="form-group">
                                    <label for="revisi">File yang di revisi :</label>
                                    <a href="../uploads/<?= $row['file_pengmas']?>"><?= $row['file_pengmas'] ?></a> 
                                </div>
                                  <hr>
                                  <input type="submit" class="btn btn-primary" name="revisi_pengmas" value="Kirim">
                                </form>
                            </div>
                        </div>
</div>
</main>
<?php include_once "footer.php"; ?>