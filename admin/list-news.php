<?php
  include "checklogin.php";
	$page_title = 'Danh sách bài viết';

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
                    <th>Tên bài viết</th>
                    <th>Nội dung </th>
                    <th> Tác giả </th>
                    <th> Edit </th>
                    <th>Delete</th>
                  </tr>
                </thead>
                <tbody>
                	<?php
                	$sql = 'SELECT * from datanews inner join datauser on datanews.user_id = datauser.ID_US ';
                	$result = mysqli_query($conn, $sql);
                	if (mysqli_num_rows($result)) {
                		
                		while ($user = mysqli_fetch_assoc($result)) {
                			$id = $user['ID_BV'];
                			echo '<tr>';
                			echo '<td>'.$user['ID_BV'].'</td>';
                			echo '<td>'.$user['name_bv'].'</td>';
                			echo '<td>'.$user['noidung'].'</td>';
		                    echo '<td>'.$user['user'].'</td>';
                        echo '<td>'.'<a href= "/admin/edit-news.php?id='.$id.'"> Edit </a>'
                        .'</td>';
                        echo '<td>'.'<a href= "/admin/delete-news.php?id='.$id.'"> Del </a>'.'</td>';
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