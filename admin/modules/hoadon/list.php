<?php 
include("congcu.php");
function show(){
    $dao= new dao;
    $html="<thead><tr><th>ID</th><th>IdUser</th><th>Địa chỉ</th><th>Ngày lập</th><th>Tổng giá</th><th>Số lượng</th><th  colspan='3'>Tùy chọn</th></tr></thead>";
                $rs=$dao->getPayment();
                 while($row = $rs->fetch_assoc()){
                        $html.="<tr><td>".$row['id'].
                        "</td><td>".$row['idUser'].
                        "</td><td>".$row['diaChi'].
                        "</td><td>".$row['ngayLap'].
                        "</td><td>".$row['tongGia'].
                        "</td><td>".$row['soLuong'].
                        "</td><td><a href='chitiet.php?id=".
                        $row['id']."'>Chi tiết</a></td><td><a href='edit.php?id=".$row['id'].
                        "'>Sửa</td><td><a href='delete.php?id=".$row['id'].
                        "'>Xóa</td></tr>";
                    }
    return $html;
    }
?>
<!DOCTYPE html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title></title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
  <link rel="stylesheet" href="http://localhost:81/webbandienthoai/static/css/styleAdmin.css">
  <style>
      a.btn:hover {
          -webkit-transform: scale(1.1);
          -moz-transform: scale(1.1);
          -o-transform: scale(1.1);
      }
      a.btn {
          -webkit-transform: scale(0.8);
          -moz-transform: scale(0.8);
          -o-transform: scale(0.8);
          -webkit-transition-duration: 0.5s;
          -moz-transition-duration: 0.5s;
          -o-transition-duration: 0.5s;
      }
      th{
          text-align: center;
      }
      #search11{
          float: right;
      }
  </style>
</head>
<body>
  <?php include_once ("../../layouts/left-panel.php")?>
  <div id="right-panel" class="right-panel">
    <?php include_once ("../../layouts/Header.php")?>
    <div class="content">
        <div class="animated fadeIn">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <strong class="card-title">Danh sách hóa đơn</strong>
                </div>
                <div style="margin: 10px 20px">
                  <form method="POST" action="index2.php" class="form-horizontal">
                      <div class="row form-group">
                        <div class="col col-md-2">
                          <label class="form-control-label">Tìm kiếm:</label> 
                        </div>
                        <div class="col-12 col-md-3">
                          <input class="form-control" type="text" name="key" placeholder="Nhập ngày cần tìm ">
                        </div>
                        <input class="btn btn-secondary" type="submit" name="submit" value="Tìm">
                      </div>
                  </form>
                </div>
                <div style="font-size: 14px" class="card-body">
                    <table id="bootstrap-data-table" class="table_user_list table table-striped table-bordered">
                    </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="clearfix"></div>
  </div>
  <!-- Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
  <script>
     jQuery(function ($){
        let html="<?php echo show(); ?>";
        $('.table_user_list').html(html);
       });
   </script>
</body>
</body>
</html>

