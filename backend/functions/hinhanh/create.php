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
        <h1>Thêm hình ảnh sản phẩm</h1>
        <?php
                include_once('../../../connectdb.php');
                $sql  = "SELECT * FROM sanpham";
                $result = mysqli_query($conn,$sql);
                
                $sp = [];
                while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                    $sp[] = array(
                        'sp_ma' => $row['sp_ma'],
                        'sp_ten' => $row['sp_ten'],
                        );
                }
            ?>

        <form action="" name="frmHinh" id="frmHinh" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="slSp">Sản phẩm</label>
                <select name="slSp" id="slSp" class="form-control">
                <?php foreach($sp as $sanpham):?>
                    <option value="<?=$sanpham['sp_ma']?>"><?= $sanpham['sp_ten']?></option>
                <?php endforeach;?>
                </select>
            </div>
            <div class="form-group">
                <label for="hsp_tentaptin">Hình ảnh</label>
                <input type="file" name="hsp_tentaptin" id="hsp_tentaptin" />
            </div>
            <div class="preview-img-container">
              <img src="/php/myhand/assets/shared/img/default-image_600.png" id="preview-img" width="200px" />
            </div>
            <div class="form-group">
                <button name="btnLuu" class="btn btn-primary">Lưu</button>
            </div>
        </form>
    </div>
    <?php
        if(isset($_POST['btnLuu'])){
            $sp_ma= $_POST['slSp'];
            if(isset($_FILES['hsp_tentaptin'])){
                $upload_dir = __DIR__ . "/../../assets/uploads/";
                // Các hình ảnh sẽ được lưu trong thư mục con `products` để tiện quản lý
                $subdir = 'products/';

                if ($_FILES['hsp_tentaptin']['error'] > 0) {
                    echo 'File Upload Bị Lỗi'; die;
                } else{
                    $tentaptin= $_FILES['hsp_tentaptin']['name'];
                    $ten = date('YmdHis') . '_' . $tentaptin;
                    $sqlInsert="INSERT INTO hinhsanpham(hsp_tentaptin, sp_ma) VALUES ('$ten', $sp_ma)";
                    $resultInsert=mysqli_query($conn,$sqlInsert);
                    move_uploaded_file($_FILES['hsp_tentaptin']['tmp_name'], $upload_dir.$subdir.$ten);
                }
            }
        }
        
    ?>
    <script>
    // Hiển thị ảnh preview (xem trước) khi người dùng chọn Ảnh
    const reader = new FileReader();
    const fileInput = document.getElementById("hsp_tentaptin");
    const img = document.getElementById("preview-img");
    reader.onload = e => {
      img.src = e.target.result;
    }
    fileInput.addEventListener('change', e => {
      const f = e.target.files[0];
      reader.readAsDataURL(f);
    })
  </script>

    <script src="../../assets/vendor/jquery/jquery.min.js"></script>
    <script src="../../assets/vendor/jquery-validation/jquery.validate.min.js"></script>
    <script src="../../assets/vendor/jquery-validation/localization/messages_vi.min.js"></script>
</body>
</html>