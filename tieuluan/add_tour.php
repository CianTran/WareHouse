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

// Kiểm tra xem có yêu cầu POST không
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Lấy dữ liệu từ form
    $name = $_POST['name'];
    $startDate = $_POST['start_date'];
    $endDate = $_POST['end_date'];
    $duration = $_POST['duration'];
    $area = $_POST['area'];
    $totalSlots = $_POST['total_slots'];
    $price = $_POST['price']; // Thêm dòng này để nhận giá từ form

    // Thêm tour mới vào cơ sở dữ liệu
    $insertTourQuery = "INSERT INTO tours (name, start_date, end_date, duration, area, total_slots, price) VALUES (?, ?, ?, ?, ?, ?, ?)"; // Cập nhật câu lệnh SQL
    $stmt = $conn->prepare($insertTourQuery);
    
    // Đảm bảo số lượng biến trong bind_param khớp với câu lệnh SQL
    $stmt->bind_param("sssssii", $name, $startDate, $endDate, $duration, $area, $totalSlots, $price); // Sửa đổi kiểu dữ liệu
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        echo "<div class='alert alert-success'>Thêm tour thành công!</div>";
    } else {
        echo "<div class='alert alert-danger'>Thêm tour thất bại!</div>";
    }

    $stmt->close(); // Đóng statement
}

$conn->close(); // Đóng kết nối
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Tour</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/css/bootstrap.min.css">
    <style>
        body {
            background-color: #3f2b30;
        }
    </style>
</head>
<body>
<section class="vh-100">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col col-xl-10">
        <div class="card" style="border-radius: 1rem;">
          <div class="row g-0">
            <div class="col-md-6 col-lg-5 d-none d-md-block">
              <img src="img/004.jpg" alt="add tour form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
              <img src="img/002.jpg" alt="add tour form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
              <img src="img/about.jpg" alt="add tour form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
            </div>
            <div class="col-md-6 col-lg-7 d-flex align-items-center">
              <div class="card-body p-4 p-lg-5 text-black">
                <form action="" method="POST">
                  <div class="d-flex align-items-center mb-3 pb-1">
                    <i class="fas fa-plane fa-2x me-3" style="color: #ff6219;"></i>
                    <span class="h1 fw-bold mb-0">Thêm Tour</span>
                  </div>

                  <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Nhập thông tin tour của bạn</h5>

                  <div class="form-outline mb-4">
                    <label class="form-label">Tên tour</label>
                    <input type="text" name="name" class="form-control form-control-lg" required />
                  </div>

                  <div class="form-outline mb-4">
                    <label class="form-label">Ngày bắt đầu</label>
                    <input type="date" name="start_date" class="form-control form-control-lg" required />
                  </div>

                  <div class="form-outline mb-4">
                    <label class="form-label">Ngày kết thúc</label>
                    <input type="date" name="end_date" class="form-control form-control-lg" required />
                  </div>

                  <div class="form-outline mb-4">
                    <label class="form-label">Thời gian ở (số ngày)</label>
                    <input type="number" name="duration" class="form-control form-control-lg" required />
                  </div>

                  <div class="form-outline mb-4">
                    <label class="form-label">Khu vực</label>
                    <input type="text" name="area" class="form-control form-control-lg" required />
                  </div>

                  <div class="form-outline mb-4">
                    <label class="form-label">Tổng số slot</label>
                    <input type="number" name="total_slots" class="form-control form-control-lg" required />
                  </div>

                  <div class="form-outline mb-4">
                    <label class="form-label">Giá tour</label>
                    <input type="number" name="price" class="form-control form-control-lg" required /> <!-- Thêm trường nhập giá -->
                  </div>

                  <div class="pt-1 mb-4">
                    <button class="btn btn-dark btn-lg btn-block" type="submit">Thêm Tour</button>
                  </div>

                  <p class="mb-5 pb-lg-2" style="color: #393f81;">Trở về <a href="view_tours.php" style="color: #393f81;">Danh Sách Tour</a></p>
                </form>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
</body>
</html>
