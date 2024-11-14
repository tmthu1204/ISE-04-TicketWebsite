<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>COOKABLE - LIÊN HỆ</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="../css/bstrap.css">
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
                <span>LIÊN HỆ</span>
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


    <!--blog-->
    <div class="blogs container-fluid">    
        <div class="container bg-white">
        <div class="row">
            <h2>LIÊN HỆ</h2>
        </div>
        <div class="row">
            <div class="contactus">
                <form action="/action_page.php" class="was-validated">
        
                    <label for="name" class="form-label">Họ và tên</label>
                    <input type="text" id="name" name="name" placeholder="Nhập họ và tên...">

                    <label for="mail" class="form-label">Email</label>
                    <input type="email" id="mail" name="mail" placeholder="Nhập email...">
             
                    <label for="phone" class="form-label">Số điện thoại</label>
                    <input type="phone" id="phone" name="phone" placeholder="Nhập số điện thoại...">
             
                    <label for="address" class="form-label">Địa chỉ</label>
                    <input type="text" id="address" name="address" placeholder="Nhập địa chỉ...">
        
                    <label for="comment" class="form-label">Nội dung</label>
                    <textarea id="comment" name="comment" rows="10" cols="50"></textarea> 
               
                    <input type="submit" value="Send">
                </form>
            </div>
        </div> 
        <div class="row">
            <h2>   </h2>
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
                  <a href="blog.php">
                    <img src="https://images.sbs.com.au/dims4/default/f49acbc/2147483647/strip/true/crop/2666x1500+0+0/resize/1280x720!/quality/90/?url=http%3A%2F%2Fsbs-au-brightspot.s3.amazonaws.com%2Ff3%2F77%2F052b387c4d7a97b9430548a7ef2b%2Frx49-recipe-rodneydunn-greensandcrabsalad-creditjiwonkim-tcus6-2.jpg" alt="Blog" class="d-block" style="width:100%">
                    <div class="carou-cap">
                        <h3>Bạn có một công thức ngon tuyệt?</h3>
                        <p>Hãy chia sẻ nó với nhiều người hơn nữa, COOKABLE sẽ giúp bạn làm điều đó!</p>
                    </div>
                    </a>
                  </div>
                  <div class="carousel-item">
                    <a href="../mainphu/sanpham.php"> <!--them link toi san pham-->
                    <img src="https://sushishop.com/wp-content/uploads/2019/06/home.jpg" alt="Sản phẩm" class="d-block" style="width:100%">
                    <div class="carou-cap">
                        <h3>Bạn đói, bạn muốn mua thức ăn?</h3>
                        <p>Chúng tôi có tất cả những gì bạn cần, dinh dưỡng và hấp dẫn, chỉ với một cú click!</p>
                    </div>
                    </a>
                  </div>
                  <div class="carousel-item">
                  <a href="congthuc.php">
                    <img src="https://images.sbs.com.au/dims4/default/c350cfa/2147483647/strip/true/crop/1500x844+0+65/resize/1280x720!/quality/90/?url=http%3A%2F%2Fsbs-au-brightspot.s3.amazonaws.com%2Fdrupal%2Ffood%2Fpublic%2Fchocotorta-chocolate-cake.jpg" alt="Công thức" class="d-block" style="width:100%">
                    <div class="carou-cap">
                        <h3>Bạn muốn tự mình vào bếp!<h3>
                        <p>COOKABLE có công thức miễn phí dành cho bạn, đa dạng và dễ hiểu, chỉ với một cú click!</p>
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
            <div class="row">
                <h2>CẢM ƠN SỰ ĐÓNG GÓP CỦA BẠN</h2>
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
