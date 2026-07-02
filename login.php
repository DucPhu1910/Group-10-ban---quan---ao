<?php

session_start();

include 'config/database.php';

if($_SERVER["REQUEST_METHOD"]=="POST")
{
    $email = $_POST['email'];
    $password = $_POST['password'];

   $email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT * FROM users
        WHERE email='$email'";

$result = mysqli_query($conn,$sql);

if(mysqli_num_rows($result) > 0)
{
    $user = mysqli_fetch_assoc($result);

    if(password_verify(
        $password,
        $user['password']
    ))
    {
        $_SESSION['user_id']
            = $user['id'];

        $_SESSION['fullname']
            = $user['fullname'];

        $_SESSION['role']
            = $user['role'];

        header("Location: profile.php");
        exit();
    }
}

    $result = mysqli_query($conn,$sql);

    if(mysqli_num_rows($result) > 0)
    {
        $user = mysqli_fetch_assoc($result);

        $_SESSION['user_id'] = $user['id'];
        $_SESSION['fullname'] = $user['fullname'];
        $_SESSION['role'] = $user['role'];

        header("Location: profile.php");
        exit();
    }
    else
    {
        echo "Sai email hoặc mật khẩu";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Đăng nhập</title>
</head>
<body>

<h2>Đăng nhập</h2>

<form method="POST">

    <label>Email</label>
    <br>
    <input type="email" name="email" required>
    <br><br>

    <label>Mật khẩu</label>
    <br>
    <input type="password" name="password" required>
    <br><br>

    <button type="submit">
        Đăng nhập
    </button>

</form>

</body>
</html>