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
                <h5>Lẩu riêu cua</h5>
                <p class="like">Số lượt thích: <span id="like-count">3913</span></p>
                <img src="https://syphu.com.vn/wp-content/uploads/2022/11/lam-lau-cua-dong.jpg" alt="Lẩu riêu cua"><br>

                <!--intro-->
                <p>Lẩu riêu cua thường đi kèm với bắp bò và sườn sụn. Làm lẩu riêu cua bắp bò cần những nguyên liệu gì, cách nấu như thế nào cho ngon, đặc biệt là làm sao để thịt cua đóng thành bánh và nước lẩu ngọt, thơm? Tất cả sẽ được giải đáp trong bài viết dưới đây.</p>

                <!--nguyen lieu-->
                <div class="nguyenlieu">
                    <h6>Nguyên liệu:</h6>
                    <h7>* Phần nguyên liệu chính nấu lẩu riêu cua bắp bò</h7><br>
                    <h8>500g thịt cua xay sẵn</h8><br>
                    <h8>500g bắp bò</h8><br>
                    <h8>300g giò sống có trộn mộc nhĩ, nấm hương</h8><br>
                    <h8>500g xương ống heo</h8><br>
                    <h8>8-10 củ hành khô</h8><br>
                    <h8>1 củ gừng to</h8><br>
                    <h8>3-4 quả cà chua</h8><br>
                    <h8>1 củ hành tây</h8><br>
                    <h8>Hành lá</h8><br>
                    <h8>Muối hạt</h8><br>
                    <h8>Rượu trắng</h8><br>
                    <h8>Gia vị: Bột ngọt, nước mắm, tiêu xay, dấm bỗng</h8><br>
                    <h7>* Phần nguyên liệu ăn kèm</h7><br>
                    <h8>Rau mồng tơi</h8><br>
                    <h8>Rau muống</h8><br>
                    <h8>Rau muống chẻ</h8><br>
                    <h8>Hoa chuối</h8><br>
                    <h8>Nấm kim châm</h8><br>
                    <h8>Mướp hương</h8><br>
                    <h8>Bún</h8><br>
                    <h8>Muối tiêu chanh, ớt (làm nước chấm)</h8><br>
                </div><br>

                <!--cach lam-->
                <h6>Cách làm:</h6>
                <h7>Sơ chế xương heo và ninh nước dùng:</h7><br>
                <p>Xương heo rửa sạch, rồi đem nướng xém để chảy hết máu đỏ trong tủy, giúp khử mùi hôi. Sau đó, cạo sạch vết xém đen bám trên xương rồi rửa lại.</p>
                <img src="https://cookbeo.com/media/2021/07/lau-rieu-cua-bap-bo/thumbnails/xuong-heo-1024.webp" alt="Lẩu riêu cua"><br>
                <p>Hành tím bóc bỏ vỏ, rửa sạch. 3 quả cà chua rửa sạch, cắt hạt lựu. 3 quả còn lại cắt múi cau. Hành lá và tía tô rửa sạch, cắt nhỏ. Rau ăn kèm nhặt kỹ, rửa sạch, để ráo.</p>
                <p>Tiếp đến, vớt xương ra, rửa sạch lại lần nữa. Đổ nước chần đi, thay nước mới rồi cho xương vào để ninh lấy nước dùng lẩu. Để nước dùng thơm, bạn cho khoảng 2-3 củ hành khô và 1 củ gừng nhỏ đã nướng vào ninh cùng. Lưu ý, hành và gừng sau khi nướng cần được rửa sạch, riêng hành cần bóc vỏ trước khi cho vào nồi ninh để nước dùng không bị đục màu.</P>
                <img src="https://cookbeo.com/media/2021/07/lau-rieu-cua-bap-bo/thumbnails/ninh-xuong-heo-1024.webp" alt="Lẩu riêu cua"><br>
                <p>Thời gian ninh xương heo có độ ngọt nhất định ít nhất cũng phải 3-4 tiếng (còn thông thường phải 6-8 tiếng). Chính vì vậy, khi bắt tay vào làm lẩu riêu cua bắp bò, Cookbeo khuyên bạn nên sơ chế xương heo và ninh nước dùng trước. Trong lúc ninh xương, bạn sơ chế các nguyên liệu còn lại sẽ hợp lý và tiết kiệm thời gian hơn.</p>
                <h7>Sơ chế thịt bò:</h7><br>
                <p>Để bắp bò mềm, không bị ra nước, bạn ướp bắp bò với 1 ít dầu ăn và gừng tươi băm.                </p>
                <p>Bắp bò bạn để nguyên tảng, bóp cùng với ít muối hạt, rượu trắng và gừng tươi giã nhuyễn để làm sạch và khử mùi gây ngái đặc trưng của loại thịt này. Sau đó rửa sạch, để ráo và thái miếng mỏng.</p>
                <img src="https://cookbeo.com/media/2021/07/lau-rieu-cua-bap-bo/thumbnails/bat-thit-bo-1024.webp" alt="Lẩu riêu cua"><br>
                <h7>Sơ chế cua:</h7><br>
                <P>Cua sau khi xay xong để riêng ra tô, gạch cua để riêng ra bát nhỏ. Lưu ý nên rửa qua nước 1 lần nữa để làm sạch cua.</P>
                <p>Cho nước vào tô đựng thịt cua xay, dùng tay khuấy và bóp nhẹ để tách thịt cua và xương cua, sau đó khéo léo nghiêng tô để chắt nước cua vào nồi. Tiếp tục cho thêm nước, lọc và chắt lấy nước đến khi nước lọc cua trong là được.</p>
                <img src="https://cookbeo.com/media/2021/05/cach-lam-cua/loc-cua.jpg" alt="Lẩu riêu cua"><br>
                <P>Nước cua sau khi lọc, nêm 1/2 thìa canh bột canh và 1/2 thìa canh bột ngọt, khuấy đều và để nước cua 'nghỉ' trong khoảng 5-10 phút.</P>
                <p>Cho nồi nước cua lên bếp. Khi nấu cua, bạn nhớ là không nấu ở lửa lớn, vì thịt cua rất dễ trào ra ngoài và làm cho thịt cua không thể nào đóng thành bánh mà sẽ vỡ vụn. Thêm vào đó, trong lúc đợi nước sôi, dùng đũa khuấy nhẹ ở dưới đáy nồi để thịt cua tách khỏi đáy nồi và nổi lên trên.</p>
                <p>Khi nước sôi, nên hạ bớt nhiệt độ xuống, dùng đũa khéo léo gạt bánh cua sang 1 bên, dùng muôi múc nước cua dội lên để bánh cua chín và dính chắc vào nhau.</p>
                <img src="https://cookbeo.com/media/2021/07/lau-rieu-cua-bap-bo/thumbnails/nau-nuoc-cua-1024.webp" alt="Lẩu riêu cua"><br>
                <img src="https://cookbeo.com/media/2021/07/lau-rieu-cua-bap-bo/thumbnails/dia-banh-cua-1024.webp" alt="Lẩu riêu cua"><br>
                <h7>Sơ chế các nguyên liệu khác:</h7><br>
                <P>Cà chua rửa sạch, bổ múi cau. Hành tây lột vỏ, bổ làm đôi, xắt lát mỏng. Hành lá nhặt rửa sạch, cắt khúc dài khoảng 3-4cm.</P>
                <img src="https://cookbeo.com/media/2021/07/lau-rieu-cua-bap-bo/thumbnails/so-che-ca-chua-va-hanh-tay-1024.webp" alt="Lẩu riêu cua"><br>
                <P>Rau ăn kèm lẩu nhặt và ngâm rửa nước muối sạch sẽ, sau đó để ráo. Bún chần qua nước sôi, để ráo. Giò sống cho vào bát, nêm với 1 thìa canh nước mắm và 1/2 thìa cà phê tiêu xay, trộn đều lên.</P>
                <img src="https://cookbeo.com/media/2021/07/lau-rieu-cua-bap-bo/thumbnails/gio-song-1024.webp" alt="Lẩu riêu cua"><br>
                <p>Hành khô bóc vỏ, thái lát mỏng. Để riêng 1/4 số hành khô dùng chưng gạch cua, số hành khô còn lại dùng để làm hành phi.</p>
                <h7>Làm hành phi:</h7><br>
                <p>Cho dầu ăn vào chảo, nhiều dầu 1 chút, đủ để hành khô ngập trong dầu. Có như vậy hành phi mới giòn và sẽ không bị ngấm dầu. </p>
                <p>Để hành phi giòn lâu, vàng ươm, nên cho hành vào từ lúc dầu còn nguội và chiên ở mức lửa vừa. Khi hành chín sẽ nổi lên trên, đảo đều tay đến khi thấy hành bắt đầu ngả sang màu vàng thì vớt ra giấy thấm dầu.</p>
                <img src="https://cookbeo.com/media/2021/07/lau-rieu-cua-bap-bo/thumbnails/phi-hanh-1024.webp" alt="Lẩu riêu cua"><br>
                <img src="https://cookbeo.com/media/2021/07/lau-rieu-cua-bap-bo/thumbnails/hanh-phi-1024.webp" alt="Lẩu riêu cua"><br>
                <h7>Chưng gạch cua:</h7><br>
                <p>Cho hơn 1 thìa canh dầu ăn vào chảo, phi thơm 1 ít hành khô, sau đó cho nửa số gạch cua vào để chưng. Vì gạch cua rất dễ bị cháy nên khi chưng gạch cua, bạn nhớ để nhỏ lửa.</p>
                <p>Nêm 1 thìa cà phê nước mắm vào cho gạch thơm. Khi gạch cua chín, cho cà chua vào đảo qua rồi trút ra bát riêng. Phần gạch cua và cà chua này sẽ cho vào nồi nước dùng lẩu riêu cua với mục đích tạo màu. Ở bước này, bạn có thể cho thêm 1/3 thìa cà phê bột nghệ để chưng cùng gạch cua và cà chua để tăng thêm màu sắc hấp dẫn cho món ăn.</p>
                <p>Tiếp tục thêm 1 thìa canh dầu ăn vào chảo lúc nãy, cho nốt số hành khô vào để phi thơm cùng với phần gạch cua còn lại. Nêm 1 thìa cà phê nước mắm vào, đảo đều tay đến khi gạch cua chín thì cho bánh cua vào. Lúc này cần nhẹ nhàng, đảo nhẹ để bánh cua không bị vỡ nát. Chưng thêm khoảng 30 giây thì tắt bếp, cho phần gạch cua bánh cua này ra bát riêng.</p>
                <img src="https://cookbeo.com/media/2021/07/lau-rieu-cua-bap-bo/thumbnails/chung-thit-cua-1024.webp" alt="Lẩu riêu cua"><br>
                <h7>Nấu lẩu riêu cua bắp bò:</h7><br>
                <p>Sau khi ninh xương được khoảng 3-4 tiếng, nước dùng đã có độ ngọt nhất định. Bạn vớt xương ra, sau đó đổ phần nước canh cua đã nấu vào trong nồi nước dùng. Tiếp đến cho gạch cua chưng với cà chua vào. Dùng thìa nhỏ xắn giò sống thành viên mọc nhỏ cho vào nồi, nấu thêm khoảng 5-6 phút.</p>
                <img src="https://cookbeo.com/media/2021/07/lau-rieu-cua-bap-bo/thumbnails/noi-nuoc-lau-rieu-cua-1024.webp" alt="Lẩu riêu cua"><br>
                <p>Nêm gia vị cho nước dùng lẩu, vì đây là lẩu riêu cua nên chua dịu vẫn là hương vị chủ đạo. Bạn nêm muối, bột ngọt, 1 ít đường, nước mắm và sau đó là dấm bỗng để tạo vị chua. Cuối cùng, chuyển nước dùng sang nồi lẩu chuyên dụng.</p>
                <img src="https://cookbeo.com/media/2021/07/lau-rieu-cua-bap-bo/thumbnails/noi-lau-rieu-cua-bap-bo-1024.webp" alt="Lẩu riêu cua"><br>

                <!--ending-->
                <P>Bày biện, trang trí rau và bún ăn kèm ra bàn, pha muối tiêu chanh để chấm cùng khi ăn lẩu. Lẩu riêu cua bắp bò thơm phức, màu sắc đẹp mắt và hương vị thì ngon tuyệt vời.</P>
                <img src="https://cookbeo.com/media/2021/07/lau-rieu-cua-bap-bo/thumbnails/lau-rieu-cua-bap-bo-16x9-1024.webp" alt="Lẩu riêu cua"><br>

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
