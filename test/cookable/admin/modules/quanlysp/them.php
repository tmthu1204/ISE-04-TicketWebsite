<p> thêm sản phẩm </p>
<table class="them" border="1" width="80" style="border-collapse:collapse;" >
<form method="post" action="modules/quanlysp/xuly.php" enctype="multipart/form-data"> 
<tr>
    <td>Tên sản phẩm</td>
    <td><input type="text" name="tensanpham"></td>
  </tr>
  <tr>
    <td>mã sp</td>
    <td><input type="text" name="masp"></td>
  </tr>
  <tr>
    <td>giá sp</td>
    <td><input type="text" name="giasp"></td>
  </tr> 
  <tr>
    <td>số lượng</td>
    <td><input type="text" name="soluong"></td>
  </tr>
  <tr>
    <td>hình ảnh</td>
    <td><input type="file" name="hinhanh"></td>
  </tr>
  <tr>
    <td>tóm tắt</td>
    <td><textarea rows="10" cols="20"  name="tomtat"></textarea></td>
  </tr>
  <tr>
    <td>nội dung</td>
    <td><textarea rows="10" name="noidung"></textarea></td>
  </tr>
  <tr>
    <td>danh mục sản phẩm</td>
    <td>
      <select name="danhmuc" >
        <?php
        $sql_danhmuc="SELECT * FROM tbl_danhmuc ORDER BY id_danhmuc DESC";
        $query_danhmuc= mysqli_query($mysqli,$sql_danhmuc);
        while($row_danhmuc=mysqli_fetch_array($query_danhmuc)){
        ?>
        <option value="<?php echo $row_danhmuc['id_danhmuc'] ?>" ><?php echo $row_danhmuc['tendanhmuc'] ?> </option>
        <?php
        }
        ?>
      </select>
    </td>
  </tr>
  <tr>
    <td>Tình trạng</td>
    <td>
      <select name="tinhtrang" >
        <option value="1" >Kích hoạt</option>
        <option value="0" >ẩn</option>
      </select>
    </td>
  </tr>
  <tr>
    <td colspan="2"> <input type="submit" name="themsanpham" value="Thêm sản phẩm"></td>
  </tr>
</form>  
  
</table>