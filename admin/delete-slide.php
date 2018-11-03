<?php
	include "connectdb.php";
	if (!isset($_GET['id'])) {
		echo 'Lỗi !';
		header('Location: slide.php');
	}
	if ($_GET['id']) {
		$id = $_GET['id'];
		$sql = 'SELECT * from slide where ID_slide = "'.$id.'"';
		$result= mysqli_query($conn, $sql);
		if (!$result) {
			echo 'Lỗi ID ';
			header('Location: slide.php');
		}
		$sql ='DELETE from slide where ID_slide = "'.$id.'"';
		$result = mysqli_query($conn, $sql);
		if ($result) {
			echo 'Xóa thư mục thành công !';
			header('Location: slide.php');
		}
	}
?>