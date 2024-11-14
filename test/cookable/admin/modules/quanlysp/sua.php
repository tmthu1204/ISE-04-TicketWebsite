
<?php
    $sql_sua_sp = "SELECT * FROM tbl_sanpham WHERE id_sanpham='$_GET[idsanpham]' LIMIT 1";
    $query_sua_sp = mysqli_query($mysqli, $sql_sua_sp);
?>
<p> sửa sản phẩm </p>
<table border="1" width="80" style="border-collapse:collapse;" >
<?php
while ($row= mysqli_fetch_array($query_sua_sp)) {
?>
<form method="post" action="modules/quanlysp/xuly.php?idsanpham=<?php echo $row['id_sanpham'] ?>" enctype="multipart/form-data"> 
<tr>
    <td>Tên sản phẩm</td>
    <td><input type="text" value="<?php echo $row['tensanpham']?>" name="tensanpham"></td>
  </tr>
  <tr>
    <td>mã sp</td>
    <td><input type="text" value="<?php echo $row['masp']?>" name="masp"></td>
  </tr>
  <tr>
    <td>giá sp</td>
    <td><input type="text" value="<?php echo $row['giasp']?>" name="giasp"></td>
  </tr> 
  <tr>
    <td>số lượng</td>
    <td><input type="text" value="<?php echo $row['soluong']?>" name="soluong"></td>
  </tr>
  <tr>
    <td>hình ảnh</td>
    <td><input type="file" name="hinhanh">
    <img src="modules/quanlysp/uploads/<?php echo $row['hinhanh'] ?>" width="150px"> 
  </td>
  </tr>
  <tr>
    <td>tóm tắt</td>
    <td><textarea rows="10" cols="20"  name="tomtat"> <?php echo $row['tomtat'] ?> </textarea></td>
  </tr>
  <tr>
    <td>nội dung</td>
    <td><textarea rows="10" cols="20" name="noidung"> <?php echo $row['noidung'] ?> </textarea></td>
  </tr>
  <tr>
    <td>danh mục sản phẩm</td>
    <td>
      <select name="danhmuc" >
        <?php
        $sql_danhmuc="SELECT * FROM tbl_danhmuc ORDER BY id_danhmuc DESC";
        $query_danhmuc= mysqli_query($mysqli,$sql_danhmuc);
        while($row_danhmuc=mysqli_fetch_array($query_danhmuc)) {
          if($row_danhmuc['id_danhmuc'] == $row['id_danhmuc']){
        ?>
        <option selected value="<?php echo $row_danhmuc['id_danhmuc'] ?>" ><?php echo $row_danhmuc['tendanhmuc'] ?> </option>
        <?php
          } else {
        ?>
        <option value="<?php echo $row_danhmuc['id_danhmuc'] ?>" ><?php echo $row_danhmuc['tendanhmuc'] ?> </option>
        <?php  
          }
        }
        ?>
      </select>
    </td>
  </tr>
  <tr>
    <td>Tình trạng</td>
    <td>
      <select name="tinhtrang" >
        <?php
        if ($row['tinhtrang'] == 1) {
        ?>
        <option value="1" selected>Kích hoạt</option>
        <option value="0" >ẩn</option>
        <?php
        }else { 
        ?>
        <option value="1" >Kích hoạt</option>
        <option value="0" selected>ẩn</option>

        <?php
        }
        ?>
      </select>
    </td>
  </tr>
  <tr>
    <td colspan="2"> <input type="submit" name="suasanpham" value="Sửa sản phẩm"></td>
  </tr>
</form>
<?php
}
?>  
  
</table>