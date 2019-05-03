<?php
    require_once (__DIR__ ."/../../../controller/dao/UserDao.php");
    require_once (__DIR__ ."/../../../controller/entity/User.php");
    $userDao=new UserDao();
    $user=$userDao->getUserById($_GET['id']);
    if(isset($_POST['submit'])){
      $user=new User();
      $user->id=$_POST['id'];
      $user->username=$_POST['username'];
      $user->password=$_POST['password'];
      $user->name=$_POST['name'];
      $user->phone=$_POST['phone'];
      $user->email=$_POST['email'];
      $user->role=1;
      $userDao->updateUser($user);
      header("location:http://localhost:81/webbandienthoai/admin/modules/user/list-user.php");
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
      th{
          text-align: center;
      }
      #search11{
          float: right;
      }
      #contact-submit{
          cursor: pointer;
          width: 100%;
          border: none;
          background: #4CAF50;
          color: #FFF;
          margin: 0 0 5px;
          padding: 10px;
          font-size: 15px;
      }
      #contact-submit:hover {
          background: #43A047;
          -webkit-transition: background 0.3s ease-in-out;
          -moz-transition: background 0.3s ease-in-out;
          transition: background-color 0.3s ease-in-out;
      }
      #check_username{
          display: none;
      }
  </style>
</head>
<body>
    <?php include_once ("../../layouts/left-panel.php")?>
    <div id="right-panel" class="right-panel">
      <?php include_once ("../../layouts/Header.php")?>
      <div class="content">
          <div class="animated fadeIn">
              <div class="col-lg-6">
                <div style="width: 600px;margin-left: 200px" class="card">
                    <div class="card-header"><center><strong>Thêm người dùng</strong></center></div>
                    <div class="card-body card-block">
                        <form action="" method="post" >
                            <input hidden="true" name="id" value="<?php echo $user['id'] ;?>">
                            <div class="form-group"><label for="company" class=" form-control-label">Tài khoản</label><input readonly value="<?php echo $user['username'] ;?>"  name="username" type="text" id="username_add" placeholder="Nhập tên tài khoản..." class="form-control">
                                <div id="check_username" style="float: right" >OK</div>
                            </div>
                            <div class="form-group"><label for="vat" class=" form-control-label">Mật khẩu</label><input required value="<?php echo $user['password'] ;?>"  name="password" type="text" id="vat" placeholder="Nhập mật khẩu..." class="form-control"></div>
                            <div class="form-group"><label for="street" class=" form-control-label">Họ tên</label><input required value="<?php echo $user['name'] ;?>"  name="name" type="text" id="street" placeholder="Họ tên người dùng..." class="form-control"></div>
                            <div class="form-group"><label for="street" class=" form-control-label">Số điện thoại</label><input required  pattern="0[0-9]{9,10}" value="<?php echo $user['phone'] ;?>"  name="phone" type="text" id="street" placeholder="Nhập số điện thoại..." class="form-control"></div>
                            <div class="form-group"><label for="country" class=" form-control-label">Email</label><input required value="<?php echo $user['email'] ;?>"  name="email" type="text" id="country" placeholder="Địa chỉ hòm thư..." class="form-control"></div>
                            <button name="submit" type="submit" id="contact-submit" data-submit="...Sending">Submit</button>
                        </form>
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
        $("#username_add").focusout(function(e) {
           e.preventDefault();
           let taikhoan=$('#username_add').val();
           console.log(taikhoan);
           checkUsername(taikhoan);
        });
      });
      function checkUsername(taikhoan) {
        $.ajax({
          url: "http://localhost:81/webbandienthoai/controller/service/UseService.php",
          contentType: "application/json; charset=utf-8",
          method: "GET",
          dataType: "json",
          data: {
              username: taikhoan,
          },
          success: function(res) {
            if(res.message=='OK'){
              $("#check_username").html("OK");
              $("#check_username").show();
            }
            else
              $("#check_username").html("Bị trùng");
          },
          error: function (e) {
            alert("error");
          }
        })
      }
    </script>
</body>
</html>
