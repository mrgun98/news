<?php
	include "checklogin.php";
	$page_title='Đổi Mật Khẩu';
	include ("head.php");
	
	if (!isset($_GET['id'])) {
			echo 'Lỗi !';
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
			if (mysqli_num_rows($result)>0) {
			while ($user = mysqli_fetch_array($result)) {
				$password = $user['pass'];
			}

		}
	}
?>
<?php
 	
	 	if (isset($_POST['submit'])) {
	 		$oldpass = $_POST['oldpass'];
	 		$newpass = $_POST['newpass'];
	 		$newpass2 = $_POST['newpass2'];
	 		if (!$oldpass or !$newpass or !$newpass2) {
	 			echo 'Nhập thiếu thông tin !';
	 			
	 		} else {
	 			if ($oldpass != $password) {
	 				echo 'Nhập mật khẩu sai !';
	 				
	 			} else if ($newpass == $oldpass) {
	 				echo 'Mật khẩu mới trùng mật khẩu cũ';
	 			} else if ($newpass == $newpass2) {
	 				$sql = 'UPDATE datauser SET pass ="'.$newpass.'" ';
	 				if (mysqli_query($conn, $sql)) {
	 					echo 'Cập nhật thành công!';
	 					
	 				} else {
	 					echo 'Cập nhật thất bại!';
	 				}
	 			} else {
	 				echo 'Nhập lại mật khẩu sai';
	 			}
	 		}
	 	}


?>
 <div class="row">
	        <div class="col-md-12">
	          <div class="tile">
	            <h3 class="tile-title">Đổi Mật Khẩu</h3>
	            <div class="tile-body">
	              <form action="" method="POST">
	              	<div class="form-group">
	                  <label class="control-label">Mật khẩu hiện tại</label>
	                  <input class="form-control" type="password" placeholder="Password" name="oldpass"  >
	                </div>
	                <div class="form-group">
	                  <label class="control-label">Mật khẩu mới</label>
	                  <input class="form-control" type="password" placeholder="New password" name="newpass" ">
	                </div>
	                <div class="form-group">
	                  <label class="control-label">Nhập lại mật khẩu mới</label>
	                  <input class="form-control" type="password" placeholder="New password" name="newpass2" ">
	                </div>
	              <div class="tile-footer">
	              <button class="btn btn-primary" type="submit" name="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Upadte</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="#"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
	            </div>
	            </form>
	            </div>
	          </div>
	        </div>
<?php
	include "foot.php";
?>