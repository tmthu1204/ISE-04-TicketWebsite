<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>COOKABLE - CÔNG THỨC - Chiên</title>
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
            <h2>CÔNG THỨC BẠN CẦN</h2>
        </div>
        <div class="row">
            <div id="post" class="post">
                <h5>Nem cá</h5>
                <p class="like">Số lượt thích: <span id="like-count">182</span></p>
                <img src="https://gcs.tripi.vn/public-tripi/tripi-feed/img/473888KPU/nem-ca-lang-4.jpg" alt="Nem cá"><br>
                
                <!--intro-->
                <p>Nem cá có vỏ vàng ruộm, giòn tan, nhân nem với cá mềm ngọt quyện chút béo ngậy của thịt và tôm, nhân không bị khô, dậy mùi thơm của thì là.</p>

                <!--nguyen lieu-->
                <div class="nguyenlieu">
                    <h6>Nguyên liệu:</h6>
                    <h7>* Phần nhân</h7><br>
                    <h8>800 gram cá</h8><br>
                    <h8>200 gram thịt nạc vai (có chút mỡ) xay</h8><br>
                    <h8>200 gram tôm bóc vỏ</h8><br>
                    <h8>Mộc nhĩ, nấm hương, miến</h8><br>
                    <h8>Cà rốt, hành lá, thì là, giá đỗ, hành khô</h8><br>
                    <h7>* Phần vỏ</h7><br>
                    <h8>Bánh đa nem</h8><br>
                    <h7>* Phần nước chấm</h7><br>
                    <h8>1 thìa canh đường</h8><br>
                    <h8>1 thìa canh nước cốt chanh</h8><br>
                    <h8>3 thìa canh nước lọc</h8><br>
                    <h8>2 thìa canh nước mắm</h8><br>
                    <h8>tỏi, ớt, thì là</h8><br>
                </div><br>

                <!--cach lam-->
                <h6>Cách làm:</h6>
                <p>Cá đánh vảy, mổ bụng bỏ ruột (giữ lại trứng nếu có), rắc muối hạt, chanh chà xát rồi rửa sạch.</p>
                <p>Luộc chín cá cùng vài lát gừng, hành khô đập dập, muối. Vớt cá ra, ngâm vào nước đá lạnh, gỡ lấy thịt và trứng (nếu có) để riêng.</p>
                <p>Nấm hương, mộc nhĩ, miến ngâm mềm, rửa sạch, để ráo nước, cắt nhỏ.</p>
                <p>Các loại rau củ (cà rốt, hành lá, thìa là, giá đỗ) rửa sạch, cắt nhỏ.</p>
                <P>Tôm tươi bóc vỏ, rút chỉ đen ở lưng, cắt hạt lựu.</P>
                <img src="https://images.squarespace-cdn.com/content/v1/54b81b41e4b04c160a264f1c/1421363439451-YI8PX40MW4NM4ATLVNMZ/IMG_1053.JPG" alt="Nem cá"><br> 
                <P>Làm nhân nem: Trong một tô trộn lớn, cho thịt cá rô, thịt nạc vai xay, tôm cắt hạt lựu vào. Thêm các loại rau, mộc nhĩ, nấm hương đã cắt nhỏ. Thêm trứng, hạt nêm, hạt tiêu, chút bột bắp (để tạo độ kết dính cũng như giúp nhân nem khô ráo). Thêm 1 thìa canh mỡ hành để giúp nem ngon hơn. Trộn đều.</P>
                <img src="https://th.bing.com/th/id/R.6b09868e3e275862a29d906efc1514b5?rik=M2j9aac6krgPyA&riu=http%3a%2f%2fplatvietnam.com%2fwp-content%2fuploads%2f2020%2f12%2fnem-plat-vietnam.jpg&ehk=PoXwQMj18mVH7%2fD9vVdv4GkNuSv2sdw1USPjVwXsSrw%3d&risl=&pid=ImgRaw&r=0" alt="Nem cá"><br>
                <P>Làm nước phết vỏ bánh đa nem: Trong bát nhỏ, cho vào 1/2 bát nước, 1/2 quả chanh, 2 thìa canh đường rồi khuấy tan hẳn. Hỗn hợp nước phết này giúp vỏ bánh đa nem giòn và lên màu đẹp khi chiên.</P>
                <P>Trải bánh đa nem lên mặt phẳng. Dùng khăn sạch nhúng hỗn hợp nước chanh, đường, vắt bớt nước cho ẩm rồi lau bề mặt bánh đa nem cho mềm.</P>
                <P>Dùng thìa múc lượng nhân vừa phải cho vào, rồi gấp các mép và gói đều tay. Gói tới khi hết lượng nhân.</P>
                <P>Chiên sơ lần 1: Cho dầu vào chảo, đun nóng, chia từng mẻ nem cho vào chiên sơ. Khi bề mặt nem hơi săn lại thì vớt ra để nguội.</P>
                <P>Chiên lần 2 giúp nem giòn và thoát dầu: Đun nóng dầu ăn, cho nem vào rán. Khi nem vàng giòn thì vớt ra đặt lên giấy thấm dầu.</P> 
                <p>Cách pha nước chấm:</p>
                <p>Trong một bát nhỏ, cho 1 thìa canh đường + 1 thìa canh nước cốt chanh + 3 thìa canh nước lọc. Khuấy tan đường hoàn toàn rồi mới cho 2 thìa canh nước mắm và tỏi, ớt bằm nhuyễn, thì là cắt nhỏ vào (chú ý đường tan hẳn sẽ giúp tỏi ớt, thì là nổi lên bề mặt). Có thể điều chỉnh vị mặn ngọt theo khẩu vị.</p>
                <img src="https://th.bing.com/th/id/R.7f59d5a40e7e61baee4f82f63f13569d?rik=HQpE7aiJPtNUiw&riu=http%3a%2f%2fgreenhousehp.com%2fwp-content%2fuploads%2f2020%2f08%2fcach-lam-cha-ram-bap.jpg&ehk=vxREEpRRfOW2FX65r4MM6SdibjHBtOZTUga44zSst8M%3d&risl=&pid=ImgRaw&r=0" alt="Nem cá"><br>

                <!--ending-->
                <P>Vỏ nem vàng giòn, nhân nem với cá mềm ngọt quyện chút béo ngậy của thịt và tôm, nhân không bị khô, dậy mùi thơm của thì là. Nem cá ăn cùng cơm nóng, bún đều ngon!</P>

                <!--author date neu co-->
                <!--
                <p class="author">Author: Me</p>
                <p class="date">Published on: January 1, 2024</p>
                -->
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
