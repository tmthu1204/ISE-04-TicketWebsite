<?php
    $sql_lietke_sp = "SELECT * FROM tbl_sanpham, tbl_danhmuc WHERE tbl_sanpham.id_danhmuc=tbl_danhmuc.id_danhmuc ORDER BY id_sanpham DESC";
    $query_lietke_sp = mysqli_query($mysqli, $sql_lietke_sp);
?>
<p>liệt kê</p>
<table class="lietke" style="width: 100%" border="1" style="border-collapse:collapse;" >

    <tr>
        <th>Id</th>
        <th>Tên sản phẩm</th>
        <th>hình ảnh</th>
        <th>giá sp</th>
        <th>số lượng</th>
        <th>Danh mục</th>
        <th>mã sp</th>
        <th>tóm tắt</th>
        <th>trạng thái</th>
        <th>Quản Lý</th>
    </tr>
  <?php
  $i= 0 ;
  while ($row = mysqli_fetch_array($query_lietke_sp )) {
        $i++;
  ?>
  <tr>
    <td><?php echo $i ?></td>
    <td><?php echo $row['tensanpham'] ?></td>
    <td><img src="modules/quanlysp/uploads/<?php echo $row['hinhanh'] ?>" width="150px"> </td>
    <td><?php echo $row['giasp'] ?></td>
    <td><?php echo $row['soluong'] ?></td>
    <td><?php echo $row['tendanhmuc'] ?></td>
    <td><?php echo $row['masp'] ?></td>
    <td><?php echo $row['tomtat'] ?></td>
    <td><?php if ($row['tinhtrang']==1){
      echo 'kích hoạt';
    }else{
      echo 'ẩn';
    }
    ?>
    </td>

    <td>
    <a href="modules/quanlysp/xuly.php?idsanpham=<?php echo $row['id_sanpham']; ?>"> xóa </a> | <a href="?action=quanlysp&query=sua&idsanpham=<?php echo $row['id_sanpham']; ?>"> sửa </a>

    </td>

  </tr>

  <?php
  }
  ?>
</table>