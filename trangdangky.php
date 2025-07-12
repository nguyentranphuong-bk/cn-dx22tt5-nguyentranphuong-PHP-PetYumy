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
                    <a href="./trangdangnhap.php" style="text-decoration: none; color: #333; display: flex; flex-direction: column; align-items: center;">
                        <i class="fa fa-sign-in" style="font-size: 20px;"></i>
                        <span>Đăng nhập</span>
                    </a>

                    <a href="./trangdangky.php" style="text-decoration: none; color: #0d6efd; display: flex; flex-direction: column; align-items: center;">
                        <i class="fa fa-user-plus" style="font-size: 20px;"></i>
                        <span>Đăng ký</span>
                    </a>

                    <!-- Liên kết giỏ hàng -->
                    <div class="cart-wrapper">
                        <a href="./giohanglon/giohang.php" style="text-decoration: none; color: #333;">
                            <i class="fa fa-shopping-cart" style="font-size: 20px;"></i>
                            <span style="text-decoration: none;">Giỏ hàng</span>
                        </a>


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
              <a href="" class="sub-item" style="text-decoration: none;">Thức ăn & dinh dưỡng cho Mèo</a>
              <a href="" class="sub-item" style="text-decoration: none;">Phụ kiện & đồ chơi cho Mèo</a>
            </div>
          </div>
          <div class="item"> 
            MUA ĐÒ CHO CHÓ 
            <div class="sub-list">
              <a href="" class="sub-item" style="text-decoration: none;">Thức ăn & dinh dưỡng cho Chó</a>
              <a href="" class="sub-item" style="text-decoration: none;">Phụ kiện & đồ chơi cho Chó</a>
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
                    <a href="./trangchu.php" class="custom-button">TRANG CHỦ</a>
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


        <div class="register-card">
  <h3 class="mb-4 text-center">Đăng ký</h3>
  <form id="registerForm" method="POST" action="./Database/ketnoidangki.php" onsubmit="return validateForm()">
  <div class="mb-3">
    <label for="fullname" class="form-label" >Họ và tên</label>
    <input type="text" class="form-control" id="ho_va_ten" name="ho_va_ten" required>
  </div>
  <div class="mb-3">
    <label for="username" class="form-label">Tên đăng nhập</label>
    <input type="text" class="form-control" id="username" name="username" required>
  </div>
  <div class="mb-3">
    <label for="email" class="form-label">Email</label>
    <input type="email" class="form-control" id="email" name="email" required>
  </div>
  <div class="mb-3">
    <label for="password" class="form-label">Mật khẩu</label>
    <input type="password" class="form-control" id="password" name="password" required>
  </div>
  <div class="mb-3">
    <label for="confirmPassword" class="form-label">Nhập lại mật khẩu</label>
    <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" required>
  </div>
  <div class="mb-3">
    <label for="address" class="form-label">Địa chỉ</label>
    <input type="text" class="form-control" id="address" name="address" required>
  </div>
  <div class="mb-3">
    <label for="phone" class="form-label">Số điện thoại</label>
    <input type="text" class="form-control" id="phone" name="phone" required>
  </div>
  <button type="submit" class="btn btn-primary w-100">Đăng ký</button>
</form>

  <div class="feather-effect" id="featherContainer"></div>
</div>

    </main>
    
</body>

</html>