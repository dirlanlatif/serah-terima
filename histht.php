<?php
include('config.php');
include('function.php');
include('tanggal.php');
$no=0;
$query = '';
$output = array();
$query .= "SELECT * FROM v_kembaliht ";
if(isset($_POST["search"]["value"]))
{
	$query .= 'WHERE kode_ip LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR nik LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR nama_lengkap LIKE "%'.$_POST["search"]["value"].'%" ';
}
if(isset($_POST["order"]))
{
	$query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
}
else
{
	$query .= 'ORDER BY pinjam desc ';
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
	$tanggal1 = date('Y-m-H:i:s || d', strtotime($row['pinjam']));
	$tanggal2 = date('Y-m-H:i:s || d', strtotime($row['kembali']));
	$sub_array[] = $no;
	$sub_array[] = $row["kode_ip"];
	$sub_array[] = $row["nik"] ." <> ". $row["nama_lengkap"];
	$sub_array[] = tanggal_indo($tanggal1) ;
	$sub_array[] = tanggal_indo($tanggal2);
	$data[] = $sub_array;
}
$output = array(
	"draw"			=>	intval($_POST["draw"]),
	"recordsTotal"		=> 	$filtered_rows,
	"recordsFiltered"	=>	get_total_all_records_back_ht(),
	"data"			=>	$data
);
echo json_encode($output);
?>