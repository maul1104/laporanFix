<?php 
include "../conn/conn.php";
$id = $_GET['id'];
mysqli_query($conn,"DELETE FROM jenis_laporan WHERE identitas='$id'");
echo "<script>window.location.href='index.php?page=add_jenislaporan';</script>'";
exit;
?>