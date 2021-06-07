<?php		
	include 'config.php';
	$keyword = strval($_POST['query']);
	$search_param = "{$keyword}";
	
	$sql = $conn->prepare("SELECT * FROM tbl_support WHERE nik LIKE ?");
	$sql->bind_param("s",$search_param);			
	$sql->execute();
	$result = $sql->get_result();
	if ($result->num_rows > 0)
	{
		while($row = $result->fetch_assoc())
		{
			$countryResult["nama"] = $row["nama_lengkap"];
		}
		echo json_encode($countryResult);
	}
	$conn->close();
?>