<?php
include('config.php');
include('function.php');
if(isset($_POST["ht_id"]))
{
	$output    = array();
	$statement = $connection->prepare("SELECT * FROM tbl_pinjam WHERE id = '".$_POST["ht_id"]."'
		LIMIT 1"
	);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		$output["nihtk"]    = $row["nik"];
		$output["ipht"]     = $row["kode_ip"];
		$output["bagianht"] = $row["bagian"];
	}
	echo json_encode($output);
}
?>