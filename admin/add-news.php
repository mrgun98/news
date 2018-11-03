<?php
	include "checklogin.php";
	$page_title= 'Tạo bài viết';
	include "head.php";

?>
<?php
	$name = '';

 	if (isset($_POST['submit'])) {
 			$author= $_POST['author'];
			$name = $_POST['name'];
			$select = $_POST['select'];
			$text= $_POST['editortext'];
			$sql ='SELECT ID_US from datauser where user ="'.$author.'"';
			if (mysqli_num_rows(mysqli_query($conn,$sql))) {
				$user= mysqli_fetch_assoc(mysqli_query($conn,$sql));
				$id= $user['ID_US'];
			}
			if (!$name or !$select or !$text ) {
 				echo 'Vui lòng nhập đủ.' ;
				
			} else {
				$sql1 = 'SELECT name from datanews where name= "'.$name.'"';
				$result = mysqli_query($conn, $sql1);
				if (mysqli_num_rows($result) > 0) {
					echo 'Tên bị trùng !';
				} else {
					$sql = 'INSERT into datanews (user_id, name, noidung) values("'.$id.'", "'.$name.'", "'.$text.'")';
 					if ( mysqli_query($conn, $sql)) {
 						echo 'Tạo bài viết thành công !';
 					}
				}
			}
	}
?>
<div class="row">
    <div class="col-md-12">
        <div class="tile">
            <h3 class="tile-title">Thêm bài viết</h3>
            <div class="tile-body">
                <form action="" method="POST">
              	<div class="form-group">
                  <label class="control-label">Tác giả: </label>
                  <input class="form-control" type="text" name="author" value="<?php echo $_SESSION['username'] ?>" >
                </div>
                <div class="form-group">
                  <label class="control-label">Tên bài viết</label>
                  <input class="form-control" type="text" placeholder="Nhập tên bài viết" name="name" value="<?php echo $name ?>">
                </div>
                <div class="form-group">
                  <label class="control-label">Chọn thư mục</label>
                  <select name="select">
                  	<?php
						$sql= 'SELECT name from datafolder';
						$folder= mysqli_query($conn, $sql);
						if (mysqli_num_rows($folder)) {
							while ($foldername = mysqli_fetch_assoc($folder)) {
								echo '<option value="<?php echo $foldername;?>">'.$foldername['name'].'</option>';
							}
						}
					?>
                  </select>
                </div>
                <div class="form-group">
                  <label class="control-label">Nội dung bài viết</label>
                  <textarea if="editortext" name="editortext" rows="10" cols="120"></textarea>
                  <script> CKEDITOR.replace('editortext'); </script>
                </div>
                <div class="tile-footer">
              		<button class="btn btn-primary" type="submit" name="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Thêm bài viết</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="#"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
            	</div>
                </form>
            </div>
        </div>
    </div>
<?php
  include ("foot.php");
?>
      