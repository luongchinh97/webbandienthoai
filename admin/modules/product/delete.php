<?php 
include __DIR__."/../../../controller/dao/database.php";
$dao= new dao;
$id=$_GET['id'];
$dao->delete("product",$id);
header("location:list.php");
 ?>}
