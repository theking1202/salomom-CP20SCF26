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
    <form name="frmDangNhap" id="frmDangNhap" action="" method="POST">
        Tên đăng nhập: <input type="text" name="tendangnhap" id="tendangnhap"/>
        Mật khẩu: <input type="text" name="matkhau" id="matkhau"/>
        <input type="submit" name="btnDangnhap" value="Đăng nhập">
    </form>
    <?php
        include_once('../connectdb.php');
        if(isset($_POST['btnDangnhap'])){
            $tendangnhap = addslashes( $_POST['tendangnhap']);
            $matkhau = addslashes($_POST['matkhau']);

            $sqlSelect = <<<EOT
            SELECT * FROM khachhang
            WHERE kh_tendangnhap='$tendangnhap'  AND kh_matkhau='$matkhau'
EOT;
            echo $sqlSelect;
            $resultSelect = mysqli_query($conn , $sqlSelect);

            if (mysqli_num_rows($resultSelect) > 0) {

                echo '<h2>Đăng nhập thành công!</h2>';
          
              } else {
                echo '<h2 style="color: red;">Đăng nhập thất bại!</h2>';
              }
        }

    ?>
</body>
</html>