<?php include_once "header.php"; ?>
<div id="layoutSidenav_content">
  <main>
    <div class="container-fluid">
      <h1 class="mt-4">Cek Laporan Hasil</h1>
      <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
        <li class="breadcrumb-item active">Status Berkas Saya</li>
      </ol>
      <?php
      include "../../koneksi/koneksi.php";
      $no = 1;
      $gg = $_SESSION['username'];
      $sql = "SELECT * from laporan2";
      $query = mysqli_query($koneksi, $sql) or die(mysqli_error());
      // $ada=mysqli_query($koneksi, $sql) or die(mysqli_error());                                                            
      ?>
      <div class="card mb-4">
        <div class="card text-center">
          <div class="card-header">
            Daftar Laporan Hasil
          </div>
          <div class="card-body">
            <table class="table table-bordered" id="datadosesn" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>No.</th>
                  <th>Judul Laporan</th>
                  <th>Jenis Laporan</th>
                  <th>Nama Dosen</th>
                  <th>Lampiran</th>
                  <th>Tanggal</th>
                  <th>Status</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <?php while ($row = mysqli_fetch_array($query)) { ?>
                <tbody>
                  <tr>
                    <td><?php echo $no++; ?></td>
                    <?php if ($row['jenis_laporan'] == "pengmas") { ?>
                      <td><?php echo $row['judul_pengmas']; ?></td>
                    <?php  } else {
                    ?>
                      <td><?php echo $row['judul']; ?></td>
                    <?php } ?>
                    <td><?php echo $row['jenis_laporan']; ?></td>
                    <td><?php echo $row['nama']; ?></td>
                    <?php if ($row['file_laporan'] == '') { ?>
                      <td>Lampiran Belum di Upload</td>
                    <?php } else { ?>
                      <td><a href="../uploads/laporan/<?php echo $row['file_laporan']; ?>" target="__blank"><?php echo $row['file_laporan']; ?></a></td>
                    <?php } ?>
                    <td><?php echo $row['tanggal_laporan']; ?></td>
                    <?php if ($row['status'] == 0) { ?>
                      <td>Belum Upload File Laporan</td>
                    <?php } else {
                    ?>
                      <td>File Sudah Di Upload</td>
                    <?php } ?>
                    <td><a onclick="return confirm('yakin ingin hapus data?')" href="hapus_laporan.php?id=<?= $row['id_laporan'] ?>" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Hapus Laporan"><i class="fas fa-trash"></i></a></td>
                  </tr>
                </tbody>
              <?php } ?>
            </table>


          </div>
        </div>
      </div>
  </main>
  <?php include_once "footer.php"; ?>