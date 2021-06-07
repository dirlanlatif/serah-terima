<?php
@ob_start();
session_start();
include 'config.php';
	error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));

	if (isset($_POST['login'])) {
		$username=$_POST['username'];
		$password=$_POST['password'];
		$qry=mysqli_query($konek,"SELECT * FROM tbl_support WHERE username='$username' AND password='$password'");
		$ada=mysqli_num_rows($qry);
		$data=mysqli_fetch_array($qry);
		$akses=$data['akses'];
		if ($ada==1) {
			$_SESSION['userpass']=$password;
			$_SESSION['userweb']=$username;
			$_SESSION['userakses']=$akses;
			$_SESSION['timeout']=time();
			$_SESSION['nik']=$nik;
			$nik=$data['nik'];
			if ($akses=="support" OR $akses=="administrator web") {
				
				echo "<script>alert('Login Berhasil');
				document.location='index.php';
				</script>";
				exit;
			
			}else if($akses!="support") {
				
				echo "<script>alert('Gagal Login, User Bukan Support');
				document.location='index.php';
				</script>";
				//echo "Gagal 01";
				exit;
			}
		}else{
			// echo $username;
			// echo $password;
			echo "<script>alert('Gagal Login, username atau password salah');
			document.location='index.php';
			</script>";
			//echo "gagal 02";
			exit;
		}
	}
?>
<!--?php 
session_start();
include '../../config.php';
$username=$_POST['username'];
$password=$_POST['password'];
$query=mysqli_query($konek,"select * from tbl_support where username='$username' and password='$password'");
$test=mysqli_num_rows($query);
if ($test==TRUE) {
	$_SESSION['username']=$username;
	header('location:../../index.php');
}else{
	header('location:../../index.php?panggil=login');
}
?-->