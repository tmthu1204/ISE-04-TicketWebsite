<!DOCTYPE html>
<html lang="en">
<link>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sanpham</title>
    <link rel="stylesheet" type="text/css" href="sanpham.css" >
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="shortcut icon" type="image/jpg" href="../imgs/icon.jpg"/>

</head>
<body>
        <?php
        session_start();
            include("../admin/config/config.php");
            include("pages/spheader.php");
            include("pages/spmenu.php");
            include("pages/spmain.php");
            include("pages/spfooter.php");
        ?>
        
</body>
</html>