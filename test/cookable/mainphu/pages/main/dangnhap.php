<div class="body1">
<?php
if(isset($_POST['dangnhap'])){
    $email=$_POST['email'];
    $matkhau=md5($_POST['password']);
    $sql= "SELECT * FROM tbl_dangky WHERE email='".$email."' AND matkhau='".$matkhau."' LIMIT 1  ";
    $row =mysqli_query($mysqli,$sql);
    $count =mysqli_num_rows($row);
    if($count > 0){
        $row_data=mysqli_fetch_array($row);
        $_SESSION['dangky'] = $row_data['tenkhachhang'] ;
        $_SESSION['id_khachhang'] = $row_data['id_dangky'] ;
        header("Location:sanpham.php?quanly=giohang");
    }else{
        echo '<P style ="color:red">Mật khẩu hoặc email không đúng, vui lòng nhập lại.</P>';
    }
}
?>
<div class="containerlogin">
  <form action="" autocomplete="on" method="POST" >
    <p>Đăng nhập khách hàng</p>
    <input type="text" name="email" placeholder="Email"><br>
    <input type="password" name="password" placeholder="Mật khẩu"><br>
    <input type="submit" name="dangnhap" value="Đăng Nhập"><br>
    <a href="dangky.php">Forgot Password?</a>
  </form>
   <div class="drops">
    <div class="drop drop-1"></div>
    <div class="drop drop-2"></div>
    <div class="drop drop-3"></div>
    <div class="drop drop-4"></div>
    <div class="drop drop-5"></div>
  </div>
</div>
</div>