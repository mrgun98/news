<?php
	include "checklogin.php";
	$page_title= 'Edit Slide';
	include "head.php";
	
?>
<?php
	if (!isset($_GET['id'])) {
		header('Location: slide.php');
	}
	if ($_GET['id']) {
		$id = $_GET['id'];
		$sql = 'SELECT * from slide where ID_slide = "'.$id.'"';
		$result= mysqli_query($conn, $sql);
		if (!$result) {
			header('Location: slide.php');
		}
		if (mysqli_num_rows($result)>0) {
			while($slide = mysqli_fetch_array($result)) {
				$id = $slide['ID_slide'];
				$linkvid= $slide['link_vid'];
                $linkimg= $slide['link_slide'];
                $text_up= $slide['text_up'];
                $text_down= $slide['text_down'];
                $rate= $slide['rate_slide'];
				$under= $slide['under'];
	

			}
		}
	}
?>

 
<?php
 	
	 	if (isset($_POST['submit'])) {
	 		$text_up = $_POST['text_up'];
			$text_down = $_POST['text_down'];
			$rate = $_POST['select'];
			$under= $_POST['under'];
			if ($under=='text_down') {
				$sql = 'UPDATE slide SET text_up= "'.$text_up.'", text_down="'.$text_down.'",   under="'.$under.'"  where ID_slide = "'.$id.'"';
	 			if ( mysqli_query($conn, $sql)) {
	 				echo 'Update thành công';
	 			} else {
	 				echo 'Lỗi text ';
	 			}
			}
			if ($under=='rate') {
				$sql = 'UPDATE slide SET text_up= "'.$text_up.'", rate="'.$rate.'", under="'.$under.'"  where ID_slide = "'.$id.'"';
	 			if ( mysqli_query($conn, $sql)) {
	 				echo 'Update thành công';
	 			} else {
	 				echo 'Lỗi rate';
	 			}
			}
			
		}
	
 ?>
<div class="row">
	<div class="col-md-12">
	    <div class="tile">
	        <h3 class="tile-title">EDIT SLIDE</h3>
	        <div class="tile-body">
	        <form action="" method="POST">
	        <div class="form-group">
	            <label class="control-label">ID </label>
	            <input class="form-control" type="text" name="id" value="<?php echo $id; ?>" disabled >
	        </div>
	        <div class="form-group">
	            <label class="control-label"> Ảnh </label><br>
	            <img  src="/<?php echo $linkimg; ?>" height="250" width="450">
	        </div>
	        <div class="form-group">
	            <label class="control-label">Video </label>
	            <video src="/<?php echo $linkvid;?> " height="250" width="450">
	        </div>
	        <div class="form-group">
	            <label class="control-label">Text Up</label>
	            <input class="form-control" type="text" name="text_up" value="<?php echo $text_up; ?>">
	        </div>
	        <div class="form-group">
                <label class="control-label">Under :</label>				
            </div>
			<div class="form-group">
                <input type="radio" name="under" value="<?php echo 'text_down'; ?>" <?php if ($under == "text_down") echo 'checked'; ?> disabled>
                <label class="control-label">Text Down</label>
                <input class="form-control" type="text" name="text_down" value="<?php echo $text_down; ?>">
            </div>
            <div class="form-group">
                <input type="radio" name="under" value="<?php echo 'rate'; ?>" <?php if ($under == "rate") echo 'checked'; ?> disabled>
                <label class="control-label">Rate</label>
                <select class="form-control" name="select">
                  	<option <?php if ($rate=="null") echo "selected=\"selected\"";  ?> value=""></option>
		            <option <?php if ($rate==0) echo "selected=\"selected\"";  ?> value="0"> 0 sao </option>
		            <option <?php if ($rate==1) echo "selected=\"selected\"";  ?> value="1"> 1 sao </option>
		            <option <?php if ($rate==2) echo "selected=\"selected\"";  ?> value="2"> 2 sao </option>
		            <option <?php if ($rate==3) echo "selected=\"selected\"";  ?> value="3"> 3 sao </option>
		            <option <?php if ($rate==4) echo "selected=\"selected\"";  ?> value="4"> 4 sao </option>
		            <option <?php if ($rate==5) echo "selected=\"selected\"";  ?> value="5"> 5 sao </option>
		        </select>
		    </div>
	        <div class="tile-footer">
	              <button class="btn btn-primary" type="submit" name="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Update </button>
	            </div>
	            </form>
	            </div>
	          </div>
	        </div>
 
 <?php
 	include ("foot.php");
 ?>		}
