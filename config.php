<?php
// Cấu hình thông tin kết nối cơ sở dữ liệu
$host = 'localhost'; // Hoặc địa chỉ máy chủ của bạn
$user = 'root';      // Tên người dùng MySQL
$password = '';      // Mật khẩu của người dùng MySQL (để trống nếu bạn không có)
$dbname = 'tieuluan';   // Tên cơ sở dữ liệu

// Tạo kết nối
$conn = new mysqli($host, $user, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}
?>
