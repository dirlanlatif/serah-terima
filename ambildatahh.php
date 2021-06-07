<?php
include('config.php');
include('function.php');
if(isset($_POST["datahh_id"]))
{
	$output = array();
	$statement = $connection->prepare(
		"SELECT * FROM tbl_hh WHERE id = '".$_POST["datahh_id"]."' LIMIT 1"
	);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		$output["kode_ip"]		= $row["kode_ip"];
		$output["type"] 		= $row["type"];
		$output["no_mesin"] 	= $row["no_mesin"];
		$output["sn_hardware"]	= $row["sn_hardware"];
		$output["aktiva"]		= $row["aktiva"];
		$output["bagian"]		= $row["bagian"];
		$output["keterangan"]	= $row["keterangan"];

	}
	echo json_encode($output);
}
?>