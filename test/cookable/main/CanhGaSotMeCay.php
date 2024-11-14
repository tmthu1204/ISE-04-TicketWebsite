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
                <h5>Cánh gà sốt me cay</h5>
                <p class="like">Số lượt thích: <span id="like-count">1354</span></p>
                <img src="https://i.ytimg.com/vi/1tjlL643E0M/maxresdefault.jpg" alt="Cánh gà sốt me cay"><br>
                
                <!--intro-->
                <p>Cánh gà là một thứ nguyên liệu dễ ăn và dễ làm ngon, có thể chế biến thành nhiều món để ăn cơm hay ăn vã đều được. Đợt mùa đông năm ngoái thi thoảng mình hay mua một túi 1.5 – 2 kg cánh, về ướp các thứ gia vị, ngũ vị hương, hành tỏi, dầu hào… để qua đêm cho ngấm rồi chia nhỏ cho vào ngăn đá. Thi thoảng tối đi làm về mệt không thích ăn cơm thì lấy một hai túi cánh gà ra rã đông rồi cho vào lò nướng, ăn với dưa chuột hay salad, thế là có một bữa low-carb ngon lành và cực kì nhanh gọn. Ít thời gian hơn nữa, kể cả ướp gia vị trước cũng không kịp thì bỏ cánh gà vào lò, phết tí bơ lên cũng thành món nướng giòn rụm hấp dẫn.</p>
                
                <!--nguyen lieu-->
                <div class="nguyenlieu">
                    <h6>Nguyên liệu:</h6>
                    <h7>* Phần nguyên liệu A</h7><br>
                    <h8>450 – 500 gr cánh gà</h8><br>
                    <h8>1/2 thìa cafe (teaspoon) bột canh hoặc muối</h8><br>
                    <h8>1/2 thìa cafe đường</h8><br>
                    <h8>1/4 thìa cafe bột tỏi (hoặc thay bằng 1/2 thìa cafe tỏi tươi băm nhuyễn)</h8><br>
                    <h8>1/4 thìa cafe bột hành (hoặc thay bằng 1 thìa cafe hành hương băm nhuyễn) </h8><br>
                    <h8>2 thìa canh (tablespoon) bột chiên giòn (mình dùng bột chiên Tempura, các bạn có thể chọn 1 loại bột chiên bất kì) </h8><br>
                    <h7>* Phần nguyên liệu B</h7><br>
                    <h8>1 thìa cafe nước cốt me (tamarin paste)</h8><br>
                    <h8>1 thìa canh đường thốt nốt (palm sugar – hoặc thay bằng 1/2 thìa canh đường trắng)</h8><br>
                    <h8>1 thìa cafe nước mắm</h8><br>
                    <h8>2 – 3 thìa cafe tương ớt (mình dùng tương ớt Siracha)</h8><br>
                    <h8>½ bát con nước lọc </h8><br>
                    <h7>* Phần nguyên liệu C</h7><br>
                    <h8>1 thìa cafe tỏi băm nhuyễn</h8><br>
                    <h8>2 thìa canh dầu ăn </h8><br>
                    <h8>1 thìa cafe hành hương băm nhuyễn </h8><br>
                    <h8>hành lá cắt khoanh nhỏ, mùi (ngò) </h8><br>
                </div><br>

                <!--cach lam-->
                <h6>Cách làm:</h6>
                <p>1. Cánh gà rửa sạch, thấm khô, ướp với các nguyên liệu trong phần nguyên liệu A (trừ bột chiên giòn). Để tối thiểu 2h (tốt nhất là để qua đêm cho cánh gà ngấm gia vị).</p>
                <p>2. Cho cánh gà vào tô dùng cho lò vi sóng, đậy nắp hoặc bọc kín bằng nilon dùng cho lò vi sóng. Quay trong khoảng 3 – 4 phút đến khi cánh gà chín tái.</p>
                <p>Nếu không có lò vi sóng, các bạn có thể bỏ qua bước này, nhưng khi chiên thì sẽ cần chiên lâu ở lửa nhỏ hơn để cánh gà chín hoàn toàn.</p>
                <p>3. Lấy cánh gà ra khỏi lò vi sóng. Nếu có nước tiết ra từ cánh gà thì chắt bỏ hết nước này. Trộn đều cánh gà với bột chiên giòn.</p>
                <p>4. Đun dầu ăn nóng già. Để lửa to, thả cánh gà vào chiên nhanh. Vì cánh gà đã được làm chín bằng lò vi sóng nên bước này chỉ cần làm rất nhanh, để cánh vàng đều và giòn là được.</p>
                <br><img src="https://farm6.staticflickr.com/5597/15428642405_65771a8f90.jpg" alt="Cánh gà sốt me cay"><br>
                <p>Nếu không có bước làm chín bằng lò vi sóng thì các bạn chiên cánh gà ở lửa vừa đến khi cánh gà chín nhé.</p>
                <p>Cánh gà sau khi đã chiên vàng giòn thì gắp ra đĩa có lót giấy thấm dầu để bớt dầu mỡ.</p>
                <br><img src="https://farm4.staticflickr.com/3936/15242102797_72c0601423.jpg" alt="Cánh gà sốt me cay"><br>
                <p>5. Trộn đều các nguyên liệu trong phần B. Định lượng các loại nguyên liệu có thể thay đổi tùy theo khẩu vị của bạn. Nếu không có tamarin paste, các bạn có thể dùng me tươi, đun liu riu với chút nước cho me chín mềm, rồi lọc bỏ bã, chỉ lấy nước me.</p>
                <p>Phần tương ớt có thể bỏ qua hoặc giảm bớt nếu nấu cho các bé.</p>
                <p>6. Đun nóng 2 thìa dầu ăn, phi thơm hành tỏi. Khi hành tỏi dậy mùi thơm thì cho nước cốt me vào. Để lửa to, quấy đều. Đến khi nước cốt me bắt đầu hơi sôi thì cho cánh gà vào. Trộn đều cho cánh gà ngấm sốt.</p>
                <br><img src="https://farm3.staticflickr.com/2943/15242102227_749ab0665b.jpg" alt="Cánh gà sốt me cay"><br>
                <p>Đun lửa to đến khi sốt cạn thành hỗn hợp hơi sệt và sánh thì tắt bếp. Cho hành xanh vào đảo đều.</p>

                <!--ending-->
                <P>Vậy là bạn đã có một bữa ăn tuyệt vời với những chiếc cánh gà vàng giòn, bên ngoài bao đều nước sốt me chua cay ngọt vừa phải, bên trong ngấm gia vị đậm đà, thơm mùi hành tỏi.</P>

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
