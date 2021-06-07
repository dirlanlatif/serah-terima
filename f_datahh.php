<?php
include('config.php');
include('function.php');
$no=0;
$query = '';
$output = array();
$query .= "SELECT * FROM tbl_hh ";
if(isset($_POST["search"]["value"]))
{
	$query .= 'WHERE kode_ip LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR type LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR no_mesin LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR sn_hardware LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR bagian LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR aktiva LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR keterangan LIKE "%'.$_POST["search"]["value"].'%" ';
}
if(isset($_POST["order"]))
{
	$query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
}
else
{
	$query .= 'ORDER BY kode_ip DESC ';
}
if($_POST["length"] != -1)
{
	$query .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}
$statement = $connection->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
$data = array();
$filtered_rows = $statement->rowCount();
foreach($result as $row)
{
	
	$no=$no+1;

	// $image = '';
	// if($row["image"] != '')
	// {
	// 	$image = '<img src="upload/'.$row["image"].'" class="img-thumbnail" width="50" height="35" />';
	// }
	// else
	// {
	// 	$image = '';
	// }
	$sub_array = array();
	//$sub_array[] = $image;
	$sub_array[] = $no;
	$sub_array[] = $row["kode_ip"];
	$sub_array[] = $row["type"];
	$sub_array[] = $row["no_mesin"];
	$sub_array[] = $row["sn_hardware"];
	$sub_array[] = $row["aktiva"];
	$sub_array[] = $row["bagian"];
	$sub_array[] = $row["keterangan"];
	$sub_array[] = '
	<button type="button" name="updatedatahh" id="'.$row["id"].'" class="btn btn-warning btn-xs updatedatahh">Edit</button>
	&nbsp;&nbsp;&nbsp;&nbsp;
	<button type="button" name="deldat" id="'.$row["id"].'" class="btn btn-danger btn-xs deldat">Hapus</button>';
	$data[] = $sub_array;
}
$output = array(
	"draw"				=>	intval($_POST["draw"]),
	"recordsTotal"		=> 	$filtered_rows,
	"recordsFiltered"	=>	ambil_data_hh(),
	"data"				=>	$data
);
echo json_encode($output);
?>