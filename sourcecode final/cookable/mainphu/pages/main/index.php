<?php
if(isset($_GET['trang'])){
  $page=$_GET['trang'];
}else{
  $page=1;
}
if($page==''||$page==1){
  $begin=0;
}else{
  $begin=($page*3)-3;
}
$sql_pro = "SELECT * FROM tbl_sanpham,tbl_danhmuc WHERE tbl_sanpham.id_danhmuc=tbl_danhmuc.id_danhmuc ORDER BY tbl_sanpham.id_sanpham DESC LIMIt $begin,3";
$query_pro = mysqli_query($mysqli, $sql_pro);
?>
         

               <h1 style="margin-top: 13%; margin-bottom: 5%; text-align: center; font-size:45px">Sản phẩm mới nhất</h1>
              
               <!-- search -->
               <div class="wrapper">
                    <div class="search-input">
                      <p> 
                    <form action="sanpham.php?quanly=timkiem" method="POST">
                        <input type="text" placeholder="tìm kiếm sản phẩm..." name="tukhoa"> 
                        <input type="submit" name="timkiem" value="SEARCH" >
                    </form>
                     </p>  
                      <div class="autocom-box">
                        <li>Bò xào</li>
                        <li>Bò lúc lắc</li>
                       
                        <li>Khổ qua hấp tôm</li>
                        <li>Bạch tuột nướng</li>
                        <li>lẩu chay</li>
                        <li>lẩu thái</li>
                        <li>lẩu hải sản</li>
                        <li>Gà nướng mật ong</li>
                        <li>gà chiên mắm</li>
                        <li>dimsum hấp</li>
                        <li>set đồ nướng</li>
                        <li>set hấp</li>
                      </div>
                    </div>
                  </div>
                  <script src="../js/suggestions.js"></script>
                  <script src="../js/img4.js"></script>
                <!-- end search -->

               <ul class="product_list">
                <?php
                while ($row = mysqli_fetch_assoc($query_pro)){
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
               <div style="clear:both;"></div>
               <style type="text/css">
                ul.list_trang{
                  display: flex; 
                  justify-content: flex-end;
                  padding:20px;
                  margin-top: 20px;
                  list-style:none;
                }
                ul.list_trang li{
                  padding:5px 13px;
                  margin: 5px;
                  background: burlywood;
                  display: block;
                }
                ul.list_trang li a{
                  color: #000;
                  text-align: center;
                  text-decoration: none;
                }
                ul.list_trang li:hover{
                  box-shadow: 0px 0px 5px black;
                }

                </style>
                <?php
                $sql_trang= mysqli_query($mysqli,"SELECT *FROM tbl_sanpham");
                $row_count= mysqli_num_rows(  $sql_trang);
                $trang= ceil($row_count/3);
                ?>
               <ul class="list_trang">
                <?php
                for($i=1;$i<=$trang;$i++){
                ?>   
                    <li <?php if($i==$page){echo 'style="background: brown; color: white;';}else{echo '';}?>><a  href="sanpham.php?trang=<?php echo $i?>"><?php echo $i?></a></li>
                <?php
                }
                ?>
               </ul>
               

