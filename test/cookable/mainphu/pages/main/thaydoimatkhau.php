
<div class="body2">
<?php
if(isset($_POST['doimatkhau'])){
    $taikhoan=$_POST['email'];
    $matkhau_cu=md5($_POST['password_cu']);
    $matkhau_moi=md5($_POST['password_moi']);
    $sql= "SELECT * FROM tbl_dangky WHERE email='".$taikhoan."' AND matkhau='".$matkhau_cu."' LIMIT 1  ";
    $row =mysqli_query($mysqli,$sql);
    $count =mysqli_num_rows($row);
    if($count > 0){
        $sql_update=mysqli_query($mysqli,"UPDATE tbl_dangky SET matkhau='".$matkhau_moi."' ");
        echo '<p style="color: rgb(255, 255, 255); 
              font-size: 130%;
              font-weight: bold;
              display: block ;
              padding: 10px; 
              margin: 10px; 
              background: linear-gradient(to left, rgb(98, 239, 51), green);"
              >Mật khẩu đã được thay đổi</p> <br>
        ' ;
    }else{
        echo '<p style ="color: white; 
        font-size: 130%;
        font-weight: bold;
        display: block ;
        padding: 10px; 
        margin: 10px;
        background:  linear-gradient(to left, rgb(207, 6, 6), red);">Tài khoản hoặc mật khẩu cũ sai , vui lòng nhập lại.</p> <br>
        '; 
    }
}
?>
<div class="containerChangePass">
<form action="" autocomplete="on" method="POST" >
    <p>Đổi mật khẩu admin</p>
    <td">Email</td>
    <input type="text" name="email" placeholder="email"><br>
    <td>Mật khẩu cũ</td><br>
    <input type="password" name="password_cu" placeholder="password_cu"><br>
    <Td>Mật khẩu mới</Td><br>
    <input type="password" name="password_moi" placeholder="password_moi"><br>
    <input type="submit" name="doimatkhau" value="Đổi mật khẩu"><br>
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