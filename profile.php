<?php

include 'includes/auth.php';
include 'config/database.php';

$id = $_SESSION['user_id'];

$sql = "SELECT * FROM users WHERE id='$id'";

$result = mysqli_query($conn, $sql);

$user = mysqli_fetch_assoc($result);

?>

<h2>Thông tin cá nhân</h2>

<p>ID:
<?php echo $user['id']; ?>
</p>

<p>Họ tên:
<?php echo $user['fullname']; ?>
</p>

<p>Email:
<?php echo $user['email']; ?>
</p>

<p>Số điện thoại:
<?php echo $user['phone']; ?>
</p>

<p>Địa chỉ:
<?php echo $user['address']; ?>
</p>

<p>Vai trò:
<?php echo $user['role']; ?>
</p>

<a href="logout.php">Đăng xuất</a>

<br><br>

<?php
if($user['role'] == 'admin')
{
    echo '<a href="admin.php">Quản trị</a>';
}
?>
<br><br>

<a href="edit_profile.php">
    Chỉnh sửa thông tin
</a>