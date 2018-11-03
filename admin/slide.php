<?php
	include "checklogin.php";
	$page_title='Slide';
	include "head.php";
?>
<div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
              <table class="table table-hover table-bordered" id="sampleTable">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Ảnh</th>
                    <th>Video</th>
                    <th>Text Up </th>
                    <th>Text Down</th>
                    <th>Rate</th>
                    <th>Edit</th>
                    <th>Del</th>
                    <th> Ẩn </th>
                  </tr>
                </thead>
                <tbody>
                	<?php
                	$sql = 'SELECT * from slide ';
                	$result = mysqli_query($conn, $sql);
                	if (mysqli_num_rows($result)) {
                		
                		while ($slide = mysqli_fetch_assoc($result)) {
                			$id= $slide['ID_slide'];
                      $linkvid= $slide['link_vid'];
                      $linkimg= $slide['link_slide'];
                			$rate= $slide['rate_slide'];
                      $hid= $slide['hidden'];
                      if ($hid == 0) {
                        $hidden ='';
                      } else {
                        $hidden ='hidden';
                      }

                			echo '<tr>';
                			echo '<td>'.$slide['ID_slide'].'</td>';
                      echo '<td>'.'<img src="/'.$linkimg.'" height="50" width="50" '.$hidden.' >'.'</td>';
                      echo '<td>'.'<video src="/'.$linkvid.'"height="50" width="50" '.$hidden.'>'.'</td>';
                			echo '<td>'.$slide['text_up'].'</td>';
                			echo '<td>'.$slide['text_down'].'</td>';
		                    echo '<td>'.$rate.'</td>';
                        echo '<td>'.'<a href= "/admin/edit-slide.php?id='.$id.'"> Edit </a>'
                        .'</td>';
                        echo '<td>'.'<a href= "/admin/delete-slide.php?id='.$id.'"> Del </a>'.'</td>';
                        echo '<td>'.'<a href="/admin/hidden-slide.php?id='.$id.'"> Ẩn </a>'.'or'.'<a href="/admin/un-hidden-slide.php?id='.$id.'"> Hiện </a>'.'</td>';
		                	echo '</tr>';

               			 } 
                	}
                	?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
<?php
  include "foot.php";
?>