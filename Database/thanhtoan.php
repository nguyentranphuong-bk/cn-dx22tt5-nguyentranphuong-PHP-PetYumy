<?php
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}

// 1. Kiểm tra đăng nhập
if (!isset($_SESSION['user_id'])) {
  echo "⚠️ Bạn cần đăng nhập để thanh toán.";
  echo '<meta http-equiv="refresh" content="2;url=../trangdangnhap.php">';
  exit;
}

$user_id = $_SESSION['user_id'];
$totalQuantity = $_POST['totalQuantity'] ?? 0;
$totalPrice = $_POST['totalPrice'] ?? 0;

// 2. Kết nối CSDL đơn hàng
$conn = new mysqli("localhost", "root", "", "thongtinsanpham");
if ($conn->connect_error) {
  die("❌ Lỗi kết nối DB đơn hàng: " . $conn->connect_error);
}

// 3. Kết nối CSDL users
$conn_users = new mysqli("localhost", "root", "", "quanlykhachhang");
if ($conn_users->connect_error) {
  die("❌ Lỗi kết nối DB users: " . $conn_users->connect_error);
}

// 4. Truy vấn thông tin người dùng
$sql_user = "SELECT phone, address, username, ho_va_ten FROM users WHERE id = $user_id";
$result_user = $conn_users->query($sql_user);
if (!$result_user || $result_user->num_rows === 0) {
  die("❌ Không tìm thấy người dùng hoặc lỗi truy vấn: " . $conn_users->error);
}
$row_user = $result_user->fetch_assoc();
$so_dien_thoai = $row_user['phone'] ?? 'Chưa có';
$dia_chi = $row_user['address'] ?? 'Chưa có';
$ten_nguoi_dung = $row_user['username'] ?? 'Ẩn danh';
$ho_va_ten = $row_user['ho_va_ten'] ?? 'Không rõ';

// 5. Lấy tên sản phẩm và xử lý tồn kho
$ten_san_pham = [];
$pdo = new PDO("mysql:host=localhost;dbname=thongtinsanpham", "root", "");
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if (!empty($_SESSION['cart'])) {
  foreach ($_SESSION['cart'] as $product_id => $item) {
    $ten_san_pham[] = $item['name'];
    $quantity = $item['quantity'];

    try {
      $stmt = $pdo->prepare("CALL PurchaseProduct(:id, :qty)");
      $stmt->execute(['id' => $product_id, 'qty' => $quantity]);
    } catch (PDOException $e) {
      echo "❌ Lỗi khi trừ tồn kho: " . $e->getMessage();
      exit;
    }
  }
}

$ten_san_pham_str = implode(', ', $ten_san_pham);

// 6. Ghi đơn hàng vào bảng donhang
$sql = "INSERT INTO donhang (
  user_id, tong_so_san_pham, tong_tien,
  so_dien_thoai, dia_chi, ten_san_pham, ten_nguoi_dung, ho_va_ten
)
VALUES (
  '$user_id', '$totalQuantity', '$totalPrice',
  '$so_dien_thoai', '$dia_chi', '$ten_san_pham_str', '$ten_nguoi_dung','$ho_va_ten'
)";

if ($conn->query($sql) === TRUE) {
  unset($_SESSION['cart']);
  echo "✅ Đơn hàng đã ghi nhận và kho đã cập nhật!";
  echo '<meta http-equiv="refresh" content="2;url=../trangchu.php">';
} else {
  echo "❌ Lỗi khi lưu đơn hàng: " . $conn->error;
}

// 7. Đóng kết nối
$conn->close();
$conn_users->close();
?>
