<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>COOKABLE - Công thức</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="../css/chien.css">
    <link rel="stylesheet" href="../css/chatbot.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,1,0" />
    <link rel="shortcut icon" type="image/jpg" href="../imgs/icon.jpg"/>
    <script src="../js/chatbot.js" defer></script>
</head>

<body>
    

  
   <!--header-->
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
                <span>CÔNG THỨC - CHIÊN</span>
            </h2>
            <p>Nơi sẻ chia công thức và kinh nghiệm tâm đắc của bạn</p>
            <p>Học hỏi các bí quyết tuyệt vời của người khác</p>
            <a href="blog.php">
            <button> Đăng bài </button>
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

<!-- top -->
       
             <h1>Món chiên</h1>
                
        <!-- end top -->

          <!-- Container -->
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <img src="https://i.ytimg.com/vi/1tjlL643E0M/maxresdefault.jpg" class="card-img-top" alt="Cánh gà sốt me cay">
                <div class="card-body">
                    <h5 class="card-title">Cánh gà sốt me cay</h5>
                    <p class="card-text"> Thịt gà được ướp với nước sốt me cay từ quả me chua chua, ngọt ngọt kết hợp cùng với các gia vị tự nhiên như ớt, tỏi, ớt hiểm, tiêu... tạo ra một hương vị đặc trưng không thể cưỡng lại.</p>
                    <a href="CanhGaSotMeCay.php" class="btn btn-primary">View Recipe</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <img src="https://dauhomemade.vn/apps/uploads/2018/09/B%C3%A1nh-t%C3%B4m-h%E1%BB%93-T%C3%A2y-68000-4096x2731.jpg" class="card-img-top" alt="Takoyaki">
                <div class="card-body">
                    <h5 class="card-title">Bánh tôm Hồ Tây</h5>
                    <p class="card-text">Bánh tôm Hồ Tây là một món ăn truyền thống phổ biến ở Hà Nội. Bánh được làm từ tôm xay nhuyễn, trộn với bột và gia vị, sau đó chiên giòn và thưởng thức với nước mắm chua ngọt.</p>
                    <a href="BanhTomHoTay.php" class="btn btn-primary">View Recipe</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <img src="https://gcs.tripi.vn/public-tripi/tripi-feed/img/473888KPU/nem-ca-lang-4.jpg" class="card-img-top" alt="Nem cá">
                <div class="card-body">
                    <h5 class="card-title">Nem cá</h5>
                    <p class="card-text">Nem cá là một món ăn ngon và bổ dưỡng. Nó được làm từ cá xay nhuyễn, pha trộn với gia vị và các loại rau sống, sau đó cuộn trong lá chuối và chiên giòn. Đây là một lựa chọn tuyệt vời cho bữa ăn nhẹ hoặc tiệc tối.
                    </p>
                    <a href="NemCa.php" class="btn btn-primary">View Recipe</a>
                </div>
            </div>
        </div>
    </div>
</div>


     <!--list bai viet de xuat-->
     <div class="blogs container-fluid">    
        <div class="container bg-white">
     <div class="row">
        <h2>NHỮNG CHIA SẺ HAY HO</h2>
    </div>
    <!-- Carousel -->
    <div id="blogcr" class="carousel slide" data-bs-ride="carousel">          
        <!--button-->
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#blogcr" data-bs-slide-to="0" class="active"></button>
          <button type="button" data-bs-target="#blogcr" data-bs-slide-to="1"></button>
          <button type="button" data-bs-target="#blogcr" data-bs-slide-to="2"></button>
        </div>
        
        <!--Slideshow-->
   
        <div class="carousel-inner">
          <div class="carousel-item active">
            <a href="blog_post.php">
            <img src="https://bcp.cdnchinhphu.vn/334894974524682240/2023/12/6/20200513165141155039rau-bina-la-rau-gi-max-1800x1800-17018491338671987365707.jpg" alt="Rau xanh tốt như thế nào?" class="d-block" style="width:100%">
            <div class="carou-cap">
                <h3>Rau xanh tốt như thế nào?</h3>
                <p>Không chỉ giàu chất xơ, rau xanh còn nhiều ưu điểm khác mà bạn chưa biết.</p>
            </div>
            </a>
          </div>
          <div class="carousel-item">
          <a href="blog_post.php">
            <img src="https://wallpapercave.com/wp/wp6557433.jpg" alt="Sự diệu kì của dâu tây" class="d-block" style="width:100%">
            <div class="carou-cap">
                <h3>Sự diệu kì của dâu tây</h3>
                <p>Dâu tây sẽ làm bạn bất ngờ về khả năng của nó.</p>
            </div>
            </a>
          </div>
          <div class="carousel-item">
          <a href="blog_post.php">
            <img src="https://justcook.butcherbox.com/wp-content/uploads/2020/03/dinner2.jpg" alt="Tự nấu ngon như ở nhà hàng!" class="d-block" style="width:100%">
            <div class="carou-cap">
                <h3>Tự nấu ngon như ở nhà hàng!<h3>
                <p>Bạn muốn ăn ngon nhưng không tốn quá nhiều tiền? Easy!!</p>
            </div>
            </a>
          </div>
        </div>
        
        <!--icon mũi tên-->
        <button class="carousel-control-prev" type="button" data-bs-target="#blogcr" data-bs-slide="prev">
          <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#blogcr" data-bs-slide="next">
          <span class="carousel-control-next-icon"></span>
        </button>
    </div>
    
</div>
</div>
<div class="post">
    <h2>BÀI VIẾT CỦA BẠN</h2>
    <div>
        <p>Bạn chưa có bài đăng nào cả!</p>
        
    </div>
</div>

     <!--footer-->
<div class="footer container-fluid" style="background: rgba(0, 0, 0, 0.79); padding-top: 20px;">
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
