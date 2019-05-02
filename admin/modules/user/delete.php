<?php
require_once (__DIR__ ."/../../../controller/entity/User.php");
require_once (__DIR__ ."/../../../controller/dao/UserDao.php");
$userDao=new UserDao();
$userDao->deleteCartItemsByUserId($_GET['id']);
$userDao->removeOrderUserById($_GET['id']);
$userDao->remove($_GET['id']);
header("location:http://localhost:81/webbandienthoai/admin/modules/user/list-user.php");
?>