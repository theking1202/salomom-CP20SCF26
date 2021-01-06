<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Them san pham</title>
    <link href="../../assets/vendor/bootstrap/css/bootstrap.min.css" type="text/css" rel="stylesheet" />

</head>
<body>
    <div class="container">
        <h1>Thêm sản phẩm</h1>
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

            $sql = "select * from `nhasanxuat`";

            // Thực thi câu truy vấn SQL để lấy về dữ liệu
            $result = mysqli_query($conn, $sql);

            // Khi thực thi các truy vấn dạng SELECT, dữ liệu lấy về cần phải phân tích để sử dụng
            // Thông thường, chúng ta sẽ sử dụng vòng lặp while để duyệt danh sách các dòng dữ liệu được SELECT
            // Ta sẽ tạo 1 mảng array để chứa các dữ liệu được trả về
            $data = [];
            while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                $data[] = array(
                    'nsx_ma' => $row['nsx_ma'],
                    'nsx_ten' => $row['nsx_ten'],
                );
            }
        ?>

        <form action="" method="POST" name="frmThem" id="frmThem">
            <div class="form-group">
                <label for="sp_ten">Tên sản phẩm</label>
                <input type="text" class="form-control" id="sp_ten" name="sp_ten">
            </div>
            <div class="form-group">
                <label for="sp_gia">Giá sản phẩm</label>
                <input type="text" class="form-control" id="sp_gia" name="sp_gia">
            </div>
            <div class="form-group">
                <label for="sp_giacu">Giá cũ</label>
                <input type="text" class="form-control" id="sp_giacu" name="sp_giacu">
            </div>
            <div class="form-group">
                <label for="sp_motan_gan">Mô tả ngắn</label>
                <textarea name="sp_mota_ngan" id="sp_mota_ngan" class="form-control" ></textarea>
            </div>
            <div class="form-group">
                <label for="sp_mota_chitiet">Mô tả chi tiết</label>
                <textarea name="sp_mota_chitiet" id="sp_mota_chitiet" class="form-control" ></textarea>
            </div>
            <div class="form-group">
                <label for="sp_ngaycapnhat">Ngày cập nhật</label>
                <input type="text" class="form-control" id="sp_ngaycapnhat" name="sp_ngaycapnhat">
            </div>
            <div class="form-group">
                <label for="sp_soluong">Số lượng</label>
                <input type="text" class="form-control" id="sp_soluong" name="sp_soluong">
            </div>
            <div class="form-group">
                <label for="lsp_ma">Loại sản phẩm</label>
                <select name="lsp_ma" id="lsp_ma" class="form-control">
                    <?php foreach($dataLoaiSanPham as $lsp):?>
                    <option value="<?=$lsp['lsp_ma']?>"><?=$lsp['lsp_ten']?></option>
                    <?php endforeach;?>
                </select>
            </div>
            <div class="form-group">
                <label for="nsx_ma">Nhà sản xuất</label>
                <select name="nsx_ma" id="nsx_ma" class="form-control">
                    <?php foreach($data as $nsx):?>
                    <option value="<?=$nsx['nsx_ma']?>"><?=$nsx['nsx_ten']?></option>
                    <?php endforeach;?>
                </select>
            </div>
            <div class="form-group">
                <button name="btnThem" id="btnThem">Thêm</button>
            </div>
        </form>

        <?php
            if(isset($_POST['btnThem'])){
                $sp_ten = $_POST['sp_ten'];
                $sp_gia = $_POST['sp_gia'];
                $sp_giacu = $_POST['sp_giacu'];
                $sp_motan_gan = $_POST['sp_motan_gan'];
                $sp_mota_chitiet = $_POST['sp_mota_chitiet'];
                $sp_ngaycapnhat = $_POST['sp_ngaycapnhat'];
                $sp_soluong = $_POST['sp_soluong'];
                $lsp_ma = $_POST['lsp_ma'];
                $nsx_ma = $_POST['nsx_ma'];
            }
        ?>
    </div>

    <script src="../../assets/vendor/jquery/jquery.min.js"></script>
    <script src="../../assets/vendor/jquery-validation/jquery.validate.min.js"></script>
    <script src="../../assets/vendor/jquery-validation/localization/messages_vi.min.js"></script>
</body>
</html>