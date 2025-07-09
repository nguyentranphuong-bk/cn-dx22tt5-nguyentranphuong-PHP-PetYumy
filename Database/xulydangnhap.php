<?php
session_start();
$conn = new mysqli("localhost", "root", "", "quanlykhachhang");
if ($conn->connect_error) {
  die("Kết nối thất bại: " . $conn->connect_error);
}

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM users WHERE username = '$username'";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
  $row = $result->fetch_assoc();
  if (password_verify($password, $row['password'])) {
    $_SESSION['username'] = $username;

    // Hiển thị thông báo và đếm ngược
    echo '
    <html>
    <head>
      <meta charset="UTF-8">
      <title>Đăng nhập thành công</title>
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
        let seconds = 5;
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
        <h2 style="color: green;">🎉 Đăng nhập thành công!</h2>
        <div class="countdown">Chuyển về trang chủ sau <span id="countdown">5 giây</span></div>
      </div>
    </body>
    </html>';
  } else {
    echo "<h3 style='color:red;'>Sai mật khẩu!</h3>";
  }
} else {
  echo "<h3 style='color:red;'>Bạn Chưa Đăng Kí!</h3>";
}

$conn->close();
?>
