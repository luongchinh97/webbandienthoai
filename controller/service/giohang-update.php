<?php 
	require_once "../entity/Items.php";
	session_start();
	$item = new Items();

	$id = $_POST['idP'];
	$soLuong = (int) $_POST['quantity'];
	foreach ($_SESSION['cartitems'] as $value) {
		if($value->idProduct==$id){
			$value->soLuong=$soLuong;
			break;
		}
	}
	$tongSoLuong = 0;
	foreach ($_SESSION['cartitems'] as $value) {
		$tongSoLuong =$tongSoLuong + $value->soLuong;
	}
	$_SESSION['tongItems'] = $tongSoLuong;
	header("location:../../giohang.php");
 ?>