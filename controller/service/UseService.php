<?php
    require_once (__DIR__ ."/../dao/UserDao.php");
    require_once (__DIR__ ."/../entity/User.php");
    if(!isset($_SESSION)){
        session_start();
    }
    $userDao=new UserDao();
    $method = $_SERVER['REQUEST_METHOD'];


    if($method == "DELETE"){
            parse_str(file_get_contents('php://input'), $_DELETE);
            $userDao->remove($_DELETE['id']);
            header('Content-type: application/json');
            echo json_encode(array("message" => "Đã xóa thành công", "status" => "204"));

    }

    if($method == "POST"){
        $user=new User();
        $user->username=$_POST['username'];
        $user->password=$_POST['password'];
        $user->name=$_POST['name'];
        $user->phone=$_POST['phone'];
        $user->email=$_POST['email'];
        $user->role=$_POST['role'];

        $userDao->addUser($user);
        header('Content-type: application/json');
        echo json_encode(array("message" => "Đã thêm người dùng thành công", "status" => "200"));

    }

    if($method == "UPDATE"){
        parse_str(file_get_contents('php://input'), $_UPDATE);
        $user=new User();
        $user->id=$_UPDATE['id'];
        $user->username=$_UPDATE['username'];
        $user->password=$_UPDATE['password'];
        $user->name=$_UPDATE['name'];
        $user->phone=$_UPDATE['phone'];
        $user->email=$_UPDATE['email'];
        $user->role=$_UPDATE['role'];

        $userDao->updateUser($user);
        header('Content-type: application/json');
        echo json_encode(array("message" => "Đã sửa thông tin người dùng thành công", "status" => "200"));

    }

    if($method == "GET"&&isset($_GET['id'])){
        $user=$userDao->getUserById($_GET['id']);
        header('Content-type: application/json');
        echo json_encode($user);

    }

    if($method == "GET"&&isset($_GET['search'])){
        $user=$userDao->search($_GET['search']);
        header('Content-type: application/json');
        echo json_encode($user);

    }
