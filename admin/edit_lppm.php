<?php
if(isset($_POST['lppm']))
{
    include '../../koneksi/koneksi.php';
    $id = $_GET['id'];
    $level = 'lppm';

    mysqli_query($koneksi, "UPDATE user set level='$level' where id='$id'");

    // Show message when user added
    echo "<script>alert('Data Berhasil Jadi Lppm!'); window.location = 'mhs.php'</script>";
}

if(isset($_POST['blppm']))
{
    include '../../koneksi/koneksi.php';
    $id = $_GET['id'];
    $level = 'dosen';

    mysqli_query($koneksi, "UPDATE user set level='$level' where id='$id'");

    // Show message when user added
    echo "<script>alert('Berhasil ditarik dari Lppm!'); window.location = 'mhs.php'</script>";
}