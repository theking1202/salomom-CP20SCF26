<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa sản phẩm</title>
    <link href="../../assets/vendor/bootstrap/css/bootstrap.min.css" type="text/css" rel="stylesheet" />
</head>
<body>
    <div class="container">
    <h1>Chỉnh sửa sản phẩm</h1>
    <?php
        include_once('../../../connectdb.php');

        $sqlLoaiSanPham = "select * from `loaisanpham`";
        // Thực thi câu truy vấn SQL để lấy về dữ liệu
        $resultLoaiSanPham = mysqli_query($conn, $sqlLoaiSanPham);

        // Khi thực thi các truy vấn dạng SELECT, dữ liệu lấy về cần phải phân tích để sử dụng
        // Thông thường, chúng ta sẽ sử dụng vòng lặp while để duyệt danh sách các dòng dữ liệu được SELECT
        // Ta sẽ tạo 1 mảng array để chứa các dữ liệu được trả về
        $dataLoaiSanPham = [];
        while ($rowLoaiSanPham = mysqli_fetch_array($resultLoaiSanPham, MYSQLI_ASSOC)) {
            $dataLoaiSanPham[] = array(
                'lsp_ma' => $rowLoaiSanPham['lsp_ma'],
                'lsp_ten' => $rowLoaiSanPham['lsp_ten'],
                'lsp_mota' => $rowLoaiSanPham['lsp_mota'],
            );
        }
        /* --- End Truy vấn dữ liệu Loại sản phẩm --- */

        /* --- 
        --- 3. Truy vấn dữ liệu Nhà sản xuất 
        --- 
        */
        // Chuẩn bị câu truy vấn Nhà sản xuất
        $sqlNhaSanXuat = "select * from `nhasanxuat`";

        // Thực thi câu truy vấn SQL để lấy về dữ liệu
        $resultNhaSanXuat = mysqli_query($conn, $sqlNhaSanXuat);

        // Khi thực thi các truy vấn dạng SELECT, dữ liệu lấy về cần phải phân tích để sử dụng
        // Thông thường, chúng ta sẽ sử dụng vòng lặp while để duyệt danh sách các dòng dữ liệu được SELECT
        // Ta sẽ tạo 1 mảng array để chứa các dữ liệu được trả về
        $dataNhaSanXuat = [];
        while ($rowNhaSanXuat = mysqli_fetch_array($resultNhaSanXuat, MYSQLI_ASSOC)) {
            $dataNhaSanXuat[] = array(
                'nsx_ma' => $rowNhaSanXuat['nsx_ma'],
                'nsx_ten' => $rowNhaSanXuat['nsx_ten'],
            );
        }
                

        $ma=$_GET['sp_ma'];
        $sql="SELECT * FROM sanpham WHERE sp_ma=$ma";
        $result=mysqli_query($conn,$sql);
        $row=mysqli_fetch_array($result);
    ?>
    <form action="" method="POST">
            <div class="form-group">
                <label for="sp_ten">Tên sản phẩm</label>
                <input type="text" class="form-control" id="sp_ten" name="sp_ten" value="<?=$row['sp_ten']?>">
            </div>
            <div class="form-group">
                <label for="sp_gia">Giá sản phẩm</label>
                <input type="text" class="form-control" id="sp_gia" name="sp_gia" value="<?=$row['sp_gia']?>">
            </div>
            <div class="form-group">
                <label for="sp_giacu">Giá cũ</label>
                <input type="text" class="form-control" id="sp_giacu" name="sp_giacu" value="<?=$row['sp_giacu']?>">
            </div>
            <div class="form-group">
                <label for="sp_motan_gan">Mô tả ngắn</label>
                <textarea name="sp_mota_ngan" id="sp_mota_ngan" class="form-control" ><?=$row['sp_mota_ngan']?></textarea>
            </div>
            <div class="form-group">
                <label for="sp_mota_chitiet">Mô tả chi tiết</label>
                <textarea name="sp_mota_chitiet" id="sp_mota_chitiet" class="form-control" ><?=$row['sp_mota_chitiet']?></textarea>
            </div>
            <div class="form-group">
                <label for="sp_ngaycapnhat">Ngày cập nhật</label>
                <input type="text" class="form-control" id="sp_ngaycapnhat" name="sp_ngaycapnhat" value="<?=$row['sp_ngaycapnhat']?>">
            </div>
            <div class="form-group">
                <label for="sp_soluong">Số lượng</label>
                <input type="text" class="form-control" id="sp_soluong" name="sp_soluong" value="<?=$row['sp_soluong']?>">
            </div>
            <div class="form-group">
                <label for="lsp_ma">Loại sản phẩm</label>
                <select name="lsp_ma" id="lsp_ma" class="form-control">
                    <?php foreach($dataLoaiSanPham as $lsp):?>
                    <option value="<?=$lsp['lsp_ma']?>" <?php  echo( $lsp['lsp_ma'] == $row['lsp_ma'] ? 'selected' : '' );?>> <?=$lsp['lsp_ten']?></option>
                    <?php endforeach;?>
                </select>
            </div>
            <div class="form-group">
                <label for="nsx_ma">Nhà sản xuất</label>
                <select name="nsx_ma" id="nsx_ma" class="form-control">
                    <?php foreach($dataNhaSanXuat as $nsx):?>
                    <option value="<?=$nsx['nsx_ma']?>" <?php  echo( $nsx['nsx_ma'] == $row['nsx_ma'] ? 'selected' : '' );?>><?=$nsx['nsx_ten']?></option>
                    <?php endforeach;?>
                </select>
            </div>
            <div class="form-group">
                <button name="btnThem" id="btnThem">Thêm</button>
            </div>
    </form>
    <?php
        if(isset($_POST['save'])){
            $ten=$_POST['lsp_ten'];
            $mota=$_POST['lsp_mota'];
            $sql1="UPDATE SanPham SET lsp_ten='$ten' , lsp_mota='$mota' WHERE lsp_ma=$ma";
            // var_dump($sql1); die;
            $result1=mysqli_query($conn,$sql1);
            header('location: index.php');
        }
    ?>
    </div>
</body>
</html>