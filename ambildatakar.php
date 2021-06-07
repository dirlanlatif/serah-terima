<?php
include('config.php');
include('function.php');
if(isset($_POST["datakar_id"]))
{
	$output = array();
	$statement = $connection->prepare(
		"SELECT * FROM tbl_support WHERE nik = '".$_POST["datakar_id"]."' LIMIT 1"
	);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		$output["nik"]          = $row["nik"];
		$output["nama_lengkap"] = $row["nama_lengkap"];
		$output["username"]     = $row["username"];
		$output["password"]     = $row["password"];
		$output["no_hp"]        = $row["no_hp"];
		$output["email"]        = $row["email"];
		$output["akses"]        = $row["akses"];

	}
	echo json_encode($output);
}
?>