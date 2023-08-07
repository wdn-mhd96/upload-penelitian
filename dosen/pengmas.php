<?php include_once "header.php"; ?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Input Berkas Pengabdian Masyarakat</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                <li class="breadcrumb-item active">Upload berkas Pengabdian Masyarakat</li>
            </ol>
            <div class="card mb-4">
                <div class="card-body">
                    <p>
                        Jika terjadi kesalahan input berkas silahkan hubungi admin atau kemana ya...
                    </p>
                </div>
            </div>
            <div class="card mb-4">
                <?php
                include "../../koneksi/koneksi.php";
                $gg = $_SESSION['username'];

                $cekdata = "select nim from tpengmas where nim='$gg'";
                $ada = mysqli_query($koneksi, $cekdata) or die(mysqli_error());
                $q = mysqli_fetch_array($ada);
                $p = mysqli_num_rows($ada);
                if (mysqli_num_rows($ada) > 0) {
                    echo "<center><h3><span class='badge badge-warning'>Anda memiliki " . $p . " Berkas Pengmas </span></h3></center>";
                    echo "<center><h3><span class='badge badge-warning'><a href='tambah_pengmas.php'>Tambah Data Pegmas</a></span></h3></center>";
                } else {
                    echo "<center><h3><span class='badge badge-warning'><a href='tambah_pengmas.php'>Tambah Data Pengmas</a></span></h3></center>";
                }
                ?>


            </div>
    </main>
    <?php include_once "footer.php"; ?>