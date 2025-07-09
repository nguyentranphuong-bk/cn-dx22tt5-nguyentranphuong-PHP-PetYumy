<?php
$conn = new mysqli("localhost", "root", "", "quanlykhachhang");
if ($conn->connect_error) {
  die("Kết nối thất bại: " . $conn->connect_error);
}

$username = $_POST['username'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
$address = $_POST['address'];
$phone = $_POST['phone'];

$sql = "INSERT INTO users (username, email, password, address, phone, created_at)
        VALUES ('$username', '$email', '$password', '$address', '$phone', NOW())";

if ($conn->query($sql) === TRUE) {
  // Hiển thị thông báo và đếm ngược chuyển về trang chủ
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
          window.location.href = "../trangchu.php"; // 👈 thay bằng trang chủ của bạn
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
  echo "<h3 style='color:red;'>Lỗi: " . $conn->error . "</h3>";
}

$conn->close();
?>
