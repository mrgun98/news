<?php
	include "checklogin.php";
	$page_title = 'Add User';
	include ("head.php");
	include ("connectdb.php");
	
?>
 <?php
	$username = '';
	$name = '';
	$birthday = '';
	$phone = '';
	$email = '';
	$address= '';
	$gt = '';
 	if (isset($_POST['submit'])) {
			$username = $_POST['user'];
			$name = $_POST['name'];
			$birthday = $_POST['birthday'];
			$phone = $_POST['phone'];
			$email = $_POST['email'];
			$address = $_POST['address'];
			$gt = $_POST['gender'];
			if (!$username  or !$email ) {
 				echo 'Nhap thieu thong tin.' ;
				
			} else {
				$sql1 = 'SELECT user from datauser where user= "'.$username.'"';
				$result = mysqli_query($conn, $sql1);
				if (mysqli_num_rows($result) > 0) {
					echo 'Username da ton tai';
				} else {
					$sql = 'INSERT into datauser(user, name, email, phone, birthday, address, gender) values("'.$_POST['user'].'","'.$_POST['name'].'","'.$_POST['email'].'","'.$_POST['phone'].'","'.$_POST['birthday'].'","'.$_POST['address'].'","'.$_POST['gender'].'")';
 					if ( mysqli_query($conn, $sql)) {
 						echo 'Thêm thành công !';
 					}
				}
			}
	}
 ?>
  <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <h3 class="tile-title">ADD USER</h3>
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
              <button class="btn btn-primary" type="submit" name="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Add User</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="#"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
            </div>
            </form>
            </div>
          </div>
        </div>

 <?php
 	include ("footer.php");
 ?>