<?php 
include '../koneksi/koneksi.php';
$query = mysqli_query($koneksi,"SELECT * from user");
while($a = mysqli_fetch_assoc($query))
{
echo json_encode($a);
}
?>