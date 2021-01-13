<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <?php
        session_start();
        if(isset($_SESSION['dadangnhap']) ):
    ?>
        Ban da dang nhap thanh cong!! <br/>
        <a href="session.php">Click de tro ve trang chu!!</a> <br/>
        <a href="dangxuat.php">Dang xuat</a>

    <?php else:?>
    <form action="" method="POST" name="frmDangNhap" id="frmDangNhap">
        Username:<input type="text" name="txtUsername" id="txtUsername"> <br/>
        Password:<input type="text" name="txtPassword" id="txtPassword"> <br/>

        <button name="btnDangNhap">Dang nhap</button>
    </form>
    <?php endif;?>
    <?php
        if(isset($_POST['btnDangNhap'])){
            $username = $_POST['txtUsername'];
            $password = $_POST['txtPassword'];

            if($username == 'admin' && $password == '123456'){
                
                echo 'Dang nhap thanh cong !! ';

                $_SESSION['dadangnhap']= true;
                $_SESSION['user_dadangnhap']= $username;
                // header('location : testsession.php');
            }else{
                echo'Dang nhap khong thanh cong !!!';
            }
        }
    ?>

</body>
</html>