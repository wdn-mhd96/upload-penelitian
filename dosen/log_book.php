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
      <select name="judul" id="" class="form-control w-25 mr-3" id="judul">
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
              // echo "<script>window.location  = 'log_book.php?id=".$b['id_logbook']."';</script>";
              $a = "<a href='tambah_log.php?id=".$b['id_logbook']."' class='btn btn-primary float-left mt-2'>Tambah Log</a>";
              mysqli_data_seek($query, 0);
              }
              else
              {
                $query = mysqli_query($koneksi, "SELECT * from logbook_header where id_penelitian='$id'");
                $b = mysqli_fetch_array($query);
                // echo "<script>window.location  = 'log_book.php?id=".$b['id_logbook']."';</script>";
                $a = "<a href='tambah_log.php?id=".$b['id_logbook']."' class='btn btn-primary float-left mt-2'>Tambah Log</a>";
              
              }
              
              
            }

            ?>
            <?php include 'data-logbook.php'?>
          </div>
          </div>
        </div>
  </main>
  <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
 <!--import jquery datatable -->
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>

  <script>
  $(document).ready(function() {
    $('#datalogbook').DataTable( {
        "processing": true,
        "serverSide": true,
        "ajax": "log_data.php?id=<?= $b['id_logbook']?>",
 
        "order": [[ 0, 'asc' ]],

        // membuat kolom
        "columns": [

            //untuk membuat data index
            { data: 'no', name:'id', render: function (data, type, row, meta) {
                  return meta.row + meta.settings._iDisplayStart + 1;
              }},

              //samakan data kolom sesuai dt di data.php
            { "data": 'nim' },
            { "data": 'isi_logbook' },
            { "data": 'tanggal' },
            { "data": 'progress' }, 
        ]
    } );
} );
</script>
  <?php include_once "footer.php"; ?>
