<?php
    require_once __DIR__."/../../controller/dao/rootdao.php";
    require_once __DIR__."/../entity/User.php";
    class UserDao{
        private $conn;
        function getAllUser(){
            $conn = connectDB();
            $query = sprintf("SELECT * FROM ".User::$table);
            $result = mysqli_query($conn, $query);
            $arr = array();
            if(mysqli_num_rows($result)){
                while($row = mysqli_fetch_assoc($result)){
                    array_push($arr, $row);
                }
            }
            mysqli_close($conn);
            return ($arr);
        }

        function search($search){
            $conn = connectDB();
            $query = "SELECT * FROM ".User::$table." WHERE name like '%".$search."%'";

            $result = mysqli_query($conn, $query);
            $arr = array();
            if(mysqli_num_rows($result)){
                while($row = mysqli_fetch_assoc($result)){
                    array_push($arr, $row);
                }
            }
            mysqli_close($conn);
            return ($arr);
        }


        function getUserById($id){
            $conn = connectDB();
            $query = sprintf("SELECT * FROM ".User::$table." WHERE id=".$id);
            $result = mysqli_query($conn, $query);
            $arr = mysqli_fetch_array($result);
            mysqli_close($conn);
            return ($arr);
        }


        function addUser($user){
            $conn = connectDB();
            $query = "INSERT INTO ".User::$table. " SET username = '".$user->username."', ".
                "password = '".$user->password."', ".
                "name = N'".$user->name."', ".
                "phone = N'".$user->phone."', ".
                "email = N'".$user->email."', ".
                "role = '".$user->role."' ";
            mysqli_query($conn, $query);
            mysqli_close($conn);
        }

        function remove($id){
            $conn = connectDB();
            $query="DELETE FROM ".User::$table." WHERE id= {$id}";
            mysqli_query($conn, $query);
            mysqli_close($conn);
        }

        function updateUser($user){
            $conn = connectDB();
            $query = "UPDATE ".User::$table. " SET username = '".$user->username."', ".
                "password = '".$user->password."', ".
                "name = N'".$user->name."', ".
                "phone = N'".$user->phone."', ".
                "email = N'".$user->email."', ".
                "role = '".$user->role."' WHERE id =".$user->id;
            mysqli_query($conn, $query);
            mysqli_close($conn);
        }
    }