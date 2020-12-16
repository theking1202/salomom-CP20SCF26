<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm giảng viên </title>
</head>
<body>
    <form name="frmThem" id="frmThem" action="" method="post">
        Mã số giảng viên: <input type="text" name="gv_ma" id="gv_ma"/> <br/> 
        Tên giảng viên: <input type="text" name="gv_ten" id="gv_ten"/> <br/>
        Số điện thoại: <input type="text" name="gv_sdt" id="gv_sdt"/> <br/>
        <button name="btnThem" id="btnThem">Them</button>
    </form>
    <?php
        require_once('connectdb.php');

      if(isset($_POST['btnThem'])){
          $ten =  $_POST['gv_ten'];
          $ma = $_POST['gv_ma'];
          $sdt = $_POST['gv_sdt'];
        
          $sql = "INSERT INTO giang_vien(gv_ma, gv_ten, gv_sodienthoai) VALUES ('$ma','$ten','$sdt')";
          $result = mysqli_query($conn, $sql);
      }
    ?>
</body>
</html>