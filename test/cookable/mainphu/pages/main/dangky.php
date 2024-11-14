<div class="body1">
<?php
    if(isset($_POST['dangky'])) {
        $tenkhachhang = $_POST['hovaten'];
        $email = $_POST['email'];
        $dienthoai = $_POST['dienthoai'];
        $matkhau = md5($_POST['matkhau']);
        $diachi = $_POST['diachi'];

        $sql_dangky = mysqli_query($mysqli, "INSERT INTO tbl_dangky(tenkhachhang, email, dienthoai, matkhau, diachi) VALUES('".$tenkhachhang."', '".$email."', '".$dienthoai."', '".$matkhau."', '".$diachi."')");
        if($sql_dangky) {
            echo '<p style="color:green"> BẠN ĐÃ ĐĂNG KÝ THÀNH CÔNG </p>';
            $_SESSION['dangky']=$tenkhachhang;
            $_SESSION['id_khachhang']=mysqli_insert_id($mysqli);
            header('location:sanpham.php?quanly=giohang');
        }
    }
?>
<div class="containerSignup">
<p>Đăng Ký thành viên</p>
<form action="" method="POST" >
    <table class="dangky" style="border-collapse:collapse;">
    <tr>
        <td>Họ và tên</td>
        <td><input type="text" size="50" name="hovaten" ></td>
    </tr>
    <tr>
        <td>Email</td>
        <td><input type="text" size="50" name="email" ></td>
    </tr>
    <tr>
        <td>Điện thoại</td>
        <td><input type="text" size="50"  name="dienthoai" ></td>
    </tr>
    <tr>
        <td>Địa chỉ</td>
        <td><input type="text" size="50"  name="diachi" ></td>
    </tr>
    <tr>
        <td>Mật khẩu</td>
        <td><input type="text" size="50"  name="matkhau" ></td>
    </tr>
    
    </table>
    <div class="lastline">
        <p> <input type="submit"  name="dangky" value="Đăng ký" > </p>
        <a href="sanpham.php?quanly=dangnhap">Đăng nhập nếu có tài khoản</a>
    </div>

</form>
</div> 
</div>