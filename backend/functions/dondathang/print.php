<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang In</title>
    <link href="../../assets/vendor/paper-css/paper.css" type="text/css" rel="stylesheet"/>
    <style>@page { size: A4 }</style>
</head>
<body class="A4">
<?php
                $dh_ma=$_GET['dh_ma'];
                include_once('../../../connectdb.php');
                $sql  = <<<EOT
                SELECT dh.dh_ma, kh.kh_tendangnhap, dh.dh_ngaylap, dh.dh_ngaygiao,
                dh.dh_noigiao, httt.httt_ten,dh.dh_trangthaithanhtoan,
                SUM(spddh.sp_dh_dongia*spddh.sp_dh_soluong) AS tongthanhtien
                FROM dondathang dh
                JOIN khachhang kh ON kh.kh_tendangnhap = dh.kh_tendangnhap
                JOIN sanpham_dondathang spddh ON spddh.dh_ma = dh.dh_ma
                JOIN hinhthucthanhtoan httt ON httt.httt_ma = dh.httt_ma
                WHERE dh.dh_ma=$dh_ma
                GROUP BY dh.dh_ma, kh.kh_tendangnhap, dh.dh_ngaylap, dh.dh_ngaygiao,
                dh.dh_noigiao, httt.httt_ten,dh.dh_trangthaithanhtoan    
EOT;
                $result = mysqli_query($conn,$sql);
                $ddh = [];
                while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                    $ddh[] = array(
                        'dh_ma' => $row['dh_ma'],
                        'kh_tendangnhap' => $row['kh_tendangnhap'],
                        'dh_ngaylap' => $row['dh_ngaylap'],
                        'dh_ngaygiao' => $row['dh_ngaygiao'],
                        'dh_noigiao' => $row['dh_noigiao'],
                        'httt_ten' => $row['httt_ten'],
                        'dh_trangthaithanhtoan' => $row['dh_trangthaithanhtoan'],
                        'tongthanhtien' => $row['tongthanhtien'],
                        );
                }
            ?>
<section class="sheet padding-10mm">
 
 <!-- Write HTML just like a web page -->
 <article>
    <table>
        <tr>
            <td>
                <img src="../../assets/uploads/products/20210113115922_opporeno2.png" alt="">
            </td>
            <td></td>
        </tr>
    </table>
 
 </article>

</section>
</body>
</html>