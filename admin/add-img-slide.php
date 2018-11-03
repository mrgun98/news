<?php
	include "checklogin.php";
	$page_title='Add Image To Slide';
	include "head.php";
?>
<?php
	if (isset($_POST['submit'])) {
		$text_up= $_POST['text_up'];
		$text_down= $_POST['text_down'];
		$rate= $_POST['select'];
		$under= $_POST['under'];
		
		
		
		if (!$_FILES['img']) {
			echo 'Nhập thiếu dữ liệu !';
		}
		if (isset($_FILES['img'])) {
				$loi= array();
				$file_name = $_FILES['img']['name'];
				$file_size= $_FILES['img']['size'];
				$file_tmp= $_FILES['img']['tmp_name'];
				
				if ($file_size > 5*1024*1024) {
					$loi[]= "File quá nặng !";
				}
				if (!$loi) {
					$link = "images/magazine/thumb/".$file_name;
					move_uploaded_file($file_tmp, "C:/xampp/htdocs/hasagi/images/magazine/thumb/".$file_name);
					if ($under == 'text_down') {
						$sql = 'INSERT into slide (link_slide, text_up, text_down, under) values ("'.$link.'", "'.$text_up.'", "'.$text_down.'", "text_down")';
						if (mysqli_query($conn, $sql)) {
							echo 'Tải lên thành công !';
						}
					}
					if ($under == 'rate') {
						$sql = 'INSERT into slide (link_slide, text_up, rate_slide, under) values ("'.$link.'", "'.$text_up.'", "'.$rate.'", "rate")';
						if (mysqli_query($conn, $sql)) {
							echo 'Tải lên thành công';
						}
					}
				} else {
					print_r($loi);
				}
		}
		
	}
    
?>
<div class="row">
        <div class="col-md-12">
          <div class="tile">
            <h3 class="tile-title">Add Image</h3>
            <div class="tile-body">
              <form action="" method="POST" enctype="multipart/form-data">
              	<div class="form-group">
                  <label class="control-label">Chọn ảnh: </label>
                  <input class="control-label" type="file" name="img">
                  
               	</div>
              	<div class="form-group">
                  <label class="control-label">Text Up</label>
                  <input class="form-control" type="text" placeholder="Enter Text Up" name="text_up" >
                  
               	</div>
               	<div class="form-group">
                  	<label class="control-label">Under :</label>				
                </div>
				<div class="form-group">
                  	<input type="radio" name="under" value="<?php echo 'text_down'; ?>" > 
                  	<label class="control-label">Text Down</label>
                  	<input class="form-control" type="text" placeholder="Enter Text Down" name="text_down" >
                </div>
                <div class="form-group">
                  	<input type="radio" name="under" value="<?php echo 'rate'; ?>" >
                  	<label class="control-label">Rate</label>
                  		<select class="form-control" name="select">
                  			<option value="null"></option>
		                  	<option value="0"> 0 sao </option>
		                  	<option value="1"> 1 sao </option>
		                  	<option value="2"> 2 sao </option>
		                  	<option value="3"> 3 sao </option>
		                  	<option value="4"> 4 sao </option>
		                  	<option value="5"> 5 sao </option>
		                </select>
		                
              	</div>
            <div class="tile-footer">
              <button class="btn btn-primary" type="submit" name="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Add</button>
            </div>
            </form>
            </div>
          </div>
        </div>

 <?php
 	include ("foot.php");
 ?>