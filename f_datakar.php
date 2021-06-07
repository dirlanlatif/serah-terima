<?php
include('config.php');
include('function.php');
$no=0;
$query = '';
$output = array();
$query .= "SELECT * FROM tbl_support ";
if(isset($_POST["search"]["value"]))
{
	$query .= 'WHERE nik LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR nama_lengkap LIKE "%'.$_POST["search"]["value"].'%" ';
	
	
}
if(isset($_POST["order"]))
{
	$query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
}
else
{
	$query .= 'ORDER BY nik DESC ';
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
	$sub_array[] = $row["nik"];
	$sub_array[] = $row["nama_lengkap"];
	$sub_array[] = '
	<button type="button" name="updatedatakar" id="'.$row["nik"].'" class="btn btn-warning btn-xs updatedatakar">Edit</button>
	&nbsp;&nbsp;&nbsp;&nbsp;
	<button type="button" name="deldatkar" id="'.$row["nik"].'" class="btn btn-danger btn-xs deldatkar">Hapus</button>';
	$data[] = $sub_array;
}
$output = array(
	"draw"				=>	intval($_POST["draw"]),
	"recordsTotal"		=> 	$filtered_rows,
	"recordsFiltered"	=>	ambil_data_kary(),
	"data"				=>	$data
);
echo json_encode($output);
?>