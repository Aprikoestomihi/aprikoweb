<?php
include dirname(__FILE__).'/apps/koneksi.php';
include 'index.php';
  // $data = $_GET['data'];
  $sql = "DELETE FROM nilai where nim='$data[0]' and id_matkul =$data[1]";
  mysqli_query($conn,$sql);
  header("Location: index.php");
?>