<?php

// $server		= "127.0.0.1";
$server		= "127.0.0.1";
$username 	= "root";
$password 	= "exgone";
$database	= "db_support";
$lama 		= 365;

$connection = new PDO( 'mysql:host='. $server .';dbname='. $database .'', $username, $password );
$konek 		= mysqli_connect($server, $username, $password, $database);
$conn 		= new mysqli($server, $username, $password, $database);

date_default_timezone_set("Asia/Makassar");

?>