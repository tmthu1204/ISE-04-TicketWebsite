<?php
$mysqli = new mysqli("localhost","root","","big");

// Check connection
if ($mysqli->connect_errno) {
  echo "kết nối mysqli lỗi" . $mysqli->connect_error;
  exit();
}
?>