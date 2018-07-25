<?php
	function myConnect(){
		$servername = "127.0.0.1:3306";
		$username	= "root";
		$password 	= "";
		$dbname 	= "khoaphamtraining";
		$conn 		= mysqli_connect($servername, $username, $password);
		mysqli_select_db($conn, "SET NAMES 'utf8'");
		return $conn;
	}
?>