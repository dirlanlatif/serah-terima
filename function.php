<?php
function get_total_all_records_hh()
{
	include('config.php');
	$statement = $connection->prepare("SELECT * FROM v_pinjamhh ORDER BY pinjam DESC");
	$statement->execute();
	$result = $statement->fetchAll();
	return $statement->rowCount();
};
function ambil_data_hh()
{
	include('config.php');
	$statement = $connection->prepare("SELECT * FROM tbl_hh ORDER BY kode_ip DESC");
	$statement->execute();
	$result = $statement->fetchAll();
	return $statement->rowCount();
};
function ambil_data_ht()
{
	include('config.php');
	$statement = $connection->prepare("SELECT * FROM tbl_ht ORDER BY kode DESC");
	$statement->execute();
	$result = $statement->fetchAll();
	return $statement->rowCount();
};
function get_total_all_records_ht()
{
	include('config.php');
	$statement = $connection->prepare("SELECT * FROM v_pinjamht");
	$statement->execute();
	$result = $statement->fetchAll();
	return $statement->rowCount();
};
function get_total_all_records_back_ht()
{
	include('config.php');
	$statement = $connection->prepare("SELECT * FROM v_kembaliht");
	$statement->execute();
	$result = $statement->fetchAll();
	return $statement->rowCount();
};
function get_total_all_records_back_hh()
{
	include('config.php');
	$statement = $connection->prepare("SELECT * FROM v_kembalihh");
	$statement->execute();
	$result = $statement->fetchAll();
	return $statement->rowCount();
};
function ambil_data_kary()
{
	include('config.php');
	$statement = $connection->prepare("SELECT * FROM tbl_support");
	$statement->execute();
	$result = $statement->fetchAll();
	return $statement->rowCount();
};
function ambil_data_stok()
{
	include('config.php');
	$statement = $connection->prepare("SELECT * FROM v_tbl_stok");
	$statement->execute();
	$result = $statement->fetchAll();
	return $statement->rowCount();
};
function ambil_data_stok2()
{
	include('config.php');
	$statement = $connection->prepare("SELECT * FROM v_tbl_pakai_stok");
	$statement->execute();
	$result = $statement->fetchAll();
	return $statement->rowCount();
};
function ambil_data_stok1()
{
	include('config.php');
	$statement = $connection->prepare("SELECT * FROM v_stok");
	$statement->execute();
	$result = $statement->fetchAll();
	return $statement->rowCount();
};
function ambil_data_btlr()
{
	include('config.php');
	$statement = $connection->prepare("SELECT * FROM tbl_btlr");
	$statement->execute();
	$result = $statement->fetchAll();
	return $statement->rowCount();
};
function ambil_data_btlr_st()
{
	include('config.php');
	$statement = $connection->prepare("SELECT * FROM v_btlr_stok");
	$statement->execute();
	$result = $statement->fetchAll();
	return $statement->rowCount();
};


// function upload_image()
// {
// 	if(isset($_FILES["user_image"]))
// 	{
// 		$extension = explode('.', $_FILES['user_image']['name']);
// 		$new_name = rand() . '.' . $extension[1];
// 		$destination = './upload/' . $new_name;
// 		move_uploaded_file($_FILES['user_image']['tmp_name'], $destination);
// 		return $new_name;
// 	}
// }

// function get_image_name($user_id)
// {
// 	include('db.php');
// 	$statement = $connection->prepare("SELECT image FROM users WHERE id = '$user_id'");
// 	$statement->execute();
// 	$result = $statement->fetchAll();
// 	foreach($result as $row)
// 	{
// 		return $row["image"];
// 	}
// }
?>