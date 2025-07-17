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
          <select onchange="window.open(this.value, '_blank')" id="select1" class="w-100 h-100" style="font-size: 16px;
    padding-left: 15px;font-weight: bold;border: 1px solid #e2e2e2;
    border-right: 0px;border-radius: 4px 0 0 4px;">
            <option selected="">Tất Cả</option>
            <option value="./dochocho/thucanchodog.php">Mua đồ cho chó</option>
            <option value="./dochomeo/thucanchomeo.php">Mua đồ cho mèo</option>
            <option value="./dochocho/phukien.php">Phụ kiên & đồ chơi cho chó</option>
            <option value="./dochomeo/phukienmeo.php">Phụ kiên & đồ chơi cho mèo</option>
            <option value="./gioithieu.php">Giới thiệu</option>
            <option value="./lienhe.php">Liên hệ</option>
          </select>
        </div>

        <div class="menu-center text-center" style="width: 369.8px; height: 45px; position: relative;">
          <input type="text" placeholder="Search" class="w-100 h-100" id="searchBox"
            style="border: 1px solid #e2e2e2;
           background-color: #fff;
           color: #000;
           border-radius: 0;
           padding-left: 18px;
           font-size: 15px;">

          <div id="dropdown-list"
            style="display: none; 
              position: absolute; 
              top: 100%; 
              left: 0; 
              width: 100%; 
              background: #fff; 
              border: 1px solid #ccc; 
              border-radius: 4px; 
              max-height: 300px; 
              overflow-y: auto; 
              z-index: 99;">
          </div>
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
              <?php
              // ✅ Thêm nút quản trị nếu là admin
              if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin') {
                echo '<a href="Quantridoanhthu/admin_dashboard.php" style="text-decoration: none; color: #28a745; display: flex; flex-direction: column; align-items: center; margin: 0 3px;">';
                echo '<i class="fa fa-cogs" style="font-size: 20px;"></i>';
                echo '<span>Quản trị</span>';
                echo '</a>';
              }
              ?>
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
            <a href="./gioithieu.php" style="text-decoration: none;color:#000">GIỚI THIỆU</a>

          </div>
          <div class="item">
            <a href="./lienhe.php" style="text-decoration: none; color:#000">LIÊN HỆ</a>

          </div>
        </div>

      </div>
      <div class="box box2">
        <div class="custom-button-group">
          <a href="./trangchu.php" class="custom-button" style="color: aliceblue;
            background: blue;">TRANG CHỦ</a>
          <a href="./Dochocho/thucanchodog.php" class="custom-button">MUA ĐỒ CHO CHÓ</a>
          <a href="./Dochomeo/thucanchomeo.php" class="custom-button">MUA ĐỒ CHO MÈO</a>
          <a href="./gioithieu.php" class="custom-button">GIỚI THIỆU</a>
          <a href="./lienhe.php" class="custom-button">LIÊN HỆ</a>
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
    // xổ sản phẩm 
    document.addEventListener("DOMContentLoaded", function() {
      const input = document.querySelector('input[type="text"]');
      if (!input) return;

      input.addEventListener('input', async function() {
        const keyword = this.value.toLowerCase();
        let type = '';

        if (keyword.includes('chó') || keyword.includes('cho')) {
          type = 'dog';
        } else if (keyword.includes('mèo') || keyword.includes('meo')) {
          type = 'cat';
        } else {
          const dropdown = document.getElementById('dropdown-list');
          if (dropdown) dropdown.style.display = 'none';
          return;
        }

        const response = await fetch(`get_suggestions.php?type=${type}`);
        const products = await response.json();

        const dropdown = document.getElementById('dropdown-list');
        dropdown.innerHTML = products.map(p =>
          `<div onclick="window.location.href='thongtinchitietsp.php?id=${p.id}'"
           style="cursor: pointer; padding: 8px; border-bottom: 1px solid #eee; display: flex; align-items: center;">
         <img src="img/${p.image}" alt="${p.name}" style="width: 50px; height: 50px; margin-right: 10px;">
         <span>${p.name}</span>
       </div>`
        ).join('');
        dropdown.style.display = 'block';
      });
    });


    document.addEventListener("DOMContentLoaded", function() {
      const searchInput = document.getElementById("searchBox");
      const searchBtn = document.querySelector(".menu-right button");

      function handleSearch() {
        const keyword = searchInput.value.toLowerCase();

        if (keyword.includes("mèo") || keyword.includes("meo")) {
          window.location.href = "../dochomeo/thucanchomeo.php";
        } else if (keyword.includes("chó") || keyword.includes("cho")) {
          window.location.href = "../dochocho/thucanchodog.php";
        } else {
          alert("Không tìm thấy trang phù hợp với từ khoá!");
        }

      }

      // Khi nhấn nút kính lúp
      searchBtn.addEventListener("click", handleSearch);

      // Khi nhấn Enter trong ô input
      searchInput.addEventListener("keydown", function(event) {
        if (event.key === "Enter") {
          event.preventDefault(); // Ngăn trình duyệt gửi form (nếu có)
          handleSearch();
        }
      });
    });
  </script>


</body>

</html>