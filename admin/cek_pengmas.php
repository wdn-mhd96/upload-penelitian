<?php include_once "header.php"; ?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Data Pengabdian Masyarakat</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                <li class="breadcrumb-item active">Upload Pengabdian masyarakat</li>
            </ol>
            <div class="card mb-4">
                <div class="card-body">
                    <p>
                        Jangan ragu untuk bertanya jika Anda memiliki pertanyaan atau butuh bantuan selama proses pengunggahan.
                    </p>
                </div>
            </div>
            <div class="table-responsive">
            <table id="pengmas" class="table table-border" style="width:100%">
                <thead class="table table-dark">
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Judul</th>
                        <th>File</th>
                        <th>Tahun Ajaran</th>
                        <th>Status</th>
                        <th>Catatan</th>
                        <th>action</th>
                    </tr>
                </thead>
            </table>
</div>

        </div>
    </main>
    <!-- import jquery -->
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <!-- import jquery datatable -->
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>

    <!-- script javascript untuk datatable -->
    <script>
        $(document).ready(function() {
            $('#pengmas').DataTable({
                "columnDefs": [
             { "width": "12%", "targets": 7 }
             ],
                "processing": true,
                "serverSide": true,
                "ajax": "data_pengmas.php",
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
                        "data": 'nama'
                    },
                    {
                        "data": 'judul'
                    },
                    {
                        "data": 'file'
                    },
                    {
                        "data": 'tanggal'
                    },
                    {
                        "data": 'status'
                    },
                    {
                        "data": 'catatan'
                    },
                    {
                        "data": 'aksi'
                    },
                ]
            });
        });
    </script>
    <?php include_once "footer.php"; ?>