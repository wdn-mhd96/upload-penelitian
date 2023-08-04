<?php include "header.php"; 
    include "../../koneksi/koneksi.php";

        $id = $_GET['id'];
        $query = mysqli_query($koneksi, "SELECT * from logbook2 where id_logbook='$id' order by progress DESC");
        $row = mysqli_fetch_array($query);
?>
            <div id="layoutSidenav_content">
                <main>
                <div class="card-header">
                <i class="fas fa-table mr-1"></i>Logbook</div>
                            <div class="card-body">
                                <form action="upload.php" method="post" enctype="multipart/form-data">
                                 <div class="form-group">
                                    <label for="judul">Kegiatan</label>
                                    <input type="hidden" class="form-control"  value='<?= $_GET['id']?>' name="id_log" required>
                                    <input type="text" class="form-control" id="nama" placeholder="Kegiatan" name="kegiatan" required>
                                  </div>
                                  <div class="form-group">
                                    <label for="nama">Tanggal</label>
                                    <input type="date" class="form-control w-25" id="nim" name="tanggal" required>
                                  </div>

                                  <div class="form-group">
                                    <label for="judul">Progress</label>
                                    <input type="hidden" class="form-control"  value='<?= $row['progress']?>' name="last_prog">
                                    <input type="number" class="form-control" id="nama" placeholder="Progress" name="prog" required>
                                  </div>
                                  
                                  <hr>
                                  <input type="submit" class="btn btn-primary" name="tambah_logbook" value="Kirim">
                                </form>
                            </div>
                        </div>
</div>
                </main>
<?php include_once "footer.php"; ?>