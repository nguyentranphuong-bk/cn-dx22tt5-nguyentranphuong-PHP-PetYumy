<?php
// Kết nối database
$conn = new mysqli("localhost", "root", "", "quanlykhachhang");
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// Xử lý khi form được gửi
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Lấy dữ liệu từ form & kiểm tra
    $ho_va_ten = isset($_POST['ho_va_ten']) ? trim($_POST['ho_va_ten']) : '';
    $username = isset($_POST['username']) ? trim($_POST['username']) : '';
    $email = isset($_POST['email']) ? trim($_POST['email']) : '';
    $password_raw = isset($_POST['password']) ? $_POST['password'] : '';
    $address = isset($_POST['address']) ? trim($_POST['address']) : '';
    $phone = isset($_POST['phone']) ? trim($_POST['phone']) : '';

    // Kiểm tra dữ liệu cơ bản
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Email không hợp lệ.");
    }
    if (strlen($password_raw) < 6) {
        die("Mật khẩu phải từ 6 ký tự trở lên.");
    }

    // Mã hóa mật khẩu
    $password = password_hash($password_raw, PASSWORD_DEFAULT);

    // Sử dụng Prepared Statement để tránh SQL Injection
    $stmt = $conn->prepare("INSERT INTO users (ho_va_ten, username, email, password, address, phone, created_at)
                            VALUES (?, ?, ?, ?, ?, ?, NOW())");
    $stmt->bind_param("ssssss", $ho_va_ten, $username, $email, $password, $address, $phone);

    if ($stmt->execute()) {
        // Hiển thị giao diện thành công
        echo '
        <html>
        <head>
          <meta charset="UTF-8">
          <title>Đăng ký thành công</title>
          <style>
            body {
              font-family: "Segoe UI", sans-serif;
              background-color: #f0f4f8;
              display: flex;
              justify-content: center;
              align-items: center;
              height: 100vh;
            }
            .message-box {
              background: white;
              padding: 40px;
              border-radius: 12px;
              box-shadow: 0 8px 20px rgba(0,0,0,0.2);
              text-align: center;
            }
            .countdown {
              font-size: 1.5rem;
              color: #007bff;
              margin-top: 10px;
            }
          </style>
          <script>
            let seconds = 3;
            function countdown() {
              if (seconds > 0) {
                document.getElementById("countdown").innerText = seconds + " giây";
                seconds--;
                setTimeout(countdown, 1000);
              } else {
                window.location.href = "../trangchu.php";
              }
            }
            window.onload = countdown;
          </script>
        </head>
        <body>
          <div class="message-box">
            <h2 style="color: green;">🎉 Bạn đã đăng ký thành công!</h2>
            <div class="countdown">Quay về trang chủ sau <span id="countdown">3 giây</span></div>
          </div>
        </body>
        </html>';
    } else {
        echo "<h3 style='color:red;'>Lỗi: " . $stmt->error . "</h3>";
    }

    $stmt->close();
}

$conn->close();
?>
