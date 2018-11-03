<?php
	$page_title ='Sign Up';
	include("head.php");
	
?>
		
		
		
<?php
	$username = '';
	$name = '';
	$birthday = '';
	$phone = '';
	$email = '';
	$address= '';
	$gt = '';
	if(isset($_POST['submit'])) {
		$user= $_POST['user'];
		$pass= $_POST['pass'];
		$mail= $_POST['mail'];
		$name= $_POST['name'];
		$phone= $_POST['phone'];
		if (!$user OR !$pass OR !$mail) {
			echo 'Vui lòng nhập đủ thông tin';
		} else {
			$sql = 'insert into datauser(user, pass, email, phone, name, gender, birthday, address) values ("'.$user.'","'.$pass.'","'.$mail.'","'.$phone.'","'.$name.'","'.$_POST['gender'].'","'.$_POST['birthday'].'","'.$_POST['address'].'")';
			if (mysqli_query($conn, $sql)) {
				echo 'Đăng ký thành công !';
			}
		}
				
	}
?>
 <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <h3 class="tile-title">SIGN UP</h3>
            <div class="tile-body">
              <form action="" method="POST">
              	<div class="form-group">
                  <label class="control-label">User</label>
                  <input class="form-control" type="text" placeholder="Enter user" name="user" value="<?php echo $username ?>" >
                </div>
                <div class="form-group">
                  <label class="control-label">Name</label>
                  <input class="form-control" type="text" placeholder="Enter full name" name="name" value="<?php echo $name ?>">
                </div>
                <div class="form-group">
                  <label class="control-label">Email</label>
                  <input class="form-control" type="email" placeholder="Enter email address" name="email" value="<?php echo $email ?>" >
                </div>
                <div class="form-group">
                  <label class="control-label">Phone</label>
                  <input class="form-control" type="number" placeholder="Enter phone" name="phone" value="<?php echo $phone ?>">
                </div>
                <div class="form-group">
                  <label class="control-label">Birthday</label>
                  <input class="form-control" type="date" placeholder="Enter birthday" name="birthday" value="<?php echo $birthday ?>">
                </div>
                <div class="form-group">
                  <label class="control-label">Address</label>
                  <textarea class="form-control" rows="4" placeholder="Enter your address" name="address" value="<?php echo $address ?>"></textarea>
                </div>
                <div class="form-group">
                  <label class="control-label">Gender</label>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="form-check-input" type="radio" name="gender" value="Male" <?php if ($gt == "Male") echo 'checked'; ?>>Male
                    </label>
                  </div>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="form-check-input" type="radio" name="gender" value="Female" <?php if ($gt == "Female") echo 'checked'; ?>>Female
                    </label>
                  </div>
                </div>
               
               
              
            
            <div class="tile-footer">
              <button class="btn btn-primary" type="submit" name="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Sign Up</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="#"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
            </div>
            </form><br>
            <h4><a href="login.php"> Đã có tài khoản, Đăng nhập thôi !</a></h4>
            </div>
          </div>
        </div>

 <?php
 	include ("foot.php");
 ?>		

