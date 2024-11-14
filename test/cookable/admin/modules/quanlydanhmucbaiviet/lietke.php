<?php
    $sql_lietke_danhmucbv = "SELECT * FROM tbl_danhmucbaiviet ORDER BY thutu DESC";
    $query_lietke_danhmucbv = mysqli_query($mysqli, $sql_lietke_danhmucbv);
?>
<p>liệt kê danh mục bài viết</p>
<table class="lietke" style="width: 100%" border="1" style="border-collapse:collapse;" >

    <tr>
        <th>ID</th>
        <th>Tên danh mục</th>
        <th>Quản Lý</th>
    </tr>
  <?php
  $i= 0 ;
  while ($row = mysqli_fetch_array($query_lietke_danhmucbv)) {
        $i++;
  ?>
  <tr>
    <td><?php echo $i ?></td>
    <td><?php echo $row['tendanhmuc_baiviet'] ?></td>
    <td>
        <a href="modules/quanlydanhmucbaiviet/xuly.php?idbaiviet=<?php echo $row['id_baiviet'] ?>"> xóa </a> | <a href="?action=quanlydanhmucbaiviet&query=sua&idbaiviet=<?php echo $row['id_baiviet'] ?>"> sửa </a>
    </td>

  </tr>

  <?php
  }
  ?>
</table>