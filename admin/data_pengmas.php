<?php 
$table = 'vpengmas';
 
// Table's primary key
$primaryKey = 'id_pengmas';
 

// Array kolom basisdata akan dikirim kembali ke DataTables.
// The `db` parameter represents the column name in the database, while the `dt`
// 'db' mewakili parameter kolom database
// 'dt' adalah parameter yang akan ditampilkan di database pada index.php

$columns = array(
    array(  'db' => 'id_pengmas', 'dt' => 'no' ),
    array(  'db' => 'nama', 'dt' => 'nama' ),
    array(  'db' => 'judul_pengmas',  'dt' => 'judul' ),
    array(  'db' => 'file_pengmas',   'dt' => 'file' ),
    array(  'db' => 'tanggal_pengmas',   'dt' => 'tanggal' ),
    array(  'db' => 'status_pengmas',   'dt' => 'status' ),
    array(  'db' => 'catatan',   'dt' => 'catatan' ),
    array(  'db' => 'id_pengmas',
            'dt' => 'aksi',

            // kalo kalian mau bikin tombol edit pake 'formatter' => function($d, $row) {return ....}
            // kalian bisa custom dengan menggunakan class bootstrap untuk mempercantik tampilan
            'formatter' => function($d, $row) {
                return '<a href="edit_pengmas.php?id='.$d.'" class="btn btn-sm btn-warning mr-1" data-toggle="tooltip" data-placement="top" title="Edit data Pengmas"><i class="fas fa-pen"></i></a><a onclick="return confirm(`yakin hapus data?`);"href="hapus_pengmas.php?id='.$d.'" class="btn btn-sm btn-danger"  data-toggle="tooltip" data-placement="top" title="Hapus data Pengmas"><i class="fas fa-trash"></i></a>';
            }
         ),
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

//code di bawah tidak perlu diedit

require( 'ssh/ssp.class.php' );
 
echo json_encode(
    SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns )
);