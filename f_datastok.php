<?php
include('config.php');
include('function.php');
$no=0;
$query = '';
$output = array();
$query .= "SELECT * FROM v_stok ";
if(isset($_POST["search"]["value"]))
{
	$query .= 'WHERE item LIKE "%'.$_POST["search"]["value"].'%" ';
}
if(isset($_POST["order"]))
{
	$query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
}
else
{
	$query .= 'ORDER BY item DESC ';
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
	$sub_array = array();
	$sub_array[] = $no;
	$sub_array[] = $row["item"];
	$sub_array[] = $row["stok"];
	$sub_array[] = '
	<button type="button" name="updatedatastok" id="'.$row["item"].'" class="btn btn-info btn-xs updatedatastok">Pemakaian</button> || 
	<button type="button" name="tambahstok" id="'.$row["item"].'" class="btn btn-warning btn-xs tambahstok">Update Stok</button>
	';
	$data[] = $sub_array;
}
$output = array(
	"draw"				=>	intval($_POST["draw"]),
	"recordsTotal"		=> 	$filtered_rows,
	"recordsFiltered"	=>	ambil_data_stok1(),
	"data"				=>	$data
);
echo json_encode($output);
?>