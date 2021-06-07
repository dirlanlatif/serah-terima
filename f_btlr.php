<?php
include('config.php');
include('function.php');
include('tanggal.php');
$no=0;
$query = '';
$output = array();
$query .= "SELECT * FROM v_btlr ";
if(isset($_POST["search"]["value"]))
{
	$query .= 'WHERE item LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR nik LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR zona LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR waktu LIKE "%'.$_POST["search"]["value"].'%" ';
}
if(isset($_POST["order"]))
{
	$query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
}
else
{
	$query .= 'ORDER BY waktu DESC ';
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
	$sub_array   = array();
	$tanggal1 = date('Y-m-H:i:s || d', strtotime($row['waktu']));
	$sub_array[] = $no;
	$sub_array[] = $row["item"];
	$sub_array[] = $row["qty"];
	$sub_array[] = $row["nik"] ." - ". $row["nama"];
	$sub_array[] = $row["zona"];
	$sub_array[] = tanggal_indo($tanggal1) ;
	// $sub_array[] = '
	// <button type="button" name="update" id="'.$row["id"].'" class="btn btn-warning btn-xs update">Serah Terima</button>
	// &nbsp;&nbsp;&nbsp;&nbsp;
	// <button type="button" name="delete" id="'.$row["id"].'" class="btn btn-danger btn-xs delete">Kembali</button>';
	$data[] = $sub_array;
}
$output = array(
	"draw"            =>	intval($_POST["draw"]),
	"recordsTotal"    => 	$filtered_rows,
	"recordsFiltered" =>	ambil_data_btlr(),
	"data"            =>	$data
);
echo json_encode($output);
?>