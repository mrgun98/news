<?php
	include "connectdb.php";
	if (!isset($_GET['id'])) {
		echo 'Lỗi !';
		header('Location: menu.php');
	}
	if ($_GET['id']) {
		$id = $_GET['id'];
		$sql = 'SELECT * from datamenu where ID_menu = "'.$id.'"';
		$result= mysqli_query($conn, $sql);
		if (!$result) {
			echo 'Lỗi ID ';
			header('Location: menu.php');
		}
		$sql ='DELETE from datamenu where ID_menu = "'.$id.'"';
		$result = mysqli_query($conn, $sql);
		if ($result) {
			echo 'Xóa thư mục thành công !';
			header('Location: menu.php');
		}
	}
?>