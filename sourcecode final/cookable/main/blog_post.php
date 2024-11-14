<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>COOKABLE - BLOG - Bài viết</title>
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
                            <a class="nav-link disabled active" href="blog.php">Blog</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="lienhe.php">Liên hệ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="calo.php">Tính Calo</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="congthuc.php">Công thức nấu ăn</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="logo2 col-1">
                <a class="navbar-brand fa-solid fa-user " href="../admin/index.php"></a>
                <a class="navbar-brand fa-solid fa-cart-shopping" href="../mainphu/pages/main/giohang.php"></a>
            </div>
        </div>
    </nav>
    
    <!--banner-->
    <div class="banner container-fluid">
        <div class="col-xxl-7 box-left">
            <h2>
                <span>DIỄN ĐÀN - BÀI VIẾT</span>
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
            <h2>BÀI VIẾT</h2>
        </div>
        <div class="row">
            <div id="post" class="post">
                <h5>Món Spaghetti Carbonara Yêu Thích Của Tôi</h5>
                <p class="like">Số lượt thích: <span id="like-count">150</span></p>
                <img src="https://images.services.kitchenstories.io/6glN_4JhpVS9aUiBS7JnGsuDULA=/3840x0/filters:quality(80)/images.kitchenstories.io/wagtailOriginalImages/R2568-photo-final-_0.jpg" alt="Post Image"><br><br>
                <p>Xin chào mọi người,</p>
                <p>Hôm nay tôi muốn chia sẻ với mọi người về một món ăn mà tôi rất yêu thích và thường xuyên nấu - đó là Spaghetti Carbonara. Mỗi lần tôi nấu món này, nó luôn là một trải nghiệm tuyệt vời và mang lại niềm vui thực sự cho bản thân và gia đình.</p>
                <p>Về Món Ăn
                Spaghetti Carbonara là một món pasta truyền thống của Ý, mà tôi phát hiện ra và phải công nhận rằng nó đã thực sự chinh phục trái tim tôi. Sự kết hợp của những sợi mỳ spaghetti mềm mại, hương vị thơm ngon của thịt muối xông khói, hỗn hợp trứng và phô mai Parmesan thực sự là một điều đặc biệt.</p>
                <p>Tại Sao Tôi Yêu Thích Nó</p>
                <p>Hương Vị Tuyệt Vời: Spaghetti Carbonara có hương vị đặc trưng của thịt muối xông khói và phô mai, kết hợp với hỗn hợp trứng kem dẻo dịu. Mỗi miếng mỳ được phủ đều bởi hỗn hợp này, tạo ra một hương vị cực kỳ đậm đà và phong phú.</p>
                <p>Dễ Chuẩn Bị: Món này không chỉ ngon mà còn dễ chuẩn bị. Chỉ cần vài nguyên liệu đơn giản như spaghetti, thịt muối xông khói, trứng và phô mai Parmesan là bạn đã có thể tự tay thực hiện một bữa ăn ngon miệng.</p>
                <p>Phù Hợp Cho Mọi Dịp: Spaghetti Carbonara không chỉ là một món ăn gia đình, mà còn rất phù hợp cho các dịp tiệc tùng. Hương vị thơm ngon và phong phú của món ăn này sẽ làm hài lòng mọi thực khách.</p>
                <p>Spaghetti Carbonara không chỉ là một món ăn, mà còn là một trải nghiệm ẩm thực đích thực. Tôi hy vọng rằng sau khi thử nấu món này, bạn sẽ yêu thích nó như tôi và tận hưởng những khoảnh khắc ngon miệng cùng gia đình và bạn bè. Chia sẻ với bạn bè và gia đình của bạn và hãy thử nấu món này trong bữa ăn tiếp theo của bạn! Cảm ơn mọi người đã đọc và chúc bạn có những bữa ăn ngon miệng!</p>
                <p class="author">Author: Me</p>
                <p class="date">Published on: January 1, 2024</p>
            </div>
        </div> 
            <div class="row">
                <h4>Bạn có thích bài viết này không?</h4>
                <div class="favorite post">
                    <button class="favorite-button" aria-label="Thêm vào mục yêu thích">
                        <svg class="heart-icon" viewBox="0 0 24 24">
                            <path fill="none" d="M0 0h24v24H0z"/>
                            <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/>
                        </svg>
                    </button>
                </div>
            </div>
            <div class="row">
                <h3>Bình luận</h3>
                <div class="comments post">
                    <div class="comment-form">
                        <textarea id="comment" placeholder="Nhập bình luận của bạn..."></textarea>
                        <button onclick="submitComment()">Gửi</button>
                    </div><br>
                    <div class="comment-list">
                        <!-- Danh sách bình luận sẽ được hiển thị ở đây -->
                    <div>
                        <p>Hiện chưa có bất kỳ bình luận nào!</p>
                    </div>
                    </div>
                </div>
            </div>
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
            <div class="row">
                <h2>BÀI VIẾT CỦA BẠN</h2>
                <div>
                    <p>Bạn chưa có bài đăng nào cả!</p>
                </div>
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
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var favoriteButton = document.querySelector(".favorite-button");
        favoriteButton.addEventListener("click", function() {
            if (favoriteButton.classList.contains("clicked")) {
                favoriteButton.classList.remove("clicked");
            } else {
                favoriteButton.classList.add("clicked");
            }
        });
    });
    document.addEventListener("DOMContentLoaded", function() {
        var likeButton = document.querySelector(".favorite-button");
        var likeCountSpan = document.getElementById("like-count");
        var likeCount = parseInt(likeCountSpan.textContent);
    
        likeButton.addEventListener("click", function() {
            if (likeButton.classList.contains("liked")) {
                likeCount--;
                likeButton.classList.remove("liked");
            } else {
                likeCount++;
                likeButton.classList.add("liked");
            }
            likeCountSpan.textContent = likeCount;
        });
    });
</script>

</body>
</html>
