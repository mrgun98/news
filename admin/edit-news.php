<?php
	include "checklogin.php";
	$page_title= 'Sửa bài viết';
	include "head.php";
	
?>
<?php
	if (!isset($_GET['id'])) {
		header('Location: listnews.php');
	}
	if ($_GET['id']) {
		$id = $_GET['id'];
		$sql = 'SELECT * from datanews where ID_BV = "'.$id.'"';
		$result= mysqli_query($conn, $sql);
		if (!$result) {
			header('Location: listnews.php');
		}
		if (mysqli_num_rows($result)>0) {
			while ($user = mysqli_fetch_array($result)) {
				$id = $user['ID_BV'];
				$name = $user['name_bv'];
				$noidung= $user['noidung'];
	

			}
		}
	}
?>

 <?php
 	
	 	if (isset($_POST['submit'])) {
	 		
			$namebv = $_POST['name'];
			$noidungbv = $_POST['editortext'];
			if (!$name or !$noidung ) {
 				echo 'Nhập thiếu thông tin .' ;
				
			} else {
					$sql = 'UPDATE datanews SET  name= "'.$namebv.'", noidung="'.$noidungbv.'
					" where ID_BV = "'.$id.'"';
 					if ( mysqli_query($conn, $sql)) {
 						echo 'Sửa thành công';
 					}
				}
			
	}
 ?>
 
	 <div class="row">
	        <div class="col-md-12">
	          <div class="tile">
	            <h3 class="tile-title">Sửa bài viết</h3>
	            <div class="tile-body">
	              <form action="" method="POST">
	              	<div class="form-group">
	                  <label class="control-label">ID</label>
	                  <input class="form-control" type="text"  name="id" value="<?php echo $id; ?>" disabled >
	                </div>
	                <div class="form-group">
	                  <label class="control-label">Tên bài viết</label>
	                  <input class="form-control" type="text"  name="name" value="<?php echo $name; ?>">
	                </div>
	                <div class="form-group">
	                  <label class="control-label">Nội dung bài viết</label>
	                  <textarea id="editortext" name="editortext" rows="10" cols="120" ><?php echo $noidung; ?></textarea>
	                  <script> CKEDITOR.replace('editortext'); </script>
	                </div>
	                
	               
	              
	            
	            <div class="tile-footer">
	              <button class="btn btn-primary" type="submit" name="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Update </button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="#"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
	            </div>
	            </form>
	            </div>
	          </div>
	        </div>
 
 <?php
 	include ("foot.php");
 ?>