<?php 
$table = 'logbook2';
 
// Table's primary key
$primaryKey = 'id_log_detail';
 

// Array kolom basisdata akan dikirim kembali ke DataTables.
// The `db` parameter represents the column name in the database, while the `dt`
// 'db' mewakili parameter kolom database
// 'dt' adalah parameter yang akan ditampilkan di database pada index.php
$columns = array(
    array(  'db' => 'id_log_detail', 'dt' => 'no' ),
    array(  'db' => 'nim', 'dt' => 'nim' ),
    array(  'db' => 'isi_logbook',  'dt' => 'isi_logbook' ),
    array(  'db' => 'tanggal_pelaksanaan',   'dt' => 'tanggal' ),
    array(  'db' => 'progress',  'dt' => 'progress'),
    array(  'db' => 'id_log_detail',
            'dt' => 'aksi',

    //         // kalo kalian mau bikin tombol edit pake 'formatter' => function($d, $row) {return ....}
    //         // kalian bisa custom dengan menggunakan class bootstrap untuk mempercantik tampilan
            'formatter' => function($d, $row) {
                return '<a href="edit_log.php?id='.$d.'" class="btn btn-sm btn-warning mr-1" data-toggle="tooltip" data-placement="top" title="Edit data Pengmas"><i class="fas fa-pen"></i></a><a onclick="return confirm(`yakin hapus data?`);"href="hapus.php?id='.$d.'" class="btn btn-sm btn-danger"  data-toggle="tooltip" data-placement="top" title="Hapus data Penelitian"><i class="fas fa-trash"></i></a>';
            }
    )
        
);
 
//melakukan koneksi ke database
$sql_details = array(
    'user' => 'root',
    'pass' => '',
    'db'   => 'akbg4984_stikeswhdb',
    'host' => 'localhost'

    // prod

// $hostName    = "localhost";
// $userName    = "akbg4984_userStikes";
// $passWord    = "0dGJ%UXpBs5%";
// $dataBase    = "akbg4984_stikesWhDB";
// $port        = "3306";
);

$where = $_GET['id'];
//code di bawah tidak perlu diedit

require( 'ssh/ssp.class.php' );
 
echo json_encode(
    SSP::complex( $_GET, $sql_details, $table, $primaryKey, $columns, null, "id_logbook='$where'")
);
