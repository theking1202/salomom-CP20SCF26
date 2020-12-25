<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loai san pham</title>
    <link href="../../assets/vendor/bootstrap/css/bootstrap.min.css" type="text/css" rel="stylesheet" />
</head>
<body>
    <a href="add.php" class="btn btn-primary">Thêm sản phẩm</a>
    <table >
        <thead>
            <th>STT</th>
            <th>Mã loại sản phẩm</th>
            <th>Tên loại sản phẩm</th>
            <th>Mô tả loại sản phẩm</th>
            <th>Hành động</th>
        </thead>
        <tbody>
            <?php
                include_once('../../../connectdb.php');
                $sql  = "SELECT * FROM loaisanpham";
                $result = mysqli_query($conn,$sql);
                $stt = 1;
                $lsp = [];
                while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                    $lsp[] = array(
                        'lsp_ma' => $row['lsp_ma'],
                        'lsp_ten' => $row['lsp_ten'],
                        'lsp_mota' => $row['lsp_mota'],
                        );
                }
            ?>
             <?php foreach ($lsp as $loaisanpham) : ?>
              <tr>
                <td><?= $stt++ ?></td>
                <td><?= $loaisanpham['lsp_ma'] ?></td>
                <td><?= $loaisanpham['lsp_ten'] ?></td>
                <td><?= $loaisanpham['lsp_mota'] ?></td>
                <td>
                  <!-- Nút sửa, bấm vào sẽ hiển thị form hiệu chỉnh thông tin dựa vào khóa chính `lsp_ma` -->
                  <a href="edit.php?lsp_ma=<?= $loaisanpham['lsp_ma'] ?>" class="btn btn-warning">
                    <span data-feather="edit"></span> Sửa
                  </a>

                  <!-- Nút xóa, bấm vào sẽ xóa thông tin dựa vào khóa chính `lsp_ma` -->
                  <a href="delete.php?lsp_ma=<?= $loaisanpham['lsp_ma'] ?>" class="btn btn-danger">
                    <span data-feather="delete"></span> Xóa
                  </a>
                </td>
              </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>