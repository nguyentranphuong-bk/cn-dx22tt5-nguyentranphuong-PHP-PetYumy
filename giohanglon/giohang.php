<?php
session_start();
$totalQuantity = 0;
$totalPrice = 0;
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>Header Demo</title>
  <link rel="stylesheet" href="./giohang.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

  <script src="./phuong.js"></script>
</head>

<body>
  <div class="topbar">
    <p id="marquee-text">Chào mừng bạn đến trang web mua bán thức ăn cho thú cưng</p>
  </div>
  <header class="container-fluid bg-white border-bottom py-0" style="height: 103px;">

    <div class="d-flex justify-content-between align-items-center h-100 px-0 mx-auto" style="max-width: 1252px;">
      <div class="header-logo" style="width: 117px; height: 102px;">
        <a href="../trangchu.php">
          <img src="../img/z6767529775595_281d56e30363396ee98c37b9c5a3b182.jpg" alt="Logo" class="img-fit">
        </a>

      </div>

      <div class="header-menu d-flex align-items-center" style="width: 550px;height: 45px;">
        <div class="menu-left" style="width: 113.2px; height: 45px;">
          <select id="select1" class="w-100 h-100" style="font-size: 16px;
    padding-left: 15px;font-weight: bold;border: 1px solid #e2e2e2;
    border-right: 0px;border-radius: 4px 0 0 4px;">
            <option selected="">Tất Cả</option>
            <option value="1">option 01</option>
            <option value="2">option 02</option>
            <option value="3">option 03</option>
            <option value="4">option 04</option>
            <option value="5">option 05</option>
          </select>
        </div>

        <div class="menu-center text-center" style="width: 369.8px; height: 45px;">
          <input type="text" placeholder="Search" class="w-100 h-100"
            style="border: 1px solid #e2e2e2;
                background-color: #fff;
                color: #000;
                border-radius: 0;
                padding-left: 18px;
                font-size: 15px;">
        </div>

        <div class="menu-right text-end flex-grow-1" style="height: 45px; ">
          <button type="button" class="btn btn-primary w-100 h-100 d-flex justify-content-center align-items-center" style="border-radius: 0 4px 4px 0;">
            <i class="fa-solid fa-magnifying-glass"></i>
          </button>
        </div>

      </div>
      <div class="header-cart" style="width: 476px; height: 45px; display: flex;">
        <div style="width: 181px; background-color: #fff; display: flex; align-items: center; justify-content: space-between; padding: 0 8px;">
          <i class="fa fa-phone" style="height: 30px;
    width: 65px;
    font-size: 20px;
    background-color: #fff;
    color: #333;
    border: 8px solid #eee;
    border-radius: 50%;
    display: flex
;
    align-items: center;
    justify-content: center;"></i>
          <h3 style="margin: 0;font-size: 14px;margin: 0 31px;color: #888;">Hotline: <span>0362540033</span></h3>
        </div>

        <div style="flex: 1; background-color: #fff; display: flex; justify-content: space-around; align-items: center; padding: 0px;">
          <a href="../trangdangnhap.php" style="text-decoration: none; color: #333; display: flex; flex-direction: column; align-items: center;">
            <i class="fa fa-sign-in" style="font-size: 20px;"></i>
            <span>Đăng nhập</span>
          </a>

          <a href="../trangdangky.php" style="text-decoration: none; color: #333; display: flex; flex-direction: column; align-items: center;">
            <i class="fa fa-user-plus" style="font-size: 20px;"></i>
            <span>Đăng ký</span>
          </a>

          <!-- Liên kết giỏ hàng -->
                 <div class="cart-wrapper">
  <a href="./giohang.php" style="text-decoration: none; color: #333; position: relative;">
    <i class="fa fa-shopping-cart" style="font-size: 20px;"></i> 
    <span style="text-decoration: none;">Giỏ hàng</span>

    <?php

  
    // Đếm số sản phẩm trong giỏ
    $totalItems = 0;
    if (isset($_SESSION['cart'])) {
      foreach ($_SESSION['cart'] as $item) {
        $totalItems += $item['quantity'];
      }
    }
    ?>

    <!-- Hiển thị số lượng sản phẩm -->
    <?php if ($totalItems > 0): ?>
      <span class="cart-count"><?php echo $totalItems; ?></span>
    <?php endif; ?>
  </a>
