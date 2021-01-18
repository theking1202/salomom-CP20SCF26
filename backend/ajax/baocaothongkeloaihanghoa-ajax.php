<?php
    
    include_once('../../connectdb.php');
    
    // 2. Chuẩn bị câu truy vấn $sql
    $sql = <<<EOT
    SELECT lsp_ten as TenLoaiSanPham, COUNT(*) AS quantity
    FROM `sanpham` sp
    JOIN `loaisanpham` lsp ON sp.lsp_ma = lsp.lsp_ma
    GROUP BY sp.lsp_ma
EOT;
    
    // 3. Thực thi câu truy vấn SQL để lấy về dữ liệu
    $result = mysqli_query($conn, $sql);
    
    // 4. Khi thực thi các truy vấn dạng SELECT, dữ liệu lấy về cần phải phân tích để sử dụng
    // Thông thường, chúng ta sẽ sử dụng vòng lặp while để duyệt danh sách các dòng dữ liệu được SELECT
    // Ta sẽ tạo 1 mảng array để chứa các dữ liệu được trả về
    $dataquantityLoaiHang = [];
    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
    {
        $dataquantityLoaiHang[] = array(
            'TenLoaiSanPham' => $row['TenLoaiSanPham'],
            'quantity' => $row['quantity'],
        );
    }
    
    // Dữ liệu JSON, array PHP -> JSON 
    echo json_encode($dataquantityLoaiHang);

?>