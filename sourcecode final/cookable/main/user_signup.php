<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>COOKABLE - USER - Đăng ký</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="../css/user.css">
    <link rel="stylesheet" href="../css/chatbot.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,1,0" />
    <link rel="shortcut icon" type="image/jpg" href="../imgs/icon.jpg"/>
    <script src="../js/chatbot.js" defer></script>
</head>
<body>

<nav class="header navbar navbar-expand-sm bg-dark navbar-dark navbar-inverse">
        <div class="container-fluid">
            <div class="logo0 col-1  ">
                <a class="navbar-brand fa-solid fa-truck-fast" href="user.php"></a>
            </div>
            <div class="logo1 col-7 pa-y-2 " > 
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-left" id="collapsibleNavbar">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link " href="../index.php">Trang chủ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../mainphu/sanpham.php">Sản phẩm</a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link " href="blog.php">Blog</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="lienhe.php">Liên hệ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="calo.php">Tính Calo</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled active" href="congthuc.php">Công thức nấu ăn</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="logo2 col-1">
                <a class="navbar-brand fa-solid fa-user " href="user.php"></a>
                <a class="navbar-brand fa-solid fa-cart-shopping" href="../mainphu/pages/main/giohang.php"></a>
            </div>
        </div>
    </nav>
    
     <!--banner-->
     <div class="banner container-fluid">
        <div class="col-xxl-7 box-left">
            <h2>
                <span>USER - QUÊN MẬT KHẨU</span>
            </h2>
            <p>Bỗng nhiên bạn nhớ lại mật khẩu đã quên!</p>
            <p>Bạn không cần đổi mật khẩu nữa!</p>
            <p>Hãy đăng nhập ngay!</p>
        <a href="../mainphu/pages/main/dangnhap.php">
            <button> Đăng nhập </button>   
        </a>
        </div>
        <div class="col-xl-5 box-right">
            <img src="https://github.com/hqteamobi/web_shop_ban_hang/blob/main/assets/img_1.png?raw=true" alt="">
            <img src="https://github.com/hqteamobi/web_shop_ban_hang/blob/main/assets/img_2.png?raw=true" alt="">
            <img src="https://github.com/hqteamobi/web_shop_ban_hang/blob/main/assets/img_3.png?raw=true" alt="">
        </div>
        <div class="to-bottom">
            <a href="banner.php">
                <img src="https://github.com/hqteamobi/web_shop_ban_hang/blob/main/assets/to_bottom.png?raw=true" alt="">
            </a>
        </div>
    </div>

    <!--users-->
    <div class="users container-fluid">    
        <div class="container bg-white">
        <div class="row">
            <h2>ĐĂNG KÝ TÀI KHOẢN COOKABLE</h2>
        </div>
        <div class="row">
            <div class="user-form">
                <form action="">
                    <label for="name">Họ và tên</label>
                    <input type="text" id="name" name="name" placeholder="Nhập họ và tên...">                    
                    
                    <label for="year">Năm sinh</label>
                    <input type="number" id="year" name="year" placeholder="Nhập năm sinh..." min="1900" max="2024">

                    <label for="username">Tên người dùng</label>
                    <input type="text" id="username" name="username" required placeholder="Nhập tên người dùng...">
            
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" required placeholder="Nhập email...">
            
                    <label for="password">Mật khẩu</label>
                    <input type="password" id="password" name="password" required placeholder="Nhập mật khẩu...">
            
                    <label for="confirm-password">Xác nhận mật khẩu</label>
                    <input type="password" id="confirm-password" name="confirm-password" required placeholder="Nhập mật khẩu lần nữa...">

                    <input type="submit" value="Đăng ký">
                </form>
            </div><br>            
            
            <!--dang nhap-->
            <h3>Bạn đã có tài khoản?</h3>
            <a href="../mainphu/pages/main/dangnhap.php">
                <button> Đăng nhập </button>  
            </a>
        </div>
        <div class="row">
            <h2>   </h2>
        </div>
    </div>
</div>  

<!--footer-->
<div class="footer container-fluid" style="background: rgba(0, 0, 0, 0.79); padding: 20px;">
    <div class="row">
        <div class="col-5"  >
            <h3>NỘI DUNG</h3>
            <div class="menu list-group-flush">
                <a href="../index.php" class="list-group-item list-group-item-action">Trang chủ</a>
                <a href="../mainphu/sanpham.php" class="list-group-item list-group-item-action">Sản phẩm</a>
                <a href="blog.php" class="list-group-item list-group-item-action">Blog</a>
                <a href="lienhe.php" class="list-group-item list-group-item-action">Liên hệ</a>
                <a href="calo.php" class="list-group-item list-group-item-action">Tính calo</a>
                <a href="congthuc.php" class="list-group-item list-group-item-action">Công thức nấu ăn</a>
            </div>
        </div> 
        <div class="col-7" >
        <h3>LIÊN HỆ</h3>
        <form action="">
            <input class="border-none" type="text" placeholder="Địa chỉ email"  style="background: transparent; cursor: text;">
            <button class="border-none">Nhận tin</button>
        </form>
        </div>
        <div class="logo">
            <img src="assets/logo.png" alt="">
        </div>
        <p class="text-secondary ">Cung cấp sản phẩm với chất lượng an toàn cho quý khách</p>
    </div>
</div>

    <!-- Thêm vào cuối tệp index.html -->
    <button class="chatbot-toggler">
        <span class="material-symbols-rounded">mode_comment</span>
        <span class="material-symbols-outlined">close</span>
      </button>
      <div class="chatbot">
        <header>
          <h2 style="color:aliceblue; margin-top: 4px; margin-bottom: 8px">ChatBot</h2>
          <span class="close-btn material-symbols-outlined">close</span>
        </header>
        <ul class="chatbox">
          <li class="chat incoming">
            <span class="material-symbols-outlined">smart_toy</span>
            <p>Xin chào,<br>Bạn cần gì?</p>
          </li>
        </ul>
        <div class="chat-input">
          <textarea placeholder="Nhập..." spellcheck="false" required></textarea>
          <span id="send-btn" class="material-symbols-rounded">send</span>
        </div>
      </div>

</body>
</html>
