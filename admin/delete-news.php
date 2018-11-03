<?php
	include "connectdb.php";
	if (!isset($_GET['id'])) {
		echo 'Lỗi !';
		header('Location: listnews.php');
	}
	if ($_GET['id']) {
		$id = $_GET['id'];
		$sql = 'SELECT * from datanews where ID_BV = "'.$id.'"';
		$result= mysqli_query($conn, $sql);
		if (!$result) {
			echo 'Lỗi ID ';
			header('Location: listnews.php');
		}
		$sql ='DELETE from datanews where ID_BV = "'.$id.'"';
		$result = mysqli_query($conn, $sql);
		if ($result) {
			echo 'Xóa thư mục thành công !';
			header('Location: listnews.php');
		}
	}
?>