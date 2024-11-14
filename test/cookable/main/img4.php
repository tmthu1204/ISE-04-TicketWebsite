<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>COOKABLE - Sản Phẩm</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="../css/img4.css">
    <link rel="shortcut icon" type="image/jpg" href="../imgs/icon.jpg"/>
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
                            <a class="nav-link disabled active" href="img4.php">Sản phẩm</a>
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
                            <a class="nav-link " href="congthuc.php">Công thức nấu ăn</a>
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
    <div class="col-sm-7 box-left">
        <h2 >
            <span>Sản Phẩm</span>
        </h2>
        <p>Chuyên cung cấp các món ăn đảm bảo dinh dưỡng,</p>
        <p> hợp vệ sinh đến người dùng,phục vụ người dùng 1 cái
            hoàn hảo nhất</p>
            <a href="index.php">
                <button> Tìm hiểu </button>

            </a>    </div>
    <div class="col-sm-5 box-right">
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
<!-- end banner -->
        <div class="container">
                <h2 class="display-4 text-center py-5">SẢN PHẨM CỦA CHÚNG TÔI</h2>

                <!-- search -->
                <div class="wrapper">
                    <div class="search-input">
                      <a href="" target="_blank" hidden></a>
                      <input type="text" placeholder="Type to search..">
                      <div class="autocom-box">
                        <!-- here list are inserted from javascript -->
                      </div>
                      <div class="icon"><i class="fas fa-search"></i></div>
                    </div>
                  </div>
                  <script src="img4/img4.js"></script>
                  <script src="img4/suggestions.js"></script>
                <!-- end search -->
                

                <nav class="nav justify-content-center nav-pills flex-column flex-md-row py-5">
                    <a class="nav-link active " href="#fast-food" data-toggle="tab">Thức ăn nhanh</a>
                    <a class="nav-link " href="#drink"  data-toggle="tab">Món nước</a>
                    <a class="nav-link " href="#ice-cream" data-toggle="tab">Kem tươi</a>
                </nav>

            <div class="tab-content py-5">
                <div class="tab-pane active" id="fast-food">
                    <h3>Thức ăn nhanh</h3>
                        
                <div class="list-products">
                    <div class="item">
                        <img src="https://www.circlek.com.vn/wp-content/uploads/2019/05/9.png" alt="">
                        <div class="name">Mì trộn trứng xúc xích</div>
                        <div class="desc">Mô Tả Ngắn Cho Sản Phẩm</div>
                        <div class="price">500.000 VNĐ</div>
                       <div class="buttonmenu">
                        <button class="dau x1" onclick="updateDauX2('-','dau-x2-50')" >-</button>
                        <button class="dau x2" id="dau-x2-50">0</button>
                        <button class="dau x3" onclick="updateDauX2('+','dau-x2-50')">+</button>
                        <button class="dau x4" onclick="increaseChatbox()">đặt hàng</button>
                       </div>
                    </div>
                    
                    <!-- <div class="item">
                        <img src="https://vcdn1-giadinh.vnecdn.net/2022/04/20/Bc99-1650439459-8855-1650439557.jpg?w=1200&h=0&q=100&dpr=1&fit=crop&s=tEmaOO6UIMohTsyMNmFS9Q" alt="">
                        <div class="name">Mì ý</div>
                        <div class="desc">Mô Tả Ngắn Cho Sản Phẩm</div>
                        <div class="price">500.000 VNĐ</div>
                       <div class="buttonmenu">
                        <button class="dau x1" onclick="updateDauX2('-','dau-x2-50')" >-</button>
                        <button class="dau x2" id="dau-x2-50">0</button>
                        <button class="dau x3" onclick="updateDauX2('+','dau-x2-50')">+</button>
                        <button class="dau x4" onclick="increaseChatbox()">đặt hàng</button>
                       </div>
                    </div> -->
    
    
                    <div class="item">
                        <img src="https://www.circlek.com.vn/wp-content/uploads/2016/06/5.png" alt="">
                       
    
                        <div class="name">Bánh bao 2 trứng cút</div>
                        <div class="desc">Mô Tả Ngắn Cho Sản Phẩm</div>
                        <div class="price">500.000 VNĐ</div>
                        <div class="buttonmenu">
                            <button class="dau x1" onclick="updateDauX2('-','dau-x2-0')" >-</button>
                            <button class="dau x2" id="dau-x2-0">0</button>
                            <button class="dau x3" onclick="updateDauX2('+','dau-x2-0')">+</button>
                            <button class="dau x4" onclick="increaseChatbox()">đặt hàng</button>
                           </div>
                    </div>
    
    
                    <div class="item">
                        <img src="https://www.circlek.com.vn/wp-content/uploads/2018/09/4.png" alt="">
                       
    
                        <div class="name">Xôi mặn</div>
                        <div class="desc">Mô Tả Ngắn Cho Sản Phẩm</div>
                        <div class="price">500.000 VNĐ</div>
                        <div class="buttonmenu">
                            <button class="dau x1" onclick="updateDauX2('-','dau-x2-1')" >-</button>
                            <button class="dau x2" id="dau-x2-1">0</button>
                            <button class="dau x3" onclick="updateDauX2('+','dau-x2-1')">+</button>
                            <button class="dau x4" onclick="increaseChatbox()">đặt hàng</button>
                           </div>
                    </div>
                    <div class="item">
                        <img src="https://www.circlek.com.vn/wp-content/uploads/2019/08/11.png" alt="">
    
                        <div class="name">Bánh mì</div>
                        <div class="desc">Mô Tả Ngắn Cho Sản Phẩm</div>
                        <div class="price">500.000 VNĐ</div>
                        <div class="buttonmenu">
                            <button class="dau x1" onclick="updateDauX2('-','dau-x2-2')" >-</button>
                            <button class="dau x2" id="dau-x2-2">0</button>
                            <button class="dau x3" onclick="updateDauX2('+','dau-x2-2')">+</button>
                            <button class="dau x4" onclick="increaseChatbox()">đặt hàng</button>
                           </div>
                    </div>
    
                    <div class="item">
                        <img src="https://www.circlek.com.vn/wp-content/uploads/2021/08/10.png" alt="">
                       
                        <div class="name">Mì trộn sốt bơ tỏi</div>
                        <div class="desc">Mô Tả Ngắn Cho Sản Phẩm</div>
                        <div class="price">500.000 VNĐ</div>
                        <div class="buttonmenu">
                            <button class="dau x1" onclick="updateDauX2('-','dau-x2-3')" >-</button>
                            <button class="dau x2" id="dau-x2-3">0</button>
                            <button class="dau x3" onclick="updateDauX2('+','dau-x2-3')">+</button>
                            <button class="dau x4" onclick="increaseChatbox()">đặt hàng</button>
                           </div>
                    </div>
    
                    <div class="item">
                        <img src="https://www.circlek.com.vn/wp-content/uploads/2019/05/8.png" alt="">
                       
    
                        <div class="name">Mì trộn trứng</div>
                        <div class="desc">Mô Tả Ngắn Cho Sản Phẩm</div>
                        <div class="price">500.000 VNĐ</div>
                        <div class="buttonmenu">
                            <button class="dau x1" onclick="updateDauX2('-','dau-x2-4')" >-</button>
                            <button class="dau x2" id="dau-x2-4">0</button>
                            <button class="dau x3" onclick="updateDauX2('+','dau-x2-4')">+</button>
                            <button class="dau x4" onclick="increaseChatbox()">đặt hàng</button>
                           </div>
                    </div>
                    <div class="item">
                        <img src="https://www.circlek.com.vn/wp-content/uploads/2015/12/7.png" alt="">
                       
    
                        <div class="name">Bánh giò</div>
                        <div class="desc">Mô Tả Ngắn Cho Sản Phẩm</div>
                        <div class="price">500.000 VNĐ</div>
                        <div class="buttonmenu">
                            <button class="dau x1" onclick="updateDauX2('-','dau-x2-5')" >-</button>
                            <button class="dau x2" id="dau-x2-5">0</button>
                            <button class="dau x3" onclick="updateDauX2('+','dau-x2-5')">+</button>
                            <button class="dau x4" onclick="increaseChatbox()">đặt hàng</button>
                           </div>
                    </div>
                    <div class="item">
                        <img src="https://www.circlek.com.vn/wp-content/uploads/2016/06/banh-bao-trung-cut-xa-xiu-e1678701942352.png" alt="">
                       
    
                        <div class="name">Bánh bao trứng muối xá xiếu</div>
                        <div class="desc">Mô Tả Ngắn Cho Sản Phẩm</div>
                        <div class="price">500.000 VNĐ</div>
                        <div class="buttonmenu">
                            <button class="dau x1" onclick="updateDauX2('-','dau-x2-6')" >-</button>
                            <button class="dau x2" id="dau-x2-6">0</button>
                            <button class="dau x3" onclick="updateDauX2('+','dau-x2-6')">+</button>
                            <button class="dau x4" onclick="increaseChatbox()">đặt hàng</button>
                           </div>
                    </div>
                    <div class="item">
                        <img src="https://www.circlek.com.vn/wp-content/uploads/2016/06/banh-bao-khoai-mon-e1678701644677.png" alt="">
                       
    
                        <div class="name">Bánh bao khoai môn</div>
                        <div class="desc">Mô Tả Ngắn Cho Sản Phẩm</div>
                        <div class="price">500.000 VNĐ</div>
                        <div class="buttonmenu">
                            <button class="dau x1" onclick="updateDauX2('-','dau-x2-7')" >-</button>
                            <button class="dau x2" id="dau-x2-7">0</button>
                            <button class="dau x3" onclick="updateDauX2('+','dau-x2-7')">+</button>
                            <button class="dau x4" onclick="increaseChatbox()">đặt hàng</button>
                           </div>
                    </div>
                    <div class="item">
                        <img src="https://www.circlek.com.vn/wp-content/uploads/2018/04/12.png" alt="">
                       
    
                        <div class="name">Xúc xích hấp</div>
                        <div class="desc">Mô Tả Ngắn Cho Sản Phẩm</div>
                        <div class="price">500.000 VNĐ</div>
                        <div class="buttonmenu">
                            <button class="dau x1" onclick="updateDauX2('-','dau-x2-8')" >-</button>
                            <button class="dau x2" id="dau-x2-8">0</button>
                            <button class="dau x3" onclick="updateDauX2('+','dau-x2-8')">+</button>
                            <button class="dau x4" onclick="increaseChatbox()">đặt hàng</button>
                           </div>
                    </div>
                    <div class="item">
                        <img src="https://www.famima.vn/wp-content/uploads/2023/11/Xuc-Xich-Heo-Xong-Khoi-Lon-90g-1-400x400.jpg" alt="">
                       
    
                        <div class="name">Xúc xích chiên</div>
                        <div class="desc">Mô Tả Ngắn Cho Sản Phẩm</div>
                        <div class="price">500.000 VNĐ</div>
                        <div class="buttonmenu">
                            <button class="dau x1" onclick="updateDauX2('-','dau-x2-9')" >-</button>
                            <button class="dau x2" id="dau-x2-9">0</button>
                            <button class="dau x3" onclick="updateDauX2('+','dau-x2-9')">+</button>
                            <button class="dau x4" onclick="increaseChatbox()">đặt hàng</button>
                           </div>
                    </div>
                    <div class="item">
                        <img src="https://www.famima.vn/wp-content/uploads/2023/11/Xuc-xich-ho-lo-bo-pho-mai-5pcsxien-1-300x300.png" alt="">
                       
    
                        <div class="name">Hồ lô chiên</div>
                        <div class="desc">Mô Tả Ngắn Cho Sản Phẩm</div>
                        <div class="price">500.000 VNĐ</div>
                        <div class="buttonmenu">
                            <button class="dau x1" onclick="updateDauX2('-','dau-x2-10')" >-</button>
                            <button class="dau x2" id="dau-x2-10">0</button>
                            <button class="dau x3" onclick="updateDauX2('+','dau-x2-10')">+</button>
                            <button class="dau x4" onclick="increaseChatbox()">đặt hàng</button>
                           </div>
                    </div>
                    <div class="item">
                        <img src="https://www.famima.vn/wp-content/uploads/2023/11/Ga-xien-que-nuong-vi-Mexican-100-1-400x400.jpg" alt="">
                       
    
                        <div class="name">Thịt xiên nướng</div>
                        <div class="desc">Mô Tả Ngắn Cho Sản Phẩm</div>
                        <div class="price">500.000 VNĐ</div>
                        <div class="buttonmenu">
                            <button class="dau x1" onclick="updateDauX2('-','dau-x2-11')" >-</button>
                            <button class="dau x2" id="dau-x2-11">0</button>
                            <button class="dau x3" onclick="updateDauX2('+','dau-x2-11')">+</button>
                            <button class="dau x4" onclick="increaseChatbox()">đặt hàng</button>
                           </div>
                    </div>
                    <div class="item">
                        <img src="https://www.famima.vn/wp-content/uploads/2023/11/Gyoza-banh-xep-nhan-thit-nuong-01-1-400x400.jpg" alt="">
                       
    
                        <div class="name">Há cảo chiên</div>
                        <div class="desc">Mô Tả Ngắn Cho Sản Phẩm</div>
                        <div class="price">500.000 VNĐ</div>
                        <div class="buttonmenu">
                            <button class="dau x1" onclick="updateDauX2('-','dau-x2-12')" >-</button>
                            <button class="dau x2" id="dau-x2-12">0</button>
                            <button class="dau x3" onclick="updateDauX2('+','dau-x2-12')">+</button>
                            <button class="dau x4" onclick="increaseChatbox()">đặt hàng</button>
                           </div>
                    </div>
                    <div class="item">
                        <img src="https://www.famima.vn/wp-content/uploads/2023/11/Dui-ga-goc-tu-nuong-vi-tieu-01-2-400x400.jpg" alt="">
                       
    
                        <div class="name">Đùi gà góc tư xối mỡ</div>
                        <div class="desc">Mô Tả Ngắn Cho Sản Phẩm</div>
                        <div class="price">500.000 VNĐ</div>
                        <div class="buttonmenu">
                            <button class="dau x1" onclick="updateDauX2('-','dau-x2-13')" >-</button>
                            <button class="dau x2" id="dau-x2-13">0</button>
                            <button class="dau x3" onclick="updateDauX2('+','dau-x2-13')">+</button>
                            <button class="dau x4" onclick="increaseChatbox()">đặt hàng</button>
                           </div>
                    </div>
                    <div class="item">
                        <img src="https://jollibee.com.vn/media/catalog/product/cache/9011257231b13517d19d9bae81fd87cc/1/_/1_mi_ng_ggvv_png_1.png" alt="">
                       
    
                        <div class="name">Đùi gà chiên</div>
                        <div class="desc">Mô Tả Ngắn Cho Sản Phẩm</div>
                        <div class="price">500.000 VNĐ</div>
                        <div class="buttonmenu">
                            <button class="dau x1" onclick="updateDauX2('-','dau-x2-14')" >-</button>
                            <button class="dau x2" id="dau-x2-14">0</button>
                            <button class="dau x3" onclick="updateDauX2('+','dau-x2-14')">+</button>
                            <button class="dau x4" onclick="increaseChatbox()">đặt hàng</button>
                           </div>
                    </div>
                    <div class="item">
                        <img src="https://jollibee.com.vn/media/catalog/product/cache/9011257231b13517d19d9bae81fd87cc/6/d/6d2e290195e851-cmggin_1_2.png" alt="">
                       
    
                        <div class="name">Cơm đùi gà</div>
                        <div class="desc">Mô Tả Ngắn Cho Sản Phẩm</div>
                        <div class="price">500.000 VNĐ</div>
                        <div class="buttonmenu">
                            <button class="dau x1" onclick="updateDauX2('-','dau-x2-15')" >-</button>
                            <button class="dau x2" id="dau-x2-15">0</button>
                            <button class="dau x3" onclick="updateDauX2('+','dau-x2-15')">+</button>
                            <button class="dau x4" onclick="increaseChatbox()">đặt hàng</button>
                           </div>
                    </div>
                    <div class="item">
                        <img src="https://jollibee.com.vn/media/catalog/product/cache/9011257231b13517d19d9bae81fd87cc/g/_/g_s_t_cay_1.png" alt="">
                       
    
                        <div class="name">Đùi gà sốt mắm tỏi</div>
                        <div class="desc">Mô Tả Ngắn Cho Sản Phẩm</div>
                        <div class="price">500.000 VNĐ</div>
                        <div class="buttonmenu">
                            <button class="dau x1" onclick="updateDauX2('-','dau-x2-16')" >-</button>
                            <button class="dau x2" id="dau-x2-16">0</button>
                            <button class="dau x3" onclick="updateDauX2('+','dau-x2-16')">+</button>
                            <button class="dau x4" onclick="increaseChatbox()">đặt hàng</button>
                           </div>
                    </div>
                    <div class="item">
                        <img src="https://jollibee.com.vn/media/catalog/product/cache/9011257231b13517d19d9bae81fd87cc/3/8/38b2b63ad78a31-1gstcaycm_2.jpg" alt="">
                       
    
                        <div class="name">Cơm gà sốt mắm tỏi</div>
                        <div class="desc">Mô Tả Ngắn Cho Sản Phẩm</div>
                        <div class="price">500.000 VNĐ</div>
                        <div class="buttonmenu">
                            <button class="dau x1" onclick="updateDauX2('-','dau-x2-17')" >-</button>
                            <button class="dau x2" id="dau-x2-17">0</button>
                            <button class="dau x3" onclick="updateDauX2('+','dau-x2-17')">+</button>
                            <button class="dau x4" onclick="increaseChatbox()">đặt hàng</button>
                           </div>
                    </div>
                    <div class="item">
                        <img src="https://jollibee.com.vn/media/catalog/product/cache/9011257231b13517d19d9bae81fd87cc/t/o/tom_burger-01.jpg" alt="">
                       
    
                        <div class="name">Hamburger bò</div>
                        <div class="desc">Mô Tả Ngắn Cho Sản Phẩm</div>
                        <div class="price">500.000 VNĐ</div>
                        <div class="buttonmenu">
                            <button class="dau x1" onclick="updateDauX2('-','dau-x2-18')" >-</button>
                            <button class="dau x2" id="dau-x2-18">0</button>
                            <button class="dau x3" onclick="updateDauX2('+','dau-x2-18')">+</button>
                            <button class="dau x4" onclick="increaseChatbox()">đặt hàng</button>
                           </div>
                    </div>
                    <div class="item">
                        <img src="https://jollibee.com.vn/media/catalog/product/cache/9011257231b13517d19d9bae81fd87cc/9/2/92d27d47dadbfc-hambugerlon.jpg" alt="">
                       
    
                        <div class="name">Hamburger gà</div>
                        <div class="desc">Mô Tả Ngắn Cho Sản Phẩm</div>
                        <div class="price">500.000 VNĐ</div>
                        <div class="buttonmenu">
                            <button class="dau x1" onclick="updateDauX2('-','dau-x2-19')" >-</button>
                            <button class="dau x2" id="dau-x2-19">0</button>
                            <button class="dau x3" onclick="updateDauX2('+','dau-x2-19')">+</button>
                            <button class="dau x4" onclick="increaseChatbox()">đặt hàng</button>
                           </div>
                    </div>
                </div>
                </div>
                
                <div class="tab-pane" id="drink">
                    <h3>Thức uống</h3>
                        <!-- drink -->
                <div class="list-products">
                    <div class="item">
                        <img src="https://jollibee.com.vn/media/catalog/product/cache/9011257231b13517d19d9bae81fd87cc/l/y/lypepsi-03.png" alt="">
                       
    
                        <div class="name">Pepsi</div>
                        <div class="desc">Mô Tả Ngắn Cho Sản Phẩm</div>
                        <div class="price">500.000 VNĐ</div>
                        <div class="buttonmenu">
                            <button class="dau x1" onclick="updateDauX2('-','dau-x2-22')" >-</button>
                            <button class="dau x2" id="dau-x2-22">0</button>
                            <button class="dau x3" onclick="updateDauX2('+','dau-x2-22')">+</button>
                            <button class="dau x4" onclick="increaseChatbox()">đặt hàng</button>
                           </div>
                    </div>
                    <div class="item">
                        <img src="https://jollibee.com.vn/media/catalog/product/cache/9011257231b13517d19d9bae81fd87cc/7/1/71434bb9342048-7up.png" alt="">
                       
    
                        <div class="name">7up</div>
                        <div class="desc">Mô Tả Ngắn Cho Sản Phẩm</div>
                        <div class="price">500.000 VNĐ</div>
                        <div class="buttonmenu">
                            <button class="dau x1" onclick="updateDauX2('-','dau-x2-23')" >-</button>
                            <button class="dau x2" id="dau-x2-23">0</button>
                            <button class="dau x3" onclick="updateDauX2('+','dau-x2-23')">+</button>
                            <button class="dau x4" onclick="increaseChatbox()">đặt hàng</button>
                           </div>
                    </div>
                    <div class="item">
                        <img src="https://jollibee.com.vn/media/catalog/product/cache/9011257231b13517d19d9bae81fd87cc/1/c/1cd70b5383c11d-mirinda.png" alt="">
                       
    
                        <div class="name">Mirinda</div>
                        <div class="desc">Mô Tả Ngắn Cho Sản Phẩm</div>
                        <div class="price">500.000 VNĐ</div>
                        <div class="buttonmenu">
                            <button class="dau x1" onclick="updateDauX2('-','dau-x2-24')" >-</button>
                            <button class="dau x2" id="dau-x2-24">0</button>
                            <button class="dau x3" onclick="updateDauX2('+','dau-x2-24')">+</button>
                            <button class="dau x4" onclick="increaseChatbox()">đặt hàng</button>
                           </div>
                    </div>
                    <div class="item">
                        <img src="https://jollibee.com.vn/media/catalog/product/cache/9011257231b13517d19d9bae81fd87cc/x/o/xoai_dao_menu.png" alt="">
                       
    
                        <div class="name">Nước ép xoài</div>
                        <div class="desc">Mô Tả Ngắn Cho Sản Phẩm</div>
                        <div class="price">500.000 VNĐ</div>
                        <div class="buttonmenu">
                            <button class="dau x1" onclick="updateDauX2('-','dau-x2-25')" >-</button>
                            <button class="dau x2" id="dau-x2-25">0</button>
                            <button class="dau x3" onclick="updateDauX2('+','dau-x2-25')">+</button>
                            <button class="dau x4" onclick="increaseChatbox()">đặt hàng</button>
                           </div>
                    </div>
                    <div class="item">
                        <img src="https://jollibee.com.vn/media/catalog/product/cache/9011257231b13517d19d9bae81fd87cc/1/a/1a00ca58bc00e1-b4ab7d469cee70aquaffina01.png" alt="">
                       
    
                        <div class="name">Nước suối</div>
                        <div class="desc">Mô Tả Ngắn Cho Sản Phẩm</div>
                        <div class="price">500.000 VNĐ</div>
                        <div class="buttonmenu">
                            <button class="dau x1" onclick="updateDauX2('-','dau-x2-26')" >-</button>
                            <button class="dau x2" id="dau-x2-26">0</button>
                            <button class="dau x3" onclick="updateDauX2('+','dau-x2-26')">+</button>
                            <button class="dau x4" onclick="increaseChatbox()">đặt hàng</button>
                           </div>
                    </div>
                </div>
         </div>
                <div class="tab-pane" id="ice-cream">
                    <h3>Kem tươi</h3>
                        <!-- //ice-cream -->
                    <div class="list-products">
                        <div class="item">
                            <img src="https://jollibee.com.vn/media/catalog/product/cache/9011257231b13517d19d9bae81fd87cc/d/0/d01402ed11976b-kemsundeadau.png" alt="">
                           
        
                            <div class="name">Kem việt quất</div>
                            <div class="desc">Mô Tả Ngắn Cho Sản Phẩm</div>
                            <div class="price">500.000 VNĐ</div>
                            <div class="buttonmenu">
                                <button class="dau x1" onclick="updateDauX2('-','dau-x2-20')" >-</button>
                                <button class="dau x2" id="dau-x2-20">0</button>
                                <button class="dau x3" onclick="updateDauX2('+','dau-x2-20')">+</button>
                                <button class="dau x4" onclick="increaseChatbox()">đặt hàng</button>
                               </div>
                        </div>
                        <div class="item">
                            <img src="https://jollibee.com.vn/media/catalog/product/cache/9011257231b13517d19d9bae81fd87cc/1/9/192dcb48e7393a-kemsocola16.png" alt="">
                           
        
                            <div class="name">Kem chocolate</div>
                            <div class="desc">Mô Tả Ngắn Cho Sản Phẩm</div>
                            <div class="price">500.000 VNĐ</div>
                            <div class="buttonmenu">
                                <button class="dau x1" onclick="updateDauX2('-','dau-x2-21')" >-</button>
                                <button class="dau x2" id="dau-x2-21">0</button>
                                <button class="dau x3" onclick="updateDauX2('+','dau-x2-21')">+</button>
                                <button class="dau x4" onclick="increaseChatbox()">đặt hàng</button>
                               </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
                    
                                    
            <div id="Bangsp"> 
                <h2>CẢM ƠN QUÝ KHÁCH</h2>
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
                <a href="img4.php" class="list-group-item list-group-item-action">Sản phẩm</a>
                <a href="blog.php" class="list-group-item list-group-item-action">Blog</a>
                <a href="lienhe.php" class="list-group-item list-group-item-action">Liên hệ</a>
                <a href="calo.php" class="list-group-item list-group-item-action">Tính calo</a>
                <a href="congthuc.php" class="list-group-item list-group-item-action">Công thức nấu ăn</a>
            </div>
        </div> 
        <div class="col-7" >
        <h3>LIÊN HỆ</h3>
        <form action="">
            <input class="border-top" type="text" placeholder="Địa chỉ email"  style="background: transparent; cursor: text;">
            <button class="border-top">Nhận tin</button>
        </form>
        </div>
        <div class="logo">
        </div>
        <p class="text-secondary ">Cung cấp sản phẩm với chất lượng an toàn cho quý khách</p>
      
   
       
</div>
</div>
    <!-- Thêm vào cuối tệp index.html -->
    <div id="chatbot">
        <p class="chatbox"> 
            <img  src="data:image/jpeg;base64,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" alt=""></img>
        </p>
    </div>
    <p class="chatbox2" id="chatbox2">0</p>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>