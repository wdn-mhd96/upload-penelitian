<?php include_once "header.php"; ?>
<div id="layoutSidenav_content">
  <main>
    <div class="container-fluid">
      <h1 class="mt-4">Edit Data Pengmas</h1>
      <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
        <li class="breadcrumb-item active">Edit Data Pengmas</li>
      </ol>
      <div class="card mb-4">
        <div class="card-header"><i class="fas fa-table mr-1"></i>Edit Data Pengmas</div>
        <div class="card-body">
          <?php
          include '../../koneksi/koneksi.php';
          $id = $_GET['id'];
          $data = mysqli_query($koneksi, "SELECT * from tpengmas left JOIN user on tpengmas.nim = user.username  where tpengmas.id_pengmas='$id'");
          while ($d = mysqli_fetch_array($data)) {
            if ($d['status_pengmas'] == "Disetujui") {
              echo "<h2>Proposal Sudah Disetujui</h2>";
              echo "<br><a href='cek_pengmas.php' class='btn btn-outline-primary'>Kembali</a>";
            } else {
          ?>
              <form method="post" action="edit_data.php">
                <div class="form-group">

                  <label for="nama">Judul Penelitian</label>
                  <input type="hidden" name="id" value="<?php echo $d['id_pengmas']; ?>">
                  <input type="text" class="form-control" id="nim" value="<?php echo $d['judul_pengmas']; ?>" name="nama" required>

                  <div class="form-group">
                    <label for="nim">Nama Dosen</label>
                    <input type="hidden" class="form-control" id="nim" value="<?php echo $d['nim']; ?>" name="nim" required>
                    <input type="text" class="form-control" id="nim" value="<?php echo $d['nama']; ?>" disabled>
                  </div>
                  <hr>
                  <div class="form-group">
                    <label for="file">Lampiran</label>
                    <br><?php echo $d['file']; ?> <a href="../uploads/pengmas/<?= $d['file_pengmas'] ?>." target="__blank">Download Lampiran</a>
                    <!-- <br>KRS  : <?php echo $d['krs']; ?> <a href="#">Download</a> -->
                  </div>
                  <hr>
                  <div class="form-group">
                    <label for="status">Edit Status</label>
                    <select name="status" class="form-control">
                  <?php $q=mysqli_query($koneksi, "SELECT * from status_berkas"); 
                      while($r=mysqli_fetch_array($q)) {
                        if($d['status_pengmas']==$r['status_berkas']) {?>
                      <option value="<?= $r['status_berkas'] ?>" selected><?= $r['status_berkas'] ?></option>
                      <?php } else{ ?>
                      <option value="<?= $r['status_berkas'] ?>"><?= $r['status_berkas'] ?></option>
                        <?php } } ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="krs">
                      Catatan :
                    </label>
                    <textarea name="krs" id="" cols="30" rows="10" class="form-control"><?= $d['catatan'] ?></textarea>
                  </div>
                  <hr>
                  <input type="submit" class="btn btn-primary" name="update_pengmas" value="Simpan">
              </form>
          <?php
            }
          }
          ?>
        </div>
      </div>
    </div>
  </main>
  <?php include_once "footer.php"; ?>