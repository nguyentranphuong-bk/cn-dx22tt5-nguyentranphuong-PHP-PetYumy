<?php
session_start();
include '../Database/connect.php';

 // Kết nối DB

// Lấy id và kiểm tra tính hợp lệ
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

if ($id <= 0) {
  die('ID sản phẩm không hợp lệ');
}

// Truy vấn sản phẩm từ bảng đúng tên
$sql = "SELECT * FROM pet_food_products WHERE id = $id";
$result = mysqli_query($conn, $sql);

// Kiểm tra truy vấn có thành công không
if (!$result) {
  die('Lỗi truy vấn: ' . mysqli_error($conn));
}

$pet_food_products = mysqli_fetch_assoc($result);

// Kiểm tra nếu không tìm thấy sản phẩm
if (!$pet_food_products) {
  die('Không tìm thấy sản phẩm');
}

// Khởi tạo giỏ nếu chưa có
if (!isset($_SESSION['cart'])) {
  $_SESSION['cart'] = [];
}

// Nếu sản phẩm đã có thì tăng số lượng
if (isset($_SESSION['cart'][$id])) {
  $_SESSION['cart'][$id]['quantity'] += 1;
} else {
  $_SESSION['cart'][$id] = [
    'name' => $pet_food_products['name'],
    'price' => $pet_food_products['price'],
    'description' => $pet_food_products['description'],
    'quantity' => 1,
    'image' => $pet_food_products['image']
  ];
}

// Chuyển về trang giỏ hàng
header('Location: ./giohang.php');
exit();
?>
