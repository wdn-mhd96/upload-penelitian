<?php include_once "header.php"; ?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Data Penelitian</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                <li class="breadcrumb-item active">Upload Penelitian</li>
            </ol>
            <div class="card mb-4">
                <div class="card-body">
                    <p>
                        Jangan ragu untuk bertanya jika Anda memiliki pertanyaan atau butuh bantuan selama proses pengunggahan.
                    </p>
                </div>
            </div>
            <div class="table-responsive">
            <table id="example2" class="table table-border" style="width:100%">
                <thead class="table table-dark">
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Judul</th>
                        <th>File</th>
                        <th>Tanggal</th>
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
            $('#example2').DataTable({
                "processing": true,
                "serverSide": true,
                "ajax": "data.php",
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
                        "data": 'krs'
                    },
                    {
                        "data": 'aksi'
                    },
                ]
            });
        });
    </script>


    <?php include_once "footer.php"; ?>