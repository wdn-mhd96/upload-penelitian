<?php include_once "header.php"; ?>
<div id="layoutSidenav_content">
                <main>
<div class="card-header">
    <i class="fas fa-table mr-1"></i>Tambah Data Pengmas</div>
                            <div class="card-body">
                                <form action="upload.php" method="post" enctype="multipart/form-data">
                                 <div class="form-group">
                                    <label for="judul">Judul</label>
                                    <input type="text" class="form-control" id="nama" placeholder="Judul Pengmas" name="nama" required>
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
                                      echo "<option value='".$x."/".$b."'>".$x."/".$b."</option>";
                                    }
                                    ?>
                                    </select>
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleFormControlFile1">Upload Berkas Penelitian</label>
                                    <input type="file" name="file" class="form-control-file" id="exampleFormControlFile1" required>
                                  </div>
                                  <hr>
                                  <input type="submit" class="btn btn-primary" name="upload_pengmas" value="Kirim">
                                </form>
                            </div>
                        </div>
</div>
</main>
<?php include_once "footer.php"; ?>