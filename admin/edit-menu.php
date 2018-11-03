<?php
	include "checklogin.php";
	$page_title= 'Edit Iteam';
	include "head.php";
	
?>
<?php
	if (!isset($_GET['id'])) {
		echo 'Lỗi .';
		header('Location: menu.php');
	}
	if ($_GET['id']) {
		$id = $_GET['id'];
		$sql = 'SELECT * from datamenu where ID_menu = "'.$id.'"';
		$result= mysqli_query($conn, $sql);
		if (!$result) {
			echo 'Lỗi ID !';
			header('Location: menu.php');
		}
		if (mysqli_num_rows($result)>0) {
			while ($menu = mysqli_fetch_array($result)) {
				$id = $menu['ID_menu'];
				$name = $menu['name_menu'];
				$link= $menu['link_iteam'];
				
	

			}
		}
	}
?>

 <?php
 	
	 	if (isset($_POST['submit'])) {
	 		
			$name = $_POST['name'];
			$link =$_POST['link'];
			
			if (!$name ) {
 				echo 'Nhập thiếu thông tin .' ;
				
			} else {
					$sql = 'UPDATE datamenu SET  name_menu= "'.$name.'", link_iteam="'.$link.'" where ID_menu = "'.$id.'"';
 					if ( mysqli_query($conn, $sql)) {
 						echo 'Sửa thành công';
 					}
				}
			
	}
 ?>
 
	 <div class="row">
	        <div class="col-md-12">
	          <div class="tile">
	            <h3 class="tile-title">EDIT ITEAM</h3>
	            <div class="tile-body">
	              <form action="" method="POST">
	              	<div class="form-group">
	                  <label class="control-label">ID</label>
	                  <input class="form-control" type="text" placeholder="Enter ID" name="id" value="<?php echo $id; ?>" disabled >
	                </div>
	                <div class="form-group">
	                  <label class="control-label">Name</label>
	                  <input class="form-control" type="text" placeholder="Enter name iteam" name="name" value="<?php echo $name; ?>">
	                </div>
	                <div class="form-group">
	                  <label class="control-label">Link</label>
	                  <input class="form-control" type="text" placeholder="Enter link" name="link" value="<?php echo $link; ?>">
	                </div>
	               
	              
	            
	            <div class="tile-footer">
	              <button class="btn btn-primary" type="submit" name="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Update Iteam </button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="#"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
	            </div>
	            </form>
	            </div>
	          </div>
	        </div>
 
 <?php
 	include ("foot.php");
 ?>