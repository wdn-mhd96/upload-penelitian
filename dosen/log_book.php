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
      $sql = "SELECT * from surat_mhs where nim='$gg' and status='Disetujui'";
      $query = mysqli_query($koneksi, $sql) or die(mysqli_error());
      // $ada=mysqli_query($koneksi, $sql) or die(mysqli_error());                                                            
      ?>
      <select name="judul" id="">
        <?php while($a = mysqli_fetch_array($query)) { ?>
            <option value="<?= $a['id']?>"><?= $a['judul']; ?></option>
        <?php } ?>
      </select>
      <button type="submit" class="btn btn-primary">Buka Logbook</button>
        <div class="card mb-4">
          <div class="card text-center">
            <div class="card-header">
              Status Berkas Pengmas Saya
            </div>
            <form action="?id=''"></form>
            <div class="card-body">
            <table class="table table-bordered" id="datadosesn" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>Nim</th>
                    <th>Judul Penelitian</th>
                    <th>Lampiran</th>
                    <!--  <th>KRS</th> -->
                    <th>Tanggal</th>
                    <th>Status</th>
                    <th>Catatan</th>
                  </tr>
                </thead>
                <!-- <?php while ($row = mysqli_fetch_array($query)) { ?> -->
                  <!-- <tbody>
                    <tr>
                      <td><?php echo $no++; ?></td>
                      <td><?php echo $row['judul_pengmas']; ?></td>
                      <td><?php echo $row['nama']; ?></td>
                      <td><a href="../uploads/pengmas/<?php echo $row['file_pengmas']; ?>" target="__blank"><?php echo $row['file_pengmas']; ?></a></td>
                      <!-- <td><?php echo $row['krs']; ?></td> -->
                      <td><?php echo $row['tanggal_pengmas']; ?></td>
                      
                      <td><?= $row['catatan']; ?></td>
                    </tr>
                  </tbody>
                <!-- <?php } ?> -->
              </table>

        
            </div>
          </div>
        </div>
  </main>
  <?php include_once "footer.php"; ?>
