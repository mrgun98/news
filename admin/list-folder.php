<?php
  include "checklogin.php";
	$page_title = 'Danh sách thư mục';

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
                    <th>Name</th>
                    <th> Edit </th>
                    <th>Delete</th>
                  </tr>
                </thead>
                <tbody>
                	<?php
                	$sql = 'SELECT * from datafolder ';
                	$result = mysqli_query($conn, $sql);
                	if (mysqli_num_rows($result)) {
                		
                		while ($user = mysqli_fetch_assoc($result)) {
                			$id = $user['ID_FD'];
                			echo '<tr>';
                			echo '<td>'.$user['ID_FD'].'</td>';
                			echo '<td>'.$user['name_fd'].'</td>';
		                    
                        echo '<td>'.'<a href= "/admin/edit-folder.php?id='.$id.'"> Edit </a>'
                        .'</td>';
                        echo '<td>'.'<a href= "/admin/delete-folder.php?id='.$id.'"> Del </a>'.'</td>';
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