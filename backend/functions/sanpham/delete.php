<?php
    include_once('../../../connectdb.php');
    $ma=$_GET['lsp_ma'];
    $sql="DELETE FROM loaisanpham WHERE lsp_ma=$ma";
    $result=mysqli_query($conn,$sql);
    header('location: index.php');
?>