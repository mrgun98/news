<?php
    $servername = "localhost";
    $dbusername = "root";
	$dbpassword = "";
	$dbname= "username";
	$conn = mysqli_connect($servername, $dbusername, $dbpassword, $dbname);
    if (!$conn){
		die('khong the ket noi'.mysqli_coonnect_error());
	}
	mysqli_set_charset($conn,'utf-8');
?>