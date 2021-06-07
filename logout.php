<?php 
session_start();
session_destroy();
$_SESSION['userweb']=="";
$_SESSION['userakses']=="";
header('location:index.php');
 ?>