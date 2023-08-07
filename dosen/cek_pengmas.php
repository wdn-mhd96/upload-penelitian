<?php include_once "header.php"; ?>
<div id="layoutSidenav_content">
  <main>
    <div class="container-fluid">
      <h1 class="mt-4">Cek Status Berkas Saya</h1>
      <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
        <li class="breadcrumb-item active">Status Berkas Saya</li>
      </ol>
      <?php
      include "../../koneksi/koneksi.php";
      $no = 1;
      $gg = $_SESSION['username'];
      $sql = "SELECT * from tpengmas left JOIN user on tpengmas.nim = user.username where nim='$gg'";
      $query = mysqli_query($koneksi, $sql) or die(mysqli_error());
      // $ada=mysqli_query($koneksi, $sql) or die(mysqli_error());                                                            
      ?>
      <div class="card mb-4">
        <div class="card text-center">
          <div class="card-header">
            Status Berkas Pengmas Saya
          </div>
          <div class="card-body">
            <h3 class="float-left"><span><a class='btn btn-primary' href='tambah_pengmas.php'>Tambah Data Pengmas</a></span></h3>
            <table class="table table-bordered" id="datadosesn" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>No.</th>
                  <th>Judul Pengmas</th>
                  <th>Nama Dosen</th>
                  <th>Lampiran</th>
                  <!--  <th>KRS</th> -->
                  <th>Tanggal</th>
                  <th>Status</th>
                  <th>Catatan</th>
                </tr>
              </thead>
              <?php while ($row = mysqli_fetch_array($query)) { ?>
                <tbody>
                  <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $row['judul_pengmas']; ?></td>
                    <td><?php echo $row['nama']; ?></td>
                    <td><a href="../uploads/pengmas/<?php echo $row['file_pengmas']; ?>" target="__blank"><?php echo $row['file_pengmas']; ?></a></td>
                    <!-- <td><?php echo $row['krs']; ?></td> -->
                    <td><?php echo $row['tanggal_pengmas']; ?></td>
                    <td><?php
                        if ($row['status_pengmas'] == 'Sudah Diajukan') {
                          echo "<span class='badge badge-warning'>Berkas Sedang Di Proses</span>";
                        }
                        if ($row['status_pengmas'] == 'Sedang Diproses') {
                          echo "<span class='badge badge-warning'>Berkas Sedang Di Proses</span>";
                        }
                        if ($row['status_pengmas'] == 'Disetujui') {
                          echo "<span class='badge badge-info'>Berkas Disetujui Silahkan upload Laporan</span>";
                        }
                        if ($row['status_pengmas'] == 'Berkas Tidak Lengkap') {
                          echo "<span class='badge badge-danger'>berkas tidak lengkap</span><br><a href=revisi_pengmas.php?id=" . $row['id_pengmas'] . "><span>Revisi</span></a>";
                        }
                        if ($row['status_pengmas'] == 'Revisi') {
                          echo "<span class='badge badge-success'>Proses Revisi</span>";
                        }
                        ?></td>
                    <td><?= $row['catatan']; ?></td>
                  </tr>
                </tbody>
              <?php } ?>
            </table>


          </div>
        </div>
      </div>
  </main>
  <?php include_once "footer.php"; ?>