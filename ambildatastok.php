<?php
include('config.php');
include('function.php');
if(isset($_POST["datastok_id"]))
{
	$output = array();
	$statement = $connection->prepare(
		"SELECT * FROM v_stok WHERE item = '".$_POST["datastok_id"]."' LIMIT 1"
	);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		$output["item"]	= $row["item"];
		$output["stok"]	= $row["stok"];
		
	}
	echo json_encode($output);
}
?>