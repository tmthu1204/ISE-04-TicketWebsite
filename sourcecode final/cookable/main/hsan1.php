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
                <h5>Bánh đa cua Hải Phòng</h5>
                <p class="like">Số lượt thích: <span id="like-count">2011</span></p>
                <img src="https://statics.vinwonders.com/banh-da-cua-hai-phong-o-ha-noi-1_1687012182.jpg" alt="Bánh đa cua Hải Phòng"><br>
                
                <!--intro-->
                <p>Bát bánh đa cua hội tụ sắc và vị: Màu nâu đỏ từ bánh đa hòa trong nước dùng sánh vàng, vị ngọt tự nhiên. Thịt cua thơm, gạch cua bùi béo, tóp mỡ, hành phi giòn rụm làm nên món ăn trứ danh Hải Phòng.</p>

                <!--nguyen lieu-->
                <div class="nguyenlieu">
                    <h6>Nguyên liệu:</h6>
                    <h7>* Phần chính</h7><br>
                    <h8>800 gr cua đồng</h8><br>
                    <h8>400 gr thịt vai xay (nạc, mỡ đan xen)</h8><br>
                    <h8>400 gr tôm tươi hoặc bề bề</h8><br>
                    <h8>300 gr chả cá</h8><br>
                    <h8>150 gr mỡ phần</h8><br>
                    <h8>1 bó lá lốt</h8><br>
                    <h8>5 - 6 củ hành khô</h8><br>
                    <h8>Chí chương Hải Phòng</h8><br>
                    <h8>1 quả cà chua để chưng gạch cua</h8><br>
                    <h8>Gia vị: Mắm, mắm tôm khô Hải Phòng, muối, mì chính, me chua</h8><br>
                    <h8>Bánh đa đỏ Hải Phòng</h8><br>
                    <h7>* Phần rau ăn kèm</h7><br>
                    <h8>Rau ăn kèm: Rau muống, rau rút (tùy theo mùa), rau muống chẻ, hoa chuối</h8><br>
                </div><br>

                <!--cach lam-->
                <h6>Cách làm:</h6>
                <h7>Sơ chế:</h7><br>
                <p>Cua đồng mua về cho chút muối hạt để trong chậu thành cao, xóc mạnh, rồi rửa sạch chất bẩn. Bóc mai tách yếm, khều gạch để riêng sau đó, cho gạch lên rây rồi rửa nhẹ qua nước cho sạch (do khi làm cua một phần nước đen từ cua bám vào, gây tanh khi nấu). Phần thân cua cho vào rổ rửa sạch, rồi đổ vào cối, thêm chút muối hạt, giã nhuyễn. Muối là bí quyết giúp cho protein từ thịt cua kết dính, khi nấu tạo thành tảng. Cho nước vào cua giã, dùng tay bóp kỹ thịt tan ra, để lắng rồi lọc lấy nước. Tiếp tục giã và lọc kỹ vài lần để lấy hết phần thịt cua. Nên lọc kỹ thủ công sẽ lấy được nhiều thịt cua hơn là lọc qua rây. Căn lượng nước cho phù hợp số lượng người ăn. </p>
                <img src="https://i1-giadinh.vnecdn.net/2023/02/25/Buoc-1-1-7660-1677318714.jpg?w=1020&h=0&q=100&dpr=1&fit=crop&s=64Lym4sXrPSCTzvjqSNdAg" alt="Bánh đa cua Hải Phòng"><br>
                <p>Chả lá lốt là nguyên liệu không thể thiếu trong món bánh đa cua Hải Phòng. Chọn thịt vai có nạc mỡ đan xen đem xay rồi nêm nếm chút muối, hạt tiêu, mì chính và hành khô trộn đều cho thấm vị. Lá lốt rửa sạch rồi gói đều tay. Chú ý để phần mặt lá xanh ra bên ngoài cho đẹp. </p>
                <img src="https://i1-giadinh.vnecdn.net/2023/02/25/Buoc-2-2-5928-1677318714.jpg?w=1020&h=0&q=100&dpr=1&fit=crop&s=Xz0ygLaxEVtYkrNFeokSiQ" alt="Bánh đa cua Hải Phòng"><br>
                <p>Hai loại rau không thể thiếu cho món ăn này là rau muống và rau rút. Tùy theo mùa mà lựa chọn cho phù hợp. Các loại rau sống ăn kèm có rau muống chẻ, hoa chuối. Hành lá rửa sạch, thái nhỏ. Nếu có rau rút thì thái nhỏ như hành, cho vào làm dậy vị hơn. </p>
                <img src="https://i1-giadinh.vnecdn.net/2023/02/25/Buoc-3-3-3466-1677318715.jpg?w=1020&h=0&q=100&dpr=1&fit=crop&s=XsUONR758ApyEyNXl6sZtA" alt="Bánh đa cua Hải Phòng"><br>
                <h7>Chế biến:</h7><br>
                <p>Nấu nước cua đồng và lấy thịt: Bí quyết quan trọng nhất chính là canh nhiệt độ. Cho nồi nước lọc cua giã lên bếp, ban đầu bật lửa vừa và khuấy đều vòng tròn theo một chiều nhằm giúp thịt cua không bén đáy và hòa quyện vào nhau. Khi thấy nước bốc khói mỏng, phần thịt nổi dần lên, tách nước thì hạ lửa nhỏ vừa. Dùng muôi lỗ nhỏ múc thịt cua ra bát, ém chặt cho nước chảy ra rồi để riêng.</p>
                <img src="https://i1-giadinh.vnecdn.net/2023/02/25/Buoc-4-4-7582-1677318715.jpg?w=1020&h=0&q=100&dpr=1&fit=crop&s=sj4Wl0rxYaA2tzXo1MiNZw" alt="Bánh đa cua Hải Phòng"><br>
                <P>Nêm nếm vị nước dùng: Bí quyết một số nhà hàng là lấy chút mắm tôm khô Hải Phòng gói vào lá chuối nướng giúp nước dùng dậy mùi dậy vị. Thêm hành củ nướng rửa sạch cho vào nồi nước dùng sẽ thơm hơn. Nêm nếm thêm nước mắm ngon Cát Hải, muối, mì chính và nước me chua cho vừa miệng. Vị ngọt tự nhiên từ cua đồng, cộng hưởng vị ngọt umami từ mắm tôm, nước mắm làm tôn lên vị ngọt cho bánh canh cua xứng danh Hải Phòng. </P>
                <img src="https://i1-giadinh.vnecdn.net/2023/02/25/Buoc-5-5-7373-1677318715.jpg?w=1020&h=0&q=100&dpr=1&fit=crop&s=6fO-Kdmx3ouv30Mk2ot2rw" alt="Bánh đa cua Hải Phòng"><br>
                <P>Tóp mỡ và hành phi giòn thơm là một vị không thể thiếu cho món ăn. Mỡ phần cắt hạt lựu, khi rán thêm chút muối cho đậm vị. Khi vàng giòn thì vớt ra. Sau đó, cho hành vào phi bằng mỡ lợn vừa rán, vớt ra trộn chung với tóp. Giữ lại phần dầu hành phi để chưng gạch cua cho thơm. </P>
                <img src="https://i1-giadinh.vnecdn.net/2023/02/25/Buoc-6-6-9772-1677318715.jpg?w=1020&h=0&q=100&dpr=1&fit=crop&s=19BGm-Zs1Q8Pm-A5XE0PhQ" alt="Bánh đa cua Hải Phòng"><br>
                <P>Chưng gạch cua: Cà chua khứa chữ thập, trụng sơ nước sôi, bóc bỏ vỏ, bỏ hạt rồi bằm nhuyễn. Trút cà chua vào dầu hành phi, nêm chút nước mắm ngon. Khi cà chua chín mềm thì trút gạch cua vào chưng, đảo đều cho tới khi gạch hơi quánh lại. Nếu thích ăn cay thì thêm chút ớt bột. Múc ra để riêng. </P>
                <img src="https://i1-giadinh.vnecdn.net/2023/02/25/Buoc-7-7-8445-1677318715.jpg?w=1020&h=0&q=100&dpr=1&fit=crop&s=XynZpBBMw-665wuX7M1ATQ" alt="Bánh đa cua Hải Phòng"><br>
                <P>Chả cá đem chiên vàng thơm.</P>
                <P>Chả lá lốt dàn đều vào chảo chống dính, bật lửa vừa áp chảo cho phần lá săn lại. Sau đó cho chút dầu ăn vào chiên cho chín đều các mặt. Việc áp chảo trước sẽ làm khi rán không bị bắn dầu và miếng chả đỡ ngậy hơn. </P>
                <img src="https://i1-giadinh.vnecdn.net/2023/02/25/Buoc-9-9-2282-1677318715.jpg?w=1020&h=0&q=100&dpr=1&fit=crop&s=FzfIfSf_nuf-3J7lT12Qug" alt="Bánh đa cua Hải Phòng"><br>
                <P>Tôm luộc chín bóc vỏ. Tùy theo khẩu vị mà thay thế bằng bề bề cũng rất ngon. Phần topping này không bắt buộc. </P>
                <img src="https://i1-giadinh.vnecdn.net/2023/02/25/Buoc-10-10-7913-1677318715.jpg?w=1020&h=0&q=100&dpr=1&fit=crop&s=ZbaYHKvFsxCic1xhn4Vo0A" alt="Bánh đa cua Hải Phòng"><br>
                <P>Phần hồn cốt của món ăn là bánh đa đỏ Hải Phòng. Gạo làm bánh phải trắng dẻo và không được để quá 2 vụ gối nhau. Khi tạo bột thì pha thêm chút gấc đỏ cho vừa độ để lên màu vừa mắt. Chọn được bánh đa đỏ tươi là ngon nhất. Nếu không có thì dùng bánh đa khô ngâm nước, rồi trụng qua nước sôi trước khi ăn. </P> 
                <img src="https://i1-giadinh.vnecdn.net/2023/02/25/Buoc-11-11-7417-1677318715.jpg?w=1020&h=0&q=100&dpr=1&fit=crop&s=JiRpujQjPOfEEAQt9vhA8Q" alt="Bánh đa cua Hải Phòng"><br>
                <h6>Trình bày và thưởng thức:</h6>
                <p>Khi ăn, chần bánh đa đỏ cho vào bát. Thêm rau muống luộc xanh mềm, chả cá, tôm luộc. Múc nước dùng nóng hổi vàng sánh chan lên. Thêm thịt riêu cua, gạch cua chưng, rắc chút tóp mỡ, hành phi, hành lá cắt nhỏ và thưởng thức. Ăn kèm chí chương Hải Phòng để tăng thêm hương vị. </p>
                <img src="https://i1-giadinh.vnecdn.net/2023/02/25/Buoc-12-thanh-pham-12-3879-1677318715.jpg?w=1020&h=0&q=100&dpr=1&fit=crop&s=oI-wL65_QYA7YE4u6o7RwA" alt="Bánh đa cua Hải Phòng"><br>

                <h6>Chú ý:</h6>
                <p>Nên chọn cua cái chắc nhỏ, gạch vàng au. Cua giã tay và lọc kỹ nhiều lần sẽ lấy được nhiều thịt, khi nấu đóng tảng đẹp mắt. Không nên lọc qua rây vì phần thịt cua bám vào rây.</p>
                <p>Món bánh đa cua Hải Phòng không thể thiếu rau muống, rau rút, tóp mỡ, hành phi giòn rụm và chả lá lốt. Còn tùy theo khẩu vị mà thêm các topping khác như tôm hoặc bề bề, chả cá…</p>
                <p>Nước dùng nguyên bản là từ nước cua đồng cộng hưởng thêm mắm tôm khô đem nướng trong lá chuối, lọc cho vào cùng với hành khô nướng sẽ thơm và dậy vị. Hiện nay, một số nơi cho thêm nước dùng hầm từ xương heo, nhưng vị ngậy lại làm mất đi vị thanh trong của món ăn.</p>
                <p>Món này ăn kèm rau muống chẻ, hoa chuối và chí chương Hải Phòng sẽ tròn vị.</p>

                <!--ending-->
                <P>Bát bánh đa cua hội tụ sắc và vị: Màu nâu đỏ từ bánh đa hòa trong nước dùng sánh vàng, vị ngọt tự nhiên. Thịt cua thơm, gạch cua bùi béo, tóp mỡ, hành phi giòn rụm làm nên món ăn trứ danh Hải Phòng.</P>

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
