<?php
// 1. Kết nối MySQL
$servername = "localhost";
$username = "root";
$password = "";
$database = "quanlykhachhang";

$conn = new mysqli($servername, $username, $password, $database);

// 2. Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// 3. Lấy dữ liệu từ form
$ten = $_POST['ten'];
$email = $_POST['email'];
$sdt = $_POST['sdt'];
$noi_dung = $_POST['noi_dung'];

// 4. Câu lệnh SQL lưu dữ liệu
$sql = "INSERT INTO thac_mac (ten, email, sdt, noi_dung) 
        VALUES ('$ten', '$email', '$sdt', '$noi_dung')";

// 5. Thực thi và phản hồi
if ($conn->query($sql) === TRUE) {
   echo "✅ Cảm ơn bạn đã gửi thắc mắc. Chúng tôi sẽ phản hồi sớm!";

// Chờ 2 giây rồi chuyển về trang chủ
echo '<meta http-equiv="refresh" content="2;url=../trangchu.php">';

    
} else {
    echo "❌ Có lỗi xảy ra: " . $conn->error;
}

$conn->close();
?>
