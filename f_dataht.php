<?php
include('config.php');
include('function.php');
$no=0;
$query = '';
$output = array();
$query .= "SELECT * FROM tbl_ht ";
if(isset($_POST["search"]["value"]))
{
	$query .= 'WHERE kode LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR type LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR sn LIKE "%'.$_POST["search"]["value"].'%" ';
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
	$query .= 'ORDER BY tgl_input DESC ';
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
	$sub_array[] = $row["kode"];
	$sub_array[] = $row["type"];
	$sub_array[] = $row["sn"];
	$sub_array[] = $row["aktiva"];
	$sub_array[] = $row["bagian"];
	$sub_array[] = $row["keterangan"];
	$sub_array[] = '
	<button type="button" name="updatedataht" id="'.$row["id"].'" class="btn btn-warning btn-xs updatedataht">Edit</button>
	&nbsp;&nbsp;&nbsp;&nbsp;
	<button type="button" name="deldatht" id="'.$row["id"].'" class="btn btn-danger btn-xs deldatht">Hapus</button>';
	$data[] = $sub_array;
}
$output = array(
	"draw"				=>	intval($_POST["draw"]),
	"recordsTotal"		=> 	$filtered_rows,
	"recordsFiltered"	=>	ambil_data_ht(),
	"data"				=>	$data
);
echo json_encode($output);
?>