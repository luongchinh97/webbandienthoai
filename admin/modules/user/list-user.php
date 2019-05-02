<?php
    include_once ("../../../controller/dao/UserDao.php");
    $userDao=new UserDao();
    $userList=$userDao->getAllUser();
    function show($userList){
        $html="<thead><tr><th>ID</th><th>Tài khoản</th><th>Mật khẩu</th><th>Họ tên</th><th>Số điện thoại</th><th>Email</th><th  colspan='2'>Tùy chọn</th></tr></thead>";
        foreach ($userList as $user) {
            $html  .= "<tr>";
            $html .= "<td>" . $user['id'] . "</td>" .
                "<td>" . $user['username'] . "</td>" .
                "<td>" . $user['password'] . "</td>" .
                "<td>" . $user['name'] . "</td>" .
                "<td>" . $user['phone'] . "</td>" .
                "<td>" . $user['email'] . "</td>".
                "<td><a href='http://localhost:81/webbandienthoai/admin/modules/user/edit-user.php?id={$user['id']}' class='btn btn-primary a-btn-slide-text'><span><strong>Sửa</strong></span></a></td>".
                "<td><a href='http://localhost:81/webbandienthoai/admin/modules/user/delete.php?id={$user['id']}' class='btn btn-primary a-btn-slide-text'><span><strong>Xóa</strong></span></a></td>";
            $html .= "</tr>";
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
                        <strong class="card-title">Danh sách người dùng</strong>
                        <div id="search11">
                            <input id="input_search" style="width: 350px" type="search" class="form-control form-control-sm" placeholder="Tìm kiếm...">
                        </div>
                    </div>
                    <div><a href='http://localhost:81/webbandienthoai/admin/modules/user/add-user.php' class='btn btn-primary a-btn-slide-text'><span><strong>Thêm</strong></span></a></div>
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
    $(document).ready(function(){
      let html="<?php echo show($userList); ?>";
      $('.table_user_list').html(html);
      $("#input_search").on("keyup", function() {
        let search=$('#input_search').val();
        console.log(search);
        searchUser(search);
      });
    });
    function searchUser(search) {
      $.ajax({
        url: "http://localhost:81/webbandienthoai/controller/service/UseService.php",
        contentType: "application/json; charset=utf-8",
        method: "GET",
        dataType: "json",
        data: {
          search: search,
        },
        success: function(res) {
          let html2="<thead><tr><th>ID</th><th>Tài khoản</th><th>Mật khẩu</th><th>Họ tên</th><th>Số điện thoại</th><th>Email</th><th colspan='2'>Tùy chọn</th></tr></thead>";
          res.forEach(function (element) {
            html2  += "<tr>";
            html2 += "<td>"  + element.id  + "</td>"  +
                     "<td>"  + element.username  + "</td>"  +
                     "<td>"  + element.password  + "</td>"  +
                     "<td>"  + element.name  + "</td>"  +
                     "<td>"  + element.phone  + "</td>"  +
                     "<td>"  + element.email  + "</td>"  +
                     "<td><a href='http://localhost:81/webbandienthoai/admin/modules/user/edit-user.php?id="+element.id+"' class='btn btn-primary a-btn-slide-text'><span><strong>Sửa</strong></span></a></td>"+
                      "<td><a href='http://localhost:81/webbandienthoai/admin/modules/user/delete.php?id="+element.id+"' class='btn btn-primary a-btn-slide-text'><span><strong>Xóa</strong></span></a></td>";
            html2 += "</tr>";
          });
          $('.table_user_list').html(html2);
        },
        error: function (e) {
          alert("error");
        }
      });
    }
  </script>
</body>
</html>
