<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Đăng nhập</title>
</head>
<body>
    <h1>Đăng nhập</h1>
    <form action="" method="GET">
        Tên đăng nhập: <input type="text" name="tendangnhap" id="tendangnhap"/>
        Mật khẩu: <input type="text" name="matkhau" id="matkhau"/>
        <input type="submit" name="btnDangnhap" value="Đăng nhập">

    </form>
    <?php
        if(isset($_GET['btnDangnhap'])){
            $tendangnhap = $_GET['tendangnhap'];
            $matkhau = $_GET['matkhau'];
            if($tendangnhap=='admin' && $matkhau =='123123'){
                echo 'Đăng nhập thành công';
            }else{
                echo 'THẤT BẠI';
            }
        }
        
?>
</body>
</html>