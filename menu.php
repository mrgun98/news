<?php 
	include "connectdb.php";
	$sql=' SELECT * from datamenu';
	$result= mysqli_query($conn, $sql);
	if ($result) {
		while ($menu = mysqli_fetch_assoc($result)){
			$name= $menu['name_menu'];
			$hid= $menu['hidden'];
			$link_it= $menu['link_iteam'];
			if ($hid==0) {
				echo '<li><a href="'.$link_it.'">'.$name.'</a></li>';
			} else{
				echo '';
			}
			
		}
	}
?>