<?php
    $sql_lietke_danhmucsp = "SELECT * FROM tbl_danhmuc ORDER BY thutu DESC";
    $query_lietke_danhmucsp = mysqli_query($mysqli, $sql_lietke_danhmucsp);
?>
<p>liệt kê</p>
<table class="lietke" style="width: 100%" border="1" style="border-collapse:collapse;" >

    <tr>
        <th>ID</th>
        <th>Tên danh mục</th>
        <th>Quản Lý</th>
    </tr>
  <?php
  $i= 0 ;
  while ($row = mysqli_fetch_array($query_lietke_danhmucsp)) {
        $i++;
  ?>
  <tr>
    <td><?php echo $i ?></td>
    <td><?php echo $row['tendanhmuc'] ?></td>
    <td>
        <a href="modules/quanlydanhmucsp/xuly.php?iddanhmuc=<?php echo $row['id_danhmuc'] ?>"> xóa </a> | <a href="?action=quanlydanhmucsanpham&query=sua&iddanhmuc=<?php echo $row['id_danhmuc'] ?>"> sửa </a>
    </td>

  </tr>

  <?php
  }
  ?>
</table>