<?php
	include "checklogin.php";
	$page_title= 'Edit Folder';
	include "head.php";
	
?>
<?php
	if (!isset($_GET['id'])) {
		header('Location: listfolder.php');
	}
	if ($_GET['id']) {
		$id = $_GET['id'];
		$sql = 'SELECT * from datafolder where ID_FD = "'.$id.'"';
		$result= mysqli_query($conn, $sql);
		if (!$result) {
			header('Location: listfolder.php');
		}
		if (mysqli_num_rows($result)>0) {
			while ($user = mysqli_fetch_array($result)) {
				$id = $user['ID_FD'];
				$name = $user['name_fd'];
				
	

			}
		}
	}
?>

 <?php
 	
	 	if (isset($_POST['submit'])) {
	 		
			$name = $_POST['name'];
			
			if (!$name ) {
 				echo 'Nhập thiếu thông tin .' ;
				
			} else {
					$sql = 'UPDATE datafolder SET  name_fd= "'.$name.'" where ID_FD = "'.$id.'"';
 					if ( mysqli_query($conn, $sql)) {
 						echo 'Sửa thành công';
 					}
				}
			
	}
 ?>
 
	 <div class="row">
	        <div class="col-md-12">
	          <div class="tile">
	            <h3 class="tile-title">EDIT FOLDER</h3>
	            <div class="tile-body">
	              <form action="" method="POST">
	              	<div class="form-group">
	                  <label class="control-label">ID</label>
	                  <input class="form-control" type="text" placeholder="Enter ID" name="id" value="<?php echo $id; ?>" disabled >
	                </div>
	                <div class="form-group">
	                  <label class="control-label">Name</label>
	                  <input class="form-control" type="text" placeholder="Enter name folder" name="name" value="<?php echo $name; ?>">
	                </div>
	                
	               
	              
	            
	            <div class="tile-footer">
	              <button class="btn btn-primary" type="submit" name="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Update Folder </button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="#"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
	            </div>
	            </form>
	            </div>
	          </div>
	        </div>
 
 <?php
 	include ("foot.php");
 ?>