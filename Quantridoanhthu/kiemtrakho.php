<?php
session_start();

// 🔐 Chỉ cho admin truy cập
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
  echo "<h3 style='color:red; text-align:center;'>⛔ Bạn không có quyền truy cập kho hàng.</h3>";
  exit;
}

// Kết nối CSDL
$conn = new mysqli("localhost", "root", "", "thongtinsanpham");
if ($conn->connect_error) {
  die("❌ Không kết nối được CSDL: " . $conn->connect_error);
}

// Truy vấn sản phẩm
$sql = "SELECT name, description, stock_quantity, image FROM pet_food_products ORDER BY stock_quantity ASC";
$result = $conn->query($sql);
if (!$result) {
  die("❌ Lỗi truy vấn SQL: " . $conn->error);
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <title>Kiểm tra kho sản phẩm</title>
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      background-color: #f5f8fa;
      margin: 0;
    }
    .wrapper {
      max-width: 900px;
      margin: 60px auto;
      background: #fff;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 0 15px rgba(0,0,0,0.1);
    }
    h2 {
      text-align: center;
      color: #0d6efd;
      margin-bottom: 25px;
    }
    table {
      width: 100%;
      border-collapse: collapse;
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
    img {
      width: 60px;
      height: 60px;
      object-fit: cover;
      border-radius: 5px;
    }
    tr:hover {
      background-color: #f2f2f2;
    }
  </style>
</head>
<body>
  <div class="wrapper">
    <h2>📦 Kiểm tra số lượng sản phẩm còn trong kho</h2>
    <table>
      <tr>
        <th>Hình ảnh</th>
        <th>Tên sản phẩm</th>
        <th>Mô tả</th>
        <th>Số lượng còn</th>
      </tr>
      <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
          <td>
            <?php if (!empty($row['image'])): ?>
              <img src="<?= '../img/' . $row['image'] ?>" alt="Sản phẩm">
            <?php else: ?>
              🚫
            <?php endif; ?>
          </td>
          <td><?= htmlspecialchars($row['name']) ?></td>
          <td><?= htmlspecialchars($row['description']) ?></td>
          <td><?= $row['stock_quantity'] ?></td>
        </tr>
      <?php endwhile; ?>
    </table>
  </div>
</body>
</html>
