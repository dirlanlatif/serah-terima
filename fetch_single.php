<?php
include('config.php');
include('function.php');
if(isset($_POST["hh_id"]))
{
	$output    = array();
	$statement = $connection->prepare("SELECT * FROM tbl_pinjam WHERE id = '".$_POST["hh_id"]."' 
		LIMIT 1"
	);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		$output["nik"]    = $row["nik"];
		$output["ip"]     = $row["kode_ip"];
		$output["bagian"] = $row["bagian"];
		//$output['user_image'] = '<input type="hidden" name="hidden_user_image" value="" />';
		// if($row["image"] != '')
		// {
		// 	$output['user_image'] = '<img src="upload/'.$row["image"].'" class="img-thumbnail" width="50" height="35" /><input type="hidden" name="hidden_user_image" value="'.$row["image"].'" />';
		// }
		// else
		// {
		// 	$output['user_image'] = '<input type="hidden" name="hidden_user_image" value="" />';
		// }
	}
	echo json_encode($output);
}
?>