<?php
	session_start();
	$page_title = 'Login In';
	
	
?>
<?php
if (isset($_SESSION['username'])) {
    	echo 'Bạn đã đăng nhập';
    	header('Location: http://localhost/admin/index.php');

    }
?>
<?php
	include "head.php";
?>
<?php
			if (isset($_POST['submit'])) {
				$user = $_POST['user'];
				$pass = $_POST['pass'];
				if (!$user or !$pass) {
					echo 'Vui lòng nhập đủ thông tin';
				} else {
					$sql = 'select user, pass from datauser where user= "'.$user.'" and pass= "'.$pass.'"';
					$result = mysqli_query($conn, $sql);
					if (mysqli_num_rows($result) >0) {
						echo 'Đăng nhập thành công !';
						
						$_SESSION['username'] = $user;
						
					} else {
						echo 'Đăng nhập thất bại !';
					}
				}
			}
		?>
<div class="login-box">
	<form class="login-form" action="" method="post">
          <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>LOGIN IN</h3>
          <div class="form-group">
            <label class="control-label">USERNAME</label>
            <input class="form-control" type="text" placeholder="Username" name="user" autofocus>
          </div>
          <div class="form-group">
            <label class="control-label">PASSWORD</label>
            <input class="form-control" type="password" placeholder="Password" name="pass">
          </div>
          
          <div class="form-group btn-container">
            <button class="btn btn-primary btn-block" name="submit"><i class="fa fa-sign-in fa-lg fa-fw"></i>LOGIN IN</button>
          </div><br>
          <h4> <a href="signup.php">Chưa có tài khoản. Đăng ký ngay !</a></h4>
    </form>
</div>
<?php
	include "foot.php";
?>