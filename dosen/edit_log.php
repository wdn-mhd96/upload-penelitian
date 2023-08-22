<?php include "header.php"; 
    include "../../koneksi/koneksi.php";

        $id = $_GET['id'];
        $query = mysqli_query($koneksi, "SELECT logbook2.*, surat_mhs.tanggal from logbook2 inner join surat_mhs on logbook2.id_penelitian = surat_mhs.Id where id_log_detail='$id'");
        $row = mysqli_fetch_array($query);
?>
            <div id="layoutSidenav_content">
                <main>
                <div class="card-header">
                <i class="fas fa-table mr-1"></i>Edit Logbook</div>
                            <div class="card-body">
                                <form action="upload.php" method="post" enctype="multipart/form-data">
                                 <div class="form-group">
                                    <label for="judul">Kegiatan</label>
                                    <input type="hidden" class="form-control"  value='<?= $_GET['id']?>' name="id_detail" required>
                                    <input type="hidden" class="form-control"  value='<?= $row['id_logbook']?>' name="id_log" required>
                                    <input type="hidden" class="form-control"  value='<?= $row['id_penelitian']?>' name="id_penelitian" required>
                                    <input type="hidden" class="form-control"  value='<?= $_SESSION['username']?>' name="nim" required>
                                    <input type="hidden" class="form-control"  value='<?= $row['tanggal']?>' name="tanggal" required>
                                    <input type="text" class="form-control" id="nama" placeholder="Kegiatan" name="kegiatan" value='<?= $row['isi_logbook']?>' required>
                                  </div>
                                  <!-- <div class="form-group">
                                    <label for="nama">Tanggal</label>
                                    <input type="date" class="form-control w-25" id="nim" name="tanggal" required value="<?= $row['tanggal_pelaksanaan']?>">
                                  </div> -->

                                  <div class="form-group">
                                    <label for="judul">Progress</label>
                                    <input type="hidden" class="form-control"  value='<?= $row['progress']?>' name="last_prog">
                                    <input type="number" class="form-control" id="nama" placeholder="Progress" name="prog" value='<?= $row['progress']?>' required>
                                  </div>
                                  
                                  <hr>
                                  <input type="submit" class="btn btn-primary" name="edit_logbook" value="Update">
                                </form>
                            
</div>
                </main>
<?php include_once "footer.php"; ?>