<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>Header Demo</title>
  <link rel="stylesheet" href="../phuong.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
  <script src="../phuong.js"></script>
</head>

<body>
  <div class="topbar">
    <p id="marquee-text">Chào mừng bạn đến trang web mua bán thức ăn cho thú cưng</p>
  </div>
  <header class="container-fluid bg-white border-bottom py-0" style="height: 103px;">

    <div class="d-flex justify-content-between align-items-center h-100 px-0 mx-auto" style="max-width: 1252px;">
      <div class="header-logo" style="width: 117px; height: 102px;">
        <a href="../trangchu.php"><img src="../img/z6767529775595_281d56e30363396ee98c37b9c5a3b182.jpg" alt="Logo" class="img-fit"></a>
      </div>

      <div class="header-menu d-flex align-items-center" style="width: 550px;height: 45px;">
        <div class="menu-left" style="width: 113.2px; height: 45px;">
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
          <?php session_start(); ?>
          <div style="display: flex; gap: 20px; align-items: center;">
            <?php if (isset($_SESSION['username'])): ?>
              <!-- Hiển thị tên người dùng -->
              <a href="#" style="text-decoration: none; color: #0d6efd; display: flex; flex-direction: column; align-items: center;">
                <i class="fa fa-user" style="font-size: 20px;"></i>
                <span><?php echo htmlspecialchars($_SESSION['username']); ?></span>
              </a>

              <!-- Nút đăng xuất -->
              <a href="../Database/dangxuat.php" style="text-decoration: none; color: #c00; display: flex; flex-direction: column; align-items: center;margin: 0 3px;">
                <i class="fa fa-sign-out" style="font-size: 20px;"></i>
                <span>Đăng xuất</span>
              </a>
            <?php else: ?>
              <!-- Nút đăng nhập mặc định -->
              <a href="../trangdangnhap.php" style="text-decoration: none; color: #333; display: flex; flex-direction: column; align-items: center;margin: 0px -15px">
                <i class="fa fa-sign-in" style="font-size: 20px;"></i>
                <span>Đăng nhập</span>
              </a>
            <?php endif; ?>
          </div>

          <a href="../trangdangky.php" style="text-decoration: none; color: #333; display: flex; flex-direction: row; align-items: center; gap: 8px; padding: 0 24px;">
            <i class="fa fa-user-plus" style="font-size: 20px;"></i>
            <span>Đăng ký</span>
          </a>

          <!-- Liên kết giỏ hàng -->
          <div class="cart-wrapper">
            <a href="./giohanglon/giohang.php" style="text-decoration: none; color: #333; position: relative;">
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
        <div class="dropdown-menu">
          <div class="item">
            MUA ĐỒ CHO MÈO
            <div class="sub-list">
              <a href="./Dochomeo/thucanchomeo.php" class="sub-item" style="text-decoration: none;">Thức ăn & dinh dưỡng cho Mèo</a>
              <a href="./Dochomeo/phukienmeo.php" class="sub-item" style="text-decoration: none;">Phụ kiện & đồ chơi cho Mèo</a>
            </div>
          </div>
          <div class="item">
            MUA ĐÒ CHO CHÓ
            <div class="sub-list">
              <a href="../Dochocho/thucanchodog.php" class="sub-item" style="text-decoration: none;">Thức ăn & dinh dưỡng cho Chó</a>
              <a href="../Dochomeo/phukienmeo.phps" class="sub-item" style="text-decoration: none;">Phụ kiện & đồ chơi cho Chó</a>
            </div>
          </div>

          <div class="item">
            <a href="../gioithieu.php" style="text-decoration: none;color:#000">GIỚI THIỆU</a>

          </div>
          <div class="item">
            <a href="" style="text-decoration: none; color:#000">LIÊN HỆ</a>

          </div>
        </div>
      </div>

      <div class="box box2">
        <div class="custom-button-group">
          <a href="../trangchu.php" class="custom-button">TRANG CHỦ</a>
          <a href="../Dochocho/thucanchodog.php" class="custom-button">MUA ĐỒ CHO CHÓ</a>
          <a href="./Dochomeo/thucanchomeo.php" class="custom-button">MUA ĐỒ CHO MÈO</a>
          <a href="./gioithieu.php" class="custom-button">GIỚI THIỆU</a>
          <a href="./lienhe.php" class="custom-button" style="color: aliceblue;
                    background: blue;">LIÊN HỆ</a>
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
    <div class="breadcrumb">

      <?php
      $pageName = basename($_SERVER['PHP_SELF']); // lấy tên file hiện tại
      $pageTitle = '';

      switch ($pageName) {
        case 'trangchu.php':
          $pageTitle = 'Trang chủ';
          break;
        case 'thucanchomeo.php':
          $pageTitle = 'Thức ăn cho mèo';
          break;
        case 'thucanchodog.php':
          $pageTitle = 'Thức Ăn Cho Chó';
          break;
        case 'phukien.php':
          $pageTitle = 'Phụ kiện & đồ chơi cho chó';
        case 'lienhe.php':
          $pageTitle = 'Trang Liên Hệ';
          // Thêm các trang khác nếu cần

      }

      echo '<div class="breadcrumb">';
      echo '<a href="../trangchu.php">Trang chủ</a> / ';
      echo '<a href="#">' . $pageTitle . '</a>';
      echo '</div>';
      ?>

      </a>
    </div>

    <section id="map" style="text-align:center; margin: 16px 204px;">
  <h2>📍 Vị trí cửa hàng</h2>
  <iframe
    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.6444927321824!2d106.554654!3d10.762712!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3174da7d122f537f%3A0xe3b5cfe15ad9b2c8!2zMTJBIFBo4bqhbSBWxINuIENvw6BpLCBD4bunIENoacOqLCBUUC5Iw4BOQywgVmnhu4d0IE5hbQ!5e0!3m2!1svi!2s!4v1682237211572!5m2!1svi!2s"
    width="100%"
    height="450"
    style="border:0; border-radius: 10px;"
    allowfullscreen=""
    loading="lazy"
    referrerpolicy="no-referrer-when-downgrade">
  </iframe>
  <div class="contact-wrapper">
  <div class="contact-column">
    <h1>📞 Thông tin liên hệ</h1>
    <p><strong>Địa chỉ:</strong> 12A Phạm Văn Cội, Củ Chi, TP.HCM</p>
    <p><strong>Email:</strong> contact@petyummy.vn</p>
    <p><strong>Điện thoại:</strong> 0938 123 456</p>
    <p><strong>Thời gian làm việc:</strong> 8:00 - 20:00 (Thứ 2 - Chủ Nhật)</p>
  </div>

  <div class="contact-column">
    <h1>💌 Gửi thắc mắc cho chúng tôi</h1>
    <form method="POST" action="submit_form.php">
  <input type="text" name="ten" placeholder="Tên của bạn" class="input-full" required><br><br>
  <div class="input-row">
    <input type="email" name="email" placeholder="Email của bạn" required>
    <input type="tel" name="sdt" placeholder="Số điện thoại của bạn" required>
  </div><br>
  <textarea name="noi_dung" placeholder="Nội dung thắc mắc của bạn" rows="5" class="input-full" required></textarea><br><br>
  <button type="submit">Gửi ngay cho chúng tôi</button>
