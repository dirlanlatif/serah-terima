<?php
include('config.php');
include('function.php');
$no=0;
$query = '';
$output = array();
$query .= "SELECT * FROM v_pinjamht ";
if(isset($_POST["search"]["value"]))
{
	$query .= 'WHERE kode_ip LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR nik LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR nama_lengkap LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR bagian LIKE "%'.$_POST["search"]["value"].'%" ';
}
if(isset($_POST["order"]))
{
	$query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
}
else
{
	$query .= 'ORDER BY pinjam DESC ';
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
	$sub_array[] = $row["kode_ip"];
	$sub_array[] = $row["nik"] ." - ". $row["nama_lengkap"];
	$sub_array[] = $row["bagian"];
	$sub_array[] = $row["pinjam"];
	$sub_array[] = '
	<button type="button" name="updateht" value="'.$row["id"].'" id="'.$row["id"].'" class="updateht btn btn-warning btn-xs updateht">Serah Terima</button>
	&nbsp;&nbsp;&nbsp;&nbsp;
	<button type="button" name="delete" id="'.$row["id"].'" class="btn btn-danger btn-xs delete">Kembali</button>';
	$data[] = $sub_array;
}
$output = array(
	"draw"			=>	intval($_POST["draw"]),
	"recordsTotal"		=> 	$filtered_rows,
	"recordsFiltered"	=>	get_total_all_records_ht(),
	"data"			=>	$data
);
echo json_encode($output);
?>