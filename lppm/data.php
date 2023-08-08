<?php 
$table = 'mhs2';
 
// Table's primary key
$primaryKey = 'id';
 

// Array kolom basisdata akan dikirim kembali ke DataTables.
// The `db` parameter represents the column name in the database, while the `dt`
// 'db' mewakili parameter kolom database
// 'dt' adalah parameter yang akan ditampilkan di database pada index.php

$columns = array(
    array(  'db' => 'id', 'dt' => 'no' ),
    array(  'db' => 'nama', 'dt' => 'nama' ),
    array(  'db' => 'judul',  'dt' => 'judul' ),
    array(  'db' => 'file',   'dt' => 'file' ),
    array(  'db' => 'tanggal',   'dt' => 'tanggal' ),
    array(  'db' => 'status',   'dt' => 'status' ),
    array(  'db' => 'krs',   'dt' => 'krs' ),
    array(  'db' => 'id',
            'dt' => 'aksi',

            // kalo kalian mau bikin tombol edit pake 'formatter' => function($d, $row) {return ....}
            // kalian bisa custom dengan menggunakan class bootstrap untuk mempercantik tampilan
            'formatter' => function($d, $row) {
                return '<a href="edit.php?id='.$d.'" class="btn btn-sm btn-warning mr-1" data-toggle="tooltip" data-placement="top" title="Edit data Pengmas"><i class="fas fa-pen"></i></a>';
                // <br><a onclick="return confirm(`yakin hapus data?`);"href="hapus.php?id='.$d.'" class="badge badge-danger">Hapus</a>';
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
