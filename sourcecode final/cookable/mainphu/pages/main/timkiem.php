<?php
if (isset($_POST['timkiem'])){
    $tukhoa = $_POST['tukhoa'];
}
$sql_pro = "SELECT * FROM tbl_sanpham,tbl_danhmuc WHERE tbl_sanpham.id_danhmuc=tbl_danhmuc.id_danhmuc AND tbl_sanpham.tensanpham LIKE '%".$tukhoa."%'";
$query_pro = mysqli_query($mysqli, $sql_pro);
?>
<h3>từ khóa tìm kiếm : <?php echo $_POST['tukhoa']; ?> </h3>
               <ul class="product_list">
                <?php
                while ($row = mysqli_fetch_array($query_pro)){
                ?>
                     <li class="product_items">
                        <a href="sanpham.php?quanly=sanpham&id=<?php echo $row['id_sanpham'] ?>" class="product_item">
                            <img src="../admin/modules/quanlysp/uploads/<?php echo $row['hinhanh'] ?>" alt="">
                            <p class="title_product text_edit1"> <?php echo $row['tensanpham'] ?></p>
                            <p class="price_product text_edit1"><?php echo number_format($row['giasp'], 0, ',', '.') . 'vnđ' ?></p>
                            <!-- <p><?php echo $row['tendanhmuc'] ?></p> -->
                            <button class="addCart">
                                 Chi tiết  
                           </button>
                           </a>
                     </li>
                  <?php 
                } 
                  ?>
               </ul>