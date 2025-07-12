<?php
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

$conn = new mysqli('localhost', 'root', '', 'thongtinsanpham');
if ($conn->connect_error) die("Lỗi kết nối: " . $conn->connect_error);

$sql = "SELECT name, image, description, price FROM pet_food_products WHERE id = $id";
$result = $conn->query($sql);
if (!$result) die("Lỗi truy vấn SQL: " . $conn->error);

if ($row = $result->fetch_assoc()) {
  echo '<div style="display:flex; gap: 20px;">
          <img src="img/' . $row['image'] . '" alt="' . $row['name'] . '" style="width:300px; height:auto;">
          <div>
            <h2>' . $row['name'] . '</h2>
            <p>' . $row['description'] . '</p>
            <p><strong>Giá: </strong>' . number_format($row['price'], 0, ',', '.') . ' ₫</p>
            <a href="giohanglon/add-to-cart.php?id=' . $id . '" 
               class="btn btn-outline-success d-flex align-items-center gap-2 px-3 py-2" 
               style="border-radius: 6px;">
              <i class="fa-solid fa-cart-plus fa-lg"></i>
              Thêm vào giỏ hàng
            </a>
          </div>
        </div>';
} else {
  echo "Không tìm thấy sản phẩm";
}

