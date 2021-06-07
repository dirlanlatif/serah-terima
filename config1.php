<!--?php 
$server = "192.168.42.248";
$user = "support";
$pass = "support@dc";
$db = "support";

$sambung = mysqli_connect($server, $user, $pass, $db);
//mysqli_select_db($db)
//or die("database tidak ditemukan");
 ?-->
 
 
 <?php 
//koneksi ke database local
$server = "127.0.0.1";
$user = "root";
$pass = "exgone";
$db = "db_support";

$konek = mysqli_connect($server, $user, $pass, $db);
//mysql_select_db($db)
//or die("database tidak ditemukan");

 ?>