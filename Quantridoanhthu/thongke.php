<?php
session_start();

// 🔐 Chỉ cho admin truy cập
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
  echo "<h3 style='color:red; text-align:center;'>⛔ Bạn không có quyền truy cập trang thống kê.</h3>";
  exit;
}

// Kết nối CSDL
$conn = new mysqli("localhost", "root", "", "thongtinsanpham");
if ($conn->connect_error) {
  die("❌ Kết nối thất bại: " . $conn->connect_error);
}

// Truy vấn doanh thu theo ngày
$sql = "SELECT DATE(ngay_tao) AS ngay, SUM(tong_tien) AS doanh_thu 
        FROM donhang 
        GROUP BY DATE(ngay_tao) 
        ORDER BY ngay DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <title>Thống kê doanh thu</title>
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
    <h2>📅 Thống kê doanh thu theo ngày</h2>
    <table>
      <tr>
        <th>Ngày</th>
        <th>Doanh thu (VNĐ)</th>
      </tr>
      <?php while($row = $result->fetch_assoc()): ?>
        <tr>
          <td><?= $row['ngay'] ?></td>
          <td><?= number_format($row['doanh_thu']) ?></td>
        </tr>
      <?php endwhile; ?>
    </table>
  </div>
</body>
</html>
