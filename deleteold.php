<?php 
require_once("config.php");
//$date = now();
//$setahun = 'INTERVAL 360 DAY';
mysqli_query($connection,"DELETE FROM tbl_kembali WHERE date(pinjam) < now() - INTERVAL 360 DAY");
 ?>