</div>




            <!-- Popup giỏ hàng -->
            <div class="cart-popup">
              <!-- Phần 1: Số lượng sản phẩm -->
              <div class="cart-count">Bạn đã chọn <span id="cart-count">0</span> sản phẩm</div>

              <!-- Phần 2: Thông tin sản phẩm -->
              <div class="cart-items" id="cart-items">
                <!-- Sản phẩm sẽ được render ở đây -->
              </div>

              <!-- Phần 3: Tổng tiền -->
              <div class="cart-total">Tổng thành tiền: <span id="cart-total">0₫</span></div>
            </div>
          </div>
        </div>
      </div>

  </header>
  <main>
    <div class="row-container">
      <div class="box box1">
        <div class="menu-row">
          <i class="fa fa-bars" style="font-size: 25px;"></i>
          <p style="margin-top: 14px;">
            Tất cả các thư mục
          </p>
        </div>
      </div>

      <div class="box box2">
        <div class="custom-button-group">
          <a href="../trangchu.php" class="custom-button">TRANG CHỦ</a>
          <a href="../Dochocho/thucanchodog.php" class="custom-button">MUA ĐỒ CHO CHÓ</a>
          <a href="../Dochomeo/thucanchomeo.php" class="custom-button">MUA ĐỒ CHO MÈO</a>
          <a href="../gioithieu.php" class="custom-button">GIỚI THIỆU</a>
          <a href="../lienhe.php" class="custom-button">LIÊN HỆ</a>
        </div>
      </div>
      <div class="box box3">
        <div class="social-icons">
          <h5>
            Follow Us:
          </h5>
         <a href="https://www.facebook.com/"><i class="fa-brands fa-facebook" style="color: #0d6efd;"></i></a> 
         <a href="https://skype.vi.softonic.com/"><i class="fa-brands fa-skype" style="width: 25px;
    height: 22px;
    border-radius: 50%;
    background-color: #00AFF0;
    display: flex
; 
    align-items: center; 
    justify-content: center;
    color: white;
    font-size: 16px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    transition: background-color 0.3s ease;"></i></a> 
           <a href="https://www.instagram.com/accounts/login/"><i class="fa-brands fa-instagram" style="width: 22px;
    height: 23px;
    border-radius: 44%;
  background: linear-gradient(45deg, #405DE6, #5851DB, #833AB4, #C13584, #E1306C, #FD1D1D, #F56040, #F77737, #FCAF45, #FFDC80);"></i></a> 
          <a href="https://www.youtube.com/"><i class="fa-brands fa-youtube" style="color: red;"></i></a> 
        </div>
      </div>
    </div>

  </main>

  <div class="cart-container">
    <!-- Bên trái: Sản phẩm -->
    <div class="product-section">
      <?php if (!empty($_SESSION['cart'])): ?>
        <?php foreach ($_SESSION['cart'] as $id => $item):
          $subtotal = $item['price'] * $item['quantity'];
          $totalQuantity += $item['quantity'];
          $totalPrice += $subtotal;
        ?>
          <div class="product-card">
            <img src="../img/<?php echo $item['image']; ?>" alt="<?php echo $item['name']; ?>">

            <div class="product-info">
              <h4><?php echo $item['name']; ?></h4>
              <p>
                <?php echo isset($item['description']) ? $item['description'] : 'Không có mô tả'; ?>
              </p>

              <p><strong>Giá: <?php echo number_format($item['price']); ?>₫</strong></p>

              <div class="product-actions">
                <button class="quantity-btn" onclick="updateCart(<?php echo $id; ?>, 'decrease')">−</button>
                <span id="qty-<?php echo $id; ?>"><?php echo $item['quantity']; ?></span>
                <button class="quantity-btn" onclick="updateCart(<?php echo $id; ?>, 'increase')">+</button>
                <button onclick="removeItem(<?php echo $id; ?>)" class="btn btn-danger btn-sm">
                  Xóa
                </button>
                <button onclick="continueShopping()" class="btn btn-success btn-sm">Tiếp tục mua hàng</button>



              </div>
            </div>
          </div>
        <?php endforeach; ?>
      <?php else: ?>
        <p>Giỏ hàng của bạn đang trống 🐾</p>
        <button onclick="continueShopping()" class="btn btn-success btn-sm">Tiếp tục mua hàng</button>
      <?php endif; ?>
    </div>


    <!-- Bên phải: Thông tin đơn hàng -->
    <div class="order-summary">
      <h3>Thông tin đơn hàng</h3>
      <div class="summary-item">Tổng sản phẩm: <?php echo $totalQuantity; ?></div>
      <div class="summary-item">Tổng tiền: <strong><?php echo number_format($totalPrice); ?>₫</strong></div>
      <button class="checkout-btn">Thanh toán</button>
    </div>
  </div>
  <script>
    function updateCart(productId, action) {
      fetch('cart-process.php', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
          },
          body: `action=${action}&id=${productId}`
        })
        .then(response => response.text())
        .then(data => {
          // Sau khi cập nhật, reload lại giỏ hàng hoặc cập nhật số lượng ngay
          location.reload(); // hoặc dùng JS để cập nhật từng phần không cần reload
        })
        .catch(error => {
          console.error('Lỗi cập nhật:', error);
        });
    }

    function removeItem(productId) {
      fetch('cart-process.php', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
          },
          body: `action=remove&id=${productId}`
        })
        .then(response => response.text())
        .then(data => {
          // Reload lại trang sau khi xóa
          location.reload();
        })
        .catch(error => {
          console.error('Lỗi khi xóa sản phẩm:', error);
        });
    }

    function continueShopping() {
      window.location.href = "../trangchu.php"; // hoặc link tới danh sách sản phẩm
    }
    window.addEventListener("DOMContentLoaded", function() {
      const text = document.getElementById("marquee-text");
      let position = -text.offsetWidth;

      function animate() {
        position += 2;
        text.style.left = position + "px";

        if (position > window.innerWidth) {
          position = -text.offsetWidth;
        }

        requestAnimationFrame(animate);
      }

      animate();
    });
  </script>

</body>

</html>