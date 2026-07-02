<?php

include 'includes/auth.php';

if($_SESSION['role'] != 'admin')
{
    die("Bạn không có quyền truy cập");
}

?>

<h1>Trang quản trị</h1>

<p>Xin chào Admin</p>