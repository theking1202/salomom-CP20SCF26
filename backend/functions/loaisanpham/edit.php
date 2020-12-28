<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa loại sản phẩm</title>
</head>
<body>
    <h1>Chỉnh sửa loại sản phẩm</h1>
    <?php
        include_once('../../../connectdb.php');
        $ma=$_GET['lsp_ma'];
        $sql="SELECT * FROM loaisanpham WHERE lsp_ma=$ma";
        $result=mysqli_query($conn,$sql);
        $row=mysqli_fetch_array($result);
    ?>
    <form action="" method="POST">
        <label for="lsp_ten">Tên loại sản phẩm</label> <br/>
        <input type="text" name="lsp_ten" id="lsp_ten" value="<?=$row['lsp_ten']?>"/> <br/>
        <label for="lsp_mota">Mô tả loại sản phẩm</label> <br/>
        <input type="text" name="lsp_mota" id="lsp_mota" value="<?=$row['lsp_mota']?>"/> <br/>
        <button name="save">Lưu</button>
    </form>
    <?php
        if(isset($_POST['save'])){
            $ten=$_POST['lsp_ten'];
            $mota=$_POST['lsp_mota'];
            $sql1="UPDATE loaisanpham SET lsp_ten='$ten' , lsp_mota='$mota' WHERE lsp_ma=$ma";
            // var_dump($sql1); die;
            $result1=mysqli_query($conn,$sql1);
            header('location: index.php');
        }
    ?>
</body>
</html>