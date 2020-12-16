<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .box{
            width: 200px;
            height:200px;
            background: red;
        }
    </style>
</head>
<body>
    <?php
        //Ket noi CSDL
        require_once('connectdb.php');
        $hoten = 'Lợi';
        echo '<h1 style="color:red">Xin chào </h1>';
    ?>
    <div class="box">
        <h1>Xin chào <?= $hoten?></h1>
    </div>
    <a href="pages/lienhe.php" style="text-decoration:none">Liên hệ</a><br>
    <a href="pages/gioithieu.php" style="text-decoration:none">Giới thiệu</a>
</body>
</html>