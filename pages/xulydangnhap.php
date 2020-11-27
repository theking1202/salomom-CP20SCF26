<?php
    $tendangnhap = $_GET['tendangnhap'];
    $matkhau = $_GET['matkhau'];
    if($tendangnhap=='admin' && $matkhau =='123123'){
        echo 'Đăng nhập thành công';
    }else{
        echo 'THẤT BẠI';
    }
?>