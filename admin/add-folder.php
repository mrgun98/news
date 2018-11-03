<?php
	include "checklogin.php";
	$page_title = 'Add Folder';
	include ("head.php");
	
	
?>
 <?php
	$name = '';

 	if (isset($_POST['submit'])) {
			$name = $_POST['name'];
			
			if (!$name) {
 				echo 'Nhập thiếu thông tin .' ;
				
			} else {
				$sql1 = 'SELECT name from datafolder where name= "'.$name.'"';
				$result = mysqli_query($conn, $sql1);
				if (mysqli_num_rows($result) > 0) {
					echo 'Thư mục đã tồn tại';
				} else {
					$sql = 'INSERT into datafolder(name) values("'.$_POST['name'].'")';
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
            <h3 class="tile-title">Add Folder</h3>
            <div class="tile-body">
              <form action="" method="POST">
              	
                <div class="form-group">
                  <label class="control-label">Name</label>
                  <input class="form-control" type="text" placeholder="Enter name folder" name="name" value="<?php echo $name ?>">
               </div>
               
               
              
            
            <div class="tile-footer">
              <button class="btn btn-primary" type="submit" name="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Add Folder</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="#"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
            </div>
            </form>
            </div>
          </div>
        </div>

 <?php
 	include ("foot.php");
 ?>