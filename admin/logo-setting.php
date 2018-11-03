<?php
	$page_title= 'Logo';
	include "checklogin.php";
	include "head.php";
	include "C:/xampp/htdocs/hasagi/connectdb.php" ;
?>
<h3> Logo cho Header </h3>
<?php
	$sql = 'SELECT * from logo where ID =1';
	$result1 = mysqli_query($conn, $sql);
	if ($result1) {
		while ($logo1= mysqli_fetch_array($result1)) {
			$urllogo1= $logo1['link'];

			echo 'Logo header hiện tại:'.'<br>';
			echo '<img src="/'.$urllogo1.'"  width="500" height="500">';
		}
		
	}
	if (mysqli_num_rows($result1) == 0) {
		echo "Chưa có logo cho Header";
		$checkheader = 0;
	}
		
	
?>
<?php
	if (isset($_POST['submit1'])) {
		if (isset($_FILES['logo1'])) {
			$error1= array();
			$logo_name1 = $_FILES['logo1']['name'];
			$logo_size1= $_FILES['logo1']['size'];
			$logo_tmp1= $_FILES['logo1']['tmp_name'];
			
			if ($logo_size1 > 2*1024*1024) {
				$error1[]= "File quá nặng !";
			}
			if (!$error1) {
				$file1 = "logo/".$logo_name1;
				if (isset($checkheader)) {
					move_uploaded_file($logo_tmp1, "C:/xampp/htdocs/hasagi/logo/".$logo_name1);
					$sql1 = 'INSERT into logo (ID, link) values (1, "'.$file1.'")';
					if (mysqli_query($conn, $sql1)) {
						echo 'Tải lên thành công';
						
					}
				} else {
					move_uploaded_file($logo_tmp1, "C:/xampp/htdocs/hasagi/logo/".$logo_name1);
					$sql2= 'UPDATE logo set link= "'.$file1.'" WHERE ID=1 ';

					if (mysqli_query($conn,$sql2)) {
						echo 'Upload thành công !';
					}
				}
						
			} else {
				print_r($error1);
			}
			
		} else {
			echo 'Chưa chọn file !';
		}
	}
    
?>
<form action="" method="POST" enctype="multipart/form-data">
	Chọn file: <input type= "file" name="logo1" /><br>
	<input type="submit" name="submit1" value="Upload"/><br>
</form>
Lưu ý: Chỉ hỗ trợ file dạng .PNG hoặc .JPG hoặc .JPEG<br>
File kích thước dưới 2MB. <br>
 <br><br><br>
<!-- ************************************************************************************************************* -->

<h3> Logo cho Footer </h3>
<?php
	$sql = 'SELECT * from logo where ID =2';
	$result = mysqli_query($conn, $sql);
	if ($result) {
		while ($logo= mysqli_fetch_array($result)) {
			$urllogo= $logo['link'];

			echo 'Logo footer hiện tại:'.'<br>';
			echo '<img src="/'.$urllogo.'"  width="500" height="500">';
		}
		
	}
	if (mysqli_num_rows($result) == 0) {
		echo 'Chưa có logo cho Footer';
		$checkfooter = 0;
	}
		
?>
<?php
	if (isset($_POST['submit'])) {
		if (isset($_FILES['logo'])) {
			$error= array();
			$logo_name = $_FILES['logo']['name'];
			$logo_size= $_FILES['logo']['size'];
			$logo_tmp= $_FILES['logo']['tmp_name'];
			
			if ($logo_size > 2*1024*1024) {
				$error[]= "File quá nặng !";
			}
			if (!$error) {
				$file = "logo/".$logo_name;
				if (isset($checkfooter)) {
					move_uploaded_file($logo_tmp, "C:/xampp/htdocs/hasagi/logo/".$logo_name);
					$sql = 'INSERT into logo (ID, link) values (2, "'.$file.'")';
					if (mysqli_query($conn, $sql)) {
						echo 'Tải lên thành công';
						
					}
				} else {
					
					move_uploaded_file($logo_tmp, "C:/xampp/htdocs/hasagi/logo/".$logo_name);
					$sql= 'UPDATE logo set link= "'.$file.'" where ID = 2';

					if (mysqli_query($conn,$sql)) {
						echo 'Upload thành công !';

					}
				}
			} else {
				print_r($error);
			}
			
		} else {
			echo 'Chưa chọn file !';
		}
	}
?>
<form action="" method="POST" enctype="multipart/form-data">
	Chọn file: <input type= "file" name="logo" /><br>
	<input type="submit" name="submit" value="Upload"/><br>
</form>
Lưu ý: Chỉ hỗ trợ file dạng .PNG hoặc .JPG hoặc .JPEG<br>
File kích thước dưới 2MB.
<?php
	include "foot.php";
?>