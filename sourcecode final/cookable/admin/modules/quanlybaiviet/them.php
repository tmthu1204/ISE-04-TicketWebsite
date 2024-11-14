<p> thêm bài viết </p>
<table class="them"  border="1" width="80" style="border-collapse:collapse;" >
<form method="post" action="modules/quanlybaiviet/xuly.php" enctype="multipart/form-data"> 
<tr>
    <td>Tên bài viết</td>
    <td><input type="text" name="tenbaiviet"></td>
  </tr>

  <tr>
    <td>hình ảnh</td>
    <td><input type="file" name="hinhanh"></td>
  </tr>
  <tr>
    <td>tóm tắt</td>
    <td><textarea rows="10" cols="100"  name="tomtat"></textarea></td>
  </tr>
  <tr>
    <td>nội dung</td>
    <td><textarea rows="10" cols="100" name="noidung"></textarea></td>
  </tr>
  <tr>
    <td>danh mục bài viết</td>
    <td>
      <select name="danhmuc" >
        <?php
        $sql_danhmuc="SELECT * FROM tbl_danhmucbaiviet ORDER BY id_baiviet DESC";
        $query_danhmuc= mysqli_query($mysqli,$sql_danhmuc);
        while($row_danhmuc=mysqli_fetch_array($query_danhmuc)){
        ?>
        <option value="<?php echo $row_danhmuc['id_baiviet'] ?>" ><?php echo $row_danhmuc['tendanhmuc_baiviet'] ?> </option>
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
    <td colspan="2"> <input type="submit" name="thembaiviet" value="Thêm bài viết"></td>
  </tr>
</form>  
  
</table>