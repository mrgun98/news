<?php
	include "checklogin.php";
	$page_title= 'Edit';
	include "head.php";
	
?>
<?php
	if (!isset($_GET['id'])) {
		header('Location: listuser.php');
	}
	if ($_GET['id']) {
		$id = $_GET['id'];
		$sql = 'SELECT * from datauser where ID = "'.$id.'"';
		$result= mysqli_query($conn, $sql);
		if (!$result) {
			header('Location: listuser.php');
		}
		if (mysqli_num_rows($result)>0) {
			while ($user = mysqli_fetch_array($result)) {
				$username = $user['user'];
				$name = $user['name'];
				$birthday = $user['birthday'];
				$phone = $user['phone'];
				$email = $user['email'];
				$address= $user['address'];
				$gt = $user['gender'];
	

			}
		}
	}
?>

 <?php
 	
	 	if (isset($_POST['submit'])) {
	 		$name = $_POST['name'];
			$birthday = $_POST['birthday'];
			$phone = $_POST['phone'];
			$email = $_POST['email'];
			$address = $_POST['address'];
			$gt = $_POST['gender'];
			if (!$email ) {
 				echo 'Nhap thieu thong tin.' ;
				
			} else {
					$sql = 'UPDATE datauser SET  name= "'.$name.'", email= "'.$email.'", phone= "'.$phone.'", address= "'.$address.'", gender= "'.$gt.'" where ID = "'.$id.'"';
 					if ( mysqli_query($conn, $sql)) {
 						echo 'Sua thanh cong';
 					}
				}
			
	}
 ?>
 
	 <div class="row">
	        <div class="col-md-12">
	          <div class="tile">
	            <h3 class="tile-title">EDIT USER</h3>
	            <div class="tile-body">
	              <form action="" method="POST">
	              	<div class="form-group">
	                  <label class="control-label">User</label>
	                  <input class="form-control" type="text" placeholder="Enter user" name="user" value="<?php echo $username; ?>" disabled >
	                </div>
	                <div class="form-group">
	                  <label class="control-label">Name</label>
	                  <input class="form-control" type="text" placeholder="Enter full name" name="name" value="<?php echo $name; ?>">
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
	              <button class="btn btn-primary" type="submit" name="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Update User</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="#"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
	            </div>
	            </form>
	            </div>
	          </div>
	        </div>
 
 <?php
 	include ("foot.php");
 ?>