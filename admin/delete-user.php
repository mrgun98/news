<?php
	include "connectdb.php";
	if (!isset($_GET['id'])) {
		echo 'Lỗi!';
		header('Location: listuser.php');
	}
	if ($_GET['id']) {
		$id = $_GET['id'];
		$sql = 'SELECT * from datauser where ID = "'.$id.'"';
		$result= mysqli_query($conn, $sql);
		if (!$result) {
			echo 'Lỗi ID ';
			header('Location: listuser.php');
		}
		$sql ='DELETE from datauser where ID = "'.$id.'"';
		$result = mysqli_query($conn, $sql);
		if ($result) {
			echo 'Xóa thành công !';
			header('Location: listuser.php');
		}
	}
?>