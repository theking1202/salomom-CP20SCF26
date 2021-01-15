<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php if(isset($_COOKIE['is_logged'])): ?>

        <h1>Ban da dang nhap roi</h1> <br/>
        <a href="#">Bam vao day de quay ve trang chu</a>

    <?php else:?>
    <form action="" method="POST" name="frmDangNhap" id="frmDangNhap">
        Username:<input type="text" name="txtUsername" id="txtUsername"> <br/>
        Password:<input type="text" name="txtPassword" id="txtPassword"> <br/>
        <input type="checkbox" name="remember_me" id="remember_me" value="1">Ghi nho dang nhap <br/>
        <button name="btnDangNhap">Dang nhap</button>
    </form>
    <?php endif ;?>
    <?php
        if(isset($_POST['btnDangNhap'])){
            $username=$_POST['txtUsername'];
            $password=$_POST['txtPassword'];
            $remember_me = $_POST['remember_me'];
            if($username == 'admin' && $password == '123456'){
                
                
                if($remember_me == 1) {
                    // Thiết lập Cookie "Ghi nhớ đăng nhập" trong 15' ~ 3600s
                    setcookie('is_logged', true, time()+ 3600, '/');
                    
                    // Thiết lập Cookie "Tên username đã đăng nhập" trong 15' ~ 3600s
                    setcookie("username_logged", $username, time()+3600, "/","", 0);
                }
                // echo 'Dang nhap thanh cong !! ';
            }else{
                echo'Dang nhap khong thanh cong !!!';
            }
        }
    ?>
</body>
</html>