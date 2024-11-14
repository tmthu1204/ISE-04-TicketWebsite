<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>COOKABLE - CÔNG THỨC - Gia cầm</title>
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
                <h5>Vịt quay</h5>
                <p class="like">Số lượt thích: <span id="like-count">325</span></p>
                <img src="https://heoquaydachoa.com/wp-content/uploads/2022/12/Vit-Quay-Mat-Ong-Dac-Hoa-1200x900-1.jpg" alt="Vịt quay"><br>

                <!--intro-->
                <p>Vịt quay Bắc Kinh là một trong những món ăn cực kì nổi tiếng trong nền ẩm thực Trung Quốc. Món ăn thu hút thực khách bởi lớp da vàng rụm, vàng bóng bắt mắt của vịt kết hợp cùng vị thơm ngọt đặc trưng của thịt vịt.</p>
                <p>Để làm nên món vịt quay Bắc Kinh trứ danh này, vịt được chọn phải là những con to, béo, da mỏng. Chúng sẽ được đem đi vặt lông, làm sạch rồi tẩm ướp với mạch nha và các loại gia vị khác như giấm đỏ, đường, muối, ngũ vị hương… trong một khoảng thời gian để gia vị thấm đều vào trong từng thớ thịt. Khi ăn thực khách sẽ nhận được gia vị tan đều trên từng đầu lưỡi cùng hương thơm đặc trưng của vịt quay.</p>

                <!--nguyen lieu-->
                <div class="nguyenlieu">
                    <h6>Nguyên liệu:</h6>
                    <h8>1 con vịt</h8><br>
                    <h8>1 muỗng rượu nấu ăn Trung Quốc</h8><br>
                    <h8>1 muỗng giấm trắng</h8><br>
                    <h8>1 muỗng dầu hào</h8><br>
                    <h8>2 muỗng mạch nha</h8><br>
                </div><br>

                <!--cach lam-->
                <h6>Cách làm:</h6>
                <h7>Làm sạch thịt vịt:</h7><br>
                <p>Vịt mua về loại bỏ sạch phần nội tạng. Để thịt trông trắng hơn và không bị mùi hôi, bạn hãy chuẩn bị một ít gừng và rượu trắng, dùng tay chà xát mạnh lên phần thịt vịt cả trong lẫn ngoài. Sau đó rửa lại bằng nước sạch, để ráo nước. </p>
                <img src="https://cdn.eva.vn/upload/1-2022/images/2022-01-28/image3-1643354057-952-width599height394.png" alt="Vịt quay"><br>
                <h7>Ướp gia vị:</h7><br>
                <p>Bước 1. Để làm vịt quay Bắc Kinh, trước tiên bạn cho hỗn hợp dầu hào + rượu nấu ăn Trung Quốc vào một cái tô, trộn đều. Sau đó dùng tay chà xát phần hỗn hợp này lên khắp thân vịt, cả bên trong và bên ngoài cho đều.</p>
                <p>Bước 2. Tiếp theo, bạn pha nước nóng cùng giấm, mạch nha và khuấy đều. Sau đó thoa lên thân vịt, ướp vịt trong khoảng 40 phút. Hết thời gian 40 phút, bạn tiếp tục thoa lại hỗn hợp này lên vịt một lần nữa.</p>
                <p>Tiếp theo, bạn pha nước nóng cùng dấm, mạch nha và khuấy đều. Sau đó thoa lên thân vịt, ướp vịt trong khoảng 40 phút. Hết thời gian 40 phút, bạn tiếp tục thoa lại hỗn hợp này lên vịt một lần nữa.</p>
                <p>Cuối cùng, khâu bụng vịt lại bằng một thanh xiên nhọn và treo vịt ở nơi thoáng mát khoảng 5 – 6 tiếng.</p>
                <h7>Quay vịt:</h7><br>
                <P>Cho vịt vào lò nướng, bật nhiệt độ khoảng 170°C và nướng trong khoảng thời gian từ 50 phút đến 1 tiếng.</P>
                <img src="https://th.bing.com/th/id/R.e35ffb7e3bd495d9947ac646bd9e1124?rik=sMn3uQcoHZ0w%2bQ&pid=ImgRaw&r=0" alt="Vịt quay"><br>
                <h7>Làm nước chấm ăn kèm:</h7><br>
                <p>Đầu tiên, bạn pha nước lọc cùng nửa muỗng tương xay, 1 muỗng đường, 1/3 muỗng bột ngọt và ½ muỗng muối, khuấy đều hỗn hợp.</p>
                <p>Phi thơm hành tím, tỏi băm, sau đó cho hỗn hợp bên trên vào, nấu sôi trong khoảng 5 phút.</p>
                <p>Sau 3 phút nấu, bạn cho nửa muỗng bột năng vào nấu cùng để tạo thành một hỗn hợp sệt rồi tắt bếp. Để nguội, vắt thêm chút chanh và tiêu xay vào là xong. </p>

                <!--ending-->
                <P>Cách ăn truyền thống và giúp tận hưởng được trọn vẹn vị của món vịt quay Bắc Kinh bao gồm một miếng thịt vịt quay thơm mềm cùng lớp da giòn rụm cuốn với một chiếc bánh tráng mỏng, cho thêm hành lá thái sợi, dưa chuột và chấm cùng nước sốt.</P>
                <img src="https://www.thatlangon.com/wp-content/uploads/2021/01/cach-lam-vit-quay-hero.jpg" alt="Vịt quay"><br>

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
