<?php
	include "checklogin.php";
	
	include "connectdb.php";
		if (!isset($_GET['id'])) {
			echo 'Lỗi!';
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
			$hid = mysqli_fetch_assoc($result);
			$hidden= $hid['hidden'];
			if (!isset($hidden)) {
				$sql= 'INSERT into datamenu (hidden) values (0) where ID_menu = "'.$id.'"';
				if (mysqli_query($conn, $sql)) {
					echo 'Ẩn thành công !';
					header('Location: menu.php');
				} else {
					echo 'Lỗi hiện !'; 
				}
			
			} else {
				$sql ='UPDATE datamenu set hidden= 0 where ID_menu = "'.$id.'"';
				if (mysqli_query($conn, $sql)) {
					echo 'Ẩn thành công !';
					header('Location: menu.php');
				} else {
					echo 'Lỗi hiện !'; 
				}
			}
		}
?>
