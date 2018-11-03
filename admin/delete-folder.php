<?php
	include "connectdb.php";
	if (!isset($_GET['id'])) {
		echo 'Lỗi !';
		header('Location: listfolder.php');
	}
	if ($_GET['id']) {
		$id = $_GET['id'];
		$sql = 'SELECT * from datafolder where ID = "'.$id.'"';
		$result= mysqli_query($conn, $sql);
		if (!$result) {
			echo 'Lỗi ID ';
			header('Location: listfolder.php');
		}
		$sql ='DELETE from datafolder where ID = "'.$id.'"';
		$result = mysqli_query($conn, $sql);
		if ($result) {
			echo 'Xóa thư mục thành công !';
			header('Location: listfolder.php');
		}
	}
?>