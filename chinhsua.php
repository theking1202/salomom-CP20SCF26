<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chinh sua</title>
</head>
<body>
<form name="frmThem" id="frmThem" action="" method="post">
        Mã số giảng viên: <input type="text" name="gv_ma" id="gv_ma"/> <br/> 
        Tên giảng viên: <input type="text" name="gv_ten" id="gv_ten"/> <br/>
        Số điện thoại: <input type="text" name="gv_sdt" id="gv_sdt"/> <br/>
        <button name="btnSua" id="btnSua">Them</button>
    </form>
    <?php
        if(isset($_POST['btnSua'])){
            require_once('connectdb.php');
            $ten =  $_POST['gv_ten'];
            $ma = $_POST['gv_ma'];
            

            $a = <<<EOT
            UPDATE giang_vien 
            SET
            gv_ten=N'$ten' 
            WHERE 
            gv_id=$ma 
EOT;






        $result = mysqli_query($conn,$a);
        }
        
    ?>
</body>
</html>