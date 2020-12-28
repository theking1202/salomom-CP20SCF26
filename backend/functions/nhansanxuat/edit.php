<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa nhà sản xuất</title>
</head>
<body>
    <h1>Chỉnh sửa nhà sản xuất</h1>
    <?php
        include_once('../../../connectdb.php');
        $ma=$_GET['nsx_ma'];
        $sql="SELECT * FROM nhasanxuat WHERE nsx_ma=$ma";
        $result=mysqli_query($conn,$sql);
        $row=mysqli_fetch_array($result);
    ?>
    <form action="" method="POST">
        <label for="nsx_ten">Tên nhà sản xuất</label> <br/>
        <input type="text" name="nsx_ten" id="nsx_ten" value="<?=$row['nsx_ten']?>"/> <br/>
        <button name="save">Lưu</button>
    </form>
    <?php
        if(isset($_POST['save'])){
            $ten=$_POST['nsx_ten'];
            $sql1="UPDATE nhasanxuat SET nsx_ten='$ten' WHERE nsx_ma=$ma";
            // var_dump($sql1); die;
            $result1=mysqli_query($conn,$sql1);
            header('location: index.php');
        }
    ?>
</body>
</html>