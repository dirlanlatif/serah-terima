<?php
include('config.php');
include('function.php');
if(isset($_POST["datastok_id"]))
{
	$output = array();
	$statement = $connection->prepare(
		"SELECT * FROM tbl_stok WHERE item = '".$_POST["datastok_id"]."' LIMIT 1"
	);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		$output["item"]			= $row["item"];
		$output["qty"]			= $row["qty"];
		$output["pic"]			= $row["pic"];
		$output["tanggal"]		= $row["tanggal"];
		$output["keterangan"]	= $row["keterangan"];
	}
	echo json_encode($output);
}
?>