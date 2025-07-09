<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>Header Demo</title>
  <link rel="stylesheet" href="./phuong.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
  <script src="./phuong.js"></script>
</head>

<body>
  <div class="topbar">
    <p id="marquee-text">Chào mừng bạn đến trang web mua bán thức ăn cho thú cưng</p>
  </div>
  <header class="container-fluid bg-white border-bottom py-0" style="height: 103px;">

    <div class="d-flex justify-content-between align-items-center h-100 px-0 mx-auto" style="max-width: 1252px;">
      <div class="header-logo" style="width: 117px; height: 102px;">
        <a href="./trangchu.php"><img src="./img/z6767529775595_281d56e30363396ee98c37b9c5a3b182.jpg" alt="Logo" class="img-fit"></a>
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

          <?php session_start(); ?>
          <div style="display: flex; gap: 20px; align-items: center;">
            <?php if (isset($_SESSION['username'])): ?>
              <!-- Hiển thị tên người dùng -->
              <a href="#" style="text-decoration: none; color: #0d6efd; display: flex; flex-direction: column; align-items: center;">
                <i class="fa fa-user" style="font-size: 20px;"></i>
                <span><?php echo htmlspecialchars($_SESSION['username']); ?></span>
              </a>

              <!-- Nút đăng xuất -->
              <a href="./Database/dangxuat.php" style="text-decoration: none; color: #c00; display: flex; flex-direction: column; align-items: center;margin: 0 3px;">
                <i class="fa fa-sign-out" style="font-size: 20px;"></i>
                <span>Đăng xuất</span>
              </a>
            <?php else: ?>
              <!-- Nút đăng nhập mặc định -->
              <a href="./trangdangnhap.php" style="text-decoration: none; color: #333; display: flex; flex-direction: column; align-items: center;margin: 0px -15px">
                <i class="fa fa-sign-in" style="font-size: 20px;"></i>
                <span>Đăng nhập</span>
              </a>
            <?php endif; ?>
          </div>

          <a href="./trangdangky.php" style="text-decoration: none; color: #333; display: flex; flex-direction: row; align-items: center; gap: 8px; padding: 0 24px;">
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
          <p style="margin-top: 14px;">Tất cả các thư mục <i class="fa fa-chevron-down arrow-icon" style="font-size: 16px;"></i>
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
              <a href="./Dochocho/thucanchodog.php" class="sub-item" style="text-decoration: none;">Thức ăn & dinh dưỡng cho Chó</a>
              <a href="./Dochocho/phukien.php" class="sub-item" style="text-decoration: none;">Phụ kiện & đồ chơi cho Chó</a>
            </div>
          </div>

          <div class="item">
            <a href="" style="text-decoration: none;color:#000" >GIỚI THIỆU</a>
            
          </div>
          <div class="item">
             <a href="" style="text-decoration: none; color:#000" >LIÊN HỆ</a>
           
          </div>
        </div>

      </div>
      <div class="box box2">
        <div class="custom-button-group">
          <a href="./trangchu.php" class="custom-button" style="color: aliceblue;
            background: blue;">TRANG CHỦ</a>
          <a href="./Dochocho/thucanchodog.php" class="custom-button">MUA ĐỒ CHO CHÓ</a>
          <a href="./Dochomeo/thucanchomeo.php" class="custom-button">MUA ĐỒ CHO MÈO</a>
          <a href="#" class="custom-button">GIỚI THIỆU</a>
          <a href="#" class="custom-button">LIÊN HỆ</a>
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




    </div>
    <hr style="width: 100%; height: 2px; background-color: #ccc; border: none;">

    <!-- Nội dung chính -->
    <div class="container" style="margin: 11px 160px;">
      <div class="left-box">
        <div class="slideshow">
          <img src="./img/hình thức ăn silde.jpg" class="slide active">
          <img src="./img/hình thức ăn silde 2.jpg" class="slide">
          <img src="./img/hình thức ăn silde 1.jpg" class="slide">
          <img src="./img/hình thức ăn side 3.jpg" class="slide">
        </div>
      </div>

      <div class="right-column">
        <div class="top-box">
          <div class="top-box">
            <p class="overlay-text" style="color: red; font-size:24px ;font-family: 'Poppins', sans-serif;
            font-style: italic;">Khuyến mãi!</p>
          </div>

        </div>

        <div class="bottom-box">
          <h1 style="color: whitesmoke;padding: 0px 26px;">Sản phẩm nổi bật</h1>
          <p style="color: whitesmoke;">Đây là mô tả ngắn gọn về sản phẩm, chất lượng tuyệt vời và giá cả hợp lý.</p>
          <button class="btn btn-light" style="font-size: 28px;" onclick="window.location.href='./trangchu.php'">Mua ngay</button>
        </div>

      </div>
    </div>
    <h1 class="fancy-heading" id="shake-heading">Sản Phẩm Mới</h1>
    <?php
    $conn = new mysqli("localhost", "root", "", "thongtinsanpham");
    if ($conn->connect_error) {
      die("Kết nối thất bại: " . $conn->connect_error);
    }
    $sql = "SELECT * FROM pet_food_products LIMIT 16";
    $result = $conn->query($sql);
    ?>
    <div class="product-list">
      <?php while ($row = $result->fetch_assoc()): ?>
        <div class="product-item">
          <img src="img/<?php echo $row['image']; ?>" alt="Ảnh sản phẩm">
          <p><?php echo htmlspecialchars($row['description']); ?></p>
          <div class="price-cart">
            <span style="font-size: 19px;
    font-weight: bold;"><?php echo number_format($row['price']); ?>₫</span>
            <a href="giohanglon/add-to-cart.php?id=<?php echo $row['id']; ?>" class="buy-button">Mua ngay</a>

            </a>
          </div>
        </div>
      <?php endwhile; ?>
    </div>
    <?php $conn->close(); ?>


  </main>
  <hr style="width: 100%; height: 2px; background-color: #ccc; border: none;">

  <footer>
    <div id="contact" class="container-fluid bg-grey" style="padding: 3px 11pc;">
      <h2 class="text-center">CONTACT</h2>
      <div class="row">
        <div class="col-sm-5">
          <p>Contact us and we'll get back to you within 24 hours.</p>
          <p><span class="glyphicon glyphicon-map-marker"></span> Chicago, US</p>
          <p><span class="glyphicon glyphicon-phone"></span> +00 1515151515</p>
          <p><span class="glyphicon glyphicon-envelope"></span> myemail@something.com</p>
        </div>
        <div class="col-sm-7">
          <div class="row">
            <div class="col-sm-6 form-group">
              <input class="form-control" id="name" name="name" placeholder="Name" type="text" required>
            </div>
            <div class="col-sm-6 form-group">
              <input class="form-control" id="email" name="email" placeholder="Email" type="email" required>
            </div>
          </div>
          <textarea class="form-control" id="comments" name="comments" placeholder="Comment" rows="5"></textarea><br>
          <div class="row">
            <div class="col-sm-12 form-group">
              <button class="btn btn-default pull-right" type="submit">Send</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <script>
    window.onload = () => {
      const heading = document.getElementById("shake-heading");
      let direction = 1;

      setInterval(() => {
        // Lắc qua lại 12px
        heading.style.transform = `translateX(${direction * 12}px)`;
        direction *= -1;
      }, 200); // mỗi 200ms đổi hướng
    };
  </script>


</body>

</html>