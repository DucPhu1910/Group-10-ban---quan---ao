<?php

include 'includes/auth.php';
include 'config/database.php';

$id = $_SESSION['user_id'];

$sql = "SELECT * FROM users WHERE id='$id'";

$result = mysqli_query($conn,$sql);

$user = mysqli_fetch_assoc($result);
if($_SERVER["REQUEST_METHOD"]=="POST")
{
    $fullname = $_POST['fullname'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    $update = "UPDATE users
               SET
               fullname='$fullname',
               phone='$phone',
               address='$address'
               WHERE id='$id'";

    mysqli_query($conn,$update);

    header("Location: profile.php");
    exit();
}
?>

<h2>Cập nhật thông tin cá nhân</h2>

<form method="POST">

    Họ tên:
    <br>
    <input type="text"
           name="fullname"
           value="<?php echo $user['fullname']; ?>">
    <br><br>

    Số điện thoại:
    <br>
    <input type="text"
           name="phone"
           value="<?php echo $user['phone']; ?>">
    <br><br>

    Địa chỉ:
    <br>
    <input type="text"
           name="address"
           value="<?php echo $user['address']; ?>">
    <br><br>

    <button type="submit">
        Cập nhật
    </button>

</form>