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
      $sql = "SELECT DISTINCT nim from surat_mhs where status='Disetujui'";
      $query = mysqli_query($koneksi, $sql) or die(mysqli_error());
      ?>
      <form action="" method="post">
        <div class="form-row ml-1">
          <label for="" class="mr-2 mt-2"><b>Nim :</b></label>
          <select name="nim" id="name" class="form-control w-25 mr-3" id="judul">
            <?php while ($a = mysqli_fetch_array($query)) { ?>
              <option value="<?= $a['nim'] ?>"><?= $a['nim']; ?></option>
            <?php } ?>
          </select>
         
          <button type="submit" class="btn btn-primary mr-2" name="buka">Buka</button>
          <?php
          if(isset($_POST['buka']))
          {
            $nim=$_POST['nim'];
            $q=mysqli_query($koneksi, "SELECT * from surat_mhs where nim='$nim' and status in('Disetujui','Disetujui dengan Revisi')");
          ?>
          <select name="judul" id="" class="form-control w-25 mr-3" id="judul">
            <?php while ($b = mysqli_fetch_array($q)) { ?>
              <option value="<?= $b['Id'] ?>"><?= $b['judul']; ?></option>
            <?php } ?>
          </select>
          <button type="submit" class="btn btn-primary" name="tampil">Buka Logbook</button>
          <?php } ?>
        </div>
      </form>
      <?php
      include '../../koneksi/koneksi.php';
      if (isset($_POST['tampil'])) {
        $id = $_POST['judul'];
        $query = mysqli_query($koneksi, "SELECT * from logbook2 left JOIN surat_mhs on logbook2.nim = surat_mhs.nim where id_penelitian='$id' and Id='$id'");
        if (mysqli_num_rows($query) > 0) {
          $b = mysqli_fetch_array($query);
          // echo "<script>window.location  = 'log_book.php?id=".$b['id_logbook']."';</script>";
          $a = "<a href='tambah_log.php?id=" . $b['id_logbook'] . "&id_p=".$b['id_penelitian']. "' class='btn btn-primary float-left mt-2'>Tambah Log</a>";
          $c = "<b>(".$b['nim'].")" . $b['judul'] . "</b>";
          mysqli_data_seek($query, 0);
        } else {
          $query = mysqli_query($koneksi, "SELECT * from logbook_header left join surat_mhs on logbook_header.nim = surat_mhs.nim where id_penelitian='$id' and Id='$id'");
          $b = mysqli_fetch_array($query);
          // echo "<script>window.location  = 'log_book.php?id=".$b['id_logbook']."';</script>";
          $a = "<a href='tambah_log.php?id=" . $b['id_logbook'] . "&id_p=".$b['id_penelitian']."' class='btn btn-primary float-left mt-2'>Tambah Log</a>";
          $c = "<b>(".$b['nim'].")" . $b['judul'] . "</b>";
        }
      }

      ?>
      <br>
      <div class="card mb-4">
        <div class="card text-center">
          <div class="card-header">
            <?php echo $c;  ?>
          </div>


          <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="datalogbook" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>No.</th>
                  <th>kode Dosen</th>
                  <th>Kegiatan</th>
                  <th>Progress</th>
                </tr>
              </thead>
            </table>
          </div>
          </div>
        </div>
     
</div>
</div>
</main>
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<!--import jquery datatable -->
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>

<script>
  $(document).ready(function() {
    $('#datalogbook').DataTable({
      "processing": true,
      "serverSide": true,
      "ajax": "log_data.php?id=<?= $b['id_logbook'] ?>",

      "order": [
        [0, 'asc']
      ],

      // membuat kolom
      "columns": [

        //untuk membuat data index
        {
          data: 'no',
          name: 'id',
          render: function(data, type, row, meta) {
            return meta.row + meta.settings._iDisplayStart + 1;
          }
        },

        //samakan data kolom sesuai dt di data.php
        {
          "data": 'nim'
        },
        {
          "data": 'isi_logbook'
        },
        {
          "data": 'progress'
        },
      ]
    });
  });

  document.getElementById('name').value = "<?php echo $nim;?>";

          
</script>
<?php include_once "footer.php"; ?>