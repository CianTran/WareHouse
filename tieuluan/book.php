<?php
session_start();
require 'config.php'; // Kết nối với cơ sở dữ liệu

// Kiểm tra xem người dùng đã đăng nhập hay chưa
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

// Lấy dữ liệu từ form
$destination_id = $_POST['destination_id'];
$start_date = $_POST['start_date'];
$end_date = $_POST['end_date'];
$adults = $_POST['adults'];
$children = $_POST['children'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$payment_method = $_POST['payment_method'];
$notes = $_POST['notes'];

$guest_names = [];
for ($i = 1; $i <= ($adults + $children); $i++) {
    if (isset($_POST["guest_name_$i"])) {
        $guest_names[] = $_POST["guest_name_$i"];
    }
}
$guest_names_string = implode(", ", $guest_names);

// Thực hiện truy vấn để lưu vào cơ sở dữ liệu
$query = "INSERT INTO bookings (destination_id, phone, email, start_date, end_date, adults, children, guest_names, notes, payment_method) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($query);
$stmt->bind_param("issssiisss", $destination_id, $phone, $email, $start_date, $end_date, $adults, $children, $guest_names_string, $notes, $payment_method);

if ($stmt->execute()) {
    echo "Đặt vé thành công!";
} else {
    echo "Có lỗi xảy ra: " . $stmt->error;
}
?>
