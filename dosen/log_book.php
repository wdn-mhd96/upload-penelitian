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
          <select name="judul" id="name" class="form-control w-25 mr-3" id="judul">
            <?php while ($a = mysqli_fetch_array($query)) { ?>
              <option value="<?= $a['Id'] ?>"><?= $a['judul']; ?></option>
            <?php } ?>
          </select>
          <button type="submit" class="btn btn-primary" name="tampil">Buka Logbook</button>
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
          $a = '<button id="btntambah" type="button" class="btn btn-sm btn-primary float-left mt-2" data-toggle="modal" data-target="#manageModal" >Tambah Logbook</button>';
          $c = "<b>" . $b['judul'] . "</b>";
          mysqli_data_seek($query, 0);
        } else {
          $query = mysqli_query($koneksi, "SELECT * from logbook_header left join surat_mhs on logbook_header.nim = surat_mhs.nim where id_penelitian='$id' and Id='$id'");
          $b = mysqli_fetch_array($query);
          // echo "<script>window.location  = 'log_book.php?id=".$b['id_logbook']."';</script>";
          $a = '<button id="btntambah" type="button" class="btn btn-sm btn-primary float-left mt-2" data-toggle="modal" data-target="#manageModal">Tambah Logbook</button>';
          $c = "<b>" . $b['judul'] . "</b>";
        }
      }

      ?>
      <br>
      <div class="card mb-4">
        <div class="card text-center">
          <div class="card-header">
            <?php echo $c;  ?>
          </div>
          <div class="col-md-4">
            <?php echo $a; ?>
           
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
                  <th>Kelola</th>
                </tr>
              </thead>
            </table>
            </div>
          </div>
        
    </div>
</div>
</div>

<!-- Modal Box -->

<div id="manageModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="manageAccountModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      
        <div class="modal-content border border-dark">
          <div class="modal-header" ><h4 id="logbook-header-modal">Tambah Logbook</h4></div>
          <div class="modal-body">
          <div id="alert" class=""></div>
                            <form action="upload.php" method="post" enctype="multipart/form-data">
                                 <div class="form-group">
                                    <label for="judul">Kegiatan</label>
                                    <input type="hidden" class="form-control"  value='<?= $b['id_log_detail']?>' name="id_detail" required>
                                    <input type="hidden" class="form-control"  value='<?= $b['id_logbook']?>' name="id_log" required>
                                    <input type="hidden" class="form-control"  value='<?= $b['id_penelitian']?>' name="id_penelitian" required>
                                    <input type="hidden" class="form-control"  value='<?= $_SESSION['username']?>' name="nim" required>
                                    <input type="hidden" class="form-control"  value='<?= $b['tanggal']?>' name="tanggal" required>
                                    <input type="text" class="form-control" id="kegiatan" placeholder="Kegiatan" name="kegiatan" required>
                                 

                                  <div class="form-group">
                                    <label for="judul">Progress</label>
                                    <input type="hidden" class="form-control" id="last_prog" value='<?= $b['progress']?>' name="last_prog">
                                    <input type="number" class="form-control" id="progress" placeholder="Progress" name="prog" required>
                                  </div>
                                  
                                  <div id="manageModalActions" class="modal-footer myLightPurpleBgColor rounded float-left">
                                    <input type="submit" class="btn btn-primary font-weight-bold" id="submit" name="" value='Tambah'>
                                    <button type="button" class="btn btn-secondary text-light border border-dark myBigBtn font-weight-bold" data-dismiss="modal"><h7>Cancel</h7></button>
                                    </form>
                </div>
            
        </div>
    </div>
<!-- end Modal -->
</main>
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<!--import jquery datatable -->
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>

<script>
  $(document).ready(function() {
   var JsTable =  $('#datalogbook').DataTable({
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
          data: 'progress',
          render:function(data) { return data +' %'; }
        },
        
        {
        data:'no',
        render: function createManageButtonFunc(data) {
        return `<button id="manageBtn" type="button" class="btn btn-sm btn-outline-success mr-1" data-toggle="modal" data-target="#manageModal" title="sunting"><i class="fas fa-pen"></i></button><a onclick="return confirm('hapus data?')"href="hapus.php?id=${data}" class="btn btn-sm btn-outline-danger" title="hapus"><i class="fas fa-trash"></i></a>`;
        }
        },
    ]
    });

    $('#datalogbook').on('click', 'tr', function(){
            jsTable = $('#datalogbook').DataTable();
            var jsData = jsTable.row(this).data();
            $('#kegiatan').val(jsData['isi_logbook']);
            $('#progress').val(jsData['progress']);
            $('#submit').attr('name','edit_logbook');
            $('#submit').val('Edit');
            $('#logbook-header-modal').text('Edit Logbook');
            $('#alert').attr('class','');
              $('#alert').html('');
            $('#submit').on('click', function() {
            $prog=parseInt($('#progress').val());
            if($prog > 100)
            {
              $('#alert').attr('class','alert alert-danger');
              $('#alert').html('Progress Maksimal 100%');
              return false;
            }
          });
        })
  });


  $('#btntambah').on('click', function(){

      
            $('#kegiatan').val('');
            $('#progress').val('');
            $('#submit').attr('name','tambah_logbook');
            $('#submit').html('Tambah');
            $('#logbook-header-modal').text('Tambah Logbook');
            $('#alert').attr('class','');
            $('#alert').html('');
            $('#submit').on('click', function() {
            $prog=parseInt($('#progress').val());
            $last_prog = parseInt($('#last_prog').val());
            if($prog < $last_prog)
            {
              $('#alert').attr('class','alert alert-danger');
              $('#alert').html('Progress Berkurang');
              return false;
            }
            if($prog > 100)
            {
              $('#alert').attr('class','alert alert-danger');
              $('#alert').html('Progress Maksimal 100%');
              return false;
            }
});

  });

  document.getElementById('name').value = "<?php echo $id;?>";
</script>
<?php include_once "footer.php"; ?>