</form>

  </div>
</div>

</section>
 <hr style="width: 100%; height: 2px; background-color: #ccc; border: none;">
  <footer class="footer">
  <div class="footer-column">
    <h1>Thông tin liên hệ</h1>
    <p>Trang mua sắm trực tuyến các sản phẩm bán lẻ dành cho thú cưng của Mozzi Pet Shop.<br>
    Cửa hàng PETYUMY.</p>
  </div>

  <div class="footer-column">
    <h1>Thông tin cửa hàng</h1>
    <p>Địa chỉ: Thành Phố Hồ Chí Minh</p>
    <p>Số điện thoại: 036 254 0033</p>
  </div>

  <div class="footer-column">
    <h1>Danh mục</h1>
    <ul>
      <li><a href="./lienhe.php">Liên hệ</a></li>
      <li><a href="./gioithieu.php">Giới thiệu</a></li>
    </ul>
  </div>

  <div class="footer-column">
    <h1>Chăm sóc khách hàng</h1>
    <p>📞 0362540033 - <a href="mailto:info@yume@.vn">info@yume@.vn</a></p>
    <p>Follow Us:</p>
    <div class="social-icons">
      <a href="#" class="icon"><i class="fab fa-facebook-f"></i></a>
  <a href="#" class="icon"><i class="fab fa-instagram"></i></a>
  <a href="#" class="icon"><i class="fas fa-store"></i></a> <!-- Lazada dùng icon store -->
  <a href="#" class="icon"><i class="fab fa-tiktok"></i></a>
  <a href="#" class="icon"><i class="fas fa-shopping-bag"></i></a> <!-- Shopee dùng shopping bag -->
    </div>
  </div>
</footer>
 
 <div class="footer-bar">
  <span>Copyright © PetYUMY Shop.</span>
  <span>Powered by NGUYEN TRAN PHUONG.</span>
</div>

</body>

</html>