<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>ADMIN</title>
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
    <html lang="en">

    <head>
        <meta charset="utf-8" />
        <meta content="width=device-width, initial-scale=1.0" name="viewport" />
        <title>
            Quản lý Admin
        </title>
        <script src="https://cdn.tailwindcss.com">
        </script>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    </head>

    <body class="bg-gray-100 font-sans antialiased">
        <div class="flex h-screen">
            <!-- Sidebar -->
            <div class="bg-gray-900 text-gray-300 w-64 space-y-6 py-6 px-2">    
                <nav class="space-y-1">
                    <a class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700" href="#">
                        <i class="fas fa-home">
                        </i>
                        Trang Chủ
                    </a>
                    <a class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700" href="#">
                    <i class="fas fa-chart-line">
                    </i>
                        Tổng Số Đơn Đặt Vé
                    </a>
                    <a class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700" href="#">
                        <i class="fas fa-tasks">
                        </i>
                        Tour Sắp Diễn Ra
                    </a>
                    <a class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700" href="#">
                        <i class="fas fa-rss">
                        </i>
                        Tổng Quan Doanh Thu
                    </a>
                </nav>
                <div class="mt-6">
                    <h3 class="px-4 text-xs font-semibold text-gray-400 uppercase tracking-wider">
                        Quản lý
                    </h3>
                    <nav class="space-y-1">
                        <a class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700" href="#">
                            <i class="fas fa-share-alt">
                            </i>
                            Quản lý quyền Admin
                        </a>
                        <a class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700" href="#">
                            <i class="fas fa-angle-left">
                            </i>
                            Thêm, Sửa Xóa Tours
                        </a>
                        <a class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700" href="#">
                            <i class="fas fa-comments">
                            </i>
                            Quản lý người dùng
                        </a>
                        <a class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700" href="#">
                            <i class="fas fa-shopping-cart">
                            </i>
                            Thanh Toán và Hoá Đơn
                        </a>
                        <a class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700 flex items-center" href="#">
                            <i class="fas fa-plane">
                            </i>
                            Khuyến Mãi và Giảm Giá
                            <span class="ml-2 bg-yellow-500 text-xs text-white rounded px-1">
                                NEW
                            </span>
                        </a>
                        
                        <a class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700" href="#">
                            <i class="fas fa-envelope">
                            </i>
                            Phản Hồi và Hỗ Trợ
                        </a>
                        <a class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700" href="#">
                            <i class="fas fa-calendar-alt">
                            </i>
                            Quản Lý Đặt Vé
                        </a>

                        <a class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700" href="#">
                            <i class="fas fa-images">
                            </i>
                            Quản Lý Nội Dung
                        </a>
                        
                    </nav>
                </div>

            </div>
            <!-- Main content -->
            <div class="flex-1 p-6 bg-gray-100">
                <div class="flex justify-between items-center mb-6">
                    <h1 class="text-3xl font-bold">
                        Quản lý Admin
                    </h1>
                    <div class="flex items-center space-x-4">
                        <button class="text-gray-500 hover:text-gray-700">
                            <i class="fas fa-search">
                            </i>
                        </button>
                        <button class="text-gray-500 hover:text-gray-700">
                            <i class="fas fa-sun">
                            </i>
                        </button>
                        <button class="text-gray-500 hover:text-gray-700">
                            <i class="fas fa-bell">
                            </i>
                        </button>
                        <img alt="User avatar" class="h-8 w-8 rounded-full" height="32" src="https://storage.googleapis.com/a1aa/image/LLBLZxjP4E6dGJwcHJnNi2Tv7eKxhXhNoAetB74UdzfXM7InA.jpg" width="32" />
                    </div>
                </div>
                <p class="text-gray-600 mb-6">
                    Đây là nơi quản lý hệ thống đặt tours
                </p>
                <div class="flex space-x-6 mb-6">
                    <div class="flex items-center space-x-2">
                        <div class="bg-green-100 p-2 rounded-full">
                            <i class="fas fa-star text-green-500">
                            </i>
                        </div>
                        <div>
                            <h2 class="text-xl font-bold">
                                57 đơn mới
                            </h2>
                            <p class="text-gray-500">
                                Đang chờ xử lý
                            </p>
                        </div>
                    </div>
                    <div class="flex items-center space-x-2">
                        <div class="bg-yellow-100 p-2 rounded-full">
                            <i class="fas fa-pause text-yellow-500">
                            </i>
                        </div>
                        <div>
                            <h2 class="text-xl font-bold">
                                5 đơn hàng
                            </h2>
                            <p class="text-gray-500">
                                Đang chờ
                            </p>
                        </div>
                    </div>
                    <div class="flex items-center space-x-2">
                        <div class="bg-red-100 p-2 rounded-full">
                            <i class="fas fa-times text-red-500">
                            </i>
                        </div>
                        <div>
                            <h2 class="text-xl font-bold">
                                15 sản phẩm
                            </h2>
                            <p class="text-gray-500">
                                Hết hàng
                            </p>
                        </div>
                    </div>
                </div>
                <div class="bg-white p-6 rounded-lg shadow">
                    <h2 class="text-2xl font-bold mb-2">
                        Total sells
                    </h2>
                    <p class="text-gray-500 mb-4">
                        Payment received across all channels
                    </p>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/chart.js">
        </script>
        <script>
            const ctx = document.getElementById('salesChart').getContext('2d');
            const salesChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: ['01 May', '15 May', '30 May'],
                    datasets: [{
                        label: 'Sales',
                        data: [10, 20, 15, 25, 30, 20, 25],
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 2,
                        fill: false
                    }, {
                        label: 'Returns',
                        data: [5, 10, 5, 15, 20, 10, 15],
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 2,
                        fill: false,
                        borderDash: [5, 5]
                    }]
                },
                options: {
                    responsive: true,
                    scales: {
                        x: {
                            display: true,
                            title: {
                                display: true,
                                text: 'Date'
                            }
                        },
                        y: {
                            display: true,
                            title: {
                                display: true,
                                text: 'Amount'
                            }
                        }
                    }
                }
            });
        </script>
    </body>

    </html>


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="mail/jqBootstrapValidation.min.js"></script>
    <script src="mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>