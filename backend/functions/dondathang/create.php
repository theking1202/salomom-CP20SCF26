<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Don dat hang</title>
    <link href="../../assets/vendor/bootstrap/css/bootstrap.min.css" type="text/css" rel="stylesheet" />
    <script src="../../assets/vendor/jquery/jquery.min.js"></script>
</head>
<body>
            <?php
                include_once('../../../connectdb.php');
                $sqlKhachhang  = <<<EOT
                SELECT * from khachhang   
EOT;
                $resultKhachhang = mysqli_query($conn,$sqlKhachhang);
                $kh = [];
                while ($row = mysqli_fetch_array($resultKhachhang, MYSQLI_ASSOC)) {
                    $kh[] = array(
                        'kh_tendangnhap' => $row['kh_tendangnhap'],
                        'kh_dienthoai' => $row['kh_dienthoai'],
                        'kh_diachi' => $row['kh_diachi'],
                        );
                }
                $sqlHinhthucthanhtoan = <<<EOT
                SELECT * from hinhthucthanhtoan   
EOT;
                $resultHinhthucthanhtoan = mysqli_query($conn,$sqlHinhthucthanhtoan);
                $hinhthucthanhtoan = [];
                while ($row1 = mysqli_fetch_array($resultHinhthucthanhtoan, MYSQLI_ASSOC)) {
                    $hinhthucthanhtoan[] = array(
                        'httt_ma' => $row1['httt_ma'],
                        'httt_ten' => $row1['httt_ten'],
                        );
                }
                $sqlSanpham = <<<EOT
                SELECT * from sanpham  
EOT;
                $resultSanpham = mysqli_query($conn,$sqlSanpham);
                $sanpham = [];
                while ($row2 = mysqli_fetch_array($resultSanpham, MYSQLI_ASSOC)) {
                    $sanpham[] = array(
                        'sp_ma' => $row2['sp_ma'],
                        'sp_ten' => $row2['sp_ten'],
                        'sp_gia' => $row2['sp_gia'],
                        'sp_soluong' => $row2['sp_soluong'],
                        );
                }
            ?>
<div class="container">
    <form action="" method="POST" name="frmDonhang" id="frmDonhang">
        <table>
        <h1>Thông tin đơn hàng</h1>
        <h3>Khách hàng</h3>
        <select name="kh_tendangnhap">
            <?php foreach($kh as $khachhang):?>
                <option value="<?=$khachhang['kh_tendangnhap']?>">
                <?=$khachhang['kh_tendangnhap']?> - <?=$khachhang['kh_dienthoai']?> - <?=$khachhang['kh_diachi']?>
                </option>
            <?php endforeach;?>
        </select>
        <div class="from-group">
            <label for="dh_ngaylap">Ngày lập</label>
            <input type="text" name="dh_ngaylap" id="dh_ngaylap" class="form-control"/>
        </div>
        <div class="from-group">
            <label for="dh_ngaygiao">Ngày giao</label>
            <input type="text" name="dh_ngaygiao" id="dh_ngaygiao" class="form-control"/>
        </div>
        <div class="from-group">
            <label for="dh_noigiao">Nơi giao</label>
            <input type="text" name="dh_noigiao" id="dh_noigiao" class="form-control"/>
        </div>
        <div class="from-group">
            <label for="dh_noigiao">Trạng thái thanh toán</label> <br/>
            <input type="radio" id="dh_trangthaithanhtoan1" name="dh_trangthaithanhtoan" value="0" > Chưa thanh toán <br/>
            <input type="radio" id="dh_trangthaithanhtoan2" name="dh_trangthaithanhtoan" value="0"> Đã thanh toán <br/>
        </div>
        <div class="from-group">
            <label for="dh_noigiao">Trạng thái thanh toán</label>
            <select name="httt_ma" class="form-control">
            <?php foreach($hinhthucthanhtoan as $httt):?>
                <option value="<?=$httt['httt_ma']?>">
                <?=$httt['httt_ten']?>
                </option>
            <?php endforeach;?>
            </select>
        </div>  
        </table>

        <table>
            <h1>Chi tiet don hang</h1>
            <div class="form-group">
                <label for="">San pham</label>
                <select name="sp_ma" id="sp_ma" class="form-control">
                    <?php foreach($sanpham as $sp):?>
                        <option value="<?=$sp['sp_ma']?>" giasanpham="<?=$sp['sp_gia']?>">
                            <?=$sp['sp_ten']?>
                        </option>
                    <?php endforeach;?>
                </select>
            </div>
            <div class="form-group">
                <label for="sp_soluong">Số lượng</label>
                <input type="number" name="sp_soluong" id="sp_soluong" class="form-control"/>
            </div>
            <div class="form-group">
                <button type="button" name="btnThem" id="btnThem" class="btn btn-primary">Thêm vào đơn hàng</button>
            </div>
        </table>

        <table id="tblChiTietDonHang" class="table table-bordered">
            <thead>
                <th>Sản phẩm</th>
                <th>Số lượng</th>
                <th>Đơn giá</th>
                <th>Thành tiền</th>
                <th>Hành động</th>
            </thead>
            <tbody>
            </tbody>                
        </table>
    </form>
</div>        
<script>
        // Đăng ký sự kiện Click nút Thêm Sản phẩm

        $('#btnThem').click(function() {
            debugger;
            // Lấy thông tin Sản phẩm
            var sp_ma = $('#sp_ma').val();
            var sp_gia = $('#sp_ma option:selected').attr('giasanpham');
            var sp_ten = $('#sp_ma option:selected').text();
            var soluong = $('#sp_soluong').val();
            var thanhtien = (soluong * sp_gia);
            
            // Tạo mẫu giao diện HTML Table Row
            var htmlTemplate = '<tr>'; 
            htmlTemplate += '<td>' + sp_ten + '<input type="hidden" name="sp_ma[]" value="' + sp_ma + '"/></td>';
            htmlTemplate += '<td>' + soluong + '<input type="hidden" name="sp_dh_soluong[]" value="' + soluong + '"/></td>';
            htmlTemplate += '<td>' + sp_gia + '<input type="hidden" name="sp_dh_dongia[]" value="' + sp_gia + '"/></td>';
            htmlTemplate += '<td>' + thanhtien + '</td>';
            htmlTemplate += '<td><button type="button" class="btn btn-danger btn-delete-row">Xóa</button></td>';
            htmlTemplate += '</tr>';

            // Thêm vào TABLE BODY
            $('#tblChiTietDonHang tbody').append(htmlTemplate);

            // Clear
            // $('#sp_ma').val('');
            // $('#soluong').val('');
        });

        $('#tblChiTietDonHang').on('click', 'btn-delete-row', function(){
            $(this).parent().parent().remove();

        });
</script>
</body>
</html> 