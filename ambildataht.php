<?php
include('config.php');
include('function.php');
if(isset($_POST["dataht_id"]))
{
	$output = array();
	$statement = $connection->prepare(
		"SELECT * FROM tbl_ht WHERE id = '".$_POST["dataht_id"]."' LIMIT 1"
	);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		$output["kode"]			= $row["kode"];
		$output["type"] 		= $row["type"];
		$output["sn"] 			= $row["sn"];
		$output["aktiva"]		= $row["aktiva"];
		$output["bagian"]		= $row["bagian"];
		$output["keterangan"]	= $row["keterangan"];

	}
	echo json_encode($output);
}
?>