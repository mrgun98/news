<?php
	include "checklogin.php";
	$page_title = 'Add Iteam';
	include ("head.php");
	
	
?>
 <?php
	$name = '';

 	if (isset($_POST['submit'])) {
			$name = $_POST['name'];
			
			if (!$name) {
 				echo 'Nhập thiếu thông tin .' ;
				
			} else {
				$sql1 = 'SELECT name_menu from datamenu where name_menu= "'.$name.'"';
				$result = mysqli_query($conn, $sql1);
				if (mysqli_num_rows($result) > 0) {
					echo 'Iteam đã tồn tại';
				} else {
					$sql = 'INSERT into datamenu(name_menu) values("'.$_POST['name'].'")';
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
            <h3 class="tile-title">Add Iteam Menu</h3>
            <div class="tile-body">
              <form action="" method="POST">
              	
                <div class="form-group">
                  <label class="control-label">Name</label>
                  <input class="form-control" type="text" placeholder="Enter name iteam" name="name" value="<?php echo $name ?>">
               </div>
               
               
              
            
            <div class="tile-footer">
              <button class="btn btn-primary" type="submit" name="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Add Iteam</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="#"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
            </div>
            </form>
            </div>
          </div>
        </div>

 <?php
 	include ("foot.php");
 ?>