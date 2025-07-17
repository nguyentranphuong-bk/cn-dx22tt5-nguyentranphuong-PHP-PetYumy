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
                            <a href="./thucanchomeo.php" class="sub-item" style="text-decoration: none;">Thức ăn & dinh dưỡng cho Mèo</a>
                            <a href="./phukienmeo.php" class="sub-item" style="text-decoration: none;">Phụ kiện & đồ chơi cho Mèo</a>
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
                    <a href="./thucanchomeo.php" class="custom-button" style="color: aliceblue;
                    background: blue;">MUA ĐỒ CHO MÈO</a>
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
          case 'phukienmeo.php':
          $pageTitle = 'Phụ kiện & đồ chơi cho Mèo';
          // Thêm các trang khác nếu cần

      }

      echo '<div class="breadcrumb">';
      echo '<a href="../trangchu.php">Trang chủ</a> / ';
      echo '<a href="#">' . $pageTitle . '</a>';
      echo '</div>';
      ?>

      </a>
    </div>
    <div class="filter-bar">
      <div class="left-side">
        <p>Sản phẩm cho Mèo</p>
         <a href="./phukienmeo.php" style="color: red;
        text-decoration: none; font-size: 20px;" >Phụ kiện & đồ chơi cho Mèo</a>
      </div>

      <div class="right-side">
        <div class="sort-dropdown">
          <div class="sort-toggle">
            <i class="fa fa-sort-alpha-asc"></i> Sắp xếp
          </div>
          <div class="sort-options">
            <div class="option" onclick="applySort('new')">Mới nhất</div>
            <div class="option" onclick="applySort('asc')">Giá tăng dần</div>
            <div class="option" onclick="applySort('desc')">Giá giảm dần</div>
            <div class="option" onclick="applySort('hot')">Bán chạy nhất</div>
          </div>

        </div>
      </div>
    </div>
    <!-- đây là xổ sản phẩm -->
    <?php
    $conn = new mysqli("localhost", "root", "", "thongtinsanpham");
    if ($conn->connect_error) {
      die("Kết nối thất bại: " . $conn->connect_error);
    }
    $sort = isset($_GET['sort']) ? $_GET['sort'] : 'new';

    switch ($sort) {
      case 'asc':
        $orderBy = 'ORDER BY price ASC';
        break;
      case 'desc':
        $orderBy = 'ORDER BY price DESC';
        break;
      case 'hot':
        $orderBy = 'ORDER BY sales_count DESC'; // nếu có cột 'sales_count'
        break;
      default:
        $orderBy = 'ORDER BY id DESC'; // mặc định: mới nhất
    }

    $sql = "SELECT * FROM pet_food_products WHERE id >= 41 LIMIT 8";
    $result = $conn->query($sql);
    ?>
    <div class="product-list">
      <?php while ($row = $result->fetch_assoc()): ?>
        <div class="product-item">
          <img src="../img/<?php echo $row['image']; ?>" alt="Ảnh sản phẩm">
          <p><?php echo htmlspecialchars($row['description']); ?></p>
          <div class="price-cart">
            <span style="font-size: 19px;
            font-weight: bold;"><?php echo number_format($row['price']); ?>₫</span>
            <a href="../giohanglon/add-to-cart.php?id=<?php echo $row['id']; ?>" class="buy-button">Mua ngay</a>
            </a>
          </div>
        </div>
      <?php endwhile; ?>
    </div>
    <?php $conn->close(); ?>

    <script>
      const sortBox = document.querySelector('.sort-dropdown');
      const toggleBtn = document.querySelector('.sort-toggle');

      toggleBtn.addEventListener('click', () => {
        sortBox.classList.toggle('active');
      });

      document.addEventListener('click', function(e) {
        if (!sortBox.contains(e.target)) {
          sortBox.classList.remove('active');
        }
      });

      function applySort(type) {
        window.location.href = `?sort=${type}`;
      }
    </script>
  </main>
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
</body>

</html>