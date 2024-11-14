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
                <h5>Bánh tôm Hồ Tây</h5>
                <p class="like">Số lượt thích: <span id="like-count">484</span></p>
                <img src="https://dauhomemade.vn/apps/uploads/2018/09/B%C3%A1nh-t%C3%B4m-h%E1%BB%93-T%C3%A2y-68000-4096x2731.jpg" alt="Bánh tôm Hồ Tây"><br>
                
                <!--intro-->
                <p>Trời Hà Nội hôm nay lạnh quá. Tự nhiên lại thấy thèm ơi là thèm miếng bánh tôm thơm phức, giòn rụm, chấm nước mắm chua chua ngòn ngọt kèm thêm rất nhiều rau sống, rau thơm để giải bớt cái háo trong ngày gió mùa này.</p>
                <p>Nên là bây giờ mình bắt tay vào làm món bánh ngon lành này nhé.</p>
                <!--nguyen lieu-->
                <div class="nguyenlieu">
                    <h6>Nguyên liệu (4 người ăn):</h6>
                    <h7>* Phần bánh</h7><br>
                    <h8>Khoai lang (sweet potato) 450 gram</h8><br>
                    <h8>Tôm 500 gram</h8><br>
                    <h8>Bột mì (all purpose flour) 100 gram</h8><br>
                    <h8>Bột gạo tẻ (rice flour) 100 gram</h8><br>
                    <h8>Bột năng (tapioca flour) 100 gram </h8><br>
                    <h8>Nước 260-300 ml</h8><br>
                    <h8>Bột tỏi ¼ thìa cafe (teaspoon) / 1 gram </h8><br>
                    <h8>Bột hành ¼ thìa cafe (teaspoon) / 1 gram</h8><br>
                    <h8>Bột nở (baking powder) 1/2 thìa cafe (teaspoon) / 2 gram</h8><br>
                    <h8>Bột nghệ (turmeric powder) ¼ thìa cafe (teaspoon) / 1 gram</h8><br>
                    <h8>Dầu ăn 500 ml</h8><br>
                    <h7>* Nước chấm và rau ăn kèm</h7><br>
                    <h8>Rau sống 300 gram</h8><br>
                    <h8>Đu đủ xanh hoặc su hào 120 gram</h8><br>
                    <h8>Cà rốt 120 gram</h8><br>
                    <h8>Đường 50 gram</h8><br>
                    <h8>Nước cốt chanh hoặc dấm 30 ml</h8><br>
                    <h8>Nước mắm 30 ml</h8><br>
                    <h8>Muối 20 gram</h8><br>
                </div><br>

                <!--cach lam-->
                <h6>Cách làm:</h6>
                <p>1. Khoai gọt vỏ, rửa sơ rồi bào sợi nhỏ. Ngâm khoai trong nước muối khoảng 1.5 – 2 giờ mới dùng. Trong khi đợi ngâm khoai thì chuẩn bị các nguyên liệu khác.</p>
                <img src="https://cdn.shortpixel.ai/spai/q_lossless+w_625+to_auto+ret_img/www.thatlangon.com/wp-content/uploads/2020/05/8127img_5ec1351285e3a-e1589720438314.jpg" alt="Bánh tôm Hồ Tây"><br>
                <p>2. Tôm để nguyên vỏ, cắt bớt râu dài và ngạnh cứng, có thể bỏ đầu nếu dùng tôm to. Rửa tôm sạch, xóc cho ráo nước rồi ướp tôm với khoảng 1 thìa café muối hoặc bột nêm và ¼ thìa café (1 gram) bột tỏi nếu có.</p>
                <p>Trong bánh tôm Hồ Tây truyền thống, tôm thường dùng là loại nhỏ-vừa. Các bạn có thể dùng tôm loại to giống mình nhưng nên chọn các con có vỏ mềm. Không lột vỏ tôm vì khi rán lớp vỏ này sẽ giúp giữ cho tôm vừa chín tới, không bị cháy hay khô.</p>
                <p>3. Pha nước chấm như sau:</p>
                <P>- Pha 25 g (khoảng 1.5 thìa canh/ tbsp.) đường với 15 – 18 ml (khoảng 1 thìa canh) nước cốt chanh và 175 ml (11 – 12 thìa canh) nước thành một bát nước chanh ngon, vị chua ngọt vừa ăn (có thể thay chanh bằng dấm).</P>
                <P>- Từ từ thêm 15 – 20 ml nước mắm, quấy đều, tới khi nước chấm có vị mặn vừa ăn thì dừng lại.</P>
                <P>Định lượng mắm, chanh, đường có thể thay đổi theo từng loại gia vị bạn dùng và khẩu vị riêng của gia đình.</P>
                <P>Nước chấm nên pha trước 1 – 2 giờ. Tới khi ăn hâm nóng lại nước chấm sẽ có vị ngon hơn. Để nước chấm không bị đắng (do để lâu và đun nóng lại) thì dùng chanh vàng hoặc dấm sẽ an toàn hơn chanh xanh.</P>
                <P>Có thể thêm tỏi băm, ớt thái lát theo sở thích.</P>
                <P>4. Nhặt rửa các loại rau sống ăn kèm (xà lách, các loại rau thơm).</P>
                <P>Đu đủ và cà rốt gọt vỏ, thái thành miếng mỏng. Đu đủ bóp qua với 1 thìa café (4 – 5 gram) muối vài phút cho bớt nhựa rồi xả lại với nước sạch, xóc thật ráo nước. Tiếp theo, trộn đu đủ và cà rốt với 20 gram đường, xóc đều, để 30 phút rồi trộn thêm 10 ml (2 thìa café) nước cốt chanh và ½ thìa café (2 – 3 gram) muối. Trộn đều và nêm nếm sao cho đu đủ và cà rốt có vị chua, mặn, ngọt vừa ăn. Việc trộn đường trước sẽ giúp cho rau giòn.</P>
                <img src="https://cdn.shortpixel.ai/spai/q_lossless+w_828+to_auto+ret_img/www.thatlangon.com/wp-content/uploads/2020/05/banh-tom-10.jpg" alt="Bánh tôm Hồ Tây"><br>
                <P>5. Trước khi rán bánh 30 phút, chuẩn bị hỗn hợp bột như sau:</P>
                <P>Cho vào âu 100 g bột mì, 100 g bột gạo, 100 g bột năng, ½ thìa café (2 – 3 g) muối, ¼ thìa café (1 g) bột tỏi, ¼ thìa café (1 g) bột hành, ½ thìa café (2 g) bột nở (baking powder), 1/8 thìa café bột nghệ.</P>
                <P>Trộn đều rồi cho khoảng 260 – 300 ml nước vào bát trộn cùng bột. Nên cho nước từ từ, khi nào bột thành hỗn hợp rất sệt thì dừng lại, không nhất thiết phải dùng hết 300 ml nước. Để ủ bột khoảng 30 phút.</P>
                <p>6. Sau khi ủ bột 30 phút, đổ khoai ra rổ, xóc cho thật ráo nước rồi cho vào âu bột trộn thật đều.</p>
                <p>Làm nóng dầu ăn trên lửa vừa. Nên dùng chảo sâu lòng hoặc nồi nhỏ để tiết kiệm dầu ăn (ta cần rán bánh ngập dầu).</p>
                <p>7. Dùng muôi lớn, xếp một phần bột và khoai lên muôi. Đặt 1 – 2 con tôm vào giữa bánh. Nhẹ nhàng dùng thìa hoặc đũa gạt bánh xuống chảo dầu sao cho còn giữ được nguyên hình dạng của cả chiếc bánh.</p>   
                <p>8. Chiên bánh ngập dầu tới khi bánh chín vàng thơm thì gắp ra.</p>
                <img src="https://cdn.shortpixel.ai/spai/q_lossless+w_850+to_auto+ret_img/www.thatlangon.com/wp-content/uploads/2020/05/91029326_2797147926989510_828911808906526720_o-rotated-e1589721913912.jpg" alt="Bánh tôm Hồ Tây"><br>
                <h6>Ghi chú:</h6>
                <p>- Nếu muốn bánh giòn rụm từ trong ra ngoài thì nên làm bánh nhỏ với lượng khoai vừa phải. Rán ở nhiệt độ vừa, khoảng 170 – 190 độ C.</p>
                <p>- Nếu muốn bánh giòn bên ngoài nhưng mềm bên trong thì rán ở nhiệt độ cao, khoảng 190 – 200 độ C (để khi bên ngoài bánh chín vàng và giòn nhanh hơn).</p>
                <p>- Có thể chiên bánh thành 2 lần: trong lần đầu vớt bánh ra khi bánh vừa chín tới, trước khi ăn thì chiên lại để bánh chín vàng giòn.</p>
                <p>- Dùng bánh nóng với nước chấm và các loại rau sống.</p>

                <!--ending-->
                <P>Bánh tôm nhà làm thì không hoàn toàn giống với bánh tôm Hồ Tây cổ truyền lắm. Vì là nhà làm nên bao giờ cũng được biến tấu theo hướng ít bột, thêm rất nhiều khoai, tôm thì to gấp 2-3 lần. Bên cạnh việc tôm to hơn, thịt ngọt mà lại ít phải ăn vỏ thì chiếc bánh có nhiều khoai cũng ngon hơn nhiều. Bởi vì khoai làm cho bánh vừa thơm, vừa giòn, vừa bùi, màu sắc rất đẹp mà lại không ngấm nhiều dầu, không hề ngấy.</P>

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
