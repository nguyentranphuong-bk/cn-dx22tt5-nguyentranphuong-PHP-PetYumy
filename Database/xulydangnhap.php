<?php
session_start();

// Kết nối database
$conn = new mysqli("localhost", "root", "", "quanlykhachhang");
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// Nhận dữ liệu từ form
$username = $_POST['username'];
$password = $_POST['password'];

// Truy vấn kiểm tra người dùng
$sql = "SELECT * FROM users WHERE username = '$username'";
$result = $conn->query($sql);

// Kiểm tra tài khoản có tồn tại
if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();

    // Xác minh mật khẩu
    if (password_verify($password, $row['password'])) {
        // Lưu thông tin đăng nhập vào session
        $_SESSION['username'] = $row['username'];
        $_SESSION['user_id'] = $row['id'];

        // Chuyển về trang chủ
        header("Location: ../trangchu.php");
        exit();
    } else {
        // Sai mật khẩu
        echo "<h3 style='color:red;'>⚠️ Mật khẩu không đúng!</h3>";
        echo "<a href='../trangdangnhap.php'>← Quay lại đăng nhập</a>";
    }
} else {
    // Không tìm thấy tài khoản
    echo "<h3 style='color:red;'>⚠️ Tài khoản không tồn tại!</h3>";
    echo "<a href='../trangdangnhap.php'>← Quay lại đăng nhập</a>";
}

$conn->close();
?>
