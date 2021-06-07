<?php 
	include 'config1.php';
	// $iniquery = mysqli_query($connection,"SELECT * FROM tbl_hh GROUP BY bagian order by bagian DESC");
	// 	while ($r=mysqli_fetch_array($iniquery)){
	// 		echo $r[bagian];
	// 		echo var_dump($r[bagian]);
	// 	}
 ?>
<form method="post">
	<?php 
		//$konek= mysqli_connect("localhost","root","exgone","db_support");		
		//$qry="SELECT * FROM tbl_support where akses='support' order by nik";
		//include 'config.php';
		$hasil=mysqli_query($konek,"SELECT * FROM tbl_testingg");
		while($data=mysqli_fetch_array($hasil)){
			echo"<input type='checkbox' name='cek[]' value='$data[satu]'>$data[satu]<br>" ;
		}
	?>							
		<input type="submit" name="submit" value="Tampil">	
</form>
<?php 
	if(isset($_POST['submit'])){
		if(!empty($_POST['cek'])){
			//$cek = implode(",", $_POST['cek']);
			$cek=$_POST['cek'];
			$hasil2=mysqli_query($konek,"SELECT * FROM tbl_testingg WHERE satu = '$cek'");
			while($data2=mysqli_fetch_array($hasil2)){
				echo $data2['satu'] .'<br>';
				var_dump($cek);
		}
	}
}
 ?>


















<!-- <?php 
	if(isset($_POST['submit'])){
		foreach ($_POST['cek'] as $item) {
			$item2 = $item;
			echo $item2;
			echo "<br>";
			var_dump($item2);
			echo "<br>";
	}
	$hasil2=mysqli_query($konek,"SELECT * FROM tbl_services where penginput REGEXP $item2");
			while($data2=mysqli_fetch_array($hasil2)){
				echo $data2['penginput'] .'<br>';
		}
}

 ?>
 -->
 <!-- name pada checkbox harus tambahkan kurung braket agar yang dicentang muncul semua -->