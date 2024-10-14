<?php
session_start();
require 'db.php'; // Kết nối tới database

// Biến chứa thông báo lỗi và thành công
$error_message = "";
$success_message = "";

// Kiểm tra nếu form đã được submit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $full_name = htmlspecialchars(trim($_POST['username']));
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $password = trim($_POST['password']); // Lưu mật khẩu không mã hóa

    // Kiểm tra xem email đã tồn tại chưa
    $stmt = $pdo->prepare("SELECT COUNT(*) FROM users WHERE email = ?");
    $stmt->execute([$email]);

    if ($stmt->fetchColumn() > 0) {
        $error_message = "Email đã được sử dụng. Vui lòng chọn email khác.";
    } else {
        // Thực hiện đăng ký, không mã hóa mật khẩu
        $stmt = $pdo->prepare("INSERT INTO users (full_name, email, password) VALUES (?, ?, ?)");
        if ($stmt->execute([$full_name, $email, $password])) {
            $success_message = "Đăng ký thành công!";
            header("Location: login.php"); // Chuyển hướng về trang đăng nhập
            exit(); // Dừng việc thực thi mã sau khi chuyển hướng
        } else {
            $error_message = "Đăng ký thất bại. Vui lòng thử lại.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký Tài khoản</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.0.0/mdb.min.css" rel="stylesheet" />
    <style>
        .fade-in {
            opacity: 0;
            transform: translateY(20px);
            transition: opacity 0.6s ease, transform 0.6s ease;
        }

        .fade-in.visible {
            opacity: 1;
            transform: translateY(0);
        }
    </style>
</head>

<body>

    <section class="vh-100" style="background-color: #3f2b30;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-xl-10">
                    <div class="card" style="border-radius: 1rem;">
                        <div class="row g-0">
                            <div class="col-md-6 col-lg-5 d-none d-md-block">
                                <img src="img/004.jpg" alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 0;" />
                            </div>
                            <div class="col-md-6 col-lg-7 d-flex align-items-center">
                                <div class="card-body p-4 p-lg-5 text-black">

                                    <form action="register.php" method="POST" class="fade-in">
                                        <div class="d-flex align-items-center mb-3 pb-1">
                                            <i class="fas fa-user-plus fa-2x me-3" style="color: #ff6219;"></i>
                                            <span class="h1 fw-bold mb-0">Đăng Ký</span>
                                        </div>

                                        <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Tạo tài khoản của bạn</h5>

                                        <!-- Hiển thị lỗi nếu có -->
                                        <?php if (!empty($error_message)): ?>
                                            <div class="alert alert-danger"><?php echo $error_message; ?></div>
                                        <?php elseif (!empty($success_message)): ?>
                                            <div class="alert alert-success"><?php echo $success_message; ?></div>
                                        <?php endif; ?>

                                        <div class="form-outline mb-4">
                                            <input type="text" id="form3Example1" name="username" class="form-control form-control-lg" required />
                                            <label class="form-label" for="form3Example1">Tên người dùng</label>
                                        </div>

                                        <div class="form-outline mb-4">
                                            <input type="email" id="form3Example2" name="email" class="form-control form-control-lg" required />
                                            <label class="form-label" for="form3Example2">Email</label>
                                        </div>

                                        <div class="form-outline mb-4">
                                            <input type="password" id="form3Example3" name="password" class="form-control form-control-lg" required />
                                            <label class="form-label" for="form3Example3">Mật khẩu</label>
                                        </div>

                                        <div class="pt-1 mb-4">
                                            <button class="btn btn-primary btn-lg btn-block" type="submit">Đăng ký</button>
                                        </div>

                                        <p class="mb-5 pb-lg-2" style="color: #393f81;">Bạn đã có tài khoản? <a href="login.php" style="color: #393f81;">Đăng Nhập Ngay</a></p>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.0.0/mdb.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const fadeInElements = document.querySelectorAll('.fade-in');
            fadeInElements.forEach((element) => {
                element.classList.add('visible');
            });
        });
    </script>

</body>

</html>
