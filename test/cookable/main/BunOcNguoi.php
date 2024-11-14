<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>COOKABLE - CÔNG THỨC - Hải sản</title>
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
                <h5>Bún ốc nguội</h5>
                <p class="like">Số lượt thích: <span id="like-count">733</span></p>
                <img src="https://static.vinwonders.com/production/bun-oc-nguoi-ha-noi-1.jpg" alt="Bún ốc nguội"><br>

                <!--intro-->
                <p>Bún ốc là món ăn mang đầy đủ nét đặc trưng của ẩm thực Bắc Bộ. Cách nấu bún ốc tuy đơn giản nhưng nếu không biết nêm nếm gia vị, bạn khó có thể làm chiều lòng người thưởng thức. Hãy cùng theo dõi công thức dưới đây nếu như bạn muốn có ngay những phần bún ốc ngon.</p>

                <!--nguyen lieu-->
                <div class="nguyenlieu">
                    <h6>Nguyên liệu:</h6>
                    <h8>1kg xương ống</h8><br>
                    <h8>6 quả cà chua</h8><br>
                    <h8>250ml giấm bỗng</h8><br>
                    <h8>100g hành tím cắt lát</h8><br>
                    <h8>Bún tươi</h8><br>
                    <h8>2kg ốc bươu</h8><br>
                    <h8>100g rau tía tô + hành lá</h8><br>
                    <h8>5 củ hành tím</h8><br>
                    <h8>2 muỗng ớt khô</h8><br>
                    <h8>Rau sống ăn kèm: rau muống bào, hoa chuối, kinh giới, xà lách, giá đỗ, rau mùi, rau húng…</h8><br>
                    <h8>Gia vị: dầu ăn, dầu màu điều, đường phèn, hạt nêm, muối, nước mắm, mắm tôm</h8><br>
                </div><br>

                <!--cach lam-->
                <h6>Cách làm:</h6>
                <h7>Sơ chế ốc và các nguyên liệu:</h7><br>
                <p>Xương ống rửa sạch, chần qua nước sôi với thời gian 7 phút. Sau đó, vớt ra rửa sạch. Ốc ngâm với nước vo gạo trong khoảng 6 tiếng hoặc qua đêm rồi chà, rửa thật sạch.</p>
                <img src="https://daotaobeptruong.vn/wp-content/uploads/2021/11/cach-nau-bun-oc.jpg" alt="Bún ốc nguội"><br>
                <p>Hành tím bóc bỏ vỏ, rửa sạch. 3 quả cà chua rửa sạch, cắt hạt lựu. 3 quả còn lại cắt múi cau. Hành lá và tía tô rửa sạch, cắt nhỏ. Rau ăn kèm nhặt kỹ, rửa sạch, để ráo.</p>
                <h7>Hầm nước dùng:</h7><br>
                <p>Cho xương ống vào nồi cùng với 3 lít nước và 5 củ hành tím bắc lên bếp hầm trong khoảng thời gian 3 – 4 tiếng. Sau đó lọc lại lấy nước.</p>
                <img src="https://daotaobeptruong.vn/wp-content/uploads/2021/11/cach-nau-bun-rieu-cua-oc-ngon-tai-nha.jpg" alt="Bún ốc nguội"><br>
                <h7>Luộc ốc:</h7><br>
                <P>Cho ốc vào nồi nước luộc trong khoảng 3 – 4 phút hoặc khi thấy mày ốc tróc, bạn nhanh chóng vớt ốc ra. Chú ý là giữ lại phần nước luộc ốc này.</P>
                <img src="https://daotaobeptruong.vn/wp-content/uploads/2021/11/cach-nau-voi-doc-mung-khong-can-giam-bong.jpg" alt="Bún ốc nguội"><br>
                <P>Lấy phần thịt ốc ra khỏi vỏ.</P>
                <h7>Làm ớt chưng ăn bún ốc:</h7><br>
                <P>Bắc chảo lên bếp, cho khoảng 2 muỗng dầu ăn vào đun nóng. Sau đó cho 50g hành tím cắt lát vào phi thơm vàng. Tiếp theo, bạn đổ vào chảo 2 muỗng canh dầu màu điều, 2 muỗng canh ớt khô và trộn đều lên. Khi ớt tỏa ra mùi thơm thì tắt bếp.</P>
                <img src="https://daotaobeptruong.vn/wp-content/uploads/2021/11/lam-ot-chung-an-kem.jpg" alt="Bún ốc nguội"><br>
                <h7>Nấu nước dùng bún ốc:</h7><br>
                <P>Bắc nồi lên bếp, cho vào 1 muỗng canh dầu ăn. Sau đó đổ 50g hành tím cắt lát vào phi thơm vàng. Tiếp theo đổ cà chua vào xào cho chín mềm và ra màu.</P>
                <p>Đổ phần nước hầm xương và nước luộc ốc vào nồi cà chua đã xào. Lúc này, bạn cũng nêm vào 50g đường phèn, 3 muỗng canh hạt nêm, 3 muỗng canh nước mắm, 1 muỗng cà phê muối. Đợi nước dùng sôi lên, bạn đổ từ từ 250ml giấm bỗng vào, khuấy đều. Cuối cùng, cho cà chua cắt múi cau vào, nêm nếm, đun sôi trở lại và tắt bếp.</p>
                <img src="https://daotaobeptruong.vn/wp-content/uploads/2021/11/cah-nau-gia-truyen-voi-suon-non.jpg" alt="Bún ốc nguội"><br>
                <h6>Trình bày và thưởng thức:</h6>
                <p>Cho bún tươi ra tô, thịt ốc, chan nước dùng, cho rau tía tô, hành lá lên trên và được ăn kèm với một chút mắm tôm, ớt chưng và các loại rau sống. Ngoài ra, bạn có thể thêm tàu hũ chiên, chả lụa để thêm hương vị cho món ăn.</p>
                <img src="https://daotaobeptruong.vn/wp-content/uploads/2021/11/mon-bun-oc-chuan-vi.jpg" alt="Bún ốc nguội"><br>

                <h6>Chú ý:</h6>
                <p>Không nên luộc ốc quá lâu, thời gian chỉ từ 3 – 4 phút để ốc không mất đi độ giòn và ngọt.</p>
                <p>Khi làm sa tế, bạn chú ý điều chỉnh lửa ở mức nhỏ để ớt từ từ ra mùi thơm mà không bị cháy.</p>
                <p>Giấm bỗng giúp cho món ăn có vị chua thanh. Nếu không có giấm bỗng, bạn có thể sử dụng giấm táo hoặc me.</p>
                <p>Bạn có thể thay thế ốc bươu bằng các loại ốc đồng khác.</p>
                <p>Lượng nước hầm xương trộn với nước luộc ốc bạn canh tầm 3 lít là được.</p>
                <P>Nên trụng qua bún trước khi dùng.</P>

                <!--ending-->
                <P>Bún ốc là một trong những món đặc sản dân dã của người Hà Nội nói riêng và người miền Bắc nói chung. Được làm từ những nguyên liệu dân dã, phổ biến nhưng bún ốc có vị ngon rất đặc biệt. Nước dùng trong, đậm đà với vị ngọt của xương ống, mùi thơm của ốc, vị chua nhẹ của giấm bỗng cùng các loại rau ăn kèm sẽ làm hài lòng bạn.</P>

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
