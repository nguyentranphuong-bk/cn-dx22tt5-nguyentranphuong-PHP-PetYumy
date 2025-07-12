<?php
session_start();

// 🔐 Kiểm tra quyền admin
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
  echo "<h3 style='color:red; text-align:center;'>⛔ Bạn không có quyền truy cập trang quản lý người dùng.</h3>";
  exit;
}

// Kết nối CSDL người dùng
$conn = new mysqli("localhost", "root", "", "quanlykhachhang");
if ($conn->connect_error) {
  die("❌ Kết nối thất bại: " . $conn->connect_error);
}

// Truy vấn danh sách người dùng
$sql = "SELECT id, username, ho_va_ten, phone, email, role FROM users ORDER BY id ASC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <title>Danh sách người dùng</title>
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      margin: 0;
      background: #f5f8fa;
    }
    .wrapper {
      max-width: 900px;
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
    <h2>🧑‍💼 Danh sách người dùng trong hệ thống</h2>
    <table>
      <tr>
        <th>ID</th>
        <th>Username</th>
        <th>Họ và Tên</th>
        <th>Điện thoại</th>
        <th>Email</th>
        <th>Quyền</th>
      </tr>
      <?php while($row = $result->fetch_assoc()): ?>
        <tr>
          <td><?= $row['id'] ?></td>
          <td><?= htmlspecialchars($row['username']) ?></td>
          <td><?= htmlspecialchars($row['ho_va_ten']) ?></td>
          <td><?= htmlspecialchars($row['phone']) ?></td>
          <td><?= htmlspecialchars($row['email']) ?></td>
          <td><?= strtoupper($row['role']) ?></td>
        </tr>
      <?php endwhile; ?>
    </table>
  </div>
</body>
</html>
