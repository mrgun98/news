<?php
	include "checklogin.php";
	
	include "connectdb.php";
		if (!isset($_GET['id'])) {
			echo 'Lỗi!';
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
			$hid = mysqli_fetch_assoc($result);
			$hidden= $hid['hidden'];
			if (!isset($hidden)) {
				$sql= 'INSERT into slide (hidden) values (1)where ID_slide = "'.$id.'"';
				if (mysqli_query($conn, $sql)) {
					echo 'Ẩn thành công !';
					header('Location: slide.php');
				} else {
					echo 'Lỗi ẩn !'; 
				}
			
			} else {
				$sql ='UPDATE slide set hidden=1 where ID_slide = "'.$id.'"';
				if (mysqli_query($conn, $sql)) {
					echo 'Ẩn thành công !';
					header('Location: slide.php');
				} else {
					echo 'Lỗi ẩn !'; 
				}
			}
		}
?>
