<?php
// Kết nối cơ sở dữ liệu
$servername = "localhost";
$username = "root"; // Thay đổi tên người dùng
$password = ""; // Thay đổi mật khẩu
$dbname = "tieuluan";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// Nhận dữ liệu từ form
$tour_id = $_POST['tour_id'];
$num_slots = $_POST['num_slots'];
$customer_name = $_POST['customer_name'];

// Lấy giá tour và số slot đã đặt từ bảng tours
$query = "SELECT price, total_slots, booked_slots FROM tours WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $tour_id);
$stmt->execute();
$stmt->bind_result($price, $total_slots, $booked_slots);
$stmt->fetch();
$stmt->close();

// Kiểm tra xem có đủ slot không
if (($booked_slots + $num_slots) > $total_slots) {
    echo "Xin lỗi, không đủ slot còn lại để đặt tour này.";
    $conn->close();
    exit();
}

// Tính tổng tiền
$total_price = $price * $num_slots;

// Lưu đơn đặt tour vào bảng bookings
$insert_query = "INSERT INTO bookings (tour_id, customer_name, num_slots, total_price) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($insert_query);
$stmt->bind_param("isii", $tour_id, $customer_name, $num_slots, $total_price);
$stmt->execute();

if ($stmt->affected_rows > 0) {
    // Cập nhật số slot đã đặt trong bảng tours
    $update_query = "UPDATE tours SET booked_slots = booked_slots + ? WHERE id = ?";
    $update_stmt = $conn->prepare($update_query);
    $update_stmt->bind_param("ii", $num_slots, $tour_id);
    $update_stmt->execute();
    $update_stmt->close();

    echo "Đặt tour thành công!";
} else {
    echo "Có lỗi xảy ra, vui lòng thử lại!";
}

$stmt->close();
$conn->close();
?>
