<?php
	include "checklogin.php";
	$page_title = 'Menu';
	include ("head.php");
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
                    <th> Link </th>
                    <th> Edit </th>
                    <th>Delete</th>
                    <th> Ẩn </th>
                  </tr>
                </thead>
                <tbody>
                	<?php
                	$sql = 'SELECT * from datamenu ';
                	$result = mysqli_query($conn, $sql);
                	if (mysqli_num_rows($result)) {
                		
                		while ($menu = mysqli_fetch_assoc($result)) {
                			$id = $menu['ID_menu'];
                      $hid =$menu['hidden'];
                      $link = $menu['link_iteam'];
                       if ($hid == 0) {
                        $hidden ='';
                      } else {
                        $hidden ='hidden';
                      }
                			echo '<tr>';
                			echo '<td>'.$id.'</td>';
                			echo '<td '.$hidden.'>'.$menu['name_menu'].'</td>';
		                  echo '<td '.$hidden.'>'.$link.'</td>'; 
                      echo '<td>'.'<a href= "/admin/edit-menu.php?id='.$id.'"> Edit </a>'
                        .'</td>';
                      echo '<td>'.'<a href= "/admin/delete-menu.php?id='.$id.'"> Del </a>'.'</td>';
                      echo '<td>'.'<a href="/admin/hidden-iteam-menu.php?id='.$id.'"> Ẩn </a>'.'or'.'<a href="/admin/un-hidden-iteam-menu.php?id='.$id.'"> Hiện </a>'.'</td>';
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