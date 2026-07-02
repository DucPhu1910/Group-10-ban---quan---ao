<?php

include 'config/database.php';

if($_SERVER["REQUEST_METHOD"]=="POST")
{
    

    $fullname = $_POST['fullname'];
$email = $_POST['email'];

$password = password_hash(
    $_POST['password'],
    PASSWORD_DEFAULT
);
$check = mysqli_query(
    $conn,
    "SELECT * FROM users
     WHERE email='$email'"
);

if(mysqli_num_rows($check) > 0)
{
    echo "Email đã tồn tại";
}
else
{
    // INSERT
}

$sql = "INSERT INTO users
(fullname,email,password)

VALUES

('$fullname','$email','$password')";

    if(mysqli_query($conn,$sql))
    {
        echo "Đăng ký thành công";
    }
    else
    {
        echo "Lỗi";
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Đăng ký</title>
</head>
<body>

<h2>Đăng ký tài khoản</h2>

<form method="POST">

    <label>Họ tên</label>
    <br>
    <input type="text" name="fullname" required>
    <br><br>

    <label>Email</label>
    <br>
    <input type="email" name="email" required>
    <br><br>

    <label>Mật khẩu</label>
    <br>
    <input type="password" name="password" required>
    <br><br>

    <button type="submit">
        Đăng ký
    </button>

</form>

</body>
</html>