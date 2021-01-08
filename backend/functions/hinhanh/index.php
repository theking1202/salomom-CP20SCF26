<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loai san pham</title>
    <link href="../../assets/vendor/bootstrap/css/bootstrap.min.css" type="text/css" rel="stylesheet" />
</head>
<body>
    <a href="create.php" class="btn btn-primary">Thêm sản phẩm</a>
    <table class="table-bordered" >
        <thead>
            <th>STT</th>
            <th>Mã sản phẩm</th>
            <th>Tên sản phẩm</th>
            <th>Hình sản phẩm</th>
            <th>Hành động</th>
        </thead>
        <tbody>
            <?php
                include_once('../../../connectdb.php');
                $sql  = <<<EOT
                SELECt * FROM hinhsanpham hsp
                JOIN sanpham sp 
                on hsp.sp_ma = sp.sp_ma    
EOT;
                $result = mysqli_query($conn,$sql);
                $stt = 1;
                $lsp = [];
                while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                    $hsp[] = array(
                        'hsp_ma' => $row['hsp_ma'],
                        'hsp_tentaptin' => $row['hsp_tentaptin'],
                        'hsp_ten' => $row['sp_ten'],
                        );
                }
            ?>
             <?php foreach ($hsp as $hsp) : ?>
              <tr>
                <td><?= $stt++ ?></td>
                <td><?= $hsp['hsp_ma'] ?></td>
                <td><?= $hsp['hsp_ten'] ?></td>
                <td>
                    <img src="/salomom-CP20SCF26/backend/assets/uploads/products/<?=$hsp['hsp_tentaptin']?>" alt="">
                </td>
                <td>
                  <!-- Nút sửa, bấm vào sẽ hiển thị form hiệu chỉnh thông tin dựa vào khóa chính `lsp_ma` -->
                  <a href="edit.php?lsp_ma=<?= $hsp['lsp_ma'] ?>" class="btn btn-warning">
                    <span data-feather="edit"></span> Sửa
                  </a>

                  <!-- Nút xóa, bấm vào sẽ xóa thông tin dựa vào khóa chính `lsp_ma` -->
                  <a href="delete.php?lsp_ma=<?= $hsp['lsp_ma'] ?>" class="btn btn-danger">
                    <span data-feather="delete"></span> Xóa
                  </a>
                </td>
              </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>