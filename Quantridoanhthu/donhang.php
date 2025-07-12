<?php
session_start();

// 🔐 Chỉ cho admin được phép truy cập
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
  echo "<h3 style='color:red; text-align:center;'>⛔ Không có quyền truy cập đơn hàng.</h3>";
  exit;
}

// Kết nối CSDL đơn hàng
$conn = new mysqli("localhost", "root", "", "thongtinsanpham");
if ($conn->connect_error) {
  die("❌ Lỗi kết nối DB đơn hàng: " . $conn->connect_error);
}

// Truy vấn tất cả đơn hàng
$sql = "SELECT * FROM donhang ORDER BY ngay_tao DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <title>Đơn hàng đã ghi nhận</title>
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      background: #f5f8fa;
      margin: 0;
    }
    .wrapper {
      max-width: 1000px;
      margin: 60px auto;
      background: #fff;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 0 15px rgba(0,0,0,0.1);
    }
    h2 {
      color: #0d6efd;
      text-align: center;
      margin-bottom: 20px;
    }
    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 10px;
    }
    th, td {
      padding: 10px;
      border-bottom: 1px solid #ccc;
      text-align: center;
    }
    th {
      background-color: #0d6efd;
      color: white;
    }
    tr:hover {
      background-color: #f2f2f2;
    }
  </style>
</head>
<body>
  <div class="wrapper">
    <h2>🧾 Danh sách đơn hàng đã ghi nhận</h2>
    <table>
      <tr>
        <th>ID</th>
        <th>Người dùng</th>
        <th>Họ và tên</th>
        <th>Sản phẩm</th>
        <th>Số lượng</th>
        <th>Tổng tiền (VNĐ)</th>
        <th>SĐT</th>
        <th>Địa chỉ</th>
        <th>Thời gian</th>
      </tr>
      <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
          <td><?= $row['id'] ?></td>
          <td><?= htmlspecialchars($row['ten_nguoi_dung']) ?></td>
          <td><?= htmlspecialchars($row['ho_va_ten']) ?></td>
          <td><?= htmlspecialchars($row['ten_san_pham']) ?></td>
          <td><?= $row['tong_so_san_pham'] ?></td>
          <td><?= number_format($row['tong_tien']) ?></td>
          <td><?= $row['so_dien_thoai'] ?></td>
          <td><?= htmlspecialchars($row['dia_chi']) ?></td>
          <td><?= $row['ngay_tao'] ?? 'Không rõ' ?></td>
        </tr>
      <?php endwhile; ?>
    </table>
  </div>
</body>
</html>
