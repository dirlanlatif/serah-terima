<?php
include('config.php');
include('function.php');
include('tanggal.php');
$no=0;
$query = '';
$output = array();
$query .= "SELECT * FROM v_btlr_stok ";
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
	$query .= 'ORDER BY item ASC ';
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
	$sub_array   = array();
	$tanggal = date('Y-m-d', strtotime($row['tgl_update']));
	$sub_array[] = $row["item"];
	$sub_array[] = $row["sisa"];
	$sub_array[] = ''.tanggal_indo($tanggal).' <button type="button" name="updatebtlr" id="'.$row["id"].'" class="btn btn-info btn-xs updatebtlr">Update Stok</button>';
	// $sub_array[] = '
	// <button type="button" name="update" id="'.$row["id"].'" class="btn btn-warning btn-xs update">Serah Terima</button>
	// &nbsp;&nbsp;&nbsp;&nbsp;
	// <button type="button" name="delete" id="'.$row["id"].'" class="btn btn-danger btn-xs delete">Kembali</button>';
	$data[] = $sub_array;
}
$output = array(
	"draw"            =>	intval($_POST["draw"]),
	"recordsTotal"    => 	$filtered_rows,
	"recordsFiltered" =>	ambil_data_btlr_st(),
	"data"            =>	$data
);
echo json_encode($output);
?>