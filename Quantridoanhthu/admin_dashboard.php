<?php
session_start();

// 🔐 Kiểm tra quyền truy cập admin
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
  echo "⛔ Bạn không có quyền truy cập trang quản trị.";
  exit;
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <title>Bảng điều khiển quản trị</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <style>
    body {
      font-family: Arial, sans-serif;
      padding: 30px;
      background-color: #f4f4f4;
    }
    h2 {
      color: #0d6efd;
      margin-bottom: 20px;
    }
    .container {
      display: flex;
      gap: 20px;
      flex-wrap: wrap;
    }
    .box {
      background: #fff;
      border: 1px solid #ccc;
      border-radius: 8px;
      width: 220px;
      text-align: center;
      padding: 20px;
      box-shadow: 0 0 8px rgba(0,0,0,0.1);
      transition: transform 0.2s;
    }
    .box:hover {
      transform: scale(1.03);
      cursor: pointer;
    }
    .box i {
      font-size: 30px;
      margin-bottom: 10px;
      color: #0d6efd;
    }
    .box a {
      text-decoration: none;
      color: #333;
      font-weight: bold;
      display: block;
    }
    .box a:hover {
      color: #0d6efd;
    }
  </style>
</head>
<body>

<h2 style="text-align: center;">📊 Bảng điều khiển quản trị</h2>
<div class="container">
  <div class="box">
    <i class="fas fa-chart-line"></i>
    <a href="thongke.php">Thống kê doanh thu</a>
  </div>
  <div class="box">
    <i class="fas fa-box-open"></i>
    <a href="thongke_sanpham.php">Sản phẩm bán chạy</a>
  </div>
  <div class="box">
    <i class="fas fa-users"></i>
    <a href="danhsach_user.php">Quản lý người dùng</a>
  </div>
  <div class="box">
    <i class="fas fa-shopping-cart"></i>
    <a href="donhang.php">Đơn hàng đã ghi nhận</a>
  </div>
   <div class="box">
    <i class="fas fa-shopping-cart"></i>
    <a href="./kiemtrakho.php ">Kiểm tra kho hàng</a>
  </div>
</div>

</body>
</html>
