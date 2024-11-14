<?php
        $sql_danhmuc="SELECT * FROM tbl_danhmuc ORDER BY id_danhmuc DESC";
        $query_danhmuc= mysqli_query($mysqli,$sql_danhmuc);
?>
<?php
if(isset($_GET['dangxuat'])&&$_GET['dangxuat']==1){
    unset($_SESSION['dangky']);
}
?>
<div class="spmenu">
            <ul class="list_menu">
            <li><a href="sanpham.php">Món ăn</a></li>
                <?php
                ?>
                <?php
                if(isset($_SESSION['dangky'])){
                    ?>
                    <li><a href="sanpham.php?dangxuat=1">Đăng xuất</a></li>
                    <li><a href="sanpham.php?quanly=thaydoimatkhau">Thay đổi mật khẩu</a></li>
                    <?php
                }else{
                    ?>
                    <li><a href="sanpham.php?quanly=dangky">Đăng ký </a></li>
                    <?php
                }
                ?>
                <li><a href="sanpham.php?quanly=giohang">Giỏ hàng</a></li>

                
            </ul>

        </div>