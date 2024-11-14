<?php

session_start();
include('config/config.php');
if(isset($_POST['dangnhap'])){
    $taikhoan=$_POST['username'];
    $matkhau=md5($_POST['password']);
    $sql= "SELECT * FROM tbl_admin WHERE username='".$taikhoan."' AND password='".$matkhau."' LIMIT 1  ";
    $row =mysqli_query($mysqli,$sql);
    $count =mysqli_num_rows($row);
    if($count > 0){
        $_SESSION['dangnhap'] = $taikhoan ;
        header("Location:index.php");
    }else{
        echo '<scripts>alert("tài khoản hoặc mật khẩu sai , vui lòng nhập lại.");</scripts>';
        header("Location:login.php");
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500&display=swap" rel="stylesheet"> 
<link rel="stylesheet" href="../css/loginadmin.css">
    <title>Document</title>
</head>
<body>
    
<div class="container">
  <form action="" autocomplete="on" method="POST" >
    <p>LOGIN</p>
    <input type="text" name="username" placeholder="Email"><br>
    <input type="password" name="password" placeholder="Password"><br>
    <input type="submit" name="dangnhap" value="Đăng Nhập"><br>
    <a href="#">Forgot Password?</a>
  </form>

  <div class="drops">
    <div class="drop drop-1"></div>
    <div class="drop drop-2"></div>
    <div class="drop drop-3"></div>
    <div class="drop drop-4"></div>
    <div class="drop drop-5"></div>
  </div>
</div>


</body>
</html>