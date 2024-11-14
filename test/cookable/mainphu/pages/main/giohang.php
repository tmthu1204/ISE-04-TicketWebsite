<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Giỏ Hàng</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f8f9fa;
      margin: 0;
      padding: 0;
    }

    .cart-container {
      width: 80%;
      margin: 50px auto;
      background-color: #fff;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    h2 {
      text-align: center;
      color: #333;
      margin-bottom: 20px;
    }

    .welcome-message {
      font-size: 18px;
      color: #555;
      text-align: right;
      margin-bottom: 20px;
    }

    .welcome-message span {
      color: red;
      font-weight: bold;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-bottom: 20px;
    }

    th, td {
      padding: 10px;
      border: 1px solid #ddd;
      text-align: center;
    }

    th {
      background-color: #007bff;
      color: #fff;
    }

    tr:nth-child(even) {
      background-color: #f2f2f2;
    }

    img {
      max-width: 150px;
      height: auto;
      border-radius: 5px;
    }

    .fa-style {
      color: #007bff;
      cursor: pointer;
    }

    .fa-style:hover {
      color: #0056b3;
    }

    .total, .action-links {
      margin: 20px 0;
      text-align: right;
    }

    .total p, .action-links p {
      font-size: 18px;
      color: #333;
    }

    .total p {
      float: left;
    }

    .action-links p {
      margin: 0;
    }

    .action-links a {
      color: #dc3545;
      text-decoration: none;
      font-weight: bold;
    }

    .action-links a:hover {
      text-decoration: underline;
    }

    .checkout {
      text-align: center;
      margin-top: 20px;
    }

    .checkout a {
      background-color: #28a745;
      color: #fff;
      padding: 10px 20px;
      text-decoration: none;
      border-radius: 5px;
      font-weight: bold;
    }

    .checkout a:hover {
      background-color: #218838;
    }
  </style>
</head>
<body>
  <div class="cart-container">
    <h2>Giỏ Hàng</h2>
    <div class="welcome-message">
      <?php
      if(isset($_SESSION['dangky'])){
        echo 'Xin chào'.'<span>'.$_SESSION['dangky'].'</span>';
      }
      ?>
    </div>
    <table>
      <tr>
        <th>Id</th>
        <th>Mã sản phẩm</th>
        <th>Tên sản phẩm</th>
        <th>Hình ảnh</th>
        <th>Số lượng</th>
        <th>Giá sản phẩm</th>
        <th>Thành tiền</th>
        <th>Quản lý</th>
      </tr>
      <?php
      if(isset($_SESSION['cart'])) {
        $i=0;
        $tongtien=0;
        foreach($_SESSION['cart'] as $cart_item){
          $thanhtien=$cart_item['soluong']*$cart_item['giasp'];
          $tongtien+=$thanhtien;
          $i++;
      ?> 
      <tr>
        <td><?php echo $i; ?></td>
        <td><?php echo $cart_item['masp']; ?></td>
        <td><?php echo $cart_item['tensanpham']; ?></td>
        <td><img src="admin/modules/quanlysp/uploads/<?php echo $cart_item['hinhanh']; ?>" width="150px"></td>
        <td>
          <a href="pages/main/themgiohang.php?cong=<?php echo $cart_item['id']?>"><i class="fa-solid fa-plus fa-style"></i></a>
          <?php echo $cart_item['soluong']; ?>
          <a href="pages/main/themgiohang.php?tru=<?php echo $cart_item['id']?>"><i class="fa-solid fa-minus fa-style"></i></a>
        </td>
        <td><?php echo number_format($cart_item['giasp'],0, ',','.').'vnd'; ?></td>
        <td><?php echo number_format($thanhtien,0, ',','.').'vnd'; ?></td>
        <td><a href="pages/main/themgiohang.php?xoa=<?php echo $cart_item['id']?>">Xóa</a></td>
      </tr>
      <?php
        }
        ?>
        <tr>
        <td colspan="8">
        <div class="total">
          <p>Tổng tiền: <?php echo number_format($tongtien,0, ',','.').'vnd'?></p>
        </div>
        <div class="action-links">
          <p><a href="pages/main/themgiohang.php?xoatatca=1">Xóa tất cả</a></p>  
        </div>
        <div style="clear: both;"></div>
        <?php
        if(isset($_SESSION['dangky'])){
          ?>
          <div class="checkout">
            <p><a href="pages/main/thanhtoan.php">Đặt hàng</a></p>
          </div>
          <?php
        }else{
          ?>
          <div class="checkout">
            <p><a href="sanpham.php?quanly=dangky">Đăng ký đặt hàng</a></p>
          </div>
          <?php
        }
        ?>
      </td>
      </tr>
        <?php
      }else{
      ?>
      <tr>
        <td colspan="8"><p>Hiện tại giỏ hàng trống</p></td>
      </tr>
      <?php
      }
      ?>
    </table>
  </div>
</body>
</html>
