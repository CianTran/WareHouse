<?php
session_start();
require 'db.php'; // Đảm bảo rằng tệp db.php chứa kết nối PDO
$error_message = ''; // Khởi tạo biến lỗi

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $email = trim($_POST['email']);
  $password = trim($_POST['password']);

  // Kiểm tra thông tin đăng nhập
  $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
  $stmt->execute([$email]);
  $user = $stmt->fetch();

  // So sánh mật khẩu mà không mã hóa
  if ($user && $password === $user['password']) {
    $_SESSION['user'] = [
      'user_id' => $user['id'],
      'full_name' => $user['full_name'], 
      'email' => $user['email'],
      'role' => $user['role'], // Lưu role của người dùng vào session
    ];

    // Kiểm tra nếu tài khoản là admin
    if ($user['role'] === 'admin') {
      header("Location: admin.php"); // Chuyển đến trang admin
    } else {
      header("Location: index.php"); // Chuyển đến trang chính cho user thông thường
    }
    exit;
  } else {
    $error_message = "Email hoặc mật khẩu không đúng."; // Đặt thông báo lỗi
  }
}
?>

<!DOCTYPE html>
<html lang="vi">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Đăng Nhập</title>
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
                <img src="img/001.jpg" alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
              </div>
              <div class="col-md-6 col-lg-7 d-flex align-items-center">
                <div class="card-body p-4 p-lg-5 text-black">

                  <form action="login.php" method="POST" class="fade-in">
                    <div class="d-flex align-items-center mb-3 pb-1">
                      <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                      <span class="h1 fw-bold mb-0">Đăng Nhập</span>
                    </div>

                    <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Đăng nhập Tài khoản của bạn</h5>

                    <!-- Hiển thị lỗi nếu có -->
                    <?php if (!empty($error_message)): ?>
                      <div class="alert alert-danger"><?php echo $error_message; ?></div>
                    <?php endif; ?>

                    <div class="form-outline mb-4">
                      <input type="email" id="form2Example17" name="email" class="form-control form-control-lg" required />
                      <label class="form-label" for="form2Example17">Địa chỉ Email</label>
                    </div>

                    <div class="form-outline mb-4">
                      <input type="password" id="form2Example27" name="password" class="form-control form-control-lg" required />
                      <label class="form-label" for="form2Example27">Mật khẩu</label>
                    </div>

                    <div class="pt-1 mb-4">
                      <button data-mdb-button-init data-mdb-ripple-init class="btn btn-dark btn-lg btn-block" type="submit">Đăng nhập</button>
                    </div>

                    <a class="small text-muted" href="#!">Quên mật khẩu?</a>
                    <p class="mb-5 pb-lg-2" style="color: #393f81;">Không có tài khoản? <a href="register.php" style="color: #393f81;">Đăng Ký Ngay</a></p>
                    <a href="#!" class="small text-muted">DEV TEAM</a>
                    <a href="#!" class="small text-muted">An Toàn - Bảo Mật</a>
                  </form>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- MDB -->
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
