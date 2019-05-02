<?php
    require_once (__DIR__ ."/../../../controller/entity/User.php");
    require_once (__DIR__ ."/../../../controller/dao/UserDao.php");
    session_start();
    $user=$_SESSION['user'];
    if(isset($_POST['submit'])){
        $userAdmin=new User();
        $userAdmin->id=$_POST['id'];
        $userAdmin->username=$_POST['username'];
        $userAdmin->password=$_POST['password'];
        $userAdmin->name=$_POST['name'];
        $userAdmin->phone=$_POST['phone'];
        $userAdmin->email=$_POST['email'];
        $userAdmin->role=2;
        $userDao=new UserDao();
        $userDao->updateUser($userAdmin);
        if(isset($_SESSION['user'])){
            unset($_SESSION['user']);
            echo "<script>console.log('hihi');</script>";
        }
        else echo "<script>console.log('haha');</script>";
        $data=(array) $userAdmin;
        $_SESSION['user']=$data;
        header("location:http://localhost:81/webbandienthoai/admin/modules/user/view-admin.php");
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
        cursor:
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
                    <div class="card-header"><center><strong>Thông tin người quản lý</strong></center></div>
                    <div class="card-body card-block">
                        <form  action="" method="post" >
                            <input hidden="true" name="id" value="<?php echo $user['id'] ;?>">
                            <div class="form-group"><label for="company" class=" form-control-label">Tài khoản</label><input readonly value="<?php echo $user['username'] ;?>"  name="username" type="text" id="username_add" placeholder="Nhập tên tài khoản..." class="form-control">
                                <div id="check_username" style="float: right" >OK</div>
                            </div>
                            <div class="form-group"><label for="vat" class=" form-control-label">Mật khẩu</label><input value="<?php echo $user['password'] ;?>"  name="password" type="text" id="vat" placeholder="Nhập mật khẩu..." class="form-control"></div>
                            <div class="form-group"><label for="street" class=" form-control-label">Họ tên</label><input value="<?php echo $user['name'] ;?>"  name="name" type="text" id="street" placeholder="Họ tên người dùng..." class="form-control"></div>
                            <div class="form-group"><label for="street" class=" form-control-label">Số điện thoại</label><input value="<?php echo $user['phone'] ;?>"  name="phone" type="text" id="street" placeholder="Nhập số điện thoại..." class="form-control"></div>
                            <div class="form-group"><label for="country" class=" form-control-label">Email</label><input value="<?php echo $user['email'] ;?>"  name="email" type="text" id="country" placeholder="Địa chỉ hòm thư..." class="form-control"></div>
                            <button name="submit" type="submit" id="contact-submit" data-submit="...Sending">Sửa thông tin</button>
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

</body>
</html>
