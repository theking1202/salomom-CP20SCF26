<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Them san pham</title>
    <link href="../../assets/vendor/bootstrap/css/bootstrap.min.css" type="text/css" rel="stylesheet" />

    <script src="../../assets/vendor/jquery/jquery.min.js"></script>
    <script src="../../assets/vendor/jquery-validation/jquery.validate.min.js"></script>
    <script src="../../assets/vendor/jquery-validation/localization/messages_vi.min.js"></script>
</head>
<body>
    <form name="frmNhaSanXuat" id="frmNhaSanXuat" method="POST" action="">
    <div class="mb-3">
        <label for="nsx_ten" class="form-label">Tên loại sản phẩm</label>
        <input type="text" class="form-control" id="nsx_ten" name="nsx_ten" aria-describedby="nsx_tenHelp">
        <div id="nsx_tenHelp" class="form-text"></div>
    </div>
    <button type="submit" class="btn btn-primary" name="add">Submit</button>
    </form>

    <?php
        // Truy vấn database
        // 1. Include file cấu hình kết nối đến database, khởi tạo kết nối $conn
//        include_once(__DIR__ . '/../../../dbconnect.php');

        // 2. Nếu người dùng có bấm nút "Lưu dữ liệu"
        if (isset($_POST['add'])) {
            // Lấy dữ liệu người dùng hiệu chỉnh gởi từ REQUEST POST
            $nsx_ten = $_POST['nsx_ten'];
            $nsx_mota = $_POST['nsx_mota'];

            // Kiểm tra ràng buộc dữ liệu (Validation)
            // Tạo biến lỗi để chứa thông báo lỗi
            $errors = [];

            // Validate Tên loại Sản phẩm
            // required
            if (empty($nsx_ten)) {
                $errors['nsx_ten'][] = [
                'rule' => 'required',
                'rule_value' => true,
                'value' => $nsx_ten,
                'msg' => 'Vui lòng nhập tên Loại sản phẩm'
                ];
            }
            // minlength 3
            if (!empty($nsx_ten) && strlen($nsx_ten) < 3) {
                $errors['nsx_ten'][] = [
                'rule' => 'minlength',
                'rule_value' => 3,
                'value' => $nsx_ten,
                'msg' => 'Tên Loại sản phẩm phải có ít nhất 3 ký tự'
                ];
            }
            // maxlength 50
            if (!empty($nsx_ten) && strlen($nsx_ten) > 50) {
                $errors['nsx_ten'][] = [
                'rule' => 'maxlength',
                'rule_value' => 50,
                'value' => $nsx_ten,
                'msg' => 'Tên Loại sản phẩm không được vượt quá 50 ký tự'
                ];
            }

            // Validate Diễn giải
            // required
            if (empty($nsx_mota)) {
                $errors['nsx_mota'][] = [
                'rule' => 'required',
                'rule_value' => true,
                'value' => $nsx_mota,
                'msg' => 'Vui lòng nhập mô tả Loại sản phẩm'
                ];
            }
            // minlength 3
            if (!empty($nsx_mota) && strlen($nsx_mota) < 3) {
                $errors['nsx_mota'][] = [
                'rule' => 'minlength',
                'rule_value' => 3,
                'value' => $nsx_mota,
                'msg' => 'Mô tả loại sản phẩm phải có ít nhất 3 ký tự'
                ];
            }
            // maxlength 255
            if (!empty($nsx_mota) && strlen($nsx_mota) > 255) {
                $errors['nsx_mota'][] = [
                'rule' => 'maxlength',
                'rule_value' => 255,
                'value' => $nsx_mota,
                'msg' => 'Mô tả loại sản phẩm không được vượt quá 255 ký tự'
                ];
            }
        }
        ?>
        <?php if (
            isset($_POST['add'])  // Nếu người dùng có bấm nút "Lưu dữ liệu"
            && isset($errors)         // Nếu biến $errors có tồn tại
            && (!empty($errors))      // Nếu giá trị của biến $errors không rỗng
            ) : ?>
            <div id="errors-container" class="alert alert-danger face my-2" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                <ul>
                    <?php foreach ($errors as $fields) : ?>
                        <?php foreach ($fields as $field) : ?>
                        <li><?php echo $field['msg']; ?></li>
                        <?php endforeach; ?>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>
    <?php
        if(isset($_POST['add'])){
            $nsx_ten = $_POST['nsx_ten'];
            include_once('../../../connectdb.php');
            $sql = "INSERT INTO nhasanxuat(nsx_ten) VALUES ('$nsx_ten')";
            $result = mysqli_query($conn,$sql);
            header('location: index.php');
        }
    ?>
    <script>
        $(document).ready(function() {
            $("#frmNhaSanXuat").validate({
            rules: {
                nsx_ten: {
                required: true,
                minlength: 3,
                maxlength: 50
                },
                nsx_mota: {
                required: true,
                minlength: 3,
                maxlength: 255
                }
            },
            messages: {
                nsx_ten: {
                required: "Vui lòng nhập tên Loại sản phẩm",
                minlength: "Tên Loại sản phẩm phải có ít nhất 3 ký tự",
                maxlength: "Tên Loại sản phẩm không được vượt quá 50 ký tự"
                },
            },
            errorElement: "em",
            errorPlacement: function(error, element) {
                // Thêm class `invalid-feedback` cho field đang có lỗi
                error.addClass("invalid-feedback");
                if (element.prop("type") === "checkbox") {
                error.insertAfter(element.parent("label"));
                } else {
                error.insertAfter(element);
                }
            },
            success: function(label, element) {},
            highlight: function(element, errorClass, validClass) {
                $(element).addClass("is-invalid").removeClass("is-valid");
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).addClass("is-valid").removeClass("is-invalid");
            }
            });
        });
    </script>
</body>
</html>