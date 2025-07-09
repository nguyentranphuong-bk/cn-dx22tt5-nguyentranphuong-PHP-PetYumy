<?php
$conn = mysqli_connect("localhost", "root", "", "thongtinsanpham");

if (!$conn) {
    die("Kết nối thất bại: " . mysqli_connect_error());
}
?>
