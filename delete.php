<?php

include('config.php');
include("function.php");
session_start();

if(isset($_POST["hh_id"]))
	{
		// $image = get_image_name($_POST["user_id"]);
		// if($image != '')
		// {
		// 	unlink("upload/" . $image);
		// }
		$statement = $connection->prepare(
			"DELETE FROM tbl_pinjam WHERE id = :id"
		);
		$result = $statement->execute(
			array(
				':id'	=>	$_POST["hh_id"]
			)
		);
		
		if(!empty($result))
		{
			echo 'Terima Kasih';
			//exit();
		}
	}; 
	if(isset($_POST["datahh_id"])) {
		$statement = $connection->prepare(
			"DELETE FROM tbl_hh WHERE id = :id"
		);
		$result = $statement->execute(
			array(
				':id' => $_POST["datahh_id"]
			)
		);
		if(!empty($result))
		{
			echo "Thanks";
		}
	};
	if(isset($_POST["dataht_id"])) {
		$statement = $connection->prepare(
			"DELETE FROM tbl_ht WHERE id = :id"
		);
		$result = $statement->execute(
			array(
				':id' => $_POST["dataht_id"]
			)
		);
		if(!empty($result))
		{
			echo "Thanks";
		}
	}
	if(isset($_POST["datakar_id"])) {
		$statement = $connection->prepare(
			"DELETE FROM tbl_support WHERE nik = :id AND akses != 'administrator web' AND username != :user"
		);
		$result = $statement->execute(
			array(
				':id'   => $_POST["datakar_id"],
				':user' => $_SESSION["userweb"]
			)
		);
		if(!empty($result))
		{
			echo "Data dihapus";
		}
	}
?>