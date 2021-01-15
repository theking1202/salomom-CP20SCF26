<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cau hinh giao dien</title>
    <style>
        .theme-dark{
            background-color: black;
            color: white;
        }
        .theme-light{
            background-color: white;
            color: black;
        }
    </style>
</head>
<?php
    $giaodien='theme-light';
    if(isset($_COOKIE['giaodien'])){
        $giaodien = $_COOKIE['giaodien'];
    }
?>
<body class="<?= $giaodien ?>">
    <h1>Cau hinh giao dien</h1>
    <form action="" method="POST">
        <input type="radio" name="theme" id="theme-1" value="theme-dark">Giao dien nen toi <br/>
        <input type="radio" name="theme" id="theme-2" value="theme-light">Giao dien nen sang <br/>
        <button name="btnLuu">Luu</button>
    </form>

    <?php
        if(isset($_POST['btnLuu'])){
            $theme = $_POST['theme'];

            setcookie('giaodien',$theme, time()+6000000,'/');
        }
    ?>
</body>
</html>