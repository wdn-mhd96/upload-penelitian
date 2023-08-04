<?php include "header.php"; ?>
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
      ?>
      <form action="" method="post">
      <div class="form-row ml-1">
      <select name="judul" id="" class="form-control w-25 mr-3">
        <?php while($a = mysqli_fetch_array($query)) { ?>
            <option value="<?= $a['Id']?>"><?= $a['judul']; ?></option>
        <?php } ?>
      </select>
      <button type="submit" class="btn btn-primary" name="tampil">Buka Logbook</button>  
      </div>
      </form>
      <br>
      <div class="card mb-4">
          <div class="card text-center">
            <div class="card-header">
              Logbook
            </div>
            <?php 
            include '../../koneksi/koneksi.php';
            if(isset($_POST['tampil']))
            {
              $id = $_POST['judul'];
              $query = mysqli_query($koneksi, "SELECT * from logbook2 where id_penelitian='$id'");
              if(mysqli_num_rows($query)>0)
              {
              $b = mysqli_fetch_array($query);
              $a = "<a href='tambah_log.php?id=".$b['id_logbook']."' class='btn btn-primary float-left mb-2'>Tambah Log</a>";
              mysqli_data_seek($query, 0);
              }
              else
              {
                $query = mysqli_query($koneksi, "SELECT * from logbook_header where id_penelitian='$id'");
                $b = mysqli_fetch_array($query);
                $a = "<a href='tambah_log.php?id=".$b['id_logbook']."' class='btn btn-primary float-left mb-2'>Tambah Log</a>";
              }
              
              
            }

            ?>
            <?php include 'data-logbook.php'?>
          </div>
        </div>
  </main>

  <?php include_once "footer.php"; ?>
