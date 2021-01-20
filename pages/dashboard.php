<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bảng tin Dashboard </title>
    <link href="../backend/assets/vendor/bootstrap/css/bootstrap.min.css" type="text/css" rel="stylesheet" />
    <link href="../backend/assets/vendor/charjs/Chart.min.css" type="text/css" rel="stylesheet" />
</head>
<body>
    <h1>Bảng tin Dashboard</h1>
    <div class="container">
        <div class="row">
            <div  class="col-md-4">
                <div id="baocaoSanPham_SoLuong">
                    <h1>0</h1>
                </div>
            <button id="refreshBaoCaoSanPham">Refresh bao cao so luong san pham</button>
            </div>
            <div  class="col-md-4">
                <div id="baocaoSanPham_Loai">
                    <h1>0</h1>
                </div>
            <button id="refreshLoaiBaoCaoSanPham">Refresh bao cao so luong loai san pham</button>
            </div>
            <div  class="col-md-4">
                <div id="baocaoKhachHang">
                    <h1>0</h1>
                </div>
            <button id="refreshBaoCaoKhachHang">Refresh bao cao so luong khach hang</button>
            </div>
        </div>
        <div class="row">
        <div class="col-sm-6 col-lg-6">
              <canvas id="chartOfobjChartThongKeLoaiSanPham"></canvas>
              <button class="btn btn-outline-primary btn-sm form-control" id="refreshThongKeLoaiSanPham">Refresh dữ liệu</button>
            </div>
        </div>
    </div>
</body>

<script src="../backend/assets/vendor/jquery/jquery.min.js"></script>
<script src="../backend/assets/vendor/jquery-validation/jquery.validate.min.js"></script>
<script src="../backend/assets/vendor/jquery-validation/localization/messages_vi.min.js"></script>
<script src="../backend/assets/vendor/charjs/Chart.min.js"></script>
<script>
    $(document).ready(function(){
      // function baocaosanpham(){
        $('#refreshBaoCaoSanPham').click(function(){
            $.ajax('/salomom-CP20SCF26/backend/ajax/baocaothongkesoluonghang-ajax.php',{
                success: function(data){
                    debugger;
                    var objData = JSON.parse(data);
                    // alert (objData);
                    var chuoihtml = '<h1>'+ objData.quantity +'</h1>';
                    $('#baocaoSanPham_SoLuong').html(chuoihtml);
                },
                error: function(jqXHR, textStatus, errorThrown){
                    alert('Co loi'+errorThrown);
                }
            });
        });
        // }
    });

    // ------------------ Vẽ biểu đồ thống kê Loại sản phẩm -----------------
      // Vẽ biểu đổ Thống kê Loại sản phẩm sử dụng ChartJS
      var $objChartThongKeLoaiSanPham;
      var $chartOfobjChartThongKeLoaiSanPham = document.getElementById("chartOfobjChartThongKeLoaiSanPham").getContext(
        "2d");

      function renderChartThongKeLoaiSanPham() {
        $.ajax({
          url: '/salomom-CP20SCF26/backend/ajax/baocaothongkeloaihanghoa-ajax.php',
          type: "GET",
          success: function(response) {
            var data = JSON.parse(response);
            var myLabels = [];
            var myData = [];
            $(data).each(function() {
              myLabels.push((this.TenLoaiSanPham));
              myData.push(this.quantity);
            });
            myData.push(0); // tạo dòng số liệu 0
            if (typeof $objChartThongKeLoaiSanPham !== "undefined") {
              $objChartThongKeLoaiSanPham.destroy();
            }
            $objChartThongKeLoaiSanPham = new Chart($chartOfobjChartThongKeLoaiSanPham, {
              // Kiểu biểu đồ muốn vẽ. Các bạn xem thêm trên trang ChartJS
              type: "bar",
              data: {
                labels: myLabels,
                datasets: [{
                  data: myData,
                  borderColor: "#9ad0f5",
                  backgroundColor: "#9ad0f5",
                  borderWidth: 1
                }]
              },
              // Cấu hình dành cho biểu đồ của ChartJS
              options: {
                legend: {
                  display: false
                },
                title: {
                  display: true,
                  text: "Thống kê Loại sản phẩm"
                },
                responsive: true
              }
            });
          }
        });
      };
      $('#refreshThongKeLoaiSanPham').click(function(event) {
        event.preventDefault();
        renderChartThongKeLoaiSanPham();
      });

      // baocaosanpham();
</script>

</html>