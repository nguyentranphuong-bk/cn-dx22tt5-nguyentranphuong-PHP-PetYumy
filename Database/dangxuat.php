<?php
session_start();
session_destroy(); // Xóa toàn bộ session
header("Location: ../trangchu.php"); // Quay về trang chủ
exit();
?>
