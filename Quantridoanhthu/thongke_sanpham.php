<?php
session_start();

// 🔐 Chặn người không có quyền admin
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
  echo "<h3 style='color:red; text-align:center;'>⛔ Bạn không có quyền truy cập trang thống kê sản phẩm.</h3>";
  exit;
}

// Kết nối CSDL đơn hàng
$conn = new mysqli("localhost", "root", "", "thongtinsanpham");
if ($conn->connect_error) {
  die("❌ Kết nối lỗi: " . $conn->connect_error);
}

// Truy vấn thống kê sản phẩm đã bán
$sql = "SELECT ten_san_pham, SUM(tong_so_san_pham) AS tong_so_luong
        FROM donhang
        GROUP BY ten_san_pham
        ORDER BY tong_so_luong DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <title>Thống kê sản phẩm bán</title>
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      margin: 0;
      background: #f5f8fa;
    }
    .wrapper {
      max-width: 800px;
      margin: 60px auto;
      background: #fff;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 0 15px rgba(0,0,0,0.1);
      text-align: center;
    }
    h2 {
      color: #0d6efd;
      margin-bottom: 25px;
    }
    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 10px;
    }
    th, td {
      padding: 12px;
      border-bottom: 1px solid #ddd;
      text-align: center;
    }
    th {
      background-color: #0d6efd;
      color: #fff;
    }
    tr:hover {
      background-color: #f2f2f2;
    }
  </style>
</head>
<body>
  <div class="wrapper">
    <h2>📦 Thống kê sản phẩm đã bán</h2>
    <table>
      <tr>
        <th>Tên sản phẩm</th>
        <th>Tổng số lượng đã bán</th>
      </tr>
      <?php while($row = $result->fetch_assoc()): ?>
        <tr>
          <td><?= htmlspecialchars($row['ten_san_pham']) ?></td>
          <td><?= $row['tong_so_luong'] ?></td>
        </tr>
      <?php endwhile; ?>
    </table>
  </div>
</body>
</html>
