<?php
// Kiểm tra trạng thái phiên
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Kiểm tra xem người dùng đã đăng nhập hay chưa
if (!isset($_SESSION['user']) || $_SESSION['user'] === null) {
    $_SESSION['error'] = "Bạn cần đăng nhập để truy cập trang này.";
    header("Location: login.php");
    exit(); // Đảm bảo dừng thực hiện mã tiếp theo
}

// Nội dung của trang chỉ dành cho người dùng đã đăng nhập
?>