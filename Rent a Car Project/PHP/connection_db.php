<?php
	$database_host = "localhost:8889";
	$database_user = "root";
	$database_pass = "root";
	$database_name = "Engineering_Project_1";
	$connection = mysqli_connect($database_host, $database_user, $database_pass, $database_name);

	if(mysqli_connect_errno()){
		die("Failed connecting to MySQL database. Invalid credentials" . mysqli_connect_error(). "(" .mysqli_connect_errno(). ")" );
	}
?>
