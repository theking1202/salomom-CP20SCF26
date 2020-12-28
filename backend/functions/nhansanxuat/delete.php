<?php
    include_once('../../../connectdb.php');
    $ma=$_GET['nsx_ma'];
    $sql="DELETE FROM nhasanxuat WHERE nsx_ma=$ma";
    $result=mysqli_query($conn,$sql);
    header('location: index.php');
?>