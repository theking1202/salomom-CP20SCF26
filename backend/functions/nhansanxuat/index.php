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
            <th>Mã nhà sản xuất</th>
            <th>Tên nhà sản xuất</th>
            <th>Hành động</th>
        </thead>
        <tbody>
            <?php
                include_once('../../../connectdb.php');
                $sql  = "SELECT * FROM nhasanxuat";
                $result = mysqli_query($conn,$sql);
                $stt = 1;
                $nsx = [];
                while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                    $nsx[] = array(
                        'nsx_ma' => $row['nsx_ma'],
                        'nsx_ten' => $row['nsx_ten'],
                        );
                }
            ?>
             <?php foreach ($nsx as $nhasanxuat) : ?>
              <tr>
                <td><?= $stt++ ?></td>
                <td><?= $nhasanxuat['nsx_ma'] ?></td>
                <td><?= $nhasanxuat['nsx_ten'] ?></td>
                <td>
                  <!-- Nút sửa, bấm vào sẽ hiển thị form hiệu chỉnh thông tin dựa vào khóa chính `nsx_ma` -->
                  <a href="edit.php?nsx_ma=<?= $nhasanxuat['nsx_ma'] ?>" class="btn btn-warning">
                    <span data-feather="edit"></span> Sửa
                  </a>

                  <!-- Nút xóa, bấm vào sẽ xóa thông tin dựa vào khóa chính `nsx_ma` -->
                  <a href="delete.php?nsx_ma=<?= $nhasanxuat['nsx_ma'] ?>" class="btn btn-danger">
                    <span data-feather="delete"></span> Xóa
                  </a>
                </td>
              </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>