<?php
session_start();

// cek apakah yang mengakses halaman ini sudah login
if ($_SESSION['level'] != "dosen") {
    if ($_SESSION['level'] == 'admin') {
        header('location:../admin/index.php');
    } 
    else if ($_SESSION['level'] == 'lppm') {
        header('location:../lppm/index.php');
    } else {
        header('location:../index.php');
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Dashboard | Dosen</title>
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
    <link href="../css/styles.css" rel="stylesheet" />
    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
    <style>
        .drop {
            position:relative;
        }
        .drop:after {
            content:"";
            height:5px;
            width:5px;
            border-top:solid 5px gray;
            border-right:solid 5px transparent;
            border-left:solid 5px transparent;
            position:absolute;
            left:180px;
        }
        .drop:hover:after {
            border-top:solid 5px white;
        }
        
       
    </style>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <a class="navbar-brand" href="index.php">UPLOAD PENELITIAN</a><button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href=""><i class="fas fa-bars"></i></button><!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
            <div class="input-group">

            </div>
        </form>
        <!-- Navbar-->
        <ul class="navbar-nav ml-auto ml-md-0">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="userDropdown" href="../logout.php" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="profile.php">Profile</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="../logout.php">Logout</a>
                </div>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark"id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading"><?php echo $_SESSION['username']; ?></div>
                        <ul clas="nav flex-column flex-nowrap" type="none" style="margin-left:-30px;">
                        <li class="nav-item"><a class="nav-link" href="index.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>
                        <li class="nav-item">
                        <a href="#submenu1" class="nav-link collapsed drop" data-toggle="collapse" data-target="#submenu1"><div class="sb-nav-link-icon"><i class="fas fa-microscope"></i></div>Penelitian</a>
                        <small>
                        <div class="collapse" id="submenu1" aria-expanded="false">
                        <ul class="flex-column pl-3 nav">
                        <li class="nav-item"><a class="nav-link" href="cek_surat.php">
                            Proposal Penelitian 
                        </a></li>
                        <?php
                        include '../../koneksi/koneksi.php';
                        $nim=$_SESSION['username'];
                        $query = mysqli_query($koneksi, "SELECT * from surat_mhs where nim='$nim' and status in('Disetujui','Disetujui dengan Revisi')");
                        if(mysqli_num_rows($query)>0) { ?>
                        <li class="nav-item"><a class="nav-link" href="revisi.php">
                            Perbaikan Proposal
                        </a></li>
                        <li class="nav-item"><a class="nav-link" href="log_book.php">
                            Log Book
                        </a></li>
                        <?php }?>
                        <li class="nav-item"><a class="nav-link" href="laporan_hasil.php">
                            Laporan Hasil Penelitian
                        </a></li>
                        </ul>
                        </div>
                        </small>
                        <a href="#submenu2" class="nav-link collapsed drop" data-toggle="collapse" data-target="#submenu2"><div class="sb-nav-link-icon"><i class="fas fa-heart"></i></div>Pengabdian Masyarakat</a>
                        <small>
                        <div class="collapse" id="submenu2" aria-expanded="false">
                        <ul class="flex-column pl-3 nav">             
                        <li class="nav-item"><a class="nav-link" href="cek_pengmas.php">
                            Proposal Pengmas
                        </a></li>
                        <li class="nav-item"><a class="nav-link" href="revisi_pengmas.php">
                            Perbaikan Proposal
                        </a></li>
                        <li class="nav-item"><a class="nav-link" href="laporan_hasil_pengmas.php">
                            Laporan Hasil Pengmas
                        </a></li>
                        </ul>
                        </div>
                        </ul>

                    </div>
                    </small>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Masuk Sebagai :</div>
                    <?php echo $_SESSION['level']; ?>
                </div>
            </nav>
        </div>