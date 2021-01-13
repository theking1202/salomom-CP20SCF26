<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sach san pham</title>
</head>
<body>
    <?php
        //tao ket noi
        require_once('connectdb.php');
        // viet cau lenh sql
        $sql = "INSERT INTO lop_hoc(lop_ma, lop_ten) VALUES ('lp5',N'lớp 5')";
        //thuc thi sql
        $result = mysqli_query($conn,$sql);
        echo'Đã thêm thành công!!!';
    ?>
</body>
</html>