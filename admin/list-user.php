<?php
  include "checklogin.php";
	$page_title='List User';

	include ("head.php");
	
?>

  <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
              <table class="table table-hover table-bordered" id="sampleTable">
                <thead>
                  <tr>
                    <th>User</th>
                    <th>Email</th>
                    <th>Ngày sinh</th>
                    <th>Tên</th>
                    <th>Giới Tính</th>
                    <th>Số Điện Thoại</th>
                    <th>Địa Chỉ</th>
                    <th> Sửa Thông Tin User  </th>
                    <th>Xóa User</th>
                    <th> Đổi Mật Khẩu</th>
                  </tr>
                </thead>
                <tbody>
                  
                	<?php
                	$sql = 'SELECT * from datauser ';
                	$result = mysqli_query($conn, $sql);
                	if (mysqli_num_rows($result)) {
                		while ($user = mysqli_fetch_assoc($result)) {
                			$id = $user['ID_US'];
                			echo '<tr>';
                			echo '<td>'.$user['user'].'</td>';
		                    echo '<td>'.$user['email'].'</td>';
		                    echo '<td>'.$user['birthday'].'</td>';
		                    echo '<td>'.$user['name'].'</td>';
		                    echo '<td>'.$user['gender'].'</td>';
		                    echo '<td>'.$user['phone'].'</td>';
		                    echo '<td>'.$user['address'].'</td>';
                        echo '<td>'.'<a href= "/edit-user.php?id='.$id.'"> Edit </a>'
                        .'</td>';
                        echo '<td>'.'<a href= "/delet-euser.php?id='.$id.'"> Del </a>'.'</td>';
                        echo '<td>'.'<a href= "/doi_password.php?id='.$id.'"> Đổi </a>'.'</td>';
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
  include ("foot.php");
?>
      