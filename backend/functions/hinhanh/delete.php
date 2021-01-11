<?php
    include_once('../../../connectdb.php');
    $ma=$_GET['hsp_ma'];

    $sqlSelect = "SELECT * FROM hinhsanpham WHERE hsp_ma=$ma";
    $resultSelect=mysqli_query($conn,$sqlSelect);
    $hinhSanPhamRow=mysqli_fetch_array($resultSelect);

    $upload_dir = __DIR__ . "/../../assets/uploads/";
    // Các hình ảnh sẽ được lưu trong thư mục con `products` để tiện quản lý
    $subdir = 'products/';

    $old_files = $upload_dir . $subdir . $hinhSanPhamRow['hsp_tentaptin'];

    if(file_exists($old_files)){
        unlink($old_files);
    }
    

    $sql="DELETE FROM hinhsanpham WHERE hsp_ma=$ma";
    $result=mysqli_query($conn,$sql);
    header('location: index.php');
?>