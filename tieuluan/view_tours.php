<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
require 'session_start.php'; // Include your session management file

// Database connection details
$servername = "localhost"; // Change if necessary
$username = "root"; // Change with your database username
$password = ""; // Change with your database password
$dbname = "tieuluan"; // Change with your database name

// Create a new mysqli connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare and execute the query to get the list of tours
$query = "SELECT tour_id, tour_name, start_date, end_date, max_people, available_slots, price FROM tours";
$stmt = $conn->prepare($query);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Du Lịch - Tuổi Trẻ Hãy Đam Mê</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Topbar Start -->
    <div class="container-fluid bg-light pt-3 d-none d-lg-block">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 text-center text-lg-left mb-2 mb-lg-0">
                    <div class="d-inline-flex align-items-center">
                        <p><i class="fa fa-envelope mr-2"></i>shen@gmail.com</p>
                        <p class="text-body px-3">|</p>
                        <p><i class="fa fa-phone-alt mr-2"></i>+84 76 696 9341</p>
                    </div>
                </div>
                <div class="col-lg-6 text-center text-lg-right">
                    <div class="d-inline-flex align-items-center">
                        <a class="text-primary px-3" href="">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a class="text-primary px-3" href="">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a class="text-primary px-3" href="">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                        <a class="text-primary px-3" href="">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a class="text-primary pl-3" href="">
                            <i class="fab fa-youtube"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->

    <!-- Navbar Start -->
    <div class="container-fluid position-relative nav-bar p-0">
        <div class="container-lg position-relative p-0 px-lg-3" style="z-index: 9;">
            <nav class="navbar navbar-expand-lg bg-light navbar-light shadow-lg py-3 py-lg-0 pl-3 pl-lg-5">
                <a href="" class="navbar-brand">
                    <h1 class="m-0 text-primary"><span class="text-dark">DU LỊCH</span> NGAY</h1>
                </a>
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-between px-3" id="navbarCollapse">
                    <div class="navbar-nav ml-auto py-0">
                        <a href="index.php" class="nav-item nav-link">Trang Chủ</a>
                        <a href="about.html" class="nav-item nav-link">Thông Tin</a>
                        <a href="view_tours.php" class="nav-item nav-link active">Gói Dịch Vụ</a>
                        <div class="nav-item dropdown">
                            <?php if (isset($_SESSION['user'])): ?>
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                                    <?php echo $_SESSION['user']['full_name']; ?>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="logout.php">Đăng xuất</a>
                                </div>
                            <?php else: ?>
                                <a class="nav-link" href="login.php">Đăng nhập</a>
                                <a class="nav-link" href="register.php">Đăng ký</a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <!-- Navbar End -->

    <!-- Header Start -->
    <div class="container-fluid page-header">
        <div class="container">
            <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 400px">
                <h3 class="display-4 text-white text-uppercase">Danh Sách Gói Trống</h3>
                <div class="d-inline-flex text-white">
                    <p class="m-0 text-uppercase"><a class="text-white" href="index.php">Trang Chủ</a></p>
                    <i class="fa fa-angle-double-right pt-1 px-3"></i>
                    <p class="m-0 text-uppercase">Gói Dịch Vụ</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->

    <!-- Service Start -->
    <div class="container-fluid py-5">
        <div class="container pt-5 pb-3">
            <div class="text-center mb-3 pb-3">
                <h6 class="text-primary text-uppercase" style="letter-spacing: 5px;">GÓI HOẠT ĐỘNG</h6>
                <h1>Dịch vụ du lịch theo gói</h1>
            </div>
            <div class="row">
                <?php while ($row = $result->fetch_assoc()): ?>
                    <?php $availableSlots = $row['total_slots'] - $row['booked_slots']; ?>
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="service-item bg-white text-center mb-2 py-5 px-4">
                            <i class="fa fa-2x fa-route mx-auto mb-4"></i>
                            <h5><?php echo htmlspecialchars($row['name']); ?></h5>
                            <p><strong>Ngày bắt đầu:</strong> <?php echo htmlspecialchars($row['start_date']); ?></p>
                            <p><strong>Ngày kết thúc:</strong> <?php echo htmlspecialchars($row['end_date']); ?></p>
                            <p><strong>Khu vực:</strong> <?php echo htmlspecialchars($row['area']); ?></p>
                            <p><strong>Giá:</strong> <?php echo htmlspecialchars($row['price']); ?> VNĐ</p>
                            <p><strong>Slot còn trống:</strong> <?php echo htmlspecialchars($availableSlots); ?></p>
                            <form method="post" action="book.php" class="text-center">
                                <input type="hidden" name="tour_id" value="<?php echo htmlspecialchars($row['id']); ?>">
                                <div class="mb-3">
                                    <input type="number" name="num_slots" min="1" max="<?php echo htmlspecialchars($availableSlots); ?>" required class="form-control" placeholder="Số slot">
                                </div>
                                <div class="mb-3">
                                    <input type="text" name="customer_name" class="form-control" placeholder="Tên khách" required>
                                </div>
                                <button type="submit" class="btn btn-dark">Đặt tour</button>
                            </form>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    </div>
    <!-- Service End -->

    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-white-50 py-5 px-sm-3 px-md-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 mb-5">
                    <h5 class="text-primary mb-4">Công Ty</h5>
                    <p>Chúng tôi chuyên cung cấp dịch vụ du lịch chất lượng cao với nhiều gói dịch vụ hấp dẫn.</p>
                    <p class="mb-0">Liên hệ với chúng tôi qua điện thoại hoặc email để được tư vấn tốt nhất.</p>
                </div>
                <div class="col-lg-4 col-md-6 mb-5">
                    <h5 class="text-primary mb-4">Liên Hệ</h5>
                    <p><i class="fa fa-map-marker-alt mr-2"></i>Địa chỉ công ty</p>
                    <p><i class="fa fa-phone-alt mr-2"></i>+84 76 696 9341</p>
                    <p><i class="fa fa-envelope mr-2"></i>shen@gmail.com</p>
                </div>
                <div class="col-lg-4 col-md-6 mb-5">
                    <h5 class="text-primary mb-4">Theo Dõi Chúng Tôi</h5>
                    <div class="d-flex">
                        <a class="btn btn-light btn-square mr-2" href="">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a class="btn btn-light btn-square mr-2" href="">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a class="btn btn-light btn-square mr-2" href="">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                        <a class="btn btn-light btn-square mr-2" href="">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a class="btn btn-light btn-square" href="">
                            <i class="fab fa-youtube"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->

    <!-- Back to Top -->
    <a href="#" class="btn btn-primary btn-lg back-to-top"><i class="fa fa-chevron-up"></i></a>

    <!-- JavaScript Libraries -->
    <script src="lib/jquery/jquery.min.js"></script>
    <script src="lib/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>

<?php
// Close the prepared statement and database connection
$stmt->close();
$conn->close();
?>