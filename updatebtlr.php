<?php
include('config.php');
include('function.php');
if(isset($_POST["id"]))
{
	$output    = array();
	$statement = $connection->prepare("SELECT * FROM v_btlr_stok WHERE id = '".$_POST["id"]."' 
		LIMIT 1"
	);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		$output["id"]	= $row["id"];
		$output["item"] = $row["item"];
		$output["sisa"] = $row["sisa"];
		$output["stok"] = $row["stok"];
		
	}
	echo json_encode($output);
}
?>