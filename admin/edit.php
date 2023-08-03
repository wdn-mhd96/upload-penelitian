<?php include_once "header.php"; ?>
<div id="layoutSidenav_content">
  <main>
    <div class="container-fluid">
      <h1 class="mt-4">Edit Penelitian</h1>
      <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
        <li class="breadcrumb-item active">Edit Penelitian</li>
      </ol>
      <div class="card mb-4">
        <div class="card-header"><i class="fas fa-table mr-1"></i>Edit Penelitian</div>
        <div class="card-body">
          <?php
          include '../../koneksi/koneksi.php';
          $id = $_GET['id'];
          $data = mysqli_query($koneksi, "SELECT * from surat_mhs left JOIN user on surat_mhs.nim = user.username  where surat_mhs.Id='$id'");
          while ($d = mysqli_fetch_array($data)) {
          ?>
            <form method="post" action="edit_data.php">
              <div class="form-group">

                <label for="nama">Judul Penelitian</label>
                <input type="hidden" name="id" value="<?php echo $d['Id']; ?>">
                <input type="text" class="form-control" id="nim" value="<?php echo $d['judul']; ?>" name="nama" required>

                <div class="form-group">
                  <label for="nim">Nama Dosen</label>
                  <input type="hidden" class="form-control" id="nim" value="<?php echo $d['nim']; ?>" name="nim" required>
                  <input type="text" class="form-control" id="nim" value="<?php echo $d['nama']; ?>" disabled>
                </div>
                <hr>
                <div class="form-group">
                  <label for="file">Lampiran</label>
                  <br>KTM : <?php echo $d['file']; ?> <a href="../uploads/<?= $d['file'] ?>." target="__blank">Download</a>
                  <!-- <br>KRS  : <?php echo $d['krs']; ?> <a href="#">Download</a> -->
                </div>
                <hr>
                <div class="form-group">
                  <label for="status">Edit Status</label>
                  <select class="form-control" id="status" name="status">
                    <option value="Sedang Diproses">Sedang Diproses</option>
                    <option value="Berkas Tidak Lengkap">Berkas Tidak Lengkap</option>
                    <option value="Surat Sudah Bisa Diambil">Surat Sudah Bisa Diambil</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="krs">
                    Catatan :
                  </label>
                  <textarea name="krs" id="" cols="30" rows="10" class="form-control"><?= $d['krs']?></textarea>
                </div>
                <hr>
                <input type="submit" class="btn btn-primary" name="update" value="Simpan">
            </form>
          <?php
          }
          ?>
        </div>
      </div>
    </div>
  </main>
  <?php include_once "footer.php"; ?>