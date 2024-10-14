<?php
session_start();

// Kiểm tra xem người dùng đã đăng nhập hay chưa
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit();
}

// Kiểm tra quyền admin
if ($_SESSION['user']['role'] == 'admin') {
    header('Location: admin_dashboard.php');
    exit();
}

// Hiển thị thông tin người dùng
?>
