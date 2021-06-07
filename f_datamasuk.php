<?php
include('config.php');
include('function.php');
include('tanggal.php');
$no=0;
$query = '';
$output = array();
$query .= "SELECT * FROM v_tbl_stok ";
if(isset($_POST["search"]["value"]))
{
	$query .= 'WHERE item LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR pic LIKE "%'.$_POST["search"]["value"].'%" ';	
}
if(isset($_POST["order"]))
{
	$query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
}
else
{
	$query .= 'ORDER BY tanggal DESC ';
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
	$tanggal1 = date('Y-m-d', strtotime($row['tanggal']));

	$sub_array[] = $no;
	$sub_array[] = $row["item"];
	$sub_array[] = $row["qty"];
	$sub_array[] = $row["pic"];
	$sub_array[] = tanggal_indo($tanggal1) ;
	$sub_array[] = $row["keterangan"];
	$data[] = $sub_array;
}
$output = array(
	"draw"				=>	intval($_POST["draw"]),
	"recordsTotal"		=> 	$filtered_rows,
	"recordsFiltered"	=>	ambil_data_stok(),
	"data"				=>	$data
);
echo json_encode($output);
?>