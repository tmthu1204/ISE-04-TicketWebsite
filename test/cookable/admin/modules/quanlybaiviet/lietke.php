<?php
    $sql_lietke_bv = "SELECT * FROM tbl_baiviet, tbl_danhmucbaiviet WHERE tbl_baiviet.id_danhmuc=tbl_danhmucbaiviet.id_baiviet ORDER BY tbl_baiviet.id DESC";
    $query_lietke_bv = mysqli_query($mysqli, $sql_lietke_bv);
?>
<p>liệt kê danh mục bài viết</p>
<table class="lietke" style="width: 100%" border="1" style="border-collapse:collapse;" >

    <tr>
        <th>Id</th>
        <th>Tên bài viết</th>
        <th>hình ảnh</th>
        <th>Danh mục</th>
        <th>mã sp</th>
        <th>tóm tắt</th>
        <th>trạng thái</th>
        <th>Quản Lý</th>
    </tr>
  <?php
  $i= 0 ;
  while ($row = mysqli_fetch_array($query_lietke_bv )) {
        $i++;
  ?>
  <tr>
    <td><?php echo $i ?></td>
    <td><?php echo $row['tenbaiviet'] ?></td>
    <td><img src="modules/quanlybaiviet/uploads/<?php echo $row['hinhanh'] ?>" width="150px"> </td>
    <td><?php echo $row['tendanhmuc_baiviet'] ?></td>
    <td><?php echo $row['tomtat'] ?></td>
    <td><?php if ($row['tinhtrang']==1){
      echo 'kích hoạt';
    }else{
      echo 'ẩn';
    }
    ?>
    </td>

    <td>
    <a href="modules/quanlybaiviet/xuly.php?idbaiviet=<?php echo $row['id']; ?>"> xóa </a> | <a href="?action=quanlybaiviet&query=sua&idbaiviet=<?php echo $row['id']; ?>"> sửa </a>

    </td>

  </tr>

  <?php
  }
  ?>
</table